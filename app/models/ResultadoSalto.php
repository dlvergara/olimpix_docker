<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resultado_salto".
 *
 * @property int $id_resultado_salto
 * @property int $id_caballo_has_jinete
 * @property int $id_prueba
 * @property int $falta_obst
 * @property string $fecha_inicial
 * @property string $fecha_final
 * @property float $faltas_tiempo
 * @property int $faltas_totales
 * @property int $clasificacion
 * @property string $observaciones
 * @property int $cantidad_obstaculos
 * @property int $puntaje
 * @property string $fecha_inscripcion
 * @property int $clasificacion_final
 * @property int $orden_participacion
 * @property string $fecha_participacion
 * @property int $cantidad_rehuso
 * @property float $tiempo
 * @property bool $eliminado
 * @property bool $no_se_presento
 * @property bool $retirado
 * @property float $costo_inscripcion
 *
 * @property Falla[] $fallas
 * @property Obstaculo[] $obstaculos
 * @property CaballoHasJinete $caballoHasJinete
 * @property PruebaSalto $prueba
 */
class ResultadoSalto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resultado_salto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_caballo_has_jinete', 'id_prueba'], 'required'],
            [['id_caballo_has_jinete', 'id_prueba', 'falta_obst', 'faltas_totales', 'clasificacion', 'cantidad_obstaculos', 'puntaje', 'clasificacion_final', 'orden_participacion', 'cantidad_rehuso'], 'integer'],
            [['fecha_inicial', 'fecha_final', 'faltas_tiempo', 'fecha_inscripcion', 'fecha_participacion', 'tiempo', 'eliminado', 'no_se_presento', 'retirado', 'costo_inscripcion'], 'safe'],
            [['observaciones'], 'string'],
            [['id_caballo_has_jinete'], 'exist', 'skipOnError' => true, 'targetClass' => CaballoHasJinete::className(), 'targetAttribute' => ['id_caballo_has_jinete' => 'id_caballo_has_jinete']],
            [['id_prueba'], 'exist', 'skipOnError' => true, 'targetClass' => PruebaSalto::className(), 'targetAttribute' => ['id_prueba' => 'id_prueba']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_resultado_salto' => 'Id Resultado Salto',
            'id_caballo_has_jinete' => 'Id Caballo Has Jinete',
            'id_prueba' => 'Id Prueba',
            'falta_obst' => 'Falta Obst',
            'fecha_inicial' => 'Fecha Inicial',
            'fecha_final' => 'Fecha Final',
            'faltas_tiempo' => 'Faltas Tiempo',
            'faltas_totales' => 'Faltas Totales',
            'clasificacion' => 'Clasificacion',
            'observaciones' => 'Observaciones',
            'cantidad_obstaculos' => 'Cantidad Obstaculos',
            'puntaje' => 'Puntaje',
            'fecha_inscripcion' => 'Fecha Inscripcion',
            'clasificacion_final' => 'Clasificacion Final',
            'orden_participacion' => 'Orden Participacion',
            'fecha_participacion' => 'Fecha Participacion',
            'cantidad_rehuso' => 'Cantidad Rehuso',
            'tiempo' => 'tiempo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFallas()
    {
        return $this->hasMany(Falla::className(), ['id_resultado_salto' => 'id_resultado_salto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObstaculos()
    {
        return $this->hasMany(Obstaculo::className(), ['id_resultado_salto' => 'id_resultado_salto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaballoHasJinete()
    {
        return $this->hasOne(CaballoHasJinete::className(), ['id_caballo_has_jinete' => 'id_caballo_has_jinete']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrueba()
    {
        return $this->hasOne(PruebaSalto::className(), ['id_prueba' => 'id_prueba']);
    }
}
