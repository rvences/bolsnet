<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reclutadores".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apaterno
 * @property string $amaterno
 * @property string $puesto
 * @property string $telefono
 * @property int $ext_telefono
 * @property string $email
 * @property int $user_id Identificador del usuario
 * @property int $empresas_id
 * @property string $rfc
 * @property string $createat
 * @property string $update_at
 * @property int $status Si el reclutador esta activo
 *
 * @property Empresas $empresas
 * @property User $user
 */
class Reclutadores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reclutadores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['ext_telefono', 'user_id', 'empresas_id', 'status'], 'integer'],
            [['createat', 'update_at'], 'safe'],
            [['nombre', 'apaterno', 'amaterno', 'email'], 'string', 'max' => 100],
            [['puesto'], 'string', 'max' => 60],
            [['telefono'], 'string', 'max' => 20],
            [['rfc'], 'string', 'max' => 13],
            [['empresas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empresas::className(), 'targetAttribute' => ['empresas_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apaterno' => 'Apaterno',
            'amaterno' => 'Amaterno',
            'puesto' => 'Puesto',
            'telefono' => 'Telefono',
            'ext_telefono' => 'Ext Telefono',
            'email' => 'Email',
            'user_id' => 'User ID',
            'empresas_id' => 'Empresas ID',
            'rfc' => 'Rfc',
            'createat' => 'Createat',
            'update_at' => 'Update At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasOne(Empresas::className(), ['id' => 'empresas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
