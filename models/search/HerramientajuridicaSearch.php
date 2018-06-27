<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Herramientajuridica;

/**
 * HerramientajuridicaSearch represents the model behind the search form of `app\models\Herramientajuridica`.
 */
class HerramientajuridicaSearch extends Herramientajuridica
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'tipodemanda_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['relatohechos', 'situacionlegal', 'procedimientolegal', 'alcances'], 'safe'],
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
        $query = Herramientajuridica::find();

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
            'tipodemanda_id' => $this->tipodemanda_id,
        ]);

        $query->andFilterWhere(['like', 'relatohechos', $this->relatohechos])
            ->andFilterWhere(['like', 'situacionlegal', $this->situacionlegal])
            ->andFilterWhere(['like', 'procedimientolegal', $this->procedimientolegal])
            ->andFilterWhere(['like', 'alcances', $this->alcances]);

        return $dataProvider;
    }
}
