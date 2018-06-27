<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "conductaagresor".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $bebidaalcoholica
 * @property string $estupefaciente
 * @property int $frecuenciasocial_id
 * @property string $medicamentocontrolado
 * @property string $agredidaefectoalcohol
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Cfrecuenciasocial $frecuenciasocial
 * @property Cedula $cedula
 * @property User $createdBy
 * @property User $updatedBy
 */
class Conductaagresor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conductaagresor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'frecuenciasocial_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['bebidaalcoholica', 'estupefaciente', 'medicamentocontrolado', 'agredidaefectoalcohol'], 'string', 'max' => 1],
            [['frecuenciasocial_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cfrecuenciasocial::className(), 'targetAttribute' => ['frecuenciasocial_id' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedula::className(), 'targetAttribute' => ['cedula_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'id' => 'ID',
            'cedula_id' => 'Cédula de Atención',
            'bebidaalcoholica' => '¿Consume bebidas alcohólicas?',
            'estupefaciente' => '¿Consume estupefacientes?',
            'frecuenciasocial_id' => '¿Con que frecuencia?',
            'medicamentocontrolado' => '¿Consume medicamentos controlados?',
            'agredidaefectoalcohol' => '¿Ha sido agredida durante los efectos del alcohol y otro?',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrecuenciasocial()
    {
        return $this->hasOne(Cfrecuenciasocial::className(), ['id' => 'frecuenciasocial_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedula()
    {
        return $this->hasOne(Cedula::className(), ['id' => 'cedula_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
