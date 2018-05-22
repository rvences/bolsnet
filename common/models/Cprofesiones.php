<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cprofesiones".
 *
 * @property int $id
 * @property string $profesion Profesiones
 *
 * @property OfertasLaborales[] $ofertasLaborales
 */
class Cprofesiones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cprofesiones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['profesion'], 'required'],
            [['profesion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profesion' => 'Profesion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertasLaborales()
    {
        return $this->hasMany(OfertasLaborales::className(), ['profesion_id' => 'id']);
    }
}
