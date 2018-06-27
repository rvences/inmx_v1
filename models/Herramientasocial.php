<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "herramientasocial".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $situacion
 * @property string $tipogestion
 * @property string $procedimiento
 * @property int $institucion_id
 * @property string $oficio
 * @property string $fecha
 * @property string $observaciones
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Cinstituciones $institucion
 * @property Cedula $cedula
 * @property User $createdBy
 * @property User $updatedBy
 */
class Herramientasocial extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'herramientasocial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'institucion_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['situacion', 'tipogestion', 'procedimiento', 'observaciones'], 'string'],
            [['fecha'], 'safe'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['oficio'], 'string', 'max' => 10],
            [['institucion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cinstituciones::className(), 'targetAttribute' => ['institucion_id' => 'id']],
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
            'situacion' => 'Situación de trabajo social en la que encuadra su problemática',
            'tipogestion' => 'Tipo de gestión',
            'procedimiento' => 'Procedimiento',
            'institucion_id' => 'Institución',
            'oficio' => 'No. de Oficio / Tarjeta',
            'fecha' => 'Fecha de expedición aaaa/mm/dd',
            'observaciones' => 'Observaciones de la Canalización',
            'created_at' => 'Fecha de Atención',
            'updated_at' => 'Fecha de Actualización',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitucion()
    {
        return $this->hasOne(Cinstituciones::className(), ['id' => 'institucion_id']);
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
