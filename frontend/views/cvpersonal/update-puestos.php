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
            'limit' => 2, // the maximum times, an element can be added (default 999)
            'min' => 1, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $modelsPuesto[0],
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
                    <i class="glyphicon glyphicon-book"></i> Puesto a aplicar: <?=$modelPersonal->nombre . ' ' . $modelPersonal->apaterno . ' ' . $modelPersonal->amaterno?>
                    <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
                </h5>
            </div>
            <div class="panel-body">
                <div class="container-items"><!-- widgetBody -->
                    <?php foreach ($modelsPuesto as $i => $modelPuesto): ?>
                        <div class="item panel panel-default"><!-- widgetItem -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Puesto</h3>
                                <div class="pull-right">
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i> Eliminar</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                // necessary for update action.
                                if (! $modelPuesto->isNewRecord) {
                                    echo Html::activeHiddenInput($modelPuesto, "[{$i}]id");
                                }
                                ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php
                                        $lista = ArrayHelper::map(\common\models\Cpuestos::find()->asArray()->all(), 'id', 'puesto');
                                        echo $form->field($modelPuesto, "[{$i}]puestos_id")->dropDownList($lista, ['prompt' => '[ Selecciona ]']) ?>
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
            <?= Html::submitButton($modelPuesto->isNewRecord ? 'Guardar' : 'Guardar Actualización', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>