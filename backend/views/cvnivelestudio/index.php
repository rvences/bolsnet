<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CvnivelestudioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nivel de Estudios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cvnivelestudio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',

            [
                    'label' => 'Nivel de Estudio',
                    'attribute' => 'cnivelestudio.nivelestudio',
            ],
            [
                    'label'=> 'Profesión',
                    'attribute' => 'cprofesion.profesion',
            ],
            'escuela',
            //'certificado',
            //'titulo',
            //'cedula',
            [
                'label' => 'Aspirante',
                'attribute' => 'cvpersonal.nombrecompleto'
            ],
            ['class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update}',
],
        ],
    ]); ?>
</div>
