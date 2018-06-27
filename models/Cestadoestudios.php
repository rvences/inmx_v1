<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cestadoestudios".
 *
 * @property int $id
 * @property string $estadoestudio Estatus de Estudio
 *
 * @property Estratosocial[] $estratosocials
 */
class Cestadoestudios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cestadoestudios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estadoestudio'], 'required'],
            [['estadoestudio'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estadoestudio' => 'Estatus de estudio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstratosocials()
    {
        return $this->hasMany(Estratosocial::className(), ['estadoestudio_id' => 'id']);
    }
}
