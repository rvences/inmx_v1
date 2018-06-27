<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cindicadoresriesgo".
 *
 * @property int $id
 * @property string $indicadorriesgo Indicador de Riesgo
 *
 * @property Situacionviolencia[] $situacionviolencias
 */
class Cindicadoresriesgo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cindicadoresriesgo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['indicadorriesgo'], 'required'],
            [['indicadorriesgo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'indicadorriesgo' => 'Indicador de riesgo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacionviolencias()
    {
        return $this->hasMany(Situacionviolencia::className(), ['indicadorriesgo_id' => 'id']);
    }
}
