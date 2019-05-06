<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicio_contratado".
 *
 * @property int $id_servicio_contratado
 * @property int $evento_id_evento
 * @property int $id_estado_servicio
 * @property int $caballo_id_caballo
 * @property int $jinete_id_jinete
 * @property string $identificador_servicio_contratado
 * @property string $monto
 * @property int $order_detail_id_order_detail
 *
 * @property Pago[] $pagos
 * @property Evento $eventoIdEvento
 * @property Caballo $caballoIdCaballo
 * @property EstadoServicio $estadoServicio
 * @property Jinete $jineteIdJinete
 * @property OrderDetail $orderDetailIdOrderDetail
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
            [['evento_id_evento', 'id_estado_servicio', 'order_detail_id_order_detail'], 'required'],
            [['evento_id_evento', 'id_estado_servicio', 'caballo_id_caballo', 'jinete_id_jinete', 'order_detail_id_order_detail'], 'integer'],
            [['monto'], 'number'],
            [['identificador_servicio_contratado'], 'string', 'max' => 45],
            [['evento_id_evento'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id_evento' => 'id_evento']],
            [['caballo_id_caballo'], 'exist', 'skipOnError' => true, 'targetClass' => Caballo::className(), 'targetAttribute' => ['caballo_id_caballo' => 'id_caballo']],
            [['id_estado_servicio'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoServicio::className(), 'targetAttribute' => ['id_estado_servicio' => 'id_estado_servicio']],
            [['jinete_id_jinete'], 'exist', 'skipOnError' => true, 'targetClass' => Jinete::className(), 'targetAttribute' => ['jinete_id_jinete' => 'id_jinete']],
            [['order_detail_id_order_detail'], 'exist', 'skipOnError' => true, 'targetClass' => OrderDetail::className(), 'targetAttribute' => ['order_detail_id_order_detail' => 'id_order_detail']],
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
            'id_estado_servicio' => 'Id Estado Servicio',
            'caballo_id_caballo' => 'Caballo Id Caballo',
            'jinete_id_jinete' => 'Jinete Id Jinete',
            'identificador_servicio_contratado' => 'Identificador Servicio Contratado',
            'monto' => 'Monto',
            'order_detail_id_order_detail' => 'Order Detail Id Order Detail',
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
    public function getOrderDetailIdOrderDetail()
    {
        return $this->hasOne(OrderDetail::className(), ['id_order_detail' => 'order_detail_id_order_detail']);
    }
}
