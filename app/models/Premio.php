<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "premio".
 *
 * @property int $id_premio
 * @property string $descripcion
 * @property string $monto
 * @property int $clasificacion
 * @property int $prueba_id_prueba
 *
 * @property PruebaSalto $pruebaIdPrueba
 */
class Premio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'premio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_premio', 'prueba_id_prueba'], 'required'],
            [['id_premio', 'clasificacion', 'prueba_id_prueba'], 'integer'],
            [['descripcion'], 'string'],
            [['monto'], 'number'],
            [['id_premio'], 'unique'],
            [['prueba_id_prueba'], 'exist', 'skipOnError' => true, 'targetClass' => PruebaSalto::className(), 'targetAttribute' => ['prueba_id_prueba' => 'id_prueba']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_premio' => 'Id Premio',
            'descripcion' => 'Descripcion',
            'monto' => 'Monto',
            'clasificacion' => 'Clasificacion',
            'prueba_id_prueba' => 'Prueba Id Prueba',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPruebaIdPrueba()
    {
        return $this->hasOne(PruebaSalto::className(), ['id_prueba' => 'prueba_id_prueba']);
    }
}
