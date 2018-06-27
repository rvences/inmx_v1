<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cfrecuenciasocial".
 *
 * @property int $id
 * @property string $frecuenciasocial Frecuencia
 *
 * @property Salud[] $saluds
 */
class Cfrecuenciasocial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cfrecuenciasocial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['frecuenciasocial'], 'required'],
            [['frecuenciasocial'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'frecuenciasocial' => '¿Con que frecuencia?',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::className(), ['frecuenciasocial_id' => 'id']);
    }
}
