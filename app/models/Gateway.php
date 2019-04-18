<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gateway".
 *
 * @property int $id_gateway
 * @property string $nombre
 *
 * @property PaymentMethod[] $paymentMethods
 */
class Gateway extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gateway';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_gateway' => 'Id Gateway',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMethods()
    {
        return $this->hasMany(PaymentMethod::className(), ['gateway_id_gateway' => 'id_gateway']);
    }
}
