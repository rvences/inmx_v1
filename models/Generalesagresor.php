<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "generalesagresor".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $nombre
 * @property string $apellido
 * @property int $sexo_id
 * @property string $alias
 * @property string $fnac
 * @property int $estadocivil_id
 * @property string $domicilio
 * @property string $colonia
 * @property string $cpostal
 * @property string $telefono
 * @property string $celular
 * @property string $municipio
 * @property string $comunidad
 * @property string $idioma
 * @property string $religion
 * @property string $arma
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Csexos $sexo
 * @property Cedula $cedula
 * @property Cestadoscivil $estadocivil
 * @property User $createdBy
 * @property User $updatedBy
 */
class Generalesagresor extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'generalesagresor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'sexo_id', 'estadocivil_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['fnac'], 'safe'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['nombre', 'apellido', 'municipio', 'idioma', 'religion'], 'string', 'max' => 50],
            [['alias'], 'string', 'max' => 30],
            [['domicilio', 'colonia', 'cpostal', 'comunidad'], 'string', 'max' => 100],
            [['telefono', 'celular'], 'string', 'max' => 10],
            [['arma'], 'string', 'max' => 1],
            [['sexo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csexos::className(), 'targetAttribute' => ['sexo_id' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedula::className(), 'targetAttribute' => ['cedula_id' => 'id']],
            [['estadocivil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cestadoscivil::className(), 'targetAttribute' => ['estadocivil_id' => 'id']],
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
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'sexo_id' => 'Sexo',
            'alias' => 'Alias',
            'fnac' => 'Fecha Nacimiento aaaa/mm/dd',
            'estadocivil_id' => 'Situación de pareja o estado civil',
            'domicilio' => 'Domicilio',
            'colonia' => 'Colonia',
            'cpostal' => 'Código postal',
            'telefono' => 'Teléfono',
            'celular' => 'Celular',
            'municipio' => 'Municipio',
            'comunidad' => 'Comunidad',
            'idioma' => 'Idioma',
            'religion' => 'Religion',
            'arma' => 'Arma',
            'created_at' => 'Fecha de Atención',
            'updated_at' => 'Fecha de Actualización',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSexo()
    {
        return $this->hasOne(Csexos::className(), ['id' => 'sexo_id']);
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
    public function getEstadocivil()
    {
        return $this->hasOne(Cestadoscivil::className(), ['id' => 'estadocivil_id']);
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
