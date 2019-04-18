<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clasificacion_jinete".
 *
 * @property int $id_clasificacion_jinete
 * @property string $nombre
 * @property string $nombre_corto
 *
 * @property DisciplinaHasJinete[] $disciplinaHasJinetes
 * @property PruebaSalto[] $pruebaSaltos
 */
class ClasificacionJinete extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clasificacion_jinete';
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
            'id_clasificacion_jinete' => 'Id Clasificacion Jinete',
            'nombre' => 'Nombre',
            'nombre_corto' => 'Nombre Corto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaHasJinetes()
    {
        return $this->hasMany(DisciplinaHasJinete::className(), ['id_clasificacion_jinete' => 'id_clasificacion_jinete']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPruebaSaltos()
    {
        return $this->hasMany(PruebaSalto::className(), ['clasificacion_jinete_id_clasificacion_jinete' => 'id_clasificacion_jinete']);
    }
}
