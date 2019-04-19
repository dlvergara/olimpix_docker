<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ServicioDisponible;

/**
 * ServicioDisponibleSearch represents the model behind the search form of `app\models\ServicioDisponible`.
 */
class ServicioDisponibleSearch extends ServicioDisponible
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_servicio_disponible', 'evento_id_evento', 'servicio_id_servicio', 'disponible'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['cantidad_disponible'], 'number'],
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
        $query = ServicioDisponible::find();

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
            'id_servicio_disponible' => $this->id_servicio_disponible,
            'evento_id_evento' => $this->evento_id_evento,
            'servicio_id_servicio' => $this->servicio_id_servicio,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'disponible' => $this->disponible,
            'cantidad_disponible' => $this->cantidad_disponible,
        ]);

        return $dataProvider;
    }
}
