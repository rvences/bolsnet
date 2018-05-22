<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "empresas".
 *
 * @property int $id
 * @property string $empresa Empresa o Dependencia
 * @property string $nombre
 * @property string $rfc
 * @property string $createat
 * @property string $update_at
 * @property int $status Si la empresa se puede utilizar o no
 *
 * @property OfertasLaborales[] $ofertasLaborales
 * @property Reclutadores[] $reclutadores
 */
class Empresas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['empresa', 'nombre'], 'required'],
            [['createat', 'update_at'], 'safe'],
            [['status'], 'integer'],
            [['empresa', 'nombre'], 'string', 'max' => 100],
            [['rfc'], 'string', 'max' => 13],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'empresa' => 'Empresa',
            'nombre' => 'Nombre',
            'rfc' => 'Rfc',
            'createat' => 'Createat',
            'update_at' => 'Update At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertasLaborales()
    {
        return $this->hasMany(OfertasLaborales::className(), ['empresa_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReclutadores()
    {
        return $this->hasMany(Reclutadores::className(), ['empresas_id' => 'id']);
    }
}
