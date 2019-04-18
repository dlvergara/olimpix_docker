<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "raza".
 *
 * @property int $id_raza
 * @property string $nombre
 *
 * @property Caballo[] $caballos
 */
class Raza extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'raza';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_raza' => 'Id Raza',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaballos()
    {
        return $this->hasMany(Caballo::className(), ['raza_id_raza' => 'id_raza']);
    }
}
