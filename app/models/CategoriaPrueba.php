<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria_prueba".
 *
 * @property int $id_categoria_prueba
 * @property string $nombre
 *
 * @property PruebaSalto[] $pruebaSaltos
 */
class CategoriaPrueba extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria_prueba';
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
            'id_categoria_prueba' => 'Id Categoria Prueba',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPruebaSaltos()
    {
        return $this->hasMany(PruebaSalto::className(), ['categoria_id_categoria' => 'id_categoria_prueba']);
    }
}
