<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\OfertasLaboralesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ofertas-laborales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'actividades') ?>

    <?= $form->field($model, 'conocimientos') ?>

    <?= $form->field($model, 'infoadicional') ?>

    <?= $form->field($model, 'edad_minima') ?>

    <?php // echo $form->field($model, 'edad_maxima') ?>

    <?php // echo $form->field($model, 'sueldo') ?>

    <?php // echo $form->field($model, 'experiencia') ?>

    <?php // echo $form->field($model, 'no_vacantes') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'vigencia') ?>

    <?php // echo $form->field($model, 'puesto_id') ?>

    <?php // echo $form->field($model, 'estadocivil_id') ?>

    <?php // echo $form->field($model, 'horario_id') ?>

    <?php // echo $form->field($model, 'tcontratacion_id') ?>

    <?php // echo $form->field($model, 'profesion_id') ?>

    <?php // echo $form->field($model, 'nivelestudio_id') ?>

    <?php // echo $form->field($model, 'empresa_id') ?>

    <?php // echo $form->field($model, 'estadovacante_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
