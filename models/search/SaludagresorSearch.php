<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Saludagresor;

/**
 * SaludagresorSearch represents the model behind the search form of `app\models\Saludagresor`.
 */
class SaludagresorSearch extends Saludagresor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['serviciomedico', 'queserviciomedico', 'padeceenfermedad', 'quepadeceenfermedad', 'padecediscapacidad', 'quepadecediscapacidad'], 'safe'],
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
        $query = Saludagresor::find();

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
        ]);

        $query->andFilterWhere(['like', 'serviciomedico', $this->serviciomedico])
            ->andFilterWhere(['like', 'queserviciomedico', $this->queserviciomedico])
            ->andFilterWhere(['like', 'padeceenfermedad', $this->padeceenfermedad])
            ->andFilterWhere(['like', 'quepadeceenfermedad', $this->quepadeceenfermedad])
            ->andFilterWhere(['like', 'padecediscapacidad', $this->padecediscapacidad])
            ->andFilterWhere(['like', 'quepadecediscapacidad', $this->quepadecediscapacidad]);

        return $dataProvider;
    }
}
