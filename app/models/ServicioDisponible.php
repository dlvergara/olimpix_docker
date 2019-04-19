<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicio_disponible".
 *
 * @property int $id_servicio_disponible
 * @property int $evento_id_evento
 * @property int $servicio_id_servicio
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property int $disponible
 * @property string $cantidad_disponible
 *
 * @property OrderDetail[] $orderDetails
 * @property Evento $eventoIdEvento
 * @property Servicio $servicioIdServicio
 */
class ServicioDisponible extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicio_disponible';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_servicio_disponible', 'evento_id_evento', 'servicio_id_servicio'], 'required'],
            [['id_servicio_disponible', 'evento_id_evento', 'servicio_id_servicio', 'disponible'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['cantidad_disponible'], 'number'],
            [['id_servicio_disponible'], 'unique'],
            [['evento_id_evento'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id_evento' => 'id_evento']],
            [['servicio_id_servicio'], 'exist', 'skipOnError' => true, 'targetClass' => Servicio::className(), 'targetAttribute' => ['servicio_id_servicio' => 'id_servicio']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_servicio_disponible' => 'Id Servicio Disponible',
            'evento_id_evento' => 'Evento Id Evento',
            'servicio_id_servicio' => 'Servicio Id Servicio',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'disponible' => 'Disponible',
            'cantidad_disponible' => 'Cantidad Disponible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['servicio_disponible_id_servicio_disponible' => 'id_servicio_disponible']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoIdEvento()
    {
        return $this->hasOne(Evento::className(), ['id_evento' => 'evento_id_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioIdServicio()
    {
        return $this->hasOne(Servicio::className(), ['id_servicio' => 'servicio_id_servicio']);
    }
}
