<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CprofesionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catálogo de profesiones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cprofesiones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Profesión', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'profesion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
