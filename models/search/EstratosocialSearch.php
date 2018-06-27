<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estratosocial;

/**
 * EstratosocialSearch represents the model behind the search form of `app\models\Estratosocial`.
 */
class EstratosocialSearch extends Estratosocial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'ocupacion_id', 'tipopercepcion_id', 'ingresomensual', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['conquienvive', 'redapoyo', 'religion', 'idioma', 'programasocial', 'cualprogramasocial'], 'safe'],
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
        $query = Estratosocial::find();

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
            'ocupacion_id' => $this->ocupacion_id,
            'tipopercepcion_id' => $this->tipopercepcion_id,
            'ingresomensual' => $this->ingresomensual,
            'cedula_id' => $this->cedula_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'conquienvive', $this->conquienvive])
            ->andFilterWhere(['like', 'redapoyo', $this->redapoyo])
            ->andFilterWhere(['like', 'religion', $this->religion])
            ->andFilterWhere(['like', 'idioma', $this->idioma])
            ->andFilterWhere(['like', 'programasocial', $this->programasocial])
            ->andFilterWhere(['like', 'cualprogramasocial', $this->cualprogramasocial]);

        return $dataProvider;
    }
}
