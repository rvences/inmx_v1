<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctipoasesoria".
 *
 * @property int $id
 * @property string $tipoasesoria Tipo de Asesoría
 */
class Ctipoasesoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctipoasesoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipoasesoria'], 'required'],
            [['tipoasesoria'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipoasesoria' => 'Tipo de Asesoría',
        ];
    }
}
