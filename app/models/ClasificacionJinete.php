<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clasificacion_jinete".
 *
 * @property int $id_clasificacion_jinete
 * @property string $nombre
 * @property string $nombre_corto
 * @property int $categoria_nacional
 * @property int $categoria_internacional
 * @property int $categoria_liga
 * @property int $edad_minima
 * @property int $edad_maxima
 * @property string $altura_salto_minima
 * @property string $altura_salto_max
 *
 * @property DisciplinaHasJinete[] $disciplinaHasJinetes
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
            [['nombre'], 'required'],
            [['categoria_nacional', 'categoria_internacional', 'categoria_liga', 'edad_minima', 'edad_maxima'], 'integer'],
            [['altura_salto_minima', 'altura_salto_max'], 'number'],
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
            'categoria_nacional' => 'Categoria Nacional',
            'categoria_internacional' => 'Categoria Internacional',
            'categoria_liga' => 'Categoria Liga',
            'edad_minima' => 'Edad Minima',
            'edad_maxima' => 'Edad Maxima',
            'altura_salto_minima' => 'Altura Salto Minima',
            'altura_salto_max' => 'Altura Salto Max',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaHasJinetes()
    {
        return $this->hasMany(DisciplinaHasJinete::className(), ['id_clasificacion_jinete' => 'id_clasificacion_jinete']);
    }
}
