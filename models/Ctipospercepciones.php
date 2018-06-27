<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctipospercepciones".
 *
 * @property int $id
 * @property string $tipopercepcion Percepcion
 *
 * @property Estratosocial[] $estratosocials
 */
class Ctipospercepciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctipospercepciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipopercepcion'], 'required'],
            [['tipopercepcion'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipopercepcion' => 'Tipo percepción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstratosocials()
    {
        return $this->hasMany(Estratosocial::className(), ['tipopercepcion_id' => 'id']);
    }
}
