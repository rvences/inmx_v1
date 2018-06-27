<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "herramientapsicologica".
 *
 * @property int $id
 * @property int $cedula_id
 * @property int $sintomatologiaemocional_id
 * @property int $sintomatologiafisica_id
 * @property int $creencia_id
 * @property int $factorpsicologico_id
 * @property int $relacionpareja_id
 * @property int $relacionsocial_id
 * @property string $tratamiento
 * @property int $relato_id
 * @property string $procesoevaluacion
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Crelatos $relato
 * @property Cedula $cedula
 * @property Ccreencias $creencia
 * @property Cfactorespsicologicos $factorpsicologico
 * @property Crelacionesparejas $relacionpareja
 * @property Crelacionessociales $relacionsocial
 * @property Csintomatologiasemocionales $sintomatologiaemocional
 * @property Csintomatologiasfisicas $sintomatologiafisica
 * @property User $createdBy
 * @property User $updatedBy
 */
class Herramientapsicologica extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'herramientapsicologica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'sintomatologiaemocional_id', 'sintomatologiafisica_id', 'creencia_id', 'factorpsicologico_id', 'relacionpareja_id', 'relacionsocial_id', 'relato_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['procesoevaluacion'], 'string'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['tratamiento'], 'string', 'max' => 1],
            [['relato_id'], 'exist', 'skipOnError' => true, 'targetClass' => Crelatos::className(), 'targetAttribute' => ['relato_id' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedula::className(), 'targetAttribute' => ['cedula_id' => 'id']],
            [['creencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ccreencias::className(), 'targetAttribute' => ['creencia_id' => 'id']],
            [['factorpsicologico_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cfactorespsicologicos::className(), 'targetAttribute' => ['factorpsicologico_id' => 'id']],
            [['relacionpareja_id'], 'exist', 'skipOnError' => true, 'targetClass' => Crelacionesparejas::className(), 'targetAttribute' => ['relacionpareja_id' => 'id']],
            [['relacionsocial_id'], 'exist', 'skipOnError' => true, 'targetClass' => Crelacionessociales::className(), 'targetAttribute' => ['relacionsocial_id' => 'id']],
            [['sintomatologiaemocional_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csintomatologiasemocionales::className(), 'targetAttribute' => ['sintomatologiaemocional_id' => 'id']],
            [['sintomatologiafisica_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csintomatologiasfisicas::className(), 'targetAttribute' => ['sintomatologiafisica_id' => 'id']],
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
            'sintomatologiaemocional_id' => 'Sintomatología emocional',
            'sintomatologiafisica_id' => 'Sintomatología física',
            'creencia_id' => 'Creencia',
            'factorpsicologico_id' => 'Factor psicosocial',
            'relacionpareja_id' => 'Relación de pareja',
            'relacionsocial_id' => 'Relación social',
            'tratamiento' => 'Tratamiento',
            'relato_id' => 'Relato',
            'procesoevaluacion' => 'Valoración',
            'created_at' => 'Fecha de Atención',
            'updated_at' => 'Fecha de Actualización',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelato()
    {
        return $this->hasOne(Crelatos::className(), ['id' => 'relato_id']);
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
    public function getCreencia()
    {
        return $this->hasOne(Ccreencias::className(), ['id' => 'creencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactorpsicologico()
    {
        return $this->hasOne(Cfactorespsicologicos::className(), ['id' => 'factorpsicologico_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelacionpareja()
    {
        return $this->hasOne(Crelacionesparejas::className(), ['id' => 'relacionpareja_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelacionsocial()
    {
        return $this->hasOne(Crelacionessociales::className(), ['id' => 'relacionsocial_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSintomatologiaemocional()
    {
        return $this->hasOne(Csintomatologiasemocionales::className(), ['id' => 'sintomatologiaemocional_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSintomatologiafisica()
    {
        return $this->hasOne(Csintomatologiasfisicas::className(), ['id' => 'sintomatologiafisica_id']);
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
