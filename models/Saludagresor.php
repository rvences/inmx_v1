<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "saludagresor".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $serviciomedico
 * @property string $queserviciomedico
 * @property string $padeceenfermedad
 * @property string $quepadeceenfermedad
 * @property string $padecediscapacidad
 * @property string $quepadecediscapacidad
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Cedula $cedula
 * @property User $createdBy
 * @property User $updatedBy
 */
class Saludagresor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'saludagresor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['serviciomedico', 'padeceenfermedad', 'padecediscapacidad'], 'string', 'max' => 1],
            [['queserviciomedico', 'quepadeceenfermedad', 'quepadecediscapacidad'], 'string', 'max' => 50],
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
            'serviciomedico' => '¿Cuenta con servicio médico?',
            'queserviciomedico' => '¿Cual servicio médico?',
            'padeceenfermedad' => '¿Padece alguna enfermedad ?',
            'quepadeceenfermedad' => '¿Cual enfermedad?',
            'padecediscapacidad' => '¿Padece alguna discapacidad?',
            'quepadecediscapacidad' => '¿Cual discapacidad?',
            'created_at' => 'Fecha de Atención',
            'updated_at' => 'Fecha de Actualización',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
        ];
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
