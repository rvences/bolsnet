<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Cpuestos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cpuestos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'puesto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
