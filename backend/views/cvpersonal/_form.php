<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Cvpersonal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cvpersonal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'curp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fnac')->textInput() ?>

    <?= $form->field($model, 'estadocivil_id')->textInput() ?>

    <?= $form->field($model, 'sexo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_ofna')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_ofna_ext')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_movil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_casa_lada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_casa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entfed_id')->textInput() ?>

    <?= $form->field($model, 'municipio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'colonia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entrecalle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
