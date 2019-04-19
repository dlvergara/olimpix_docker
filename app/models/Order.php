<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id_order
 * @property string $date
 * @property string $total_amount
 * @property string $currency
 *
 * @property OrderDetail[] $orderDetails
 * @property OrderHasPaymentMethod[] $orderHasPaymentMethods
 * @property PaymentMethod[] $paymentMethodIdPaymentMethods
 * @property OrderInfo[] $orderInfos
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['total_amount'], 'number'],
            [['currency'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Id Order',
            'date' => 'Date',
            'total_amount' => 'Total Amount',
            'currency' => 'Currency',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['order_id_order' => 'id_order']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderHasPaymentMethods()
    {
        return $this->hasMany(OrderHasPaymentMethod::className(), ['order_id_order' => 'id_order']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMethodIdPaymentMethods()
    {
        return $this->hasMany(PaymentMethod::className(), ['id_payment_method' => 'payment_method_id_payment_method'])->viaTable('order_has_payment_method', ['order_id_order' => 'id_order']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderInfos()
    {
        return $this->hasMany(OrderInfo::className(), ['order_id_order' => 'id_order']);
    }
}
