<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pista".
 *
 * @property int $id_pista
 * @property string $identificador
 * @property string $croquis
 * @property string $tiempo
 * @property int $cantidad_obstaculos
 *
 * @property PruebaSalto[] $pruebaSaltos
 */
class Pista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['croquis'], 'string'],
            [['tiempo'], 'number'],
            [['cantidad_obstaculos'], 'integer'],
            [['identificador'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pista' => 'Id Pista',
            'identificador' => 'Identificador',
            'croquis' => 'Croquis',
            'tiempo' => 'Tiempo',
            'cantidad_obstaculos' => 'Cantidad Obstaculos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPruebaSaltos()
    {
        return $this->hasMany(PruebaSalto::className(), ['pista_id_pista' => 'id_pista']);
    }
}
