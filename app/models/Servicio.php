<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicio".
 *
 * @property int $id_servicio
 * @property string $nombre
 *
 * @property Proveedor[] $proveedors
 * @property ServicioContratado[] $servicioContratados
 * @property ServicioDisponible[] $servicioDisponibles
 */
class Servicio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_servicio' => 'Id Servicio',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProveedors()
    {
        return $this->hasMany(Proveedor::className(), ['servicio_id_servicio' => 'id_servicio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioContratados()
    {
        return $this->hasMany(ServicioContratado::className(), ['servicio_id_servicio' => 'id_servicio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioDisponibles()
    {
        return $this->hasMany(ServicioDisponible::className(), ['servicio_id_servicio' => 'id_servicio']);
    }
}
