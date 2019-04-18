<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "falla".
 *
 * @property int $id_falla
 * @property string $tiempo
 * @property int $id_resultado_salto
 *
 * @property ResultadoSalto $resultadoSalto
 */
class Falla extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'falla';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tiempo'], 'number'],
            [['id_resultado_salto'], 'required'],
            [['id_resultado_salto'], 'integer'],
            [['id_resultado_salto'], 'exist', 'skipOnError' => true, 'targetClass' => ResultadoSalto::className(), 'targetAttribute' => ['id_resultado_salto' => 'id_resultado_salto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_falla' => 'Id Falla',
            'tiempo' => 'Tiempo',
            'id_resultado_salto' => 'Id Resultado Salto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResultadoSalto()
    {
        return $this->hasOne(ResultadoSalto::className(), ['id_resultado_salto' => 'id_resultado_salto']);
    }
}
