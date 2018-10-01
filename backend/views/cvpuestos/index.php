<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CvpuestosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Puestos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cvpuestos-index largo">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php


    $gridColumns = [

        [
            // Lista la cantidad de columnas
            'class'=>'kartik\grid\SerialColumn',
            'width'=>'25px', // 'width'=>'1%',
        ],
        [
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
            //'template' => '{update} &nbsp;&nbsp; {delete}',
            'width'=>'25px',
        ],

        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'puestos_id',
            'value' => 'puestos.puesto',
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>\yii\helpers\ArrayHelper::map(\common\models\Cpuestos::find()->asArray()->orderBy('puesto')->all(), 'id', 'puesto'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Puesto'],
        ],

        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'seguimiento_id',
            'label' => 'Seguimiento',
            'value' => 'cvpersonal.seguimiento.seguimiento',
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>\yii\helpers\ArrayHelper::map(\common\models\Cseguimiento::find()->asArray()->orderBy('seguimiento')->all(), 'id', 'seguimiento'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Seguimiento'],
        ],

        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'buscar_nombre_completo',
        ],

        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'created_at',
            'label' => 'Fecha de Registro',
        ]

    ];

    echo GridView::widget([
        'summary' => "Mostrando <b>{begin} - {end}</b> de <b>{totalCount}</b> puestos solicitados",
        'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'responsive'=>true,
        'pjax' => true,
        'pjaxSettings'=>[		//<== ketambahan ini
            'neverTimeout'=>true,
        ],
        'hover'=>true
    ]);

    ?>


</div>
