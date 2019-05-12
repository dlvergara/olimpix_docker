<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Caballo;

/**
 * CaballoSearch represents the model behind the search form of `app\models\Caballo`.
 */
class CaballoSearch extends Caballo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_caballo', 'raza_id_raza', 'id_caballo_padre', 'id_caballo_madre', 'id_propietario', 'vigente_ica', 'vigente_fec', 'liga_id_liga', 'club_id_club'], 'integer'],
            [['nombre', 'fecha_nacimiento', 'fecha_grado', 'identificacion', 'registro_fec', 'pasaporte_fec', 'fecha_vigencia_ica', 'fecha_vigencia_fec', 'num_microchip_principal'], 'safe'],
            [['puntaje'], 'number'],
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
        $query = Caballo::find();

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
            'id_caballo' => $this->id_caballo,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'fecha_grado' => $this->fecha_grado,
            'puntaje' => $this->puntaje,
            'raza_id_raza' => $this->raza_id_raza,
            'id_caballo_padre' => $this->id_caballo_padre,
            'id_caballo_madre' => $this->id_caballo_madre,
            'id_propietario' => $this->id_propietario,
            'vigente_ica' => $this->vigente_ica,
            'fecha_vigencia_ica' => $this->fecha_vigencia_ica,
            'vigente_fec' => $this->vigente_fec,
            'fecha_vigencia_fec' => $this->fecha_vigencia_fec,
            'liga_id_liga' => $this->liga_id_liga,
            'club_id_club' => $this->club_id_club,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'identificacion', $this->identificacion])
            ->andFilterWhere(['like', 'registro_fec', $this->registro_fec])
            ->andFilterWhere(['like', 'pasaporte_fec', $this->pasaporte_fec])
            ->andFilterWhere(['like', 'num_microchip_principal', $this->num_microchip_principal]);

        return $dataProvider;
    }
}
