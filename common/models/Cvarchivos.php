<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\helpers\Url;

/**
 * This is the model class for table "cvarchivos".
 *
 * @property int $id
 * @property int $cvpersonal_id
 * @property string $path
 * @property string $filename
 * @property string $archivo
 *
 * @property Cvpersonal $cvpersonal
 */
class Cvarchivos extends \yii\db\ActiveRecord
{
    public $imagen;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cvarchivos';
    }

    /**
     * {@inheritdoc}
     */
    public $image;

    public function rules()
    {
        /*
         *
         * int $id unique person identifier
         * string $name person / user name                  cvpersonal_id
         * array $archivo generated filename on server       image
         * string $filename source filename from client     filename
         *
         * */

        return [
            [['cvpersonal_id'], 'integer'],
            [['path', 'filename', 'archivo'], 'string', 'max' => 255],
            [['cvpersonal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cvpersonal::className(), 'targetAttribute' => ['cvpersonal_id' => 'id']],

            //[['image'], 'file', 'maxFiles'=>'3'],
            //[['imagen'], 'file', 'maxSize'=>'1000000'],
//            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 3],

            [['image','path', 'filename', 'archivo'], 'safe'],
            //[['image'], 'file', 'extensions'=>'jpg, gif, png'],
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
            'path' => 'Ruta',
            'filename' => 'Nombre del Archivo',
            'archivo' => 'Archivo Digital',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvpersonal()
    {
        return $this->hasOne(Cvpersonal::className(), ['id' => 'cvpersonal_id']);
    }

    public function getImageFile() {
        return isset($this->archivo) ? Yii::$app->basePath . '/web/uploads/' . $this->archivo : null;
    }

    public function deleteImage() {
        $archivo = $this->getImageFile();

        // Verifica que exista en el servidor
        if (empty($archivo) || !file_exists($archivo)) {
            return false;
        }

        // Tratando de eliminar el archivo del servidor
        if (!unlink($archivo)) {
            return false;
        }

        // Si se borro el archivo del servidor se eliminan los atributos en la BD
        $this->path = null;
        $this->filename = null;
        $this->archivo = null;

        return true;
    }
}
