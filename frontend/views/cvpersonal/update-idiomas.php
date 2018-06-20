<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;

$this->params['breadcrumbs'][] = ['label' => 'Datos Personales', 'url' => ['update', 'id' => $modelPersonal->id]];
$this->params['breadcrumbs'][] = ['label' => 'Puestos'];
$this->params['breadcrumbs'][] = 'Actualizando';
?>


<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menuizq', [ 'estado' => $estado]) ?>
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
            'model' => $modelsIdioma[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'idiomas_id',
                'habla',
                'lee',
                'escribe',
            ],
        ]); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>
                    <i class="glyphicon glyphicon-book"></i> Idiomas de: <?=$modelPersonal->nombre . ' ' . $modelPersonal->apaterno . ' ' . $modelPersonal->amaterno?>
                    <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
                </h5>
            </div>
            <div class="panel-body">
                <div class="container-items"><!-- widgetBody -->
                    <?php foreach ($modelsIdioma as $i => $modelIdioma): ?>
                        <div class="item panel panel-default"><!-- widgetItem -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Idioma</h3>
                                <div class="pull-right">
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i> Eliminar</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                // necessary for update action.
                                if (! $modelIdioma->isNewRecord) {
                                    echo Html::activeHiddenInput($modelIdioma, "[{$i}]id");
                                }
                                ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php
                                        $lista = ArrayHelper::map(\common\models\Cidiomas::find()->asArray()->all(), 'id', 'idioma');
                                        echo $form->field($modelIdioma, "[{$i}]idiomas_id")->dropDownList($lista, ['prompt' => '[ Selecciona ]']) ?>
                                    </div>
                                    <div class="col-sm-2">
                                        <?= $form->field($modelIdioma, "[{$i}]habla")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-2">
                                        <?= $form->field($modelIdioma, "[{$i}]lee")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-2">
                                        <?= $form->field($modelIdioma, "[{$i}]escribe")->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>


                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div><!-- .panel -->
        <?php DynamicFormWidget::end(); ?>

        <div class="form-group">
            <?= Html::submitButton($modelIdioma->isNewRecord ? 'Guardar' : 'Guardar Actualización', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>