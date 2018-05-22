<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ctcontratacion".
 *
 * @property int $id
 * @property string $tcontratacion Tipo de Contratacion
 *
 * @property OfertasLaborales[] $ofertasLaborales
 */
class Ctcontratacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ctcontratacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tcontratacion'], 'required'],
            [['tcontratacion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tcontratacion' => 'Tcontratacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertasLaborales()
    {
        return $this->hasMany(OfertasLaborales::className(), ['tcontratacion_id' => 'id']);
    }
}
