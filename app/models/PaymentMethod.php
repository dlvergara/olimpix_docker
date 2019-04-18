<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_method".
 *
 * @property int $id_payment_method
 * @property string $name
 * @property int $gateway_id_gateway
 *
 * @property OrderHasPaymentMethod[] $orderHasPaymentMethods
 * @property Order[] $orderIdOrders
 * @property Gateway $gatewayIdGateway
 */
class PaymentMethod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_method';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_payment_method', 'name', 'gateway_id_gateway'], 'required'],
            [['id_payment_method', 'gateway_id_gateway'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['id_payment_method'], 'unique'],
            [['gateway_id_gateway'], 'exist', 'skipOnError' => true, 'targetClass' => Gateway::className(), 'targetAttribute' => ['gateway_id_gateway' => 'id_gateway']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_payment_method' => 'Id Payment Method',
            'name' => 'Name',
            'gateway_id_gateway' => 'Gateway Id Gateway',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderHasPaymentMethods()
    {
        return $this->hasMany(OrderHasPaymentMethod::className(), ['payment_method_id_payment_method' => 'id_payment_method']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderIdOrders()
    {
        return $this->hasMany(Order::className(), ['id_order' => 'order_id_order'])->viaTable('order_has_payment_method', ['payment_method_id_payment_method' => 'id_payment_method']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGatewayIdGateway()
    {
        return $this->hasOne(Gateway::className(), ['id_gateway' => 'gateway_id_gateway']);
    }
}
