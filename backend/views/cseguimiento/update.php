<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cseguimiento */

$this->title = 'Actualizar Seguimiento: ' . $model->seguimiento;
$this->params['breadcrumbs'][] = ['label' => 'Ca. Seguimiento', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->seguimiento, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cseguimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
