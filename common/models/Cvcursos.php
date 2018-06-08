<?php

namespace common\models;

/**
 * This is the model class for table "cvcursos".
 *
 * @property int $id
 * @property int $cvpersonal_id
 * @property string $curso
 * @property string $escuela
 * @property string $iniciocurso
 * @property string $fincurso
 * @property string $estado
 *
 * @property Cvpersonal $cvpersonal
 */
class Cvcursos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cvcursos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cvpersonal_id'], 'integer'],
            [['iniciocurso', 'fincurso'], 'safe'],
            [['curso', 'escuela'], 'string', 'max' => 100],
            [['estado'], 'string', 'max' => 1],
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
            'curso' => 'Curso',
            'escuela' => 'Escuela',
            'iniciocurso' => 'Inicio de Curso',
            'fincurso' => 'Conclusión de Curso',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvpersonal()
    {
        return $this->hasOne(Cvpersonal::className(), ['id' => 'cvpersonal_id']);
    }
}
