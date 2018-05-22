<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cmunicipios".
 *
 * @property int $id
 * @property int $entfed_id
 * @property string $municipio Municipio
 *
 * @property Centfeds $entfed
 */
class Cmunicipios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cmunicipios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entfed_id', 'municipio'], 'required'],
            [['entfed_id'], 'integer'],
            [['municipio'], 'string', 'max' => 100],
            [['entfed_id'], 'exist', 'skipOnError' => true, 'targetClass' => Centfeds::className(), 'targetAttribute' => ['entfed_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entfed_id' => 'Entfed ID',
            'municipio' => 'Municipio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntfed()
    {
        return $this->hasOne(Centfeds::className(), ['id' => 'entfed_id']);
    }
}
