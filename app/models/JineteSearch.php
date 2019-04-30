<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jinete;

/**
 * JineteSearch represents the model behind the search form of `app\models\Jinete`.
 */
class JineteSearch extends Jinete
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jinete', 'club_id_club', 'liga_id_liga', 'pais_id_pais', 'activo_fec', 'activo_equi'], 'integer'],
            [['nombre_completo', 'tipo_identificacion', 'identificacion', 'fecha_nacimiento', 'registro_fec', 'email', 'telefono', 'direccion'], 'safe'],
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
        $query = Jinete::find();

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
            'id_jinete' => $this->id_jinete,
            'club_id_club' => $this->club_id_club,
            'liga_id_liga' => $this->liga_id_liga,
            'pais_id_pais' => $this->pais_id_pais,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'activo_fec' => $this->activo_fec,
            'activo_equi' => $this->activo_equi,
        ]);

        $query->andFilterWhere(['like', 'nombre_completo', $this->nombre_completo])
            ->andFilterWhere(['like', 'tipo_identificacion', $this->tipo_identificacion])
            ->andFilterWhere(['like', 'identificacion', $this->identificacion])
            ->andFilterWhere(['like', 'registro_fec', $this->registro_fec])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'direccion', $this->direccion]);

        return $dataProvider;
    }
}
