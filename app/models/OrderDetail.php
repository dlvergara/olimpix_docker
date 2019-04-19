<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_detail".
 *
 * @property int $id_order_detail
 * @property int $order_id_order
 * @property string $cantidad
 * @property string $precio_unitario
 * @property int $servicio_disponible_id_servicio_disponible
 *
 * @property Order $orderIdOrder
 * @property ServicioDisponible $servicioDisponibleIdServicioDisponible
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
            [['order_id_order', 'servicio_disponible_id_servicio_disponible'], 'integer'],
            [['cantidad', 'precio_unitario'], 'number'],
            [['order_id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id_order' => 'id_order']],
            [['servicio_disponible_id_servicio_disponible'], 'exist', 'skipOnError' => true, 'targetClass' => ServicioDisponible::className(), 'targetAttribute' => ['servicio_disponible_id_servicio_disponible' => 'id_servicio_disponible']],
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
            'cantidad' => 'Cantidad',
            'precio_unitario' => 'Precio Unitario',
            'servicio_disponible_id_servicio_disponible' => 'Servicio Disponible Id Servicio Disponible',
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
    public function getServicioDisponibleIdServicioDisponible()
    {
        return $this->hasOne(ServicioDisponible::className(), ['id_servicio_disponible' => 'servicio_disponible_id_servicio_disponible']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentDistributions()
    {
        return $this->hasMany(PaymentDistribution::className(), ['order_detail_id_order_detail' => 'id_order_detail']);
    }
}
