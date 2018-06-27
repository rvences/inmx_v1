<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Controlinterno;

/**
 * ControlinternoSearch represents the model behind the search form of `app\models\Controlinterno`.
 */
class ControlinternoSearch extends Controlinterno
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['requiereproteccion', 'delitofuerofederal', 'informousuaria', 'solicitaproteccion'], 'safe'],
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
        $query = Controlinterno::find();

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

        $query->andFilterWhere(['like', 'requiereproteccion', $this->requiereproteccion])
            ->andFilterWhere(['like', 'delitofuerofederal', $this->delitofuerofederal])
            ->andFilterWhere(['like', 'informousuaria', $this->informousuaria])
            ->andFilterWhere(['like', 'solicitaproteccion', $this->solicitaproteccion]);

        return $dataProvider;
    }
}
