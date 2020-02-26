<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CaballoHasJinete;

/**
 * CaballoHasJineteSearch represents the model behind the search form of `app\models\CaballoHasJinete`.
 */
class CaballoHasJineteSearch extends CaballoHasJinete
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_caballo_has_jinete', 'id_caballo', 'id_jinete'], 'integer'],
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
     * @param bool $loadAll
     * @return ActiveDataProvider
     */
    public function search($params, $loadAll = true)
    {
        $query = CaballoHasJinete::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            if (!$loadAll) {
                $query->where('0=1');
            }
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_caballo_has_jinete' => $this->id_caballo_has_jinete,
            'id_caballo' => $this->id_caballo,
            'id_jinete' => $this->id_jinete,
        ]);

        return $dataProvider;
    }
}
