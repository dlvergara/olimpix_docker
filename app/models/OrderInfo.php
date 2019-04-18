<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_info".
 *
 * @property int $id_order_info
 * @property string $info_type
 * @property string $full_name
 * @property string $email
 * @property int $order_id_order
 *
 * @property Order $orderIdOrder
 */
class OrderInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['info_type', 'full_name'], 'string'],
            [['full_name', 'order_id_order'], 'required'],
            [['order_id_order'], 'integer'],
            [['email'], 'string', 'max' => 45],
            [['order_id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id_order' => 'id_order']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order_info' => 'Id Order Info',
            'info_type' => 'Info Type',
            'full_name' => 'Full Name',
            'email' => 'Email',
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
