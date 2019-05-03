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
     * @param array $reservas
     * @param array $cargosAdicionales
     * @param string $currency
     * @param $total
     * @param $baseIva
     * @return Order
     */
    public function createOrder($reservas, $cargosAdicionales, $currency = 'COP', $total, $baseIva)
    {
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
            $orderDetail->monto_comision_olimpix = $reserva->montoComisionOlimpix;
            $orderDetail->order_id_order = $order->id_order;
            $orderDetail->save();

            $paymentDistribution[$servicio->proveedor_id_proveedor][] += $orderDetail;
        }

        $this->setPaymentDistribution($order, $paymentDistribution);

        return $order;
    }

    /**
     * @param Order $order
     * @param array $paymentDistribution
     */
    private function setPaymentDistribution(Order $order, array $paymentDistribution)
    {

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