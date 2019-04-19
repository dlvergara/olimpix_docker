<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_has_payment_method".
 *
 * @property int $order_id_order
 * @property int $payment_method_id_payment_method
 *
 * @property Order $orderIdOrder
 * @property PaymentMethod $paymentMethodIdPaymentMethod
 */
class OrderHasPaymentMethod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_has_payment_method';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id_order', 'payment_method_id_payment_method'], 'required'],
            [['order_id_order', 'payment_method_id_payment_method'], 'integer'],
            [['order_id_order', 'payment_method_id_payment_method'], 'unique', 'targetAttribute' => ['order_id_order', 'payment_method_id_payment_method']],
            [['order_id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id_order' => 'id_order']],
            [['payment_method_id_payment_method'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentMethod::className(), 'targetAttribute' => ['payment_method_id_payment_method' => 'id_payment_method']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id_order' => 'Order Id Order',
            'payment_method_id_payment_method' => 'Payment Method Id Payment Method',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderIdOrder()
    {
        return $this->hasOne(Order::className(), ['id_order' => 'order_id_order']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMethodIdPaymentMethod()
    {
        return $this->hasOne(PaymentMethod::className(), ['id_payment_method' => 'payment_method_id_payment_method']);
    }
}
