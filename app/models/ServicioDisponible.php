<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicio_disponible".
 *
 * @property int $id_servicio_disponible
 * @property int $evento_id_evento
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property int $disponible
 * @property string $cantidad_disponible
 * @property string $timestamp
 * @property string $descripcion
 * @property string $monto
 * @property string $nombre
 * @property string $image_url
 * @property int $prueba_salto_id_prueba
 * @property int $proveedor_id_proveedor
 * @property string $porcentaje_comision_olimpix
 * @property string $monto_comision_olimpix
 * @property string $porcentaje_iva
 *
 * @property OrderDetail[] $orderDetails
 * @property Evento $eventoIdEvento
 * @property Proveedor $proveedorIdProveedor
 * @property PruebaSalto $pruebaSaltoIdPrueba
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
            [['evento_id_evento', 'proveedor_id_proveedor'], 'required'],
            [['evento_id_evento', 'disponible', 'prueba_salto_id_prueba', 'proveedor_id_proveedor'], 'integer'],
            [['fecha_inicio', 'fecha_fin', 'timestamp'], 'safe'],
            [['cantidad_disponible', 'monto', 'porcentaje_comision_olimpix', 'monto_comision_olimpix', 'porcentaje_iva'], 'number'],
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 45],
            [['image_url'], 'string', 'max' => 100],
            [['evento_id_evento'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id_evento' => 'id_evento']],
            [['proveedor_id_proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedor::className(), 'targetAttribute' => ['proveedor_id_proveedor' => 'id_proveedor']],
            [['prueba_salto_id_prueba'], 'exist', 'skipOnError' => true, 'targetClass' => PruebaSalto::className(), 'targetAttribute' => ['prueba_salto_id_prueba' => 'id_prueba']],
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
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'disponible' => 'Disponible',
            'cantidad_disponible' => 'Cantidad Disponible',
            'timestamp' => 'Timestamp',
            'descripcion' => 'Descripcion',
            'monto' => 'Monto',
            'nombre' => 'Nombre',
            'image_url' => 'Image Url',
            'prueba_salto_id_prueba' => 'Prueba Salto Id Prueba',
            'proveedor_id_proveedor' => 'Proveedor Id Proveedor',
            'porcentaje_comision_olimpix' => 'Porcentaje Comision Olimpix',
            'monto_comision_olimpix' => 'Monto Comision Olimpix',
            'porcentaje_iva' => 'Porcentaje Iva',
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
    public function getProveedorIdProveedor()
    {
        return $this->hasOne(Proveedor::className(), ['id_proveedor' => 'proveedor_id_proveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPruebaSaltoIdPrueba()
    {
        return $this->hasOne(PruebaSalto::className(), ['id_prueba' => 'prueba_salto_id_prueba']);
    }
}
