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
            <p>Indicar que rago de edad es la que puede ser considerada para la vacante</p>
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
            <p>Cual es el sueldo que se va a pagar de forma mensual a la persona que ocupe la vacante</p>
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
            <p>¿Cuantos años de experiencia mínima se requieren para ocupar el puesto ?</p>
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
            <p>¿Cuantas vacantes estas disponibles para este puesto ?</p>
            <?php
            $model->no_vacantes = 1;
            ?>
            <?= $form->field($model, 'no_vacantes')->textInput();?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <p>Indicar si es relevante filtrar la información de los CV de acuerdo al Sexo del aspirante</p>
            <?php
            $data = ['Hombre' => 'Masculino', 'Mujer' => 'Femenino', 'Indistinto' => 'No Relevante' ];
            echo $form->field($model, 'sexo')->radioButtonGroup($data);?>
        </div>

        <div class="col-md-3">
            <p>Indicar cuanto tiempo va a estar disponible la vacante, sin importar si existen aspirantes o NO</p>
            <?= $form->field($model, 'vigencia')
                ->widget(\kartik\datecontrol\DateControl::class, [

                    'displayFormat' => 'php:d-M-Y',
                'type'=>\kartik\datecontrol\DateControl::FORMAT_DATE,
            ])
            ?>
        </div>

        <div class="col-md-5">
            <p>Indicar que estado civil debe de tener el aspirante para ser considerado para la vacante </p>
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
            <p>Indicar en que horario esta disponible la vacante</p>
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
            <p>Se requiere el catálogo de puestos de Ayuntamiento de Xalapa para incluirlos y poder seleccionar
            posteriormente el puesto que esta vacante</p>
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
            <p>Indicar el tipo de contratación que se va a utilizar en la vacante</p>
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
            <p>Se requiere el catálogo de las profesiones con las que se cuenta en el Ayuntamiento, para poder filtrar que profesión
            debe de tener el aspirante</p>
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
            <p>Indicar cual es el nivel de estudio que se requiere para la vacante</p>
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
