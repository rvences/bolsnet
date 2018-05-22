<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cestadocivil".
 *
 * @property int $id
 * @property string $estadocivil Estado Civil
 *
 * @property OfertasLaborales[] $ofertasLaborales
 */
class Cestadocivil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cestadocivil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estadocivil'], 'required'],
            [['estadocivil'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estadocivil' => 'Estadocivil',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertasLaborales()
    {
        return $this->hasMany(OfertasLaborales::className(), ['estadocivil_id' => 'id']);
    }
}
