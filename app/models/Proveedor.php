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
 * @property int $servicio_id_servicio
 *
 * @property Servicio $servicioIdServicio
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
            [['servicio_id_servicio'], 'required'],
            [['servicio_id_servicio'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['servicio_id_servicio'], 'exist', 'skipOnError' => true, 'targetClass' => Servicio::className(), 'targetAttribute' => ['servicio_id_servicio' => 'id_servicio']],
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
            'servicio_id_servicio' => 'Servicio Id Servicio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioIdServicio()
    {
        return $this->hasOne(Servicio::className(), ['id_servicio' => 'servicio_id_servicio']);
    }
}
