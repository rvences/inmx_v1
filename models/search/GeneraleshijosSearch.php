<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Generaleshijos;

/**
 * GeneraleshijosSearch represents the model behind the search form of `app\models\Generaleshijos`.
 */
class GeneraleshijosSearch extends Generaleshijos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'edad', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nombre', 'escolaridad', 'conquienvive', 'servicio'], 'safe'],
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
        $query = Generaleshijos::find();

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
            'edad' => $this->edad,
            'cedula_id' => $this->cedula_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'escolaridad', $this->escolaridad])
            ->andFilterWhere(['like', 'conquienvive', $this->conquienvive])
            ->andFilterWhere(['like', 'servicio', $this->servicio]);

        return $dataProvider;
    }
}
