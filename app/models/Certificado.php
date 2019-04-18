<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "certificado".
 *
 * @property int $id_certificado
 * @property string $nombre
 * @property string $url
 * @property int $caballo_id_caballo
 *
 * @property Caballo $caballoIdCaballo
 */
class Certificado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'certificado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'string'],
            [['caballo_id_caballo'], 'required'],
            [['caballo_id_caballo'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['caballo_id_caballo'], 'exist', 'skipOnError' => true, 'targetClass' => Caballo::className(), 'targetAttribute' => ['caballo_id_caballo' => 'id_caballo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_certificado' => 'Id Certificado',
            'nombre' => 'Nombre',
            'url' => 'Url',
            'caballo_id_caballo' => 'Caballo Id Caballo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaballoIdCaballo()
    {
        return $this->hasOne(Caballo::className(), ['id_caballo' => 'caballo_id_caballo']);
    }
}
