<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OfertasLaboralesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ofertas Laborales';
?>
<div class="ofertas-laborales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Ofertas Laborales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'estadovacante.estadovacante',
            'no_vacantes',
            'sexo',
            'vigencia',
            'puesto.puesto',

            //'actividades:ntext',
            //'conocimientos:ntext',
            //'infoadicional:ntext',
            //'edad_minima',
            //'edad_maxima',
            //'sueldo',
            //'experiencia',
            //'no_vacantes',
            //'sexo',
            //'vigencia',
            //'puesto_id',
            //'estadocivil_id',
            //'horario_id',
            //'tcontratacion_id',
            //'profesion_id',
            //'nivelestudio_id',
            //'empresa_id',
            //'estadovacante_id',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
