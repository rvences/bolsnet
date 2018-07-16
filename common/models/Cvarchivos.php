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
 * @property string $image
 *
 * @property Cvpersonal $cvpersonal
 */
class Cvarchivos extends \yii\db\ActiveRecord
{
    public $image;
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
    //public $image;

    public function rules()
    {
        return [
            [['cvpersonal_id'], 'integer'],
            [['path', 'filename', 'image'], 'string', 'max' => 255],
            [['cvpersonal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cvpersonal::className(), 'targetAttribute' => ['cvpersonal_id' => 'id']],

            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
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
            'path' => 'Path',
            'filename' => 'Filename',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvpersonal()
    {
        return $this->hasOne(Cvpersonal::className(), ['id' => 'cvpersonal_id']);
    }

    /**
     * Obtiene la ruta exacta a la imagen
     * @return null|string
     */
    public function getImageFile() {
        return isset($this->image) ? Yii::$app->basePath . '/web/uploads/' . $this->image : null;
    }

    public function getImageUrl() {


        // Si no hay imagen en la BD, mostrar una temporal
        $imagen = isset($this->path) ? $this->image : 'imagen_defecto.jpg';


        return Url::to('@web/', true). '/uploads/' . $imagen;
    }

    public function uploadImage() {
        $images = UploadedFile::getInstance($this, 'image');
        // Si no existe imagen se cancela la subida
        if (empty($image)) {
            return false;
        }

        // Nombre del archivo fuente
        $this->filename = $image->name;

        $arreglo =  explode(".", $image->name);
        $ext = end($arreglo);

        // Genera un archivo único
        $this->image = Yii::$app->security->generateRandomString().".{$ext}";

        $this->path= Yii::$app->security->generateRandomString().".{$ext}";
        return $image;
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
        $this->image = null;

        return true;
    }
}
