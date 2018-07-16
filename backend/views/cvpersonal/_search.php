<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CvpersonalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cvpersonal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apaterno') ?>

    <?= $form->field($model, 'amaterno') ?>

    <?php // echo $form->field($model, 'rfc') ?>

    <?php // echo $form->field($model, 'curp') ?>

    <?php // echo $form->field($model, 'fnac') ?>

    <?php // echo $form->field($model, 'estadocivil_id') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'tel_ofna') ?>

    <?php // echo $form->field($model, 'tel_ofna_ext') ?>

    <?php // echo $form->field($model, 'tel_movil') ?>

    <?php // echo $form->field($model, 'tel_casa_lada') ?>

    <?php // echo $form->field($model, 'tel_casa') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'entfed_id') ?>

    <?php // echo $form->field($model, 'municipio') ?>

    <?php // echo $form->field($model, 'colonia') ?>

    <?php // echo $form->field($model, 'cp') ?>

    <?php // echo $form->field($model, 'calle') ?>

    <?php // echo $form->field($model, 'numero') ?>

    <?php // echo $form->field($model, 'entrecalle') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
