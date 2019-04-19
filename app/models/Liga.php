<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "liga".
 *
 * @property int $id_liga
 * @property string $nombre
 * @property string $nombre_corto
 *
 * @property Caballo[] $caballos
 * @property Evento[] $eventos
 * @property Jinete[] $jinetes
 */
class Liga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'liga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'nombre_corto'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_liga' => 'Id Liga',
            'nombre' => 'Nombre',
            'nombre_corto' => 'Nombre Corto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaballos()
    {
        return $this->hasMany(Caballo::className(), ['liga_id_liga' => 'id_liga']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['liga_id_liga' => 'id_liga']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJinetes()
    {
        return $this->hasMany(Jinete::className(), ['liga_id_liga' => 'id_liga']);
    }
}
