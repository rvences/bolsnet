<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\OfertasLaboralesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ofertas Laborales Disponibles';
?>
<div class="ofertas-laborales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>Listado de las ofertas laborales que tiene disponibles el Ayuntamiento de Xalapa en este momento.</p>
    <p>Para más información respecto a estas ofertas laborales, favor de dirigirse al área de recursos humanos del Ayuntamiento.</p>
    <p>Todavía NO puedes publicar tu información personal, ni tu CV; estamos trabajando para que lo puedas incluir próximamente.</p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'puesto.puesto',
            'sueldo',
            'horario.horario',
            'sexo',
            'tcontratacion.tcontratacion',
            'actividades:ntext',
            'conocimientos:ntext',
            'infoadicional:ntext',
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

        ],
    ]); ?>
</div>
