<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CidiomasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cat. Idiomas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cidiomas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Idioma', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <h1>Es el catálogo de Idiomas para el apartado de Idiomas</h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idioma',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
