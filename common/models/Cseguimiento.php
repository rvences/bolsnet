<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cseguimiento".
 *
 * @property int $id
 * @property string $seguimiento
 *
 * @property Cvpersonal[] $cvpersonals
 */
class Cseguimiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cseguimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seguimiento'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seguimiento' => 'Seguimiento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvpersonals()
    {
        return $this->hasMany(Cvpersonal::className(), ['seguimiento_id' => 'id']);
    }
}
