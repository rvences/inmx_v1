<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Herramientasocial;

/**
 * HerramientasocialSearch represents the model behind the search form of `app\models\Herramientasocial`.
 */
class HerramientasocialSearch extends Herramientasocial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'institucion_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['situacion', 'tipogestion', 'procedimiento', 'oficio', 'fecha', 'observaciones'], 'safe'],
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
        $query = Herramientasocial::find();

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
            'institucion_id' => $this->institucion_id,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'situacion', $this->situacion])
            ->andFilterWhere(['like', 'tipogestion', $this->tipogestion])
            ->andFilterWhere(['like', 'procedimiento', $this->procedimiento])
            ->andFilterWhere(['like', 'oficio', $this->oficio])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
