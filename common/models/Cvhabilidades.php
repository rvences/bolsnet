<?php

namespace common\models;

/**
 * This is the model class for table "cvhabilidades".
 *
 * @property int $id
 * @property int $cvpersonal_id
 * @property int $habilidad_id
 * @property string $descripcion
 *
 * @property Chabilidades $habilidad
 * @property Cvpersonal $cvpersonal
 */
class Cvhabilidades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cvhabilidades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cvpersonal_id', 'habilidad_id'], 'integer'],
            [['descripcion'], 'string'],
            [['habilidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chabilidades::className(), 'targetAttribute' => ['habilidad_id' => 'id']],
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
            'habilidad_id' => 'Habilidad ID',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHabilidad()
    {
        return $this->hasOne(Chabilidades::className(), ['id' => 'habilidad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvpersonal()
    {
        return $this->hasOne(Cvpersonal::className(), ['id' => 'cvpersonal_id']);
    }
}
