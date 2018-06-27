<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cinstituciones".
 *
 * @property int $id
 * @property string $institucion Institución
 *
 * @property Herramientasocial[] $herramientasocials
 */
class Cinstituciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cinstituciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institucion'], 'required'],
            [['institucion'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institucion' => 'Institucion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHerramientasocials()
    {
        return $this->hasMany(Herramientasocial::className(), ['institucion_id' => 'id']);
    }
}
