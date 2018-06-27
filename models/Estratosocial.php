<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "estratosocial".
 *
 * @property int $id
 * @property int $cedula_id
 * @property int $ocupacion_id
 * @property int $tipopercepcion_id
 * @property int $ingresomensual
 * @property string $conquienvive
 * @property string $redapoyo
 * @property string $religion
 * @property string $idioma
 * @property string $programasocial
 * @property string $cualprogramasocial
 * @property int $nivelestudio_id
 * @property int $estadoestudio_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Cestadoestudios $estadoestudio
 * @property Cedula $cedula
 * @property Cnivelestudios $nivelestudio
 * @property Cocupaciones $ocupacion
 * @property Ctipospercepciones $tipopercepcion
 * @property User $createdBy
 * @property User $updatedBy
 */
class Estratosocial extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estratosocial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'ocupacion_id', 'tipopercepcion_id', 'ingresomensual', 'nivelestudio_id', 'estadoestudio_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['conquienvive', 'redapoyo', 'religion', 'idioma', 'cualprogramasocial'], 'string', 'max' => 50],
            [['programasocial'], 'string', 'max' => 1],
            [['estadoestudio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cestadoestudios::className(), 'targetAttribute' => ['estadoestudio_id' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedula::className(), 'targetAttribute' => ['cedula_id' => 'id']],
            [['nivelestudio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cnivelestudios::className(), 'targetAttribute' => ['nivelestudio_id' => 'id']],
            [['ocupacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cocupaciones::className(), 'targetAttribute' => ['ocupacion_id' => 'id']],
            [['tipopercepcion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctipospercepciones::className(), 'targetAttribute' => ['tipopercepcion_id' => 'id']],
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
            'ocupacion_id' => 'Ocupación',
            'tipopercepcion_id' => 'Tipo de Percepción',
            'ingresomensual' => 'Ingreso mensual',
            'conquienvive' => '¿ Con quién vive?',
            'redapoyo' => '¿ Cuenta con alguna red de apoyo?',
            'religion' => '¿Religión?',
            'idioma' => 'Idioma',
            'programasocial' => '¿ Cuenta con algún programa social ?',
            'cualprogramasocial' => '¿ Cual ?',
            'nivelestudio_id' => 'Nivel de Estudio',
            'estadoestudio_id' => 'Estatus de Estudio',
            'created_at' => 'Fecha de Atención',
            'updated_at' => 'Fecha de Actualización',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoestudio()
    {
        return $this->hasOne(Cestadoestudios::className(), ['id' => 'estadoestudio_id']);
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
    public function getNivelestudio()
    {
        return $this->hasOne(Cnivelestudios::className(), ['id' => 'nivelestudio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcupacion()
    {
        return $this->hasOne(Cocupaciones::className(), ['id' => 'ocupacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipopercepcion()
    {
        return $this->hasOne(Ctipospercepciones::className(), ['id' => 'tipopercepcion_id']);
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
