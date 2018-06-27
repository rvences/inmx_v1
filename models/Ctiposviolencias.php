<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctiposviolencias".
 *
 * @property int $id
 * @property string $tipoviolencia Persona Originó la Violencia
 *
 * @property Situacionviolencia[] $situacionviolencias
 */
class Ctiposviolencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctiposviolencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipoviolencia'], 'required'],
            [['tipoviolencia'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipoviolencia' => 'Tipo de violencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacionviolencias()
    {
        return $this->hasMany(Situacionviolencia::className(), ['tipoviolencia_id' => 'id']);
    }
}
