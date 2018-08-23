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
 *
 * @property Cprofesiones $cprofesion
 * @property Cnivelestudios $cnivelestudio
 * @property Cvpersonal $cvpersonal
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
            [['cnivelestudio_id', 'cprofesion_id'], 'integer'],
            [['escuela'], 'string', 'max' => 100],
            [['cvpersonal_id'], 'safe'],

            [['cnivelestudio_id', 'cprofesion_id'], 'required'],

            [['certificado', 'titulo', 'cedula'], 'string', 'max' => 1],
            [['cprofesion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cprofesiones::className(), 'targetAttribute' => ['cprofesion_id' => 'id']],
            [['cnivelestudio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cnivelestudios::className(), 'targetAttribute' => ['cnivelestudio_id' => 'id']],
            [['cvpersonal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cvpersonal::className(), 'targetAttribute' => ['cvpersonal_id' => 'id']],
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
            'cnivelestudio_id' => 'Nivel de Estudio',
            'cprofesion_id' => 'Profesión',
            'escuela' => 'Escuela',
            'certificado' => 'Certificado',
            'titulo' => 'Título',
            'cedula' => 'Cédula',
        ];
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
}
