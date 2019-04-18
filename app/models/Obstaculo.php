<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obstaculo".
 *
 * @property int $id_obstaculo
 * @property int $identificador
 * @property int $valor
 * @property int $id_resultado_salto
 *
 * @property ResultadoSalto $resultadoSalto
 */
class Obstaculo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obstaculo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['identificador', 'id_resultado_salto'], 'required'],
            [['identificador', 'valor', 'id_resultado_salto'], 'integer'],
            [['id_resultado_salto'], 'exist', 'skipOnError' => true, 'targetClass' => ResultadoSalto::className(), 'targetAttribute' => ['id_resultado_salto' => 'id_resultado_salto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_obstaculo' => 'Id Obstaculo',
            'identificador' => 'Identificador',
            'valor' => 'Valor',
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
