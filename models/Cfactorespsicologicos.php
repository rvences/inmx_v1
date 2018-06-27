<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cfactorespsicologicos".
 *
 * @property int $id
 * @property string $factorpsicologico Factor Psicologico
 *
 * @property Herramientapsicologica[] $herramientapsicologicas
 */
class Cfactorespsicologicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cfactorespsicologicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['factorpsicologico'], 'required'],
            [['factorpsicologico'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'factorpsicologico' => 'Factor psicológico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHerramientapsicologicas()
    {
        return $this->hasMany(Herramientapsicologica::className(), ['factorpsicologico_id' => 'id']);
    }
}
