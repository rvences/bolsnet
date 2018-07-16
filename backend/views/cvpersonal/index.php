<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CvpersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'CV Aspirantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cvpersonal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            'nombre',
            'apaterno',
            'amaterno',
            //'rfc',
            //'curp',
            //'fnac',
            //'estadocivil_id',
            'sexo',
            //'tel_ofna',
            //'tel_ofna_ext',
            //'tel_movil',
            //'tel_casa_lada',
            //'tel_casa',
            //'correo',
            //'entfed_id',
            //'municipio',
            //'colonia',
            //'cp',
            //'calle',
            //'numero',
            //'entrecalle',
            //'created_at',
            //'updated_at',


            [
                    'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update}',
            ],
        ],
    ]); ?>
</div>

