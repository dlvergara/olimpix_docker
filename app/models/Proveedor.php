<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property int $id_proveedor
 * @property string $nombre
 * @property string $monto
 * @property string $procentaje
 * @property string $id_pasarela
 *
 * @property PaymentDistribution[] $paymentDistributions
 * @property ServicioDisponible[] $servicioDisponibles
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['monto', 'procentaje'], 'number'],
            [['nombre', 'id_pasarela'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_proveedor' => 'Id Proveedor',
            'nombre' => 'Nombre',
            'monto' => 'Monto',
            'procentaje' => 'Procentaje',
            'id_pasarela' => 'Id Pasarela',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentDistributions()
    {
        return $this->hasMany(PaymentDistribution::className(), ['proveedor_id_proveedor' => 'id_proveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioDisponibles()
    {
        return $this->hasMany(ServicioDisponible::className(), ['proveedor_id_proveedor' => 'id_proveedor']);
    }
}
