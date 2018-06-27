<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cestadoscivil".
 *
 * @property int $id
 * @property string $estadocivil Estado Civil
 *
 * @property Generalesusuaria[] $generalesusuarias
 */
class Cestadoscivil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cestadoscivil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estadocivil'], 'required'],
            [['estadocivil'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estadocivil' => 'Estado civil',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneralesusuarias()
    {
        return $this->hasMany(Generalesusuaria::className(), ['estadocivil_id' => 'id']);
    }
}
