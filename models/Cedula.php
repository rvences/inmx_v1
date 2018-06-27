<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cedula".
 *
 * @property int $id
 * @property string $foliocae
 * @property string $foliovictima
 * @property string $folioevento
 * @property int $tipoatencion_id
 * @property int $tipoasesoria_id
 * @property string $demanda
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property Ctipoasesoria $tipoasesoria
 * @property Ctipoatencion $tipoatencion
 * @property User $createdBy
 */
class Cedula extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cedula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipoatencion_id', 'tipoasesoria_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['demanda'], 'string'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['foliocae', 'foliovictima', 'folioevento'], 'string', 'max' => 15],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['tipoasesoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctipoasesoria::className(), 'targetAttribute' => ['tipoasesoria_id' => 'id']],
            [['tipoatencion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctipoatencion::className(), 'targetAttribute' => ['tipoatencion_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Cédula de Atención',
            'foliocae' => 'Folio CAEs y/o refugio',
            'foliovictima' => 'Folio Víctima',
            'folioevento' => 'Folio Evento',
            'tipoatencion_id' => 'Tipo de Atención',
            'tipoasesoria_id' => 'Tipo de Asesoría',
            'demanda' => 'Demanda o situación desencadenante',
            'created_at' => 'Fecha de Atención',
            'updated_at' => 'Fecha de Actualización',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoasesoria()
    {
        return $this->hasOne(Ctipoasesoria::className(), ['id' => 'tipoasesoria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoatencion()
    {
        return $this->hasOne(Ctipoatencion::className(), ['id' => 'tipoatencion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
