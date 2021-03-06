<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evento".
 *
 * @property int $id_evento
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property int $ciudad_id_ciudad
 * @property string $nombre
 * @property string $referencia_ubicacion
 * @property string $url_bases_tenicas
 * @property int $liga_id_liga
 * @property int $cerrado
 * @property string $fecha_cierre
 * @property int $sorteado
 * @property string $fecha_sorteo
 * @property string $descripcion
 * @property string $direccion
 * @property int $id_tipo_evento
 *
 * @property Ciudad $ciudadIdCiudad
 * @property Liga $ligaIdLiga
 * @property TipoEvento $tipoEvento
 * @property PruebaSalto[] $pruebaSaltos
 * @property ServicioContratado[] $servicioContratados
 * @property ServicioDisponible[] $servicioDisponibles
 * @property TerminoCondicion[] $terminoCondicions
 */
class Evento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_inicio', 'fecha_fin', 'fecha_cierre', 'fecha_sorteo'], 'safe'],
            [['ciudad_id_ciudad', 'liga_id_liga', 'id_tipo_evento'], 'required'],
            [['ciudad_id_ciudad', 'liga_id_liga', 'cerrado', 'sorteado', 'id_tipo_evento'], 'integer'],
            [['url_bases_tenicas', 'descripcion', 'direccion'], 'string'],
            [['nombre'], 'string', 'max' => 100],
            [['referencia_ubicacion'], 'string', 'max' => 45],
            [['ciudad_id_ciudad'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudad::className(), 'targetAttribute' => ['ciudad_id_ciudad' => 'id_ciudad']],
            [['liga_id_liga'], 'exist', 'skipOnError' => true, 'targetClass' => Liga::className(), 'targetAttribute' => ['liga_id_liga' => 'id_liga']],
            [['id_tipo_evento'], 'exist', 'skipOnError' => true, 'targetClass' => TipoEvento::className(), 'targetAttribute' => ['id_tipo_evento' => 'id_tipo_evento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_evento' => 'Id Evento',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'ciudad_id_ciudad' => 'Ciudad Id Ciudad',
            'nombre' => 'Nombre',
            'referencia_ubicacion' => 'Referencia Ubicacion',
            'url_bases_tenicas' => 'Url Bases Tenicas',
            'liga_id_liga' => 'Liga Id Liga',
            'cerrado' => 'Cerrado',
            'fecha_cierre' => 'Fecha Cierre',
            'sorteado' => 'Sorteado',
            'fecha_sorteo' => 'Fecha Sorteo',
            'descripcion' => 'Descripcion',
            'direccion' => 'Direccion',
            'id_tipo_evento' => 'Id Tipo Evento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudadIdCiudad()
    {
        return $this->hasOne(Ciudad::className(), ['id_ciudad' => 'ciudad_id_ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLigaIdLiga()
    {
        return $this->hasOne(Liga::className(), ['id_liga' => 'liga_id_liga']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoEvento()
    {
        return $this->hasOne(TipoEvento::className(), ['id_tipo_evento' => 'id_tipo_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPruebaSaltos()
    {
        return $this->hasMany(PruebaSalto::className(), ['evento_id_evento' => 'id_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioContratados()
    {
        return $this->hasMany(ServicioContratado::className(), ['evento_id_evento' => 'id_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioDisponibles()
    {
        return $this->hasMany(ServicioDisponible::className(), ['evento_id_evento' => 'id_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerminoCondicions()
    {
        return $this->hasMany(TerminoCondicion::className(), ['evento_id_evento' => 'id_evento']);
    }
}
