<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cpuestos".
 *
 * @property int $id
 * @property string $puesto Puestos
 *
 * @property OfertasLaborales[] $ofertasLaborales
 */
class Cpuestos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cpuestos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['puesto'], 'required'],
            [['puesto'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'puesto' => 'Puesto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertasLaborales()
    {
        return $this->hasMany(OfertasLaborales::className(), ['puesto_id' => 'id']);
    }
}
