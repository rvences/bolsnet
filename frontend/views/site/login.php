<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Bolsnet Xalapa';
?>
<div class="site-index">


    <div class="jumbotron row">
        <div class="col-lg-7">

            <h2>Estimado usuario:</h2>

            <p>Bolsnet es un espacio creado para aspirantes en busca de empleo, dentro del Ayuntamiento de Xalapa,
                el registro es gratuito y en este apartado podrán consultar las vacantes de empleo así como los requisitos y perfil necesario.</p>

            <p>Para poder consultar las vacantes debes estar registrado.</p>
            <p>Recuerda que este servicio es gratuito.</p>

            <p><a class="btn btn-lg btn-success" href="">Ver vacantes</a></p>

        </div>


        <div class="col-lg-5">
            <h2>Inicio de Sesión</h2>


            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div style="color:#999;margin:1em 0">
                Si olvido su contraseña, la puede solicitar <?= Html::a('aquí', ['site/request-password-reset']) ?>.
            </div>

            <div class="form-group">
                <?= Html::submitButton('Acceder', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>


</div>
