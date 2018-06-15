<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cidiomas */

$this->title = 'Nuevo Idioma';
$this->params['breadcrumbs'][] = ['label' => 'Idioma', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cidiomas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
