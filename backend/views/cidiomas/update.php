<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cidiomas */

$this->title = 'Actualizar Cat. Idiomas: ' . $model->idioma;
$this->params['breadcrumbs'][] = ['label' => 'Cat Idiomas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idioma, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cidiomas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
