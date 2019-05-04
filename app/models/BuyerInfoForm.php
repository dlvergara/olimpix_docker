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
     */
    public function createOrder($reservas, $cargosAdicionales, $currency = 'COP', $total, $baseIva)
    {
        $comisionPasarela = $this->calcularComisionPasarela($total);
        $paymentDistribution = [];

        $order = new Order();
        $order->total_amount = floatval($total);
        $order->date = date('Y-m-d H:i:s');
        $order->currency = $currency;
        $order->order_status_id_order_status = 8;
        $order->save();

        /**
         * @var $reserva ReservaForm
         * @var $servicio ServicioDisponible
         */
        foreach ($reservas as $index => $reserva) {
            $this->totalComision += floatval($reserva->montoComisionOlimpix);
            $servicio = $reserva->getServicioDisponible();
            $orderDetail = new OrderDetail();
            $orderDetail->cantidad = $reserva->cantidad;
            $orderDetail->precio_unitario = $servicio->monto;
            $orderDetail->servicio_disponible_id_servicio_disponible = $servicio->id_servicio_disponible;
            $orderDetail->porcentaje_iva = $servicio->porcentaje_iva;
            $orderDetail->monto_iva = $reserva->montoIva;
            $orderDetail->porcentaje_comision_olimpix = $servicio->porcentaje_comision_olimpix;
            $orderDetail->monto_comision_olimpix = $reserva->montoComisionOlimpix;

            $orderDetail->order_id_order = $order->id_order;
            $orderDetail->save();

            $paymentDistribution[$servicio->proveedor_id_proveedor][] = $orderDetail;
        }

        $this->setPaymentDistributionArray($order, $paymentDistribution, $total, $comisionPasarela);

        return $order;
    }

    /**
     * @param Order $order
     * @param array $paymentDistribution
     * $p_split_receivers[0] = array('id' => '17511', 'fee' => '20');
     */
    private function setPaymentDistributionArray(Order $order, array $paymentDistribution, $total, $comisionPasarela)
    {
        $paymentProveedor = [];

        /**
         * @var $orderDetail OrderDetail
         */
        foreach ($paymentDistribution as $id_proveedor => $orderDetails) {
            foreach ($orderDetails as $key => $orderDetail) {
                if(isset($paymentProveedor[$id_proveedor])) {
                    $paymentProveedor[$id_proveedor]['fee'] += ($orderDetail->cantidad * floatval($orderDetail->precio_unitario));
                    $paymentProveedor[$id_proveedor]['monto_comision_olimpix'] += floatval($orderDetail->monto_comision_olimpix);
                } else {
                    $paymentProveedor[$id_proveedor] = [
                        'id' => $orderDetail->servicioDisponibleIdServicioDisponible->proveedorIdProveedor->id_pasarela,
                        'fee' => ($orderDetail->cantidad * floatval($orderDetail->precio_unitario)),
                        'monto_comision_olimpix' => floatval($orderDetail->monto_comision_olimpix),
                    ];
                }
            }
        }
        $paymentProveedor = $this->setPasarelaCost($paymentProveedor, $comisionPasarela, $total);
        $this->paymentDistribution = $paymentProveedor;

        foreach ($paymentProveedor as $idProveedor => $payDistribution) {
            $paymentDistribution = new PaymentDistribution();
            $paymentDistribution->order_id_order = $order->id_order;
            $paymentDistribution->proveedor_id_proveedor = $id_proveedor;
            $paymentDistribution->total = $payDistribution['fee'];
            $paymentDistribution->porcentaje_comision_olimpix = $payDistribution['porcentaje_comision_olimpix'];
            $paymentDistribution->base_comision = $payDistribution['monto_comision_olimpix'];
            $paymentDistribution->comision_pasarela = $payDistribution['comision_pasarela'];
            $paymentDistribution->porcentaje_pasarela = $payDistribution['porcentaje_comision_pasarela'];
            $paymentDistribution->save();
        }
    }

    /**
     * @param $paymentProveedor
     * @param $comisionTotalPasarela
     * @param $totalOrden
     * @return array
     */
    private function setPasarelaCost(array $paymentProveedor, float $comisionTotalPasarela, float $totalOrden)
    {
        $totalOrden = empty($totalOrden) ? 1 : $totalOrden;

        foreach ($paymentProveedor as $idProveedor => $payDistribution) {
            $porcentaje_comision_pasarela = ($payDistribution['fee'] * 100) / $totalOrden;
            $comision_pasarela = ($comisionTotalPasarela * $porcentaje_comision_pasarela) / 100;

            $paymentProveedor[$idProveedor]['comision_pasarela'] = $comision_pasarela;
            $paymentProveedor[$idProveedor]['porcentaje_comision_pasarela'] = $porcentaje_comision_pasarela;
        }
        return $paymentProveedor;
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