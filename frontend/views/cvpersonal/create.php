<?php
/* @var $this yii\web\View */
/* @var $model common\models\Cvpersonal */

$this->title = 'Mis Datos Personales';
$this->params['breadcrumbs'][] = ['label' => 'Datos Personales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cvpersonal-create">

    <?= $this->render('_form', [
        'model' => $model,
        'estado' => 0,
    ]) ?>

</div>
