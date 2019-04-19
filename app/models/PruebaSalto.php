<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prueba_salto".
 *
 * @property int $id_prueba
 * @property string $categoria
 * @property string $fecha
 * @property int $distancia
 * @property string $tiempo_acordado
 * @property string $presidente_jurado
 * @property int $numero_saltos
 * @property string $velocidad
 * @property string $altura
 * @property string $tiempo_limite
 * @property int $numero_clasificados
 * @property int $evento_id_evento
 * @property int $pista_id_pista
 * @property int $categoria_id_categoria
 * @property int $clasificacion_jinete_id_clasificacion_jinete
 *
 * @property Premio[] $premios
 * @property Evento $eventoIdEvento
 * @property Pista $pistaIdPista
 * @property Categoria $categoriaIdCategoria
 * @property ClasificacionJinete $clasificacionJineteIdClasificacionJinete
 * @property ResultadoSalto[] $resultadoSaltos
 */
class PruebaSalto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prueba_salto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['distancia', 'numero_saltos', 'numero_clasificados', 'evento_id_evento', 'pista_id_pista', 'categoria_id_categoria', 'clasificacion_jinete_id_clasificacion_jinete'], 'integer'],
            [['tiempo_acordado', 'velocidad', 'altura', 'tiempo_limite'], 'number'],
            [['evento_id_evento', 'pista_id_pista', 'categoria_id_categoria', 'clasificacion_jinete_id_clasificacion_jinete'], 'required'],
            [['categoria'], 'string', 'max' => 45],
            [['presidente_jurado'], 'string', 'max' => 250],
            [['evento_id_evento'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id_evento' => 'id_evento']],
            [['pista_id_pista'], 'exist', 'skipOnError' => true, 'targetClass' => Pista::className(), 'targetAttribute' => ['pista_id_pista' => 'id_pista']],
            [['categoria_id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id_categoria' => 'id_categoria']],
            [['clasificacion_jinete_id_clasificacion_jinete'], 'exist', 'skipOnError' => true, 'targetClass' => ClasificacionJinete::className(), 'targetAttribute' => ['clasificacion_jinete_id_clasificacion_jinete' => 'id_clasificacion_jinete']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_prueba' => 'Id Prueba',
            'categoria' => 'Categoria',
            'fecha' => 'Fecha',
            'distancia' => 'Distancia',
            'tiempo_acordado' => 'Tiempo Acordado',
            'presidente_jurado' => 'Presidente Jurado',
            'numero_saltos' => 'Numero Saltos',
            'velocidad' => 'Velocidad',
            'altura' => 'Altura',
            'tiempo_limite' => 'Tiempo Limite',
            'numero_clasificados' => 'Numero Clasificados',
            'evento_id_evento' => 'Evento Id Evento',
            'pista_id_pista' => 'Pista Id Pista',
            'categoria_id_categoria' => 'Categoria Id Categoria',
            'clasificacion_jinete_id_clasificacion_jinete' => 'Clasificacion Jinete Id Clasificacion Jinete',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPremios()
    {
        return $this->hasMany(Premio::className(), ['prueba_id_prueba' => 'id_prueba']);
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
    public function getPistaIdPista()
    {
        return $this->hasOne(Pista::className(), ['id_pista' => 'pista_id_pista']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriaIdCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id_categoria' => 'categoria_id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClasificacionJineteIdClasificacionJinete()
    {
        return $this->hasOne(ClasificacionJinete::className(), ['id_clasificacion_jinete' => 'clasificacion_jinete_id_clasificacion_jinete']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResultadoSaltos()
    {
        return $this->hasMany(ResultadoSalto::className(), ['id_prueba' => 'id_prueba']);
    }
}
