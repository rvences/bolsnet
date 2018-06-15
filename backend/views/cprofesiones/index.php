<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CprofesionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cat. Profesiones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cprofesiones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Profesión', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <h1>Es el catálogo de Profesión para el apartado de Estudios Académicos</h1>
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
