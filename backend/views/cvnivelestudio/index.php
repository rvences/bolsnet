<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CvnivelestudioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nivel de Estudios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cvnivelestudio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}',
                //'template' => '{update} &nbsp;&nbsp; {delete}',
                'width'=>'25px',
            ],

            [
                'label' => 'Nivel de Estudio',
                'attribute' => 'cnivelestudio_id',
                'class' => 'kartik\grid\DataColumn',
                'value' => 'cnivelestudio.nivelestudio',
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\Cnivelestudios::find()->asArray()->orderBy('nivelestudio')->all(), 'id', 'nivelestudio'),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Nivel de Estudio'],
            ],

            [
                'label' => 'Profesión',
                'attribute' => 'cprofesion_id',
                'class' => 'kartik\grid\DataColumn',
                'value' => 'cprofesion.profesion',
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\Cprofesiones::find()->asArray()->orderBy('profesion')->all(), 'id', 'profesion'),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Profesión'],
            ],

            'escuela',
            //'certificado',
            //'titulo',
            //'cedula',
            [
                'label' => 'Aspirante',
                'attribute' => 'cvpersonal.nombrecompleto'
            ],
        ],
    ]); ?>
</div>
