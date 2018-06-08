<?php

namespace common\models;
/**
 * This is the model class for table "cvidiomas".
 *
 * @property int $id
 * @property int $cvpersonal_id
 * @property int $idiomas_id
 * @property int $habla
 * @property int $escribe
 * @property int $lee
 *
 * @property Cidiomas $idiomas
 * @property Cvpersonal $cvpersonal
 */
class Cvidiomas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cvidiomas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cvpersonal_id', 'idiomas_id', 'habla', 'escribe', 'lee'], 'integer'],
            [['idiomas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cidiomas::className(), 'targetAttribute' => ['idiomas_id' => 'id']],
            [['cvpersonal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cvpersonal::className(), 'targetAttribute' => ['cvpersonal_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cvpersonal_id' => 'Cvpersonal ID',
            'idiomas_id' => 'Idioma',
            'habla' => '% Habla',
            'escribe' => '% Escribe',
            'lee' => '% Lee',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdiomas()
    {
        return $this->hasOne(Cidiomas::className(), ['id' => 'idiomas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvpersonal()
    {
        return $this->hasOne(Cvpersonal::className(), ['id' => 'cvpersonal_id']);
    }
}
