<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chabilidades".
 *
 * @property int $id
 * @property string $habilidad Habilidades
 */
class Chabilidades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chabilidades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['habilidad'], 'required'],
            [['habilidad'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'habilidad' => 'Habilidad',
        ];
    }
}
