<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "situacionviolencia".
 *
 * @property int $id
 * @property int $cedula_id
 * @property int $indicadorriesgo_id
 * @property int $tiposeguimiento_id
 * @property int $tipoviolencia_id
 * @property int $modalidadviolencia_id
 * @property int $lugarviolencia_id
 * @property string $lugarviolencia
 * @property string $sufriolesion
 * @property string $lesiondonde
 * @property string $hospitalizado
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Clugaresviolencia $lugarviolencia0
 * @property Cedula $cedula
 * @property Cindicadoresriesgo $indicadorriesgo
 * @property Cmodalidadesviolencia $modalidadviolencia
 * @property Ctiposeguimientos $tiposeguimiento
 * @property Ctiposviolencias $tipoviolencia
 * @property User $createdBy
 * @property User $updatedBy
 */
class Situacionviolencia extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'situacionviolencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'indicadorriesgo_id', 'tiposeguimiento_id', 'tipoviolencia_id', 'modalidadviolencia_id', 'lugarviolencia_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['lugarviolencia', 'lesiondonde'], 'string', 'max' => 50],
            [['sufriolesion', 'hospitalizado'], 'string', 'max' => 1],
            [['lugarviolencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clugaresviolencia::className(), 'targetAttribute' => ['lugarviolencia_id' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedula::className(), 'targetAttribute' => ['cedula_id' => 'id']],
            [['indicadorriesgo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cindicadoresriesgo::className(), 'targetAttribute' => ['indicadorriesgo_id' => 'id']],
            [['modalidadviolencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cmodalidadesviolencia::className(), 'targetAttribute' => ['modalidadviolencia_id' => 'id']],
            [['tiposeguimiento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctiposeguimientos::className(), 'targetAttribute' => ['tiposeguimiento_id' => 'id']],
            [['tipoviolencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctiposviolencias::className(), 'targetAttribute' => ['tipoviolencia_id' => 'id']],
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
            'indicadorriesgo_id' => 'Indicador de riesgo',
            'tiposeguimiento_id' => 'Tipo de Seguimiento',
            'tipoviolencia_id' => 'Tipo de violencia',
            'modalidadviolencia_id' => 'Modalidad de violencia',
            'lugarviolencia_id' => 'Lugar donde fue la violencia',
            'lugarviolencia' => 'Especifique',
            'sufriolesion' => '¿Sufrió alguna lesión?',
            'lesiondonde' => '¿Donde?',
            'hospitalizado' => '¿Ha requerido hospitalización?',
            'created_at' => 'Fecha de Atención',
            'updated_at' => 'Fecha de Actualización',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLugarviolencia0()
    {
        return $this->hasOne(Clugaresviolencia::className(), ['id' => 'lugarviolencia_id']);
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
    public function getIndicadorriesgo()
    {
        return $this->hasOne(Cindicadoresriesgo::className(), ['id' => 'indicadorriesgo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModalidadviolencia()
    {
        return $this->hasOne(Cmodalidadesviolencia::className(), ['id' => 'modalidadviolencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTiposeguimiento()
    {
        return $this->hasOne(Ctiposeguimientos::className(), ['id' => 'tiposeguimiento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoviolencia()
    {
        return $this->hasOne(Ctiposviolencias::className(), ['id' => 'tipoviolencia_id']);
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
