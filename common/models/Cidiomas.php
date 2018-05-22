<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cidiomas".
 *
 * @property int $id
 * @property string $idioma Idiomas
 */
class Cidiomas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cidiomas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idioma'], 'required'],
            [['idioma'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idioma' => 'Idioma',
        ];
    }
}
