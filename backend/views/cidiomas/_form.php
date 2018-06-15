<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Cidiomas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cidiomas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idioma')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
