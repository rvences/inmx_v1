<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "salud".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $medicamentocontrolado
 * @property string $bebidaalcoholica
 * @property string $estupefaciente
 * @property int $frecuenciasocial_id
 * @property string $serviciomedico
 * @property string $queserviciomedico
 * @property string $padeceenfermedad
 * @property string $quepadeceenfermedad
 * @property string $padecediscapacidad
 * @property string $quepadecediscapacidad
 * @property string $embarazada
 * @property int $embarazadameses
 * @property string $riesgoembarazo
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
class Salud extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salud';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'frecuenciasocial_id', 'embarazadameses', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['medicamentocontrolado', 'bebidaalcoholica', 'estupefaciente', 'serviciomedico', 'padeceenfermedad', 'padecediscapacidad', 'embarazada'], 'string', 'max' => 1],
            [['queserviciomedico', 'quepadeceenfermedad', 'quepadecediscapacidad', 'riesgoembarazo'], 'string', 'max' => 50],
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
            'medicamentocontrolado' => '¿Medicamentos controlados?',
            'bebidaalcoholica' => '¿Consume bebidas alcohólicas?',
            'estupefaciente' => '¿Consume estupefacientes?',
            'frecuenciasocial_id' => '¿Con que frecuencia?',
            'serviciomedico' => '¿Cuenta con servicio médico?',
            'queserviciomedico' => '¿Cual servicio médico?',
            'padeceenfermedad' => '¿Padece alguna enfermedad ?',
            'quepadeceenfermedad' => '¿Cual enfermedad?',
            'padecediscapacidad' => '¿Padece alguna discapacidad?',
            'quepadecediscapacidad' => '¿Cual discapacidad?',
            'embarazada' => '¿Se encuentra embarazada?',
            'embarazadameses' => '¿Cuántos meses?',
            'riesgoembarazo' => 'Observaciones riesgo de embarazo',
            'created_at' => 'Fecha de Atención',
            'updated_at' => 'Fecha de Actualización',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
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
