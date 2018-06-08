<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Cvpersonal */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cvpersonals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cvpersonal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'apaterno',
            'amaterno',
            'rfc',
            'curp',
            'fnac',
            'estadocivil_id',
            'sexo',
            'tel_ofna',
            'tel_ofna_ext',
            'tel_movil',
            'tel_casa',
            'correo',
            'entfed_id',
            'municipio',
            'colonia',
            'cp',
            'calle',
            'numero',
            'entrecalle',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
