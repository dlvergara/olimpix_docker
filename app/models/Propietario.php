<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "propietario".
 *
 * @property int $id_propietario
 * @property string $nombre_completo
 * @property string $telefono
 * @property string $email
 *
 * @property Caballo[] $caballos
 */
class Propietario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'propietario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_completo'], 'string'],
            [['telefono', 'email'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_propietario' => 'Id Propietario',
            'nombre_completo' => 'Nombre Completo',
            'telefono' => 'Telefono',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaballos()
    {
        return $this->hasMany(Caballo::className(), ['id_propietario' => 'id_propietario']);
    }
}
