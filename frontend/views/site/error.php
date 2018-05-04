<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <p>Hubo un error al tratar de procesar su solicitud, lo identificamos como: <b> <?= nl2br(Html::encode($message)) ?></b></p>
        <p>Por favor contáctenos, si considera que este es un problema del servidor</p>
    </div>



</div>
