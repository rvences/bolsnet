<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\field\FieldRange;
//use kartik\builder\Form;
use kartik\widgets\RangeInput;

/* @var $this yii\web\View */
/* @var $model common\models\OfertasLaborales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ofertas-laborales-form">

    <?php $form = ActiveForm::begin([
            //'type'=>ActiveForm::TYPE_VERTICAL,
            //'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL],
        ]
    ); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'actividades')->textarea(['rows'=>6]);?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'conocimientos')->textarea(['rows'=>6]);?>

        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'infoadicional')->textarea(['rows'=>6]);?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php
            $model->edad_minima = 16;
            $model->edad_maxima = 99;
            echo FieldRange::widget([
                'form' => $form,
                'model' => $model,
                'separator' => ' hasta ',
                'label' => 'Rango de Edad',
                'attribute1' => 'edad_minima',
                'attribute2' => 'edad_maxima',
                'type' => FieldRange::INPUT_SPIN,
            ]);
            ?>

        </div>

        <div class="col-md-3">
            <?php
            $model->sueldo = 5000;

            echo $form->field($model, 'sueldo')->widget(\kartik\number\NumberControl::classname(), [
                'maskedInputOptions' => [
                    'prefix' => '$ ',
                    'suffix' => ' MN',
                    'allowMinus' => false
                ],
            ]);
            ?>
        </div>

        <div class="col-md-2">
            <?php
            $model->experiencia = 1;

            echo $form->field($model, 'experiencia')->widget(\kartik\number\NumberControl::classname(), [
                'maskedInputOptions' => [
                    'suffix' => ' Años',
                    'allowMinus' => false
                ],
            ]);
            ?>
        </div>

        <div class="col-md-3">
            <?php
            $model->no_vacantes = 1;
            ?>
            <?= $form->field($model, 'no_vacantes')->textInput();?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php
            $data = ['Hombre' => 'Masculino', 'Mujer' => 'Femenino', 'Indistinto' => 'No Relevante' ];
            echo $form->field($model, 'sexo')->radioButtonGroup($data);?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'vigencia')
                ->widget(\kartik\datecontrol\DateControl::class, [

                    'displayFormat' => 'php:d-M-Y',
                'type'=>\kartik\datecontrol\DateControl::FORMAT_DATE,
            ])
            ?>
        </div>

        <div class="col-md-5">
            <?php
            $data = \yii\helpers\ArrayHelper::map(
                    \common\models\Cestadocivil::find()->asArray()
                        ->orderBy('estadocivil')->all(), 'id',
                function($model, $defaultValue) {
                    return $model['estadocivil'];
                });

            echo $form->field($model, 'estadocivil_id')->radioButtonGroup($data);?>
        </div>

    </div>


    <div class="row">
        <div class="col-md-4">
            <?php
            $data = \yii\helpers\ArrayHelper::map(
                \common\models\Chorario::find()->asArray()
                    ->orderBy('horario')->all(), 'id',
                function($model, $defaultValue) {
                    return $model['horario'];
                });
            echo $form->field($model, 'horario_id')->radioButtonGroup($data);?>
        </div>

        <div class="col-md-4">
            <?php
            $data = \yii\helpers\ArrayHelper::map(
                \common\models\Cpuestos::find()->asArray()
                    ->orderBy('puesto')->all(), 'id',
                function($model, $defaultValue) {
                    return $model['puesto'];
                });
            echo $form->field($model, 'puesto_id',['showLabels'=>true])->dropDownList($data, ['prompt'=>'[Seleccionar]']); ?>
        </div>

        <div class="col-md-4">
            <?php
            $data = \yii\helpers\ArrayHelper::map(
                \common\models\Ctcontratacion::find()->asArray()
                    ->orderBy('tcontratacion')->all(), 'id',
                function($model, $defaultValue) {
                    return $model['tcontratacion'];
                });
            echo $form->field($model, 'tcontratacion_id',['showLabels'=>true])->dropDownList($data, ['prompt'=>'[Seleccionar]']); ?>
        </div>

        <div class="col-md-4">
            <?php
            $data = \yii\helpers\ArrayHelper::map(
                \common\models\Cprofesiones::find()->asArray()
                    ->orderBy('profesion')->all(), 'id',
                function($model, $defaultValue) {
                    return $model['profesion'];
                });
            echo $form->field($model, 'profesion_id',['showLabels'=>true])->dropDownList($data, ['prompt'=>'[Seleccionar]']); ?>
        </div>

        <div class="col-md-4">
            <?php
            $data = \yii\helpers\ArrayHelper::map(
                \common\models\Cnivelestudios::find()->asArray()
                    ->orderBy('nivelestudio')->all(), 'id',
                function($model, $defaultValue) {
                    return $model['nivelestudio'];
                });
            echo $form->field($model, 'nivelestudio_id',['showLabels'=>true])->dropDownList($data, ['prompt'=>'[Seleccionar]']); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
