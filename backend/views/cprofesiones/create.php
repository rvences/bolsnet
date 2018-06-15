<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cprofesiones */

$this->title = 'Nueva Profesion';
$this->params['breadcrumbs'][] = ['label' => 'Cat. Profesiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cprofesiones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
