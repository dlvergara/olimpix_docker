<?php


namespace app\models;

use Yii;

class CargoAdicional extends \yii\base\Model
{
    public $concepto;
    public $monto;
    public $iva;

    public function rules()
    {
        return [
            [['concepto', 'monto', 'iva'], 'required'],
            [['monto', 'iva'], 'numeric'],
        ];
    }
}