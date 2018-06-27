<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctiposeguimientos".
 *
 * @property int $id
 * @property string $tiposeguimiento Tipo Seguimiento
 *
 * @property Situacionviolencia[] $situacionviolencias
 */
class Ctiposeguimientos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctiposeguimientos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tiposeguimiento'], 'required'],
            [['tiposeguimiento'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tiposeguimiento' => 'Tipo de Seguimiento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacionviolencias()
    {
        return $this->hasMany(Situacionviolencia::className(), ['tiposeguimiento_id' => 'id']);
    }
}
