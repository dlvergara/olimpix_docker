<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ciudad".
 *
 * @property int $id_ciudad
 * @property string $nombre
 * @property int $pais_id_pais
 *
 * @property Pais $paisIdPais
 * @property Evento[] $eventos
 */
class Ciudad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ciudad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pais_id_pais'], 'required'],
            [['pais_id_pais'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['pais_id_pais'], 'exist', 'skipOnError' => true, 'targetClass' => Pais::className(), 'targetAttribute' => ['pais_id_pais' => 'id_pais']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ciudad' => 'Id Ciudad',
            'nombre' => 'Nombre',
            'pais_id_pais' => 'Pais Id Pais',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaisIdPais()
    {
        return $this->hasOne(Pais::className(), ['id_pais' => 'pais_id_pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['ciudad_id_ciudad' => 'id_ciudad']);
    }
}
