<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registrate en la Bolsa de Trabajo';
?>
<div class="site-signup">

    <div class="jumbotron row">
        <div class="col-lg-7">

            <h2>Crea una nueva cuenta:</h2>

            <p>Estas a un paso para poder formar parte de los aspirantes a la bolsa de trabajo.</p>

            <p>Registra la información que se te solicita.</p>

            <p>Recuerda que este servicio es gratuito.</p>


        </div>


        <div class="col-lg-5">
            <h2>Registrarte</h2>


            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Usuario nuevo', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>






</div>
