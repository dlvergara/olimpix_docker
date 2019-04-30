<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PruebaSalto;

/**
 * PruebaSaltoSearch represents the model behind the search form of `app\models\PruebaSalto`.
 */
class PruebaSaltoSearch extends PruebaSalto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_prueba', 'distancia', 'numero_saltos', 'numero_clasificados', 'evento_id_evento', 'pista_id_pista', 'categoria_id_categoria'], 'integer'],
            [['nombre', 'fecha', 'presidente_jurado'], 'safe'],
            [['tiempo_acordado', 'velocidad', 'altura', 'tiempo_limite'], 'number'],
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
        $query = PruebaSalto::find();

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
            'id_prueba' => $this->id_prueba,
            'fecha' => $this->fecha,
            'distancia' => $this->distancia,
            'tiempo_acordado' => $this->tiempo_acordado,
            'numero_saltos' => $this->numero_saltos,
            'velocidad' => $this->velocidad,
            'altura' => $this->altura,
            'tiempo_limite' => $this->tiempo_limite,
            'numero_clasificados' => $this->numero_clasificados,
            'evento_id_evento' => $this->evento_id_evento,
            'pista_id_pista' => $this->pista_id_pista,
            'categoria_id_categoria' => $this->categoria_id_categoria,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'presidente_jurado', $this->presidente_jurado]);

        return $dataProvider;
    }
}
