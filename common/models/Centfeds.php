<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "centfeds".
 *
 * @property int $id
 * @property string $entidad Entidad Federativa
 *
 * @property Cmunicipios[] $cmunicipios
 */
class Centfeds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'centfeds';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entidad'], 'required'],
            [['entidad'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entidad' => 'Entidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmunicipios()
    {
        return $this->hasMany(Cmunicipios::className(), ['entfed_id' => 'id']);
    }
}
