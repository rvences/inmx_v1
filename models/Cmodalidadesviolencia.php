<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cmodalidadesviolencia".
 *
 * @property int $id
 * @property string $modalidadviolencia Modalidades Violenta
 *
 * @property Situacionviolencia[] $situacionviolencias
 */
class Cmodalidadesviolencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cmodalidadesviolencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['modalidadviolencia'], 'required'],
            [['modalidadviolencia'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modalidadviolencia' => 'Modalidad de violencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacionviolencias()
    {
        return $this->hasMany(Situacionviolencia::className(), ['modalidadviolencia_id' => 'id']);
    }
}
