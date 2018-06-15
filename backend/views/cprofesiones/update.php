<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cprofesiones */

$this->title = 'Actualizar Profesión: ' . $model->profesion;
$this->params['breadcrumbs'][] = ['label' => 'Cat Profesiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->profesion, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cprofesiones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
