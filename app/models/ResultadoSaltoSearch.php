<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ResultadoSalto;

/**
 * ResultadoSaltoSearch represents the model behind the search form of `app\models\ResultadoSalto`.
 */
class ResultadoSaltoSearch extends ResultadoSalto
{
    public $id_caballo;
    public $id_jinete;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_resultado_salto', 'id_caballo_has_jinete', 'id_prueba', 'falta_obst', 'faltas_totales', 'clasificacion', 'cantidad_obstaculos', 'puntaje', 'clasificacion_final', 'orden_participacion', 'cantidad_rehuso'], 'integer'],
            [['fecha_inicial', 'fecha_final', 'faltas_tiempo', 'observaciones', 'fecha_inscripcion', 'fecha_participacion'], 'safe'],
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
        $query = ResultadoSalto::find();

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
            'id_resultado_salto' => $this->id_resultado_salto,
            'id_caballo_has_jinete' => $this->id_caballo_has_jinete,
            'id_prueba' => $this->id_prueba,
            'falta_obst' => $this->falta_obst,
            'fecha_inicial' => $this->fecha_inicial,
            'fecha_final' => $this->fecha_final,
            'faltas_tiempo' => $this->faltas_tiempo,
            'faltas_totales' => $this->faltas_totales,
            'clasificacion' => $this->clasificacion,
            'cantidad_obstaculos' => $this->cantidad_obstaculos,
            'puntaje' => $this->puntaje,
            'fecha_inscripcion' => $this->fecha_inscripcion,
            'clasificacion_final' => $this->clasificacion_final,
            'orden_participacion' => $this->orden_participacion,
            'fecha_participacion' => $this->fecha_participacion,
            'cantidad_rehuso' => $this->cantidad_rehuso,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
