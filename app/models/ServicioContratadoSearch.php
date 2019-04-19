<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ServicioContratado;

/**
 * ServicioContratadoSearch represents the model behind the search form of `app\models\ServicioContratado`.
 */
class ServicioContratadoSearch extends ServicioContratado
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_servicio_contratado', 'evento_id_evento', 'servicio_id_servicio', 'id_estado_servicio', 'caballo_id_caballo', 'jinete_id_jinete'], 'integer'],
            [['identificador_servicio_contratado'], 'safe'],
            [['monto'], 'number'],
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
        $query = ServicioContratado::find();

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
            'id_servicio_contratado' => $this->id_servicio_contratado,
            'evento_id_evento' => $this->evento_id_evento,
            'servicio_id_servicio' => $this->servicio_id_servicio,
            'id_estado_servicio' => $this->id_estado_servicio,
            'caballo_id_caballo' => $this->caballo_id_caballo,
            'jinete_id_jinete' => $this->jinete_id_jinete,
            'monto' => $this->monto,
        ]);

        $query->andFilterWhere(['like', 'identificador_servicio_contratado', $this->identificador_servicio_contratado]);

        return $dataProvider;
    }
}
