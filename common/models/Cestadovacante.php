<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cestadovacante".
 *
 * @property int $id
 * @property string $estadovacante Estado de la Vacante
 *
 * @property OfertasLaborales[] $ofertasLaborales
 */
class Cestadovacante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cestadovacante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estadovacante'], 'required'],
            [['estadovacante'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estadovacante' => 'Estadovacante',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertasLaborales()
    {
        return $this->hasMany(OfertasLaborales::className(), ['estadovacante_id' => 'id']);
    }
}
