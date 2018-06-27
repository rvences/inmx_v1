<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clugaresviolencia".
 *
 * @property int $id
 * @property string $lugarviolencia Lugar de Violencia
 *
 * @property Situacionviolencia[] $situacionviolencias
 */
class Clugaresviolencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clugaresviolencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lugarviolencia'], 'required'],
            [['lugarviolencia'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lugarviolencia' => 'Lugar donde fue la violencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacionviolencias()
    {
        return $this->hasMany(Situacionviolencia::className(), ['lugarviolencia_id' => 'id']);
    }
}
