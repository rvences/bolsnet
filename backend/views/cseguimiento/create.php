<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cseguimiento */

$this->title = 'Nuevo Seguimiento';
$this->params['breadcrumbs'][] = ['label' => 'Cat. Seguimiento', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cseguimiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
