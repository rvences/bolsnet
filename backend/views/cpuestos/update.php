<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cpuestos */

$this->title = 'Actualizar Puestos: ' . $model->puesto;
$this->params['breadcrumbs'][] = ['label' => 'Cat. Puestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->puesto, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cpuestos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
