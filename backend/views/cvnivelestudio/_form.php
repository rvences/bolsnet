<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Cvnivelestudio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cvnivelestudio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cvpersonal_id')->textInput() ?>

    <?= $form->field($model, 'cnivelestudio_id')->textInput() ?>

    <?= $form->field($model, 'cprofesion_id')->textInput() ?>

    <?= $form->field($model, 'escuela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'certificado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
