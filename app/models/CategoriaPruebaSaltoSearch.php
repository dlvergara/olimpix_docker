<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CategoriaPruebaSalto;

/**
 * CategoriaPruebaSaltoSearch represents the model behind the search form of `app\models\CategoriaPruebaSalto`.
 */
class CategoriaPruebaSaltoSearch extends CategoriaPruebaSalto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_categoria_prueba'], 'integer'],
            [['nombre'], 'safe'],
            [['altura', 'valor_preventa', 'valor_venta', 'valor_posventa'], 'number'],
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
        $query = CategoriaPruebaSalto::find();

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
            'id_categoria_prueba' => $this->id_categoria_prueba,
            'altura' => $this->altura,
            'valor_preventa' => $this->valor_preventa,
            'valor_venta' => $this->valor_venta,
            'valor_posventa' => $this->valor_posventa,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
