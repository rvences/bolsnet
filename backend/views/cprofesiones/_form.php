<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Cprofesiones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cprofesiones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'profesion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
