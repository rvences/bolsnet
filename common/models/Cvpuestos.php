<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cvpuestos".
 *
 * @property int $id
 * @property int $cvpersonal_id
 * @property int $puestos_id
 *
 * @property Cpuestos $puestos
 * @property Cvpersonal $cvpersonal
 */
class Cvpuestos extends \yii\db\ActiveRecord
{
    public $buscar_nombre_completo;
    public $user_id;
    public $created_at;
    public $seguimiento_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cvpuestos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cvpersonal_id', 'puestos_id'], 'integer'],
            [['puestos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cpuestos::className(), 'targetAttribute' => ['puestos_id' => 'id']],
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
            'puestos_id' => 'Puesto',
            'buscar_nombre_completo' => 'Aspirante',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuestos()
    {
        return $this->hasOne(Cpuestos::className(), ['id' => 'puestos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvpersonal()
    {
        return $this->hasOne(Cvpersonal::className(), ['id' => 'cvpersonal_id']);
    }
}
