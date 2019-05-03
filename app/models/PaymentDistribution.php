<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_distribution".
 *
 * @property int $id_payment_distribution
 * @property int $proveedor_id_proveedor
 * @property string $timestamp
 * @property int $order_id_order
 * @property string $total
 * @property string $comision_olimpix
 * @property string $porcentaje_comision_olimpix
 * @property string $base_comision
 * @property string $comision_pasarela
 * @property string $porcentaje_pasarela
 *
 * @property Order $orderIdOrder
 * @property Proveedor $proveedorIdProveedor
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
            [['proveedor_id_proveedor', 'order_id_order'], 'required'],
            [['proveedor_id_proveedor', 'order_id_order'], 'integer'],
            [['timestamp'], 'safe'],
            [['total', 'comision_olimpix', 'porcentaje_comision_olimpix', 'base_comision', 'comision_pasarela', 'porcentaje_pasarela'], 'number'],
            [['order_id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id_order' => 'id_order']],
            [['proveedor_id_proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedor::className(), 'targetAttribute' => ['proveedor_id_proveedor' => 'id_proveedor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_payment_distribution' => 'Id Payment Distribution',
            'proveedor_id_proveedor' => 'Proveedor Id Proveedor',
            'timestamp' => 'Timestamp',
            'order_id_order' => 'Order Id Order',
            'total' => 'Total',
            'comision_olimpix' => 'Comision Olimpix',
            'porcentaje_comision_olimpix' => 'Porcentaje Comision Olimpix',
            'base_comision' => 'Base Comision',
            'comision_pasarela' => 'Comision Pasarela',
            'porcentaje_pasarela' => 'Porcentaje Pasarela',
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
    public function getProveedorIdProveedor()
    {
        return $this->hasOne(Proveedor::className(), ['id_proveedor' => 'proveedor_id_proveedor']);
    }
}
