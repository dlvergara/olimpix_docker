<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_notifications".
 *
 * @property int $id_payment_notifications
 * @property string $timestamp
 * @property string $body
 * @property int $order_id_order
 *
 * @property Order $orderIdOrder
 */
class PaymentNotifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_notifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timestamp'], 'safe'],
            [['body'], 'string'],
            [['order_id_order'], 'required'],
            [['order_id_order'], 'integer'],
            [['order_id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id_order' => 'id_order']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_payment_notifications' => 'Id Payment Notifications',
            'timestamp' => 'Timestamp',
            'body' => 'Body',
            'order_id_order' => 'Order Id Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderIdOrder()
    {
        return $this->hasOne(Order::className(), ['id_order' => 'order_id_order']);
    }
}
