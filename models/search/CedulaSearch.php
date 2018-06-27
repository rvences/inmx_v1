<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cedula;

/**
 * CedulaSearch represents the model behind the search form of `app\models\Cedula`.
 */
class CedulaSearch extends Cedula
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tipoatencion_id', 'tipoasesoria_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['foliocae', 'foliovictima', 'folioevento', 'demanda'], 'safe'],
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
        $query = Cedula::find();

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
            'tipoatencion_id' => $this->tipoatencion_id,
            'tipoasesoria_id' => $this->tipoasesoria_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'foliocae', $this->foliocae])
            ->andFilterWhere(['like', 'foliovictima', $this->foliovictima])
            ->andFilterWhere(['like', 'folioevento', $this->folioevento])
            ->andFilterWhere(['like', 'demanda', $this->demanda]);

        return $dataProvider;
    }
}
