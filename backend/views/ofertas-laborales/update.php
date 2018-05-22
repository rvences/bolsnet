<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OfertasLaborales */

$this->title = 'Actualizar Oferta Laboral de: ' . $model->puesto->puesto;
$this->params['breadcrumbs'][] = ['label' => 'Ofertas Laborales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="ofertas-laborales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
