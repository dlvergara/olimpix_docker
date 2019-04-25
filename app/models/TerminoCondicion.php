<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termino_condicion".
 *
 * @property int $id_termino_condicion
 * @property string $titulo
 * @property string $texto
 * @property int $evento_id_evento
 *
 * @property Evento $eventoIdEvento
 */
class TerminoCondicion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'termino_condicion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['texto'], 'string'],
            [['evento_id_evento'], 'required'],
            [['evento_id_evento'], 'integer'],
            [['titulo'], 'string', 'max' => 200],
            [['evento_id_evento'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id_evento' => 'id_evento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_termino_condicion' => 'Id Termino Condicion',
            'titulo' => 'Titulo',
            'texto' => 'Texto',
            'evento_id_evento' => 'Evento Id Evento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoIdEvento()
    {
        return $this->hasOne(Evento::className(), ['id_evento' => 'evento_id_evento']);
    }
}
