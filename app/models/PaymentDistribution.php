<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_distribution".
 *
 * @property int $id_payment_distribution
 * @property string $name
 * @property string $amount
 * @property string $percentage
 * @property string $timestamp
 * @property int $order_detail_id_order_detail
 *
 * @property OrderDetail $orderDetailIdOrderDetail
 */
class PaymentDistribution extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_distribution';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'percentage'], 'number'],
            [['timestamp'], 'safe'],
            [['order_detail_id_order_detail'], 'required'],
            [['order_detail_id_order_detail'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['order_detail_id_order_detail'], 'exist', 'skipOnError' => true, 'targetClass' => OrderDetail::className(), 'targetAttribute' => ['order_detail_id_order_detail' => 'id_order_detail']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_payment_distribution' => 'Id Payment Distribution',
            'name' => 'Name',
            'amount' => 'Amount',
            'percentage' => 'Percentage',
            'timestamp' => 'Timestamp',
            'order_detail_id_order_detail' => 'Order Detail Id Order Detail',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetailIdOrderDetail()
    {
        return $this->hasOne(OrderDetail::className(), ['id_order_detail' => 'order_detail_id_order_detail']);
    }
}
