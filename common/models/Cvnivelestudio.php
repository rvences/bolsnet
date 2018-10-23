<?php

namespace common\models;

/**
 * This is the model class for table "cvnivelestudio".
 *
 * @property int $id
 * @property int $cvpersonal_id
 * @property int $cnivelestudio_id
 * @property int $cprofesion_id
 * @property string $escuela
 * @property string $certificado
 * @property string $titulo
 * @property string $cedula
 * @property int $nivelestudios_id
 * @property string $ffin
 *
 * @property Cnivelestudios $cnivelestudio
 * @property Cvpersonal $cvpersonal
 * @property Cprofesiones $cprofesion
 * @property CestudiosEspecializaciones $nivelestudios
 */
class Cvnivelestudio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cvnivelestudio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cvpersonal_id', 'cnivelestudio_id', 'cprofesion_id', 'nivelestudios_id'], 'integer'],
            [['ffin', 'cprofesion_id'], 'safe'],
            [['escuela'], 'string', 'max' => 100],
            [['certificado', 'titulo', 'cedula'], 'string', 'max' => 1],
            [['cnivelestudio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cnivelestudios::className(), 'targetAttribute' => ['cnivelestudio_id' => 'id']],
            [['cvpersonal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cvpersonal::className(), 'targetAttribute' => ['cvpersonal_id' => 'id']],
            [['cprofesion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cprofesiones::className(), 'targetAttribute' => ['cprofesion_id' => 'id']],
            [['nivelestudios_id'], 'exist', 'skipOnError' => true, 'targetClass' => CestudiosEspecializaciones::className(), 'targetAttribute' => ['nivelestudios_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cvpersonal_id' => 'Cvpersonal ID',
            'cnivelestudio_id' => 'Nivel de estudios',
            'cprofesion_id' => 'Profesión',
            'escuela' => 'Escuela',
            'certificado' => 'Certificado',
            'titulo' => 'Titulo',
            'cedula' => 'Cedula',
            'nivelestudios_id' => 'Especialización',
            'ffin' => 'Fecha término',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCnivelestudio()
    {
        return $this->hasOne(Cnivelestudios::className(), ['id' => 'cnivelestudio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvpersonal()
    {
        return $this->hasOne(Cvpersonal::className(), ['id' => 'cvpersonal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCprofesion()
    {
        return $this->hasOne(Cprofesiones::className(), ['id' => 'cprofesion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNivelestudios()
    {
        return $this->hasOne(CestudiosEspecializaciones::className(), ['id' => 'nivelestudios_id']);
    }
}
