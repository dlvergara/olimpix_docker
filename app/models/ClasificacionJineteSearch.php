<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClasificacionJinete;

/**
 * ClasificacionJineteSearch represents the model behind the search form of `app\models\ClasificacionJinete`.
 */
class ClasificacionJineteSearch extends ClasificacionJinete
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_clasificacion_jinete', 'categoria_nacional', 'categoria_internacional', 'categoria_liga', 'edad_minima', 'edad_maxima'], 'integer'],
            [['nombre', 'nombre_corto'], 'safe'],
            [['altura_salto_minima', 'altura_salto_max'], 'number'],
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
        $query = ClasificacionJinete::find();

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
            'id_clasificacion_jinete' => $this->id_clasificacion_jinete,
            'categoria_nacional' => $this->categoria_nacional,
            'categoria_internacional' => $this->categoria_internacional,
            'categoria_liga' => $this->categoria_liga,
            'edad_minima' => $this->edad_minima,
            'edad_maxima' => $this->edad_maxima,
            'altura_salto_minima' => $this->altura_salto_minima,
            'altura_salto_max' => $this->altura_salto_max,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'nombre_corto', $this->nombre_corto]);

        return $dataProvider;
    }
}
