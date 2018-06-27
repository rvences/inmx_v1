<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "generalesusuaria".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $nombre
 * @property string $apellido
 * @property string $fnac
 * @property string $lugarnac
 * @property int $estadocivil_id
 * @property int $agresor_id
 * @property string $relacion_agresor
 * @property string $violencia_pareja
 * @property string $domicilio
 * @property string $colonia
 * @property string $cpostal
 * @property string $telefono
 * @property string $celular
 * @property string $municipio
 * @property string $comunidad
 * @property int $nohijos
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Conductaagresor[] $conductaagresors
 * @property Controlinterno[] $controlinternos
 * @property Estratosocial[] $estratosocials
 * @property Estratosocialagresor[] $estratosocialagresors
 * @property Generalesagresor[] $generalesagresors
 * @property Generalesallegados[] $generalesallegados
 * @property Generaleshijos[] $generaleshijos
 * @property Cestadoscivil $estadocivil
 * @property Cagresor $agresor
 * @property Cedula $cedula
 * @property Herramientajuridica[] $herramientajuridicas
 * @property Herramientapsicologica[] $herramientapsicologicas
 * @property Herramientasocial[] $herramientasocials
 * @property Salud[] $saluds
 * @property Saludagresor[] $saludagresors
 * @property Situacionviolencia[] $situacionviolencias
 */
class Generalesusuaria extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'generalesusuaria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'estadocivil_id', 'agresor_id', 'nohijos', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['fnac'], 'safe'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['nombre', 'apellido', 'municipio'], 'string', 'max' => 50],
            [['lugarnac'], 'string', 'max' => 30],
            [['relacion_agresor'], 'string', 'max' => 20],
            [['violencia_pareja'], 'string', 'max' => 1],
            [['domicilio', 'colonia', 'comunidad'], 'string', 'max' => 100],
            [['cpostal'], 'integer', 'max' => 99999],
            [['telefono', 'celular'], 'integer', 'max' => 9999999999],
            [['estadocivil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cestadoscivil::className(), 'targetAttribute' => ['estadocivil_id' => 'id']],
            [['agresor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cagresor::className(), 'targetAttribute' => ['agresor_id' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedula::className(), 'targetAttribute' => ['cedula_id' => 'id']],
            [['nombre', 'apellido', 'municipio', 'lugarnac', 'relacion_agresor'], 'filter', 'filter' => 'strtoupper'],
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
            'nombre' => 'Nombre Usuaria',
            'apellido' => 'Apellido',
            'fnac' => 'Fecha Nacimiento aaaa/mm/dd',
            'lugarnac' => 'Lugar Nacimiento',
            'estadocivil_id' => 'Situación de pareja o estado civil',
            'agresor_id' => 'Agresor',
            'relacion_agresor' => 'Relacion con la persona agresora',
            'violencia_pareja' => '¿Ha vivido violencia con su última pareja?',
            'domicilio' => 'Domicilio',
            'colonia' => 'Colonia',
            'cpostal' => 'Código postal',
            'telefono' => 'Teléfono',
            'celular' => 'Celular',
            'municipio' => 'Municipio',
            'comunidad' => 'Comunidad',
            'nohijos' => 'No. de hijos(as)',
            'created_at' => 'Fecha de Atención',
            'updated_at' => 'Fecha de Actualización',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConductaagresors()
    {
        return $this->hasMany(Conductaagresor::className(), ['generalesusuaria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControlinternos()
    {
        return $this->hasMany(Controlinterno::className(), ['generalesusuaria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstratosocials()
    {
        return $this->hasMany(Estratosocial::className(), ['generalesusuaria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstratosocialagresors()
    {
        return $this->hasMany(Estratosocialagresor::className(), ['generalesusuaria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneralesagresors()
    {
        return $this->hasMany(Generalesagresor::className(), ['generalesusuaria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneralesallegados()
    {
        return $this->hasMany(Generalesallegados::className(), ['generalesusuaria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneraleshijos()
    {
        return $this->hasMany(Generaleshijos::className(), ['generalesusuaria_id' => 'id']);
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
    public function getAgresor()
    {
        return $this->hasOne(Cagresor::className(), ['id' => 'agresor_id']);
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
    public function getHerramientajuridicas()
    {
        return $this->hasMany(Herramientajuridica::className(), ['generalesusuaria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHerramientapsicologicas()
    {
        return $this->hasMany(Herramientapsicologica::className(), ['generalesusuaria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHerramientasocials()
    {
        return $this->hasMany(Herramientasocial::className(), ['generalesusuaria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::className(), ['generalesusuaria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaludagresors()
    {
        return $this->hasMany(Saludagresor::className(), ['generalesusuaria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacionviolencias()
    {
        return $this->hasMany(Situacionviolencia::className(), ['generalesusuaria_id' => 'id']);
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
