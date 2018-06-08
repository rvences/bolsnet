<?php

namespace common\models;

/**
 * This is the model class for table "cvexperiencia".
 *
 * @property int $id
 * @property int $cvpersonal_id
 * @property string $empresa
 * @property string $puesto
 * @property string $actividades
 * @property string $iniciopuesto
 * @property string $finpuesto
 * @property string $empleoactual
 *
 * @property Cvpersonal $cvpersonal
 */
class Cvexperiencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cvexperiencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cvpersonal_id'], 'integer'],
            [['actividades'], 'string'],
            [['iniciopuesto', 'finpuesto'], 'safe'],
            [['empresa', 'puesto'], 'string', 'max' => 100],
            [['empleoactual'], 'string', 'max' => 1],
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
            'empresa' => 'Empresa',
            'puesto' => 'Puesto',
            'actividades' => 'Actividades',
            'iniciopuesto' => 'Fecha Inicial',
            'finpuesto' => 'Fecha Final',
            'empleoactual' => '¿ Es empleo actual ?',
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
