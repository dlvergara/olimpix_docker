<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_evento".
 *
 * @property int $id_tipo_evento
 * @property string $nombre
 *
 * @property Evento[] $eventos
 */
class TipoEvento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_evento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_evento' => 'Id Tipo Evento',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['id_tipo_evento' => 'id_tipo_evento']);
    }
}
