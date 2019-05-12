<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Evento;

/**
 * EventoSearch represents the model behind the search form of `app\models\Evento`.
 */
class EventoSearch extends Evento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_evento', 'ciudad_id_ciudad', 'liga_id_liga', 'cerrado', 'sorteado', 'id_tipo_evento'], 'integer'],
            [['fecha_inicio', 'fecha_fin', 'nombre', 'referencia_ubicacion', 'url_bases_tenicas', 'fecha_cierre', 'fecha_sorteo', 'descripcion', 'direccion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Evento::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_evento' => $this->id_evento,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'ciudad_id_ciudad' => $this->ciudad_id_ciudad,
            'liga_id_liga' => $this->liga_id_liga,
            'cerrado' => $this->cerrado,
            'fecha_cierre' => $this->fecha_cierre,
            'sorteado' => $this->sorteado,
            'fecha_sorteo' => $this->fecha_sorteo,
            'id_tipo_evento' => $this->id_tipo_evento,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'referencia_ubicacion', $this->referencia_ubicacion])
            ->andFilterWhere(['like', 'url_bases_tenicas', $this->url_bases_tenicas])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'direccion', $this->direccion]);

        $query->addOrderBy("fecha_inicio DESC");

        return $dataProvider;
    }
}
