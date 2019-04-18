<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_detail".
 *
 * @property int $id_order_detail
 * @property int $order_id_order
 * @property int $servicio_id_servicio
 * @property string $cantidad
 * @property string $precio_unitario
 *
 * @property Order $orderIdOrder
 * @property Servicio $servicioIdServicio
 * @property PaymentDistribution[] $paymentDistributions
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id_order'], 'required'],
            [['order_id_order', 'servicio_id_servicio'], 'integer'],
            [['cantidad', 'precio_unitario'], 'number'],
            [['order_id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id_order' => 'id_order']],
            [['servicio_id_servicio'], 'exist', 'skipOnError' => true, 'targetClass' => Servicio::className(), 'targetAttribute' => ['servicio_id_servicio' => 'id_servicio']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order_detail' => 'Id Order Detail',
            'order_id_order' => 'Order Id Order',
            'servicio_id_servicio' => 'Servicio Id Servicio',
            'cantidad' => 'Cantidad',
            'precio_unitario' => 'Precio Unitario',
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
    public function getServicioIdServicio()
    {
        return $this->hasOne(Servicio::className(), ['id_servicio' => 'servicio_id_servicio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentDistributions()
    {
        return $this->hasMany(PaymentDistribution::className(), ['order_detail_id_order_detail' => 'id_order_detail']);
    }
}
