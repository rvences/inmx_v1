<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crelacionesparejas".
 *
 * @property int $id
 * @property string $relacionpareja Relación de Pareja
 *
 * @property Herramientapsicologica[] $herramientapsicologicas
 */
class Crelacionesparejas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crelacionesparejas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['relacionpareja'], 'required'],
            [['relacionpareja'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'relacionpareja' => 'Relación de pareja',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHerramientapsicologicas()
    {
        return $this->hasMany(Herramientapsicologica::className(), ['relacionpareja_id' => 'id']);
    }
}
