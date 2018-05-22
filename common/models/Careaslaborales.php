<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "careaslaborales".
 *
 * @property int $id
 * @property string $arealaboral Areas Laborales
 */
class Careaslaborales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'careaslaborales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arealaboral'], 'required'],
            [['arealaboral'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'arealaboral' => 'Arealaboral',
        ];
    }
}
