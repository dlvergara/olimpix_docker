<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caballo_has_jinete".
 *
 * @property int $id_caballo_has_jinete
 * @property int $id_caballo
 * @property int $id_jinete
 *
 * @property Caballo $caballo
 * @property Jinete $jinete
 * @property ResultadoSalto[] $resultadoSaltos
 */
class CaballoHasJinete extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caballo_has_jinete';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_caballo', 'id_jinete'], 'required'],
            [['id_caballo', 'id_jinete'], 'integer'],
            [['id_caballo'], 'exist', 'skipOnError' => true, 'targetClass' => Caballo::className(), 'targetAttribute' => ['id_caballo' => 'id_caballo']],
            [['id_jinete'], 'exist', 'skipOnError' => true, 'targetClass' => Jinete::className(), 'targetAttribute' => ['id_jinete' => 'id_jinete']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_caballo_has_jinete' => 'Id Caballo Has Jinete',
            'id_caballo' => 'Id Caballo',
            'id_jinete' => 'Id Jinete',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaballo()
    {
        return $this->hasOne(Caballo::className(), ['id_caballo' => 'id_caballo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJinete()
    {
        return $this->hasOne(Jinete::className(), ['id_jinete' => 'id_jinete']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResultadoSaltos()
    {
        return $this->hasMany(ResultadoSalto::className(), ['id_caballo_has_jinete' => 'id_caballo_has_jinete']);
    }
}
