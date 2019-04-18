<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicio_contratado".
 *
 * @property int $id_servicio_contratado
 * @property int $evento_id_evento
 * @property int $servicio_id_servicio
 * @property int $id_estado_servicio
 * @property int $caballo_id_caballo
 * @property int $jinete_id_jinete
 * @property string $identificador_servicio_contratado
 * @property string $monto
 *
 * @property Pago[] $pagos
 * @property Evento $eventoIdEvento
 * @property Caballo $caballoIdCaballo
 * @property EstadoServicio $estadoServicio
 * @property Jinete $jineteIdJinete
 * @property Servicio $servicioIdServicio
 */
class ServicioContratado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicio_contratado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evento_id_evento', 'servicio_id_servicio', 'id_estado_servicio'], 'required'],
            [['evento_id_evento', 'servicio_id_servicio', 'id_estado_servicio', 'caballo_id_caballo', 'jinete_id_jinete'], 'integer'],
            [['monto'], 'number'],
            [['identificador_servicio_contratado'], 'string', 'max' => 45],
            [['evento_id_evento'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id_evento' => 'id_evento']],
            [['caballo_id_caballo'], 'exist', 'skipOnError' => true, 'targetClass' => Caballo::className(), 'targetAttribute' => ['caballo_id_caballo' => 'id_caballo']],
            [['id_estado_servicio'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoServicio::className(), 'targetAttribute' => ['id_estado_servicio' => 'id_estado_servicio']],
            [['jinete_id_jinete'], 'exist', 'skipOnError' => true, 'targetClass' => Jinete::className(), 'targetAttribute' => ['jinete_id_jinete' => 'id_jinete']],
            [['servicio_id_servicio'], 'exist', 'skipOnError' => true, 'targetClass' => Servicio::className(), 'targetAttribute' => ['servicio_id_servicio' => 'id_servicio']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_servicio_contratado' => 'Id Servicio Contratado',
            'evento_id_evento' => 'Evento Id Evento',
            'servicio_id_servicio' => 'Servicio Id Servicio',
            'id_estado_servicio' => 'Id Estado Servicio',
            'caballo_id_caballo' => 'Caballo Id Caballo',
            'jinete_id_jinete' => 'Jinete Id Jinete',
            'identificador_servicio_contratado' => 'Identificador Servicio Contratado',
            'monto' => 'Monto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pago::className(), ['id_servicio_contratado' => 'id_servicio_contratado']);
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
    public function getCaballoIdCaballo()
    {
        return $this->hasOne(Caballo::className(), ['id_caballo' => 'caballo_id_caballo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoServicio()
    {
        return $this->hasOne(EstadoServicio::className(), ['id_estado_servicio' => 'id_estado_servicio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJineteIdJinete()
    {
        return $this->hasOne(Jinete::className(), ['id_jinete' => 'jinete_id_jinete']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioIdServicio()
    {
        return $this->hasOne(Servicio::className(), ['id_servicio' => 'servicio_id_servicio']);
    }
}
