<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cpuestos */

$this->title = 'Nuevo Puesto';
$this->params['breadcrumbs'][] = ['label' => 'Cat. Puestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cpuestos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
