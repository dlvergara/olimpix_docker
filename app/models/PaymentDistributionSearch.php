<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaymentDistribution;

/**
 * PaymentDistributionSearch represents the model behind the search form of `app\models\PaymentDistribution`.
 */
class PaymentDistributionSearch extends PaymentDistribution
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_payment_distribution', 'order_detail_id_order_detail'], 'integer'],
            [['name', 'timestamp'], 'safe'],
            [['amount', 'percentage'], 'number'],
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
        $query = PaymentDistribution::find();

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
            'id_payment_distribution' => $this->id_payment_distribution,
            'amount' => $this->amount,
            'percentage' => $this->percentage,
            'timestamp' => $this->timestamp,
            'order_detail_id_order_detail' => $this->order_detail_id_order_detail,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
