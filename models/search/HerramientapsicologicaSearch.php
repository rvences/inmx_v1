<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Herramientapsicologica;

/**
 * HerramientapsicologicaSearch represents the model behind the search form of `app\models\Herramientapsicologica`.
 */
class HerramientapsicologicaSearch extends Herramientapsicologica
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'sintomatologiaemocional_id', 'sintomatologiafisica_id', 'creencia_id', 'factorpsicologico_id', 'relacionpareja_id', 'relacionsocial_id', 'relato_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['tratamiento', 'procesoevaluacion'], 'safe'],
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
        $query = Herramientapsicologica::find();

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
            'sintomatologiaemocional_id' => $this->sintomatologiaemocional_id,
            'sintomatologiafisica_id' => $this->sintomatologiafisica_id,
            'creencia_id' => $this->creencia_id,
            'factorpsicologico_id' => $this->factorpsicologico_id,
            'relacionpareja_id' => $this->relacionpareja_id,
            'relacionsocial_id' => $this->relacionsocial_id,
            'relato_id' => $this->relato_id,
        ]);

        $query->andFilterWhere(['like', 'tratamiento', $this->tratamiento])
            ->andFilterWhere(['like', 'procesoevaluacion', $this->procesoevaluacion]);

        return $dataProvider;
    }
}
