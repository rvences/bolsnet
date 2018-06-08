<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\datecontrol\DateControl;


$this->params['breadcrumbs'][] = ['label' => 'Datos Personales', 'url' => ['update', 'id' => $modelPersonal->id]];
$this->params['breadcrumbs'][] = ['label' => 'Experiencia'];
$this->params['breadcrumbs'][] = 'Actualizando';
?>


<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menuizq') ?>
    </div>
    <div class="col-md-9">
        <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
        <?= $form->field($modelPersonal, 'nombre', ['showLabels'=>false ])->hiddenInput(); ?>

        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // required: css class selector
            'widgetItem' => '.item', // required: css class
            'limit' => 4, // the maximum times, an element can be added (default 999)
            'min' => 1, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $modelsExperiencia[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'empresa',
                'puesto',
                'actividad',
                'iniciopuesto',
                'finpuesto',
                'empleoactual',
            ],
        ]); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>
                    <i class="glyphicon glyphicon-book"></i> Experiencia de: <?=$modelPersonal->nombre . ' ' . $modelPersonal->apaterno . ' ' . $modelPersonal->amaterno?>
                    <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
                </h5>
            </div>
            <div class="panel-body">
                <div class="container-items"><!-- widgetBody -->
                    <?php foreach ($modelsExperiencia as $i => $modelExperiencia): ?>
                        <div class="item panel panel-default"><!-- widgetItem -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Experiencia</h3>
                                <div class="pull-right">
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i> Eliminar</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                // necessary for update action.
                                if (! $modelExperiencia->isNewRecord) {
                                    echo Html::activeHiddenInput($modelExperiencia, "[{$i}]id");
                                }
                                ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <?= $form->field($modelExperiencia, "[{$i}]empresa")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?= $form->field($modelExperiencia, "[{$i}]puesto")->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-12">
                                        <?= $form->field($modelExperiencia, "[{$i}]actividades")->textarea(['rows' =>5 , 'maxlength' => true]) ?>
                                    </div>
                                </div><!-- .row -->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php
                                        echo $form->field($modelExperiencia, "[{$i}]iniciopuesto")->widget(DateControl::classname(), [
                                            'type'=>DateControl::FORMAT_DATE,
                                            'ajaxConversion'=>false,
                                            'widgetOptions' => [
                                                'pluginOptions' => [
                                                    'autoclose' => true
                                                ]
                                            ]
                                        ]);
                                        ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?php
                                        echo $form->field($modelExperiencia, "[{$i}]finpuesto")->widget(DateControl::classname(), [
                                            'type'=>DateControl::FORMAT_DATE,
                                            'ajaxConversion'=>false,
                                            'widgetOptions' => [
                                                'pluginOptions' => [
                                                    'autoclose' => true
                                                ]
                                            ]
                                        ]);
                                        ?>
                                    </div>
                                    <div class="col-sm-4">


                                        <?= $form->field($modelExperiencia, "[{$i}]empleoactual")->radioList(['1' => 'Si', '0' => 'No']); ?>


                                    </div>
                                </div><!-- .row -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div><!-- .panel -->
        <?php DynamicFormWidget::end(); ?>

        <div class="form-group">
            <?= Html::submitButton($modelExperiencia->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>