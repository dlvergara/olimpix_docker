<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplina".
 *
 * @property int $id_disciplina
 * @property string $nombre
 *
 * @property DisciplinaHasJinete[] $disciplinaHasJinetes
 */
class Disciplina extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disciplina';
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
            'id_disciplina' => 'Id Disciplina',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaHasJinetes()
    {
        return $this->hasMany(DisciplinaHasJinete::className(), ['disciplina_id_disciplina' => 'id_disciplina']);
    }
}
