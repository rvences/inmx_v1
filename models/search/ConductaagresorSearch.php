<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Conductaagresor;

/**
 * ConductaagresorSearch represents the model behind the search form of `app\models\Conductaagresor`.
 */
class ConductaagresorSearch extends Conductaagresor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'frecuenciasocial_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['bebidaalcoholica', 'estupefaciente', 'medicamentocontrolado', 'agredidaefectoalcohol'], 'safe'],
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
        $query = Conductaagresor::find();

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
            'frecuenciasocial_id' => $this->frecuenciasocial_id,
            'cedula_id' => $this->cedula_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'bebidaalcoholica', $this->bebidaalcoholica])
            ->andFilterWhere(['like', 'estupefaciente', $this->estupefaciente])
            ->andFilterWhere(['like', 'medicamentocontrolado', $this->medicamentocontrolado])
            ->andFilterWhere(['like', 'agredidaefectoalcohol', $this->agredidaefectoalcohol]);

        return $dataProvider;
    }
}
