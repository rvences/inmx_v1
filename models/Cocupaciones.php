<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cocupaciones".
 *
 * @property int $id
 * @property string $ocupacion Ocupación
 *
 * @property Estratosocial[] $estratosocials
 */
class Cocupaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cocupaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ocupacion'], 'required'],
            [['ocupacion'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ocupacion' => 'Ocupación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstratosocials()
    {
        return $this->hasMany(Estratosocial::className(), ['ocupacion_id' => 'id']);
    }
}
