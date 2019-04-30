<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria_prueba_salto".
 *
 * @property int $id_categoria_prueba
 * @property string $nombre
 * @property string $altura
 * @property string $valor_preventa
 * @property string $valor_venta
 * @property string $valor_posventa
 *
 * @property PruebaSalto[] $pruebaSaltos
 */
class CategoriaPruebaSalto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria_prueba_salto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['altura', 'valor_preventa', 'valor_venta', 'valor_posventa'], 'number'],
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
            'altura' => 'Altura',
            'valor_preventa' => 'Valor Preventa',
            'valor_venta' => 'Valor Venta',
            'valor_posventa' => 'Valor Posventa',
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
