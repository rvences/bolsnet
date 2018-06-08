<?php
/* @var $this yii\web\View */
/* @var $model common\models\Cvpersonal */

$this->title = 'Actualizando la Información de: ' . $model->nombre . ' ' . $model->apaterno;
$this->params['breadcrumbs'][] = ['label' => 'Datos Personales'];
$this->params['breadcrumbs'][] = 'Actualizando';
?>
<div class="cvpersonal-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
