<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;

$this->params['breadcrumbs'][] = ['label' => 'Datos Personales', 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => 'Estudios Académicos'];
$this->params['breadcrumbs'][] = 'Actualizando';
?>

<?php /*
echo "<pre>";
print_r($model);
echo "</pre>"; */
?>
<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menuizq', [ 'estado' => $estado]) ?>
    </div>
    <div class="col-md-9">
        <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
        <?= $form->field($model, 'nombre', ['showLabels'=>false ])->hiddenInput(); ?>

        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // required: css class selector
            'widgetItem' => '.item', // required: css class
            'limit' => 4, // the maximum times, an element can be added (default 999)
            'min' => 1, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $modelsNE[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'escuela',
                'certificado',
                'titulo',
                'cedula',

            ],
        ]); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>
                    <i class="glyphicon glyphicon-book"></i> Estudios Académicos de: <?=$model->nombre . ' ' . $model->apaterno . ' ' . $model->amaterno?>
                    <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
                </h5>
            </div>
            <div class="panel-body">
                <div class="container-items"><!-- widgetBody -->
                    <?php foreach ($modelsNE as $i => $modelNE): ?>
                        <div class="item panel panel-default"><!-- widgetItem -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Documento</h3>
                                <div class="pull-right">
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i> Eliminar</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                // necessary for update action.
                                if (! $modelNE->isNewRecord) {
                                    echo Html::activeHiddenInput($modelNE, "[{$i}]id");
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $form->field($modelNE, "[{$i}]escuela")->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <?php $lista = ArrayHelper::map(\common\models\Cnivelestudios::find()->asArray()->all(), 'id', 'nivelestudio');
                                        echo $form->field($modelNE, "[{$i}]cnivelestudio_id")->dropDownList($lista, ['prompt' => '[Selecciona]']);
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php $lista = ArrayHelper::map(\common\models\Cprofesiones::find()->asArray()->all(), 'id', 'profesion');
                                        echo $form->field($modelNE, "[{$i}]cprofesion_id")->dropDownList(
                                            ArrayHelper::map(\common\models\Cprofesiones::find()->asArray()->all(), 'id', 'profesion')

                                                , ['prompt' => '[Selecciona]']);
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($modelNE, "[{$i}]certificado")->checkbox(['checked' => false]); ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($modelNE, "[{$i}]titulo")->checkbox(['checked' => false]); ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($modelNE, "[{$i}]cedula")->checkbox(['checked' => false]); ?>
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
            <?= Html::submitButton($modelNE->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>





