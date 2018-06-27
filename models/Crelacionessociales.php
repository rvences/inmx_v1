<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crelacionessociales".
 *
 * @property int $id
 * @property string $relacionsocial Relación Social
 *
 * @property Herramientapsicologica[] $herramientapsicologicas
 */
class Crelacionessociales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crelacionessociales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['relacionsocial'], 'required'],
            [['relacionsocial'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'relacionsocial' => 'Relación social',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHerramientapsicologicas()
    {
        return $this->hasMany(Herramientapsicologica::className(), ['relacionsocial_id' => 'id']);
    }
}
