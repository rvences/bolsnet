<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CvpersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'CV Aspirantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cvpersonal-index">

    <h1><?= Html::encode($this->title) ?></h1>


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
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'seguimiento_id',
            'label' => 'Seguimiento',
            'value' => 'seguimiento.seguimiento',
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>\yii\helpers\ArrayHelper::map(\common\models\Cseguimiento::find()->asArray()->orderBy('seguimiento')->all(), 'id', 'seguimiento'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Seguimiento'],

            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'asPopover' => false,
                    'formOptions'=>['action'=>Url::to(['cvpersonal/change','id'=>$model->id])],
                    'buttonsTemplate' => '{submit}',
                    'showButtonLabels' => true,
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_SELECT2, // http://demos.krajee.com/editable
                    'options' => [
                        'data' => \yii\helpers\ArrayHelper::map(\common\models\Cseguimiento::find()->all(), 'id', 'seguimiento'),
                    ]
                ];
            }
        ],

        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'buscar_nombre_completo',
        ],

        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'telefono',
            'width'=>'140px', // 'width'=>'7%',
            'value'=>function ($model, $key, $index, $widget) {
                $telefono = '';
                if ( $model->tel_ofna) {
                    $telefono .= ' Oficina ' . $model->tel_ofna;
                    if ($model->tel_ofna_ext) {
                        $telefono .= ' Ext ' . $model->tel_ofna_ext;
                    }
                }
                if ($model->tel_movil) {
                    $telefono .= ' Celular ' . $model->tel_movil;
                }

                if ($model->tel_casa) {
                    $telefono .= ' Casa ';
                    if ($model->tel_casa_lada) {
                        $telefono .= $model->tel_casa_lada;
                    }
                    $telefono .= $model->tel_casa;
                }
                return $telefono;
            },

        ],




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

