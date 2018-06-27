<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estratosocialagresor;

/**
 * EstratosocialagresorSearch represents the model behind the search form of `app\models\Estratosocialagresor`.
 */
class EstratosocialagresorSearch extends Estratosocialagresor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'ocupacion_id', 'tipopercepcion_id', 'ingresomensual', 'nivelestudio_id', 'estadoestudio_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['servidorpublico', 'servidorpublicocargo', 'servidorpublicioinstitucion'], 'safe'],
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
        $query = Estratosocialagresor::find();

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
            'nivelestudio_id' => $this->nivelestudio_id,
            'estadoestudio_id' => $this->estadoestudio_id,
            'cedula_id' => $this->cedula_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'servidorpublico', $this->servidorpublico])
            ->andFilterWhere(['like', 'servidorpublicocargo', $this->servidorpublicocargo])
            ->andFilterWhere(['like', 'servidorpublicioinstitucion', $this->servidorpublicioinstitucion]);

        return $dataProvider;
    }
}
