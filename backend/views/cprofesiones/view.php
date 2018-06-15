<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Cprofesiones */

$this->title = $model->profesion;
$this->params['breadcrumbs'][] = ['label' => 'Cat. Profesiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cprofesiones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro que lo quiere borrar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'profesion',
        ],
    ]) ?>

</div>
