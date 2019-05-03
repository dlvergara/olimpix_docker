<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id_order
 * @property string $date
 * @property string $total_amount
 * @property string $base_iva
 * @property string $currency
 * @property int $order_status_id_order_status
 *
 * @property OrderStatus $orderStatusIdOrderStatus
 * @property OrderDetail[] $orderDetails
 * @property OrderHasPaymentMethod[] $orderHasPaymentMethods
 * @property PaymentMethod[] $paymentMethodIdPaymentMethods
 * @property OrderInfo[] $orderInfos
 * @property PaymentDistribution[] $paymentDistributions
 * @property PaymentNotifications[] $paymentNotifications
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
            [['total_amount', 'base_iva'], 'number'],
            [['order_status_id_order_status'], 'required'],
            [['order_status_id_order_status'], 'integer'],
            [['currency'], 'string', 'max' => 3],
            [['order_status_id_order_status'], 'exist', 'skipOnError' => true, 'targetClass' => OrderStatus::className(), 'targetAttribute' => ['order_status_id_order_status' => 'id_order_status']],
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
            'base_iva' => 'Base Iva',
            'currency' => 'Currency',
            'order_status_id_order_status' => 'Order Status Id Order Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderStatusIdOrderStatus()
    {
        return $this->hasOne(OrderStatus::className(), ['id_order_status' => 'order_status_id_order_status']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentDistributions()
    {
        return $this->hasMany(PaymentDistribution::className(), ['order_id_order' => 'id_order']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentNotifications()
    {
        return $this->hasMany(PaymentNotifications::className(), ['order_id_order' => 'id_order']);
    }
}
