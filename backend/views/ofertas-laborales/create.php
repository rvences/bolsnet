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

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
