<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CvnivelestudioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cvnivelestudio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cvpersonal_id') ?>

    <?= $form->field($model, 'cnivelestudio_id') ?>

    <?= $form->field($model, 'cprofesion_id') ?>

    <?= $form->field($model, 'escuela') ?>

    <?php // echo $form->field($model, 'certificado') ?>

    <?php // echo $form->field($model, 'titulo') ?>

    <?php // echo $form->field($model, 'cedula') ?>

    <?php // echo $form->field($model, 'nivelestudios_id') ?>

    <?php // echo $form->field($model, 'ffin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
