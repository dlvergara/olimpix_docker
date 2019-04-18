<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicio".
 *
 * @property int $id_servicio
 * @property string $nombre
 * @property string $precio
 * @property int $cantidad_disponible
 * @property string $fecha_ultima_hora
 * @property string $precio_ultima_hora
 *
 * @property OrderDetail[] $orderDetails
 * @property Proveedor[] $proveedors
 * @property ServicioContratado[] $servicioContratados
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
            [['precio', 'precio_ultima_hora'], 'number'],
            [['cantidad_disponible'], 'integer'],
            [['fecha_ultima_hora'], 'safe'],
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
            'precio' => 'Precio',
            'cantidad_disponible' => 'Cantidad Disponible',
            'fecha_ultima_hora' => 'Fecha Ultima Hora',
            'precio_ultima_hora' => 'Precio Ultima Hora',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['servicio_id_servicio' => 'id_servicio']);
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
}
