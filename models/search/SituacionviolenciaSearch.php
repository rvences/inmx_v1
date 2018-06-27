<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Situacionviolencia;

/**
 * SituacionviolenciaSearch represents the model behind the search form of `app\models\Situacionviolencia`.
 */
class SituacionviolenciaSearch extends Situacionviolencia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'indicadorriesgo_id', 'tiposeguimiento_id', 'tipoviolencia_id', 'modalidadviolencia_id', 'lugarviolencia_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['lugarviolencia', 'sufriolesion', 'lesiondonde', 'hospitalizado'], 'safe'],
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
        $query = Situacionviolencia::find();

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
            'indicadorriesgo_id' => $this->indicadorriesgo_id,
            'tiposeguimiento_id' => $this->tiposeguimiento_id,
            'tipoviolencia_id' => $this->tipoviolencia_id,
            'modalidadviolencia_id' => $this->modalidadviolencia_id,
            'lugarviolencia_id' => $this->lugarviolencia_id,
        ]);

        $query->andFilterWhere(['like', 'lugarviolencia', $this->lugarviolencia])
            ->andFilterWhere(['like', 'sufriolesion', $this->sufriolesion])
            ->andFilterWhere(['like', 'lesiondonde', $this->lesiondonde])
            ->andFilterWhere(['like', 'hospitalizado', $this->hospitalizado]);

        return $dataProvider;
    }
}
