<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Generalesusuaria;

/**
 * GeneralesusuariaSearch represents the model behind the search form of `app\models\Generalesusuaria`.
 */
class GeneralesusuariaSearch extends Generalesusuaria
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'estadocivil_id', 'agresor_id', 'nohijos', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nombre', 'apellido', 'fnac', 'lugarnac', 'relacion_agresor', 'violencia_pareja', 'domicilio', 'colonia', 'cpostal', 'telefono', 'celular', 'municipio', 'comunidad'], 'safe'],
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
        $query = Generalesusuaria::find();

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
            'fnac' => $this->fnac,
            'estadocivil_id' => $this->estadocivil_id,
            'agresor_id' => $this->agresor_id,
            'nohijos' => $this->nohijos,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'lugarnac', $this->lugarnac])
            ->andFilterWhere(['like', 'relacion_agresor', $this->relacion_agresor])
            ->andFilterWhere(['like', 'violencia_pareja', $this->violencia_pareja])
            ->andFilterWhere(['like', 'domicilio', $this->domicilio])
            ->andFilterWhere(['like', 'colonia', $this->colonia])
            ->andFilterWhere(['like', 'cpostal', $this->cpostal])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'celular', $this->celular])
            ->andFilterWhere(['like', 'municipio', $this->municipio])
            ->andFilterWhere(['like', 'comunidad', $this->comunidad]);

        return $dataProvider;
    }
}
