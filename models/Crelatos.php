<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crelatos".
 *
 * @property int $id
 * @property string $relato Relato
 *
 * @property Herramientapsicologica[] $herramientapsicologicas
 */
class Crelatos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crelatos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['relato'], 'required'],
            [['relato'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'relato' => 'Relato',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHerramientapsicologicas()
    {
        return $this->hasMany(Herramientapsicologica::className(), ['relato_id' => 'id']);
    }
}
