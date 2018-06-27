<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctiposdemandas".
 *
 * @property int $id
 * @property string $tipodemanda Tipo Demanda
 *
 * @property Herramientajuridica[] $herramientajuridicas
 */
class Ctiposdemandas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctiposdemandas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipodemanda'], 'required'],
            [['tipodemanda'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipodemanda' => 'Tipodemanda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHerramientajuridicas()
    {
        return $this->hasMany(Herramientajuridica::className(), ['tipodemanda_id' => 'id']);
    }
}
