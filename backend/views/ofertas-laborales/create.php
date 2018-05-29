<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OfertasLaborales */

$this->title = 'Nueva Oferta laboral';
$this->params['breadcrumbs'][] = ['label' => 'Ofertas Laborales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ofertas-laborales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>En este apartado es donde se registran las vacantes que van a poder ver los aspirantes una vez que se hayan registrado</p>


    <p>Indicar que Actividades o conocimientos debe de tener el aspirante a la vacante, para que pueda saber si cumple con los requisitos previos</p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
