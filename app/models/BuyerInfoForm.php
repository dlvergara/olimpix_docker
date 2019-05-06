<?php

namespace app\models;

use Yii;

class BuyerInfoForm extends \yii\base\Model
{
    public $name;
    public $email;
    public $phone;

    private $paymentDistribution;
    private $totalComision;
    private $porcentaje_iva;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone'], 'required'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Nombre completo',
            'email' => 'Correo electrónico',
            'phone' => 'Teléfono',
        ];
    }

    public function getTotalIva($baseIva = 0)
    {
        return ($baseIva * $this->getPorcentajeIva()) / 100;
    }

    /**
     * @param $totalOrden
     * @return float|int
     */
    private function calcularComisionPasarela($totalOrden)
    {
        $porcentajeComisionPasarela = Yii::$app->params['epayco']['porcentaje_comision'];
        $valorFijoPasarela = Yii::$app->params['epayco']['valor_fijo'];
        $ivaPasarela = Yii::$app->params['epayco']['porcentaje_iva'];

        $comisionPasarela = (($totalOrden * $porcentajeComisionPasarela) / 100) + $valorFijoPasarela;
        $comisionPasarela = $comisionPasarela + ($comisionPasarela * $ivaPasarela) / 100;//sumando el iva de la comision de la pasarela
        return $comisionPasarela;
    }

    /**
     * @param array $reservas
     * @param array $cargosAdicionales
     * @param string $currency
     * @param $total
     * @param $baseIva
     * @return Order
     * @throws \yii\db\Exception
     */
    public function createOrder($reservas, $cargosAdicionales, $currency = 'COP', $total, $baseIva)
    {
        $paymentDistribution = [];

        /**
         * @var $reserva ReservaForm
         * @var $servicio ServicioDisponible
         */
        foreach ($reservas as $index => $reserva) {
            $servicioModel = new ServicioDisponibleModel();
            $servicioModel->loadFromParentObj($reserva->getServicioDisponible());
            $subtotal = $servicioModel->monto * $reserva->cantidad;
            $servicioModel->calcularMontoIva($subtotal);
            $subtotalIva = $servicioModel->getMontoIva();

            $reserva->subtotal = $subtotal;
            $reserva->montoIva = $subtotalIva;
            $total += $subtotal + $subtotalIva;
            $baseIva += $reserva->montoIva;
            $servicioModel->calcularComisionOlimpix($subtotal)->calcularMontoIvaComisionOlimpix();
            $reserva->subtotal = $subtotal + $subtotalIva;
            $reserva->montoComisionOlimpix = $servicioModel->getMontoComision();
            $reserva->porcentaje_comision_olimpix = $servicioModel->getPorcentajeIvaComision();
            $reserva->montoIvaComisionOlimpix = $servicioModel->getIvaComision();

            if (isset($paymentDistribution[$servicioModel->proveedor_id_proveedor])) {
                $paymentDistribution[$servicioModel->proveedor_id_proveedor]['fee'] += $subtotal + $subtotalIva;
                $paymentDistribution[$servicioModel->proveedor_id_proveedor]['monto_comision_olimpix'] += $servicioModel->getMontoComision();
                $paymentDistribution[$servicioModel->proveedor_id_proveedor]['monto_iva_olimpix'] += $reserva->montoIvaComisionOlimpix;
                $paymentDistribution[$servicioModel->proveedor_id_proveedor]['porcentaje_comision_olimpix'] = $servicioModel->porcentaje_comision_olimpix;
            } else {
                $paymentDistribution[$servicioModel->proveedor_id_proveedor] = [
                    'id' => $servicioModel->proveedorIdProveedor->id_pasarela,
                    'fee' => $subtotal + $subtotalIva,
                    'monto_comision_olimpix' => $servicioModel->getMontoComision(),
                    'monto_iva_olimpix' => $reserva->montoIvaComisionOlimpix,
                    'porcentaje_comision_olimpix' => $servicioModel->porcentaje_comision_olimpix,
                ];
            }
        }
        $comisionPasarela = $this->calcularComisionPasarela($total);

        $transaction = Yii::$app->db->beginTransaction();

        $order = new Order();
        $order->total_amount = floatval($total);
        $order->base_iva = floatval($baseIva);
        $order->date = date('Y-m-d H:i:s');
        $order->currency = $currency;
        $order->order_status_id_order_status = 8;

        try {
            $order->save();

            $paymentProveedor = $this->calcPasarelaCost($paymentDistribution, $comisionPasarela, $total);
            $this->paymentDistribution = $paymentProveedor;
            $this->setPaymentDistributionArray($order, $paymentProveedor);
            $this->setOrderDetails($reservas, $order);

            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollBack();
            error_log($e->getMessage());
        }

        return $order;
    }

    /**
     * @param array $reservas
     * @param Order $order
     */
    private function setOrderDetails(array $reservas, Order $order)
    {
        /**
         * @var $reserva ReservaForm
         * @var $servicio ServicioDisponible
         */
        foreach ($reservas as $index => $reserva) {
            $servicio = $reserva->getServicioDisponible();
            $orderDetail = new OrderDetail();
            $orderDetail->cantidad = $reserva->cantidad;
            $orderDetail->precio_unitario = $servicio->monto;
            $orderDetail->servicio_disponible_id_servicio_disponible = $servicio->id_servicio_disponible;
            $orderDetail->porcentaje_iva = $servicio->porcentaje_iva;
            $orderDetail->monto_iva = $reserva->montoIva;
            $orderDetail->porcentaje_comision_olimpix = $reserva->porcentaje_comision_olimpix;
            $orderDetail->monto_comision_olimpix = $reserva->montoComisionOlimpix;

            $orderDetail->order_id_order = $order->id_order;
            $orderDetail->save();
        }
    }

    /**
     * @param Order $order
     * @param array $paymentDistribution
     * $p_split_receivers[0] = array('id' => '17511', 'fee' => '20');
     */
    private function setPaymentDistributionArray(Order $order, array $paymentDistribution)
    {
        foreach ($paymentDistribution as $idProveedor => $payDistribution) {
            $paymentDistribution = new PaymentDistribution();
            $paymentDistribution->order_id_order = $order->id_order;
            $paymentDistribution->proveedor_id_proveedor = $payDistribution['id_proveedor'];
            $paymentDistribution->total = $payDistribution['fee'];
            $paymentDistribution->comision_olimpix = $payDistribution['monto_comision_olimpix'];
            $paymentDistribution->porcentaje_comision_olimpix = $payDistribution['porcentaje_comision_olimpix'];
            $paymentDistribution->base_comision = $payDistribution['monto_comision_olimpix'];
            $paymentDistribution->comision_pasarela = $payDistribution['comision_pasarela'];
            $paymentDistribution->porcentaje_pasarela = $payDistribution['porcentaje_comision_pasarela'];
            $save = $paymentDistribution->save();
            if( !$save ) {
                $errors = $paymentDistribution->getErrors();
                echo '<pre>'; var_dump($errors); exit;
                throw new \Exception($errors[0]);
            }
        }
    }

    /**
     * @param $paymentProveedor
     * @param $comisionTotalPasarela
     * @param $totalOrden
     * @return array
     */
    private function calcPasarelaCost(array $paymentProveedor, float $comisionTotalPasarela, float $totalOrden)
    {
        $totalOrden = empty($totalOrden) ? 1 : $totalOrden;
        $newPaymentProveedor = [];
        foreach ($paymentProveedor as $idProveedor => $payDistribution) {
            $porcentaje_comision_pasarela = ($payDistribution['fee'] * 100) / $totalOrden;
            $comision_pasarela = ($comisionTotalPasarela * $porcentaje_comision_pasarela) / 100;

            $paymentProveedor[$idProveedor]['id_proveedor'] = $idProveedor;
            $paymentProveedor[$idProveedor]['comision_pasarela'] = $comision_pasarela;
            $paymentProveedor[$idProveedor]['porcentaje_comision_pasarela'] = $porcentaje_comision_pasarela;
            $paymentProveedor[$idProveedor]['fee'] -= ($comision_pasarela + $payDistribution['monto_comision_olimpix'] + $payDistribution['monto_iva_olimpix']);

            $newPaymentProveedor[] = $paymentProveedor[$idProveedor];
        }

        return $newPaymentProveedor;
    }


    /**
     * @return mixed
     */
    public function getPaymentDistribution()
    {
        return $this->paymentDistribution;
    }

    /**
     * @return mixed
     */
    public function getTotalComision()
    {
        return $this->totalComision;
    }

    /**
     * @return mixed
     */
    public function getPorcentajeIva()
    {
        return $this->porcentaje_iva;
    }

    /**
     * @param mixed $porcentaje_iva
     * @return BuyerInfoForm
     */
    public function setPorcentajeIva($porcentaje_iva)
    {
        $this->porcentaje_iva = $porcentaje_iva;
        return $this;
    }

}