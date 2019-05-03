<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ServicioDisponible;

/**
 * ServicioDisponibleSearch represents the model behind the search form of `app\models\ServicioDisponible`.
 */
class ServicioDisponibleSearch extends ServicioDisponible
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_servicio_disponible', 'evento_id_evento', 'disponible', 'prueba_salto_id_prueba', 'proveedor_id_proveedor'], 'integer'],
            [['fecha_inicio', 'fecha_fin', 'timestamp', 'descripcion', 'nombre', 'image_url'], 'safe'],
            [['cantidad_disponible', 'monto', 'porcentaje_comision_olimpix', 'monto_comision_olimpix', 'porcentaje_iva'], 'number'],
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
        $query = ServicioDisponible::find();

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
            'id_servicio_disponible' => $this->id_servicio_disponible,
            'evento_id_evento' => $this->evento_id_evento,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'disponible' => $this->disponible,
            'cantidad_disponible' => $this->cantidad_disponible,
            'timestamp' => $this->timestamp,
            'monto' => $this->monto,
            'prueba_salto_id_prueba' => $this->prueba_salto_id_prueba,
            'proveedor_id_proveedor' => $this->proveedor_id_proveedor,
            'porcentaje_comision_olimpix' => $this->porcentaje_comision_olimpix,
            'monto_comision_olimpix' => $this->monto_comision_olimpix,
            'porcentaje_iva' => $this->porcentaje_iva,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'image_url', $this->image_url]);

        return $dataProvider;
    }
}
