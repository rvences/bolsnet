<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chorario".
 *
 * @property int $id
 * @property string $horario Horario Laboral
 *
 * @property OfertasLaborales[] $ofertasLaborales
 */
class Chorario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chorario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['horario'], 'required'],
            [['horario'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'horario' => 'Horario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertasLaborales()
    {
        return $this->hasMany(OfertasLaborales::className(), ['horario_id' => 'id']);
    }
}
