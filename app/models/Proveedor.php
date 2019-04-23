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
 * @property int $id_servicio_disponible
 *
 * @property ServicioDisponible $servicioDisponible
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
            [['id_servicio_disponible'], 'required'],
            [['id_servicio_disponible'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['id_servicio_disponible'], 'exist', 'skipOnError' => true, 'targetClass' => ServicioDisponible::className(), 'targetAttribute' => ['id_servicio_disponible' => 'id_servicio_disponible']],
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
            'id_servicio_disponible' => 'Id Servicio Disponible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioDisponible()
    {
        return $this->hasOne(ServicioDisponible::className(), ['id_servicio_disponible' => 'id_servicio_disponible']);
    }
}
