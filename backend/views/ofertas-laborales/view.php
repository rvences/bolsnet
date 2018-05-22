<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OfertasLaborales */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ofertas Laborales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ofertas-laborales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro que quiere eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'actividades:ntext',
            'conocimientos:ntext',
            'infoadicional:ntext',
            'edad_minima',
            'edad_maxima',
            'sueldo',
            'experiencia',
            'no_vacantes',
            'sexo',
            'vigencia',
            'puesto_id',
            'estadocivil_id',
            'horario_id',
            'tcontratacion_id',
            'profesion_id',
            'nivelestudio_id',
            'empresa_id',
            'estadovacante_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
