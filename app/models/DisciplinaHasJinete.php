<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplina_has_jinete".
 *
 * @property int $id_disciplina_jinete
 * @property int $disciplina_id_disciplina
 * @property int $jinete_id_jinete
 * @property int $id_clasificacion_jinete
 * @property string $fecha_inicio
 * @property int $activo
 *
 * @property ClasificacionJinete $clasificacionJinete
 * @property Disciplina $disciplinaIdDisciplina
 * @property Jinete $jineteIdJinete
 */
class DisciplinaHasJinete extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disciplina_has_jinete';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['disciplina_id_disciplina', 'jinete_id_jinete', 'id_clasificacion_jinete'], 'required'],
            [['disciplina_id_disciplina', 'jinete_id_jinete', 'id_clasificacion_jinete', 'activo'], 'integer'],
            [['fecha_inicio'], 'safe'],
            [['id_clasificacion_jinete'], 'exist', 'skipOnError' => true, 'targetClass' => ClasificacionJinete::className(), 'targetAttribute' => ['id_clasificacion_jinete' => 'id_clasificacion_jinete']],
            [['disciplina_id_disciplina'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['disciplina_id_disciplina' => 'id_disciplina']],
            [['jinete_id_jinete'], 'exist', 'skipOnError' => true, 'targetClass' => Jinete::className(), 'targetAttribute' => ['jinete_id_jinete' => 'id_jinete']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_disciplina_jinete' => 'Id Disciplina Jinete',
            'disciplina_id_disciplina' => 'Disciplina Id Disciplina',
            'jinete_id_jinete' => 'Jinete Id Jinete',
            'id_clasificacion_jinete' => 'Id Clasificacion Jinete',
            'fecha_inicio' => 'Fecha Inicio',
            'activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClasificacionJinete()
    {
        return $this->hasOne(ClasificacionJinete::className(), ['id_clasificacion_jinete' => 'id_clasificacion_jinete']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaIdDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id_disciplina' => 'disciplina_id_disciplina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJineteIdJinete()
    {
        return $this->hasOne(Jinete::className(), ['id_jinete' => 'jinete_id_jinete']);
    }
}
