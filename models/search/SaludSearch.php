<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Salud;

/**
 * SaludSearch represents the model behind the search form of `app\models\Salud`.
 */
class SaludSearch extends Salud
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'frecuenciasocial_id', 'embarazadameses', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['medicamentocontrolado', 'bebidaalcoholica', 'estupefaciente', 'serviciomedico', 'queserviciomedico', 'padeceenfermedad', 'quepadeceenfermedad', 'padecediscapacidad', 'quepadecediscapacidad', 'embarazada', 'riesgoembarazo'], 'safe'],
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
        $query = Salud::find();

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
            'id' => $this->id,
            'cedula_id' => $this->cedula_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'frecuenciasocial_id' => $this->frecuenciasocial_id,
            'embarazadameses' => $this->embarazadameses,
        ]);

        $query->andFilterWhere(['like', 'medicamentocontrolado', $this->medicamentocontrolado])
            ->andFilterWhere(['like', 'bebidaalcoholica', $this->bebidaalcoholica])
            ->andFilterWhere(['like', 'estupefaciente', $this->estupefaciente])
            ->andFilterWhere(['like', 'serviciomedico', $this->serviciomedico])
            ->andFilterWhere(['like', 'queserviciomedico', $this->queserviciomedico])
            ->andFilterWhere(['like', 'padeceenfermedad', $this->padeceenfermedad])
            ->andFilterWhere(['like', 'quepadeceenfermedad', $this->quepadeceenfermedad])
            ->andFilterWhere(['like', 'padecediscapacidad', $this->padecediscapacidad])
            ->andFilterWhere(['like', 'quepadecediscapacidad', $this->quepadecediscapacidad])
            ->andFilterWhere(['like', 'embarazada', $this->embarazada])
            ->andFilterWhere(['like', 'riesgoembarazo', $this->riesgoembarazo]);

        return $dataProvider;
    }
}
