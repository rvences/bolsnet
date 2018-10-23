<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cestudios_especializaciones".
 *
 * @property int $id
 * @property int $nivelestudios_id
 * @property string $especializacion Especializacion Estudio
 *
 * @property Cnivelestudios $nivelestudios
 */
class CestudiosEspecializaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cestudios_especializaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nivelestudios_id'], 'integer'],
            [['especializacion'], 'required'],
            [['especializacion'], 'string', 'max' => 100],
            [['nivelestudios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cnivelestudios::className(), 'targetAttribute' => ['nivelestudios_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nivelestudios_id' => 'Nivelestudios ID',
            'especializacion' => 'Especializacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNivelestudios()
    {
        return $this->hasOne(Cnivelestudios::className(), ['id' => 'nivelestudios_id']);
    }
}
