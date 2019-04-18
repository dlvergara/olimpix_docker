<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pago".
 *
 * @property int $id_pago
 * @property string $fecha
 * @property string $monto
 * @property int $id_servicio_contratado
 *
 * @property ServicioContratado $servicioContratado
 */
class Pago extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['monto'], 'number'],
            [['id_servicio_contratado'], 'required'],
            [['id_servicio_contratado'], 'integer'],
            [['id_servicio_contratado'], 'exist', 'skipOnError' => true, 'targetClass' => ServicioContratado::className(), 'targetAttribute' => ['id_servicio_contratado' => 'id_servicio_contratado']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pago' => 'Id Pago',
            'fecha' => 'Fecha',
            'monto' => 'Monto',
            'id_servicio_contratado' => 'Id Servicio Contratado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioContratado()
    {
        return $this->hasOne(ServicioContratado::className(), ['id_servicio_contratado' => 'id_servicio_contratado']);
    }
}
