<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Generalesagresor;

/**
 * GeneralesagresorSearch represents the model behind the search form of `app\models\Generalesagresor`.
 */
class GeneralesagresorSearch extends Generalesagresor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'sexo_id', 'estadocivil_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nombre', 'apellido', 'alias', 'fnac', 'domicilio', 'colonia', 'cpostal', 'telefono', 'celular', 'municipio', 'comunidad', 'idioma', 'religion', 'arma'], 'safe'],
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
        $query = Generalesagresor::find();

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
            'sexo_id' => $this->sexo_id,
            'fnac' => $this->fnac,
            'estadocivil_id' => $this->estadocivil_id,
            'cedula_id' => $this->cedula_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'domicilio', $this->domicilio])
            ->andFilterWhere(['like', 'colonia', $this->colonia])
            ->andFilterWhere(['like', 'cpostal', $this->cpostal])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'celular', $this->celular])
            ->andFilterWhere(['like', 'municipio', $this->municipio])
            ->andFilterWhere(['like', 'comunidad', $this->comunidad])
            ->andFilterWhere(['like', 'idioma', $this->idioma])
            ->andFilterWhere(['like', 'religion', $this->religion])
            ->andFilterWhere(['like', 'arma', $this->arma]);

        return $dataProvider;
    }
}
