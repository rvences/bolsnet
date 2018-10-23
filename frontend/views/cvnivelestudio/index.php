<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CvnivelestudioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cvnivelestudios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cvnivelestudio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cvnivelestudio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cvpersonal_id',
            'cnivelestudio_id',
            'cprofesion_id',
            'escuela',
            //'certificado',
            //'titulo',
            //'cedula',
            //'nivelestudios_id',
            //'ffin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
