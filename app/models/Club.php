<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "club".
 *
 * @property int $id_club
 * @property string $nombre
 *
 * @property Caballo[] $caballos
 * @property Jinete[] $jinetes
 */
class Club extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'club';
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
            'id_club' => 'Id Club',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaballos()
    {
        return $this->hasMany(Caballo::className(), ['club_id_club' => 'id_club']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJinetes()
    {
        return $this->hasMany(Jinete::className(), ['club_id_club' => 'id_club']);
    }
}
