<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrderInfo;

/**
 * OrderInfoSearch represents the model behind the search form of `app\models\OrderInfo`.
 */
class OrderInfoSearch extends OrderInfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order_info', 'order_id_order'], 'integer'],
            [['info_type', 'full_name', 'email'], 'safe'],
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
        $query = OrderInfo::find();

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
            'id_order_info' => $this->id_order_info,
            'order_id_order' => $this->order_id_order,
        ]);

        $query->andFilterWhere(['like', 'info_type', $this->info_type])
            ->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
