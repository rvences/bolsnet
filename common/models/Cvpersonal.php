<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cvpersonal".
 *
 * @property int $id
 * @property int $user_id
 * @property string $nombre
 * @property string $apaterno
 * @property string $amaterno
 * @property string $rfc
 * @property string $curp
 * @property string $fnac
 * @property int $estadocivil_id
 * @property string $sexo
 * @property string $tel_ofna
 * @property string $tel_ofna_ext
 * @property string $tel_movil
 * @property string $tel_casa
 * @property string $correo
 * @property int $entfed_id
 * @property string $municipio
 * @property string $colonia
 * @property string $cp
 * @property string $calle
 * @property string $numero
 * @property string $entrecalle
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Cvcursos[] $cvcursos
 * @property Cvexperiencia[] $cvexperiencias
 * @property Cvhabilidades[] $cvhabilidades
 * @property Cvidiomas[] $cvidiomas
 * @property Cvnivelestudio[] $cvnivelestudios
 * @property Centfeds $entfed
 * @property Cestadocivil $estadocivil
 * @property User $user
 */
class Cvpersonal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cvpersonal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apaterno'], 'required'],
            [['estadocivil_id', 'entfed_id'], 'integer'],
            [['user_id', 'fnac', 'created_at', 'updated_at'], 'safe'],
            [['nombre', 'apaterno', 'amaterno', 'correo'], 'string', 'max' => 30],
            [['rfc'], 'string', 'max' => 13],
            [['curp'], 'string', 'max' => 18],
            [['sexo'], 'string', 'max' => 1],
            [['tel_ofna', 'tel_ofna_ext', 'tel_movil', 'tel_casa'], 'string', 'max' => 10],
            [['municipio', 'colonia', 'calle', 'numero', 'entrecalle'], 'string', 'max' => 100],
            [['cp'], 'string', 'max' => 5],
            [['entfed_id'], 'exist', 'skipOnError' => true, 'targetClass' => Centfeds::className(), 'targetAttribute' => ['entfed_id' => 'id']],
            [['estadocivil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cestadocivil::className(), 'targetAttribute' => ['estadocivil_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],

            [['nombre', 'apaterno', 'amaterno', 'calle', 'numero', 'entrecalle', 'colonia', 'municipio'], 'filter', 'filter' => 'strtoupper'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'nombre' => 'Nombre',
            'apaterno' => 'Apaterno',
            'amaterno' => 'Amaterno',
            'rfc' => 'Rfc',
            'curp' => 'Curp',
            'fnac' => 'Fecha Nac. dd-mm-aaaa',
            'estadocivil_id' => 'Estado Civil',
            'sexo' => 'Sexo',
            'tel_ofna' => 'Tel Oficina',
            'tel_ofna_ext' => 'Extensión',
            'tel_movil' => 'Tel Celular',
            'tel_casa' => 'Tel Casa',
            'correo' => 'Correo',
            'entfed_id' => 'Entfed ID',
            'municipio' => 'Municipio',
            'colonia' => 'Colonia',
            'cp' => 'Cp',
            'calle' => 'Calle',
            'numero' => 'Numero',
            'entrecalle' => 'Entrecalle',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function catSexo() {
        return array(
            'F' => 'Femenino',
            'H' => 'Masculino',
        );
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvcursos()
    {
        return $this->hasMany(Cvcursos::className(), ['cvpersonal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvexperiencias()
    {
        return $this->hasMany(Cvexperiencia::className(), ['cvpersonal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvhabilidades()
    {
        return $this->hasMany(Cvhabilidades::className(), ['cvpersonal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvidiomas()
    {
        return $this->hasMany(Cvidiomas::className(), ['cvpersonal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvnivelestudios()
    {
        return $this->hasMany(Cvnivelestudio::className(), ['cvpersonal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntfed()
    {
        return $this->hasOne(Centfeds::className(), ['id' => 'entfed_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadocivil()
    {
        return $this->hasOne(Cestadocivil::className(), ['id' => 'estadocivil_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if($insert) {
                $this->user_id = Yii::$app->user->id;
                $this->created_at =  date('Y-m-d H:i:s');
            }
            $this->updated_at = new \yii\db\Expression('NOW()');
            return true;

        } else {
            return false;
        }
    }
}
