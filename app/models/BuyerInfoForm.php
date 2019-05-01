<?php

namespace app\models;

use Yii;

class BuyerInfoForm extends \yii\base\Model
{
    public $name;
    public $email;
    public $phone;

    public function rules()
    {
        return [
            [['name', 'email', 'phone'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Nombre completo',
            'email' => 'Correo electrónico',
            'phone' => 'Teléfono',
        ];
    }


    public function getShopToken()
    {
        $epayco = new \Epayco\Epayco(array(
            "apiKey" => "YOU_PUBLIC_API_KEY",
            "privateKey" => "YOU_PRIVATE_API_KEY",
            "lenguage" => "ES",
            "test" => true
        ));
        $token = $epayco->token->create(array(
            "card[number]" => '4575623182290326',
            "card[exp_year]" => "2017",
            "card[exp_month]" => "07",
            "card[cvc]" => "123"
        ));
    }

    /**
     * @param $servicios
     * @param $cargosAdicionales
     * @return Order
     */
    public function createOrder($servicios, $cargosAdicionales, $currency = 'COP')
    {
        $total = 0;
        /**
         * @var $servicio ReservaForm
         */
        foreach ($servicios as $index => $servicio) {
            $total += $servicio->subtotal;
        }
        /**
         * @var $cargoAdicional CargoAdicional
         */
        foreach ($cargosAdicionales as $index => $cargoAdicional) {
            $total += $cargoAdicional->monto;
        }

        $order = new Order();
        $order->total_amount = floatval($total);
        $order->date = date('Y-m-d H:i:s');
        $order->currency = $currency;
        $order->save();

        return $order;
    }
}