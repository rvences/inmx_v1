<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "herramientajuridica".
 *
 * @property int $id
 * @property int $cedula_id
 * @property int $tipodemanda_id
 * @property string $relatohechos
 * @property string $situacionlegal
 * @property string $procedimientolegal
 * @property string $alcances
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Ctiposdemandas $tipodemanda
 * @property Cedula $cedula
 * @property User $createdBy
 * @property User $updatedBy
 */
class Herramientajuridica extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'herramientajuridica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'tipodemanda_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['relatohechos', 'situacionlegal', 'procedimientolegal', 'alcances'], 'string'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['tipodemanda_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctiposdemandas::className(), 'targetAttribute' => ['tipodemanda_id' => 'id']],
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
            'tipodemanda_id' => 'Tipo de demanda en la que encuadra su problema',
            'relatohechos' => 'Relato de hechos',
            'situacionlegal' => 'Situación legal en la que se encuentra su problemática',
            'procedimientolegal' => 'Procedimiento legal',
            'alcances' => 'Alcances y resultados',
            'created_at' => 'Fecha de Atención',
            'updated_at' => 'Fecha de Actualización',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipodemanda()
    {
        return $this->hasOne(Ctiposdemandas::className(), ['id' => 'tipodemanda_id']);
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
