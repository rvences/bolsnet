<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Cvpuestos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cvpuestos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cvpersonal_id')->textInput() ?>

    <?= $form->field($model, 'puestos_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
