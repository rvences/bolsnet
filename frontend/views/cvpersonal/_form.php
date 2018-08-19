<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use common\models\Cvpersonal;
use yii\helpers\ArrayHelper;
use common\models\Cestadocivil;
/* @var $this yii\web\View */
/* @var $model common\models\Cvpersonal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menuizq', [ 'estado' => $estado]) ?>
    </div>
    <div class="col-md-9">

        <h5 class="encabezado"><?= Html::encode($this->title) ?></h5>
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-12">
                <?php
                $model->correo = Yii::$app->user->identity->username;
                ?>
                <?= $form->field($model, 'correo', ['showLabels'=>false ])->textInput(['maxlength' => true, 'placeholder' => 'Correo Electrónico', 'readonly'=>true]); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'nombre', ['showLabels'=>false])->textInput(['maxlength' => true, 'placeholder'=>'Nombre(s)']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'apaterno', ['showLabels'=>false])->textInput(['maxlength' => true, 'placeholder'=>'Apellido Paterno']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'amaterno', ['showLabels'=>false])->textInput(['maxlength' => true, 'placeholder'=>'Apellido Materno']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'rfc', ['showLabels'=>false])->textInput(['maxlength' => true, 'placeholder'=>'RFC']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'curp', ['showLabels'=>false])->textInput(['maxlength' => true, 'placeholder'=>'CURP']) ?>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'sexo')->dropDownList(Cvpersonal::catSexo(), ['prompt' =>'[ Selecciona ]']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'fnac')
                    ->widget(\kartik\datecontrol\DateControl::class, [
                        'displayFormat' => 'php:d-M-Y',
                        'type'=>\kartik\datecontrol\DateControl::FORMAT_DATE,
                    ])
                ?>
            </div>
            <div class="col-md-4">
                <?php $lista = ArrayHelper::map(Cestadocivil::find()->asArray()->all(), 'id', 'estadocivil');
                echo $form->field($model, 'estadocivil_id')->dropDownList($lista, ['prompt' => '[ Selecciona ]']);
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'tel_ofna')->textInput(['maxlength' => true, 'placeholder' => 'Teléfono Oficina']); ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'tel_ofna_ext')->textInput(['maxlength' => true, 'placeholder' => 'Extensión']); ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'tel_movil')->textInput(['maxlength' => true, 'placeholder' => 'Móvil']); ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'tel_casa_lada')->textInput(['maxlength' => true, 'placeholder' => 'LADA']); ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'tel_casa')->textInput(['maxlength' => true, 'placeholder' => 'Casa']); ?>
            </div>

        </div>

        <h5 class="encabezado">Dirección Física</h5>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'calle', ['showLabels'=>false])->textInput(['maxlength' => true, 'placeholder'=>'Calle']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'numero', ['showLabels'=>false])->textInput(['maxlength' => true, 'placeholder'=>'Número Exterior e Interior']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'entrecalle', ['showLabels'=>false])->textInput(['maxlength' => true, 'placeholder'=>'Entre Calles']) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'colonia', ['showLabels'=>false])->textInput(['maxlength' => true, 'placeholder'=>'Colonia']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'cp', ['showLabels'=>false])->textInput(['maxlength' => true, 'placeholder'=>'Código Postal']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'municipio', ['showLabels'=>false])->textInput(['maxlength' => true, 'placeholder'=>'Municipio']) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php
                $lista = ArrayHelper::map(\common\models\Centfeds::find()->asArray()->all(), 'id', 'entidad');
                echo $form->field($model, 'entfed_id', ['showLabels'=>false])->dropDownList($lista, ['prompt' => '[ Selecciona ] ']); ?>
            </div>
        </div>



        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>











    </div>
</div>

<div class="cvpersonal-form">



</div>
