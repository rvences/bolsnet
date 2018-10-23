<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cvnivelestudio */

$this->title = 'Create Cvnivelestudio';
$this->params['breadcrumbs'][] = ['label' => 'Cvnivelestudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cvnivelestudio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
