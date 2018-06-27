<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cagresor".
 *
 * @property int $id
 * @property string $agresor Agresor
 *
 * @property Generalesusuaria[] $generalesusuarias
 */
class Cagresor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cagresor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['agresor'], 'required'],
            [['agresor'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'agresor' => 'Agresor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneralesusuarias()
    {
        return $this->hasMany(Generalesusuaria::className(), ['agresor_id' => 'id']);
    }
}
