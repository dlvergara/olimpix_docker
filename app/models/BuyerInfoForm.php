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
}