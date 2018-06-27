<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ccreencias".
 *
 * @property int $id
 * @property string $creencia Creencia
 *
 * @property Herramientapsicologica[] $herramientapsicologicas
 */
class Ccreencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ccreencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['creencia'], 'required'],
            [['creencia'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'creencia' => 'Creencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHerramientapsicologicas()
    {
        return $this->hasMany(Herramientapsicologica::className(), ['creencia_id' => 'id']);
    }
}
