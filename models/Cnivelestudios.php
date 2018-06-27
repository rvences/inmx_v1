<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cnivelestudios".
 *
 * @property int $id
 * @property string $nivelestudio Nivel de Estudio
 *
 * @property Estratosocial[] $estratosocials
 */
class Cnivelestudios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cnivelestudios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nivelestudio'], 'required'],
            [['nivelestudio'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nivelestudio' => 'Nivel de estudio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstratosocials()
    {
        return $this->hasMany(Estratosocial::className(), ['nivelestudio_id' => 'id']);
    }
}
