<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cnivelestudios".
 *
 * @property int $id
 * @property string $nivelestudio Nivel de Estudio
 *
 * @property OfertasLaborales[] $ofertasLaborales
 */
class Cnivelestudios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cnivelestudios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nivelestudio'], 'required'],
            [['nivelestudio'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nivelestudio' => 'Nivelestudio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertasLaborales()
    {
        return $this->hasMany(OfertasLaborales::className(), ['nivelestudio_id' => 'id']);
    }
}
