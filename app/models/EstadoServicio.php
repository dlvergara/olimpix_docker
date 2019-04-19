<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_servicio".
 *
 * @property int $id_estado_servicio
 * @property string $nombre
 *
 * @property ServicioContratado[] $servicioContratados
 */
class EstadoServicio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado_servicio';
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
            'id_estado_servicio' => 'Id Estado Servicio',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioContratados()
    {
        return $this->hasMany(ServicioContratado::className(), ['id_estado_servicio' => 'id_estado_servicio']);
    }
}
