<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctipoatencion".
 *
 * @property int $id
 * @property string $tipoatencion Tipo de Atención
 */
class Ctipoatencion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctipoatencion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipoatencion'], 'required'],
            [['tipoatencion'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipoatencion' => 'Tipo de Atención',
        ];
    }
}
