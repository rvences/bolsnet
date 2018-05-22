<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ofertas_laborales".
 *
 * @property int $id
 * @property string $actividades
 * @property string $conocimientos
 * @property string $infoadicional
 * @property int $edad_minima
 * @property int $edad_maxima
 * @property int $sueldo
 * @property int $experiencia
 * @property int $no_vacantes
 * @property string $sexo
 * @property string $vigencia  Dias que va a estar activa la oferta laboral
 * @property int $puesto_id
 * @property int $estadocivil_id
 * @property int $horario_id
 * @property int $tcontratacion_id
 * @property int $profesion_id
 * @property int $nivelestudio_id
 * @property int $empresa_id
 * @property int $estadovacante_id
 * @property string $create_at
 * @property string $update_at
 *
 * @property Empresas $empresa
 * @property Cestadocivil $estadocivil
 * @property Cestadovacante $estadovacante
 * @property Chorario $horario
 * @property Cnivelestudios $nivelestudio
 * @property Cprofesiones $profesion
 * @property Cpuestos $puesto
 * @property Ctcontratacion $tcontratacion
 */
class OfertasLaborales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ofertas_laborales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['puesto_id'], 'required'],
            [['edad_minima'], 'number', 'min' => 16, 'max' =>50],
            [['edad_maxima'], 'number', 'min' => 18, 'max' =>99],
            [['edad_minima'], 'compare', 'compareAttribute'=>'edad_maxima', 'operator'=>'<=', 'skipOnEmpty'=>true],
            [['edad_maxima'], 'compare', 'compareAttribute'=>'edad_minima', 'operator'=>'>='],


            [['actividades', 'conocimientos', 'infoadicional'], 'string'],
            [['edad_minima', 'edad_maxima', 'sueldo', 'experiencia', 'no_vacantes', 'puesto_id', 'estadocivil_id', 'horario_id', 'tcontratacion_id', 'profesion_id', 'nivelestudio_id', 'empresa_id', 'estadovacante_id'], 'integer'],
            [['created_at', 'updated_at', 'vigencia'], 'safe'],
            [['sexo'], 'string', 'max' => 10],
            [['empresa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empresas::class, 'targetAttribute' => ['empresa_id' => 'id']],
            [['estadocivil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cestadocivil::class, 'targetAttribute' => ['estadocivil_id' => 'id']],
            [['estadovacante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cestadovacante::class, 'targetAttribute' => ['estadovacante_id' => 'id']],
            [['horario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chorario::class, 'targetAttribute' => ['horario_id' => 'id']],
            [['nivelestudio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cnivelestudios::class, 'targetAttribute' => ['nivelestudio_id' => 'id']],
            [['profesion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cprofesiones::class, 'targetAttribute' => ['profesion_id' => 'id']],
            [['puesto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cpuestos::class, 'targetAttribute' => ['puesto_id' => 'id']],
            [['tcontratacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctcontratacion::class, 'targetAttribute' => ['tcontratacion_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'actividades' => 'Actividades',
            'conocimientos' => 'Conocimientos',
            'infoadicional' => 'Información adicional',
            'edad_minima' => 'Edad Minima',
            'edad_maxima' => 'Edad Maxima',
            'sueldo' => 'Sueldo',
            'experiencia' => 'Experiencia',
            'no_vacantes' => 'No Vacantes',
            'sexo' => 'Sexo',
            'vigencia' => 'Vigencia',
            'puesto_id' => 'Puesto',
            'estadocivil_id' => 'Estado Civil',
            'horario_id' => 'Horario',
            'tcontratacion_id' => 'Tipo de Contratación',
            'profesion_id' => 'Profesion',
            'nivelestudio_id' => 'Nivel de estudio',
            'empresa_id' => 'Empresa ID',
            'estadovacante_id' => 'Estadovacante ID',
            'create_at' => 'Createat',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresas::className(), ['id' => 'empresa_id']);
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
    public function getEstadovacante()
    {
        return $this->hasOne(Cestadovacante::className(), ['id' => 'estadovacante_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorario()
    {
        return $this->hasOne(Chorario::className(), ['id' => 'horario_id']);
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
    public function getProfesion()
    {
        return $this->hasOne(Cprofesiones::className(), ['id' => 'profesion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuesto()
    {
        return $this->hasOne(Cpuestos::className(), ['id' => 'puesto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTcontratacion()
    {
        return $this->hasOne(Ctcontratacion::className(), ['id' => 'tcontratacion_id']);
    }

    public function beforeSave($insert)
    {
        //$this->vigencia=Yii::$app->formatter->asDate($this->vigencia, "yyyy-mm-dd");


        if (parent::beforeSave($insert)) {
            if($insert)
            {
                $this->empresa_id = 1;
                $this->estadovacante_id = 1;
                $this->created_at =  date('Y-m-d H:i:s');
            }

            $this->updated_at = new \yii\db\Expression('NOW()');
            return true;
        } else {
            return false;
        }
    }

}
