<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CpuestosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cat. Puestos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cpuestos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo puesto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <h1>Es el catálogo de Puestos para el apartado de Puestos</h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'puesto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
