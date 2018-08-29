<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\grid\GridView;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => 'Datos Personales', 'url' => ['update', 'id' => $modelPersonal->id]];
$this->params['breadcrumbs'][] = ['label' => 'Documentos'];
$this->params['breadcrumbs'][] = 'Creando';
?>


<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menuizq', [ 'estado' => $estado]) ?>
    </div>
    <div class="col-md-9">
        <?php $form = ActiveForm::begin(['id' => 'dynamic-form', 'options'=>['enctype'=>'multipart/form-data']]); ?>
        <?= $form->field($modelPersonal, 'nombre', ['showLabels'=>false ])->hiddenInput(); ?>


        <?php
        echo $form->field($model, 'image[]')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*', 'multiple' => 'true'],
            'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png', 'pdf'],'showUpload' => false,],

        ]);
        ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar Actualización', ['class' => 'btn btn-success']) ?>
        </div>

        <?= GridView::widget([
            'dataProvider' => $archivos,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'filename',
                [
                    'format' => 'raw',
                    'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                    'value' => function ($data) {
                        return

                            Html::img(Url::to('@web/', true) .'uploads/' . $data->archivo, [
                                'alt'=>$data->filename,
                                'title'=>$data->filename,
                                'height'=>'100px', 'width'=>'100px'
                            ]);

                        // $data['name'] for array data, e.g. using SqlDataProvider.
                    },
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Acción',
                    'template' => '{delete}',
                    'buttons' => [
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('app', 'lead-delete'),
                                'data-confirm' => '¿Esta seguro de borrar, no se puede deshacer ?',
                                'data-method'  => 'post',
                            ]);
                        }

                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'delete') {
                            $url ='index.php?r=cvpersonal/delete-archivos&id='.$model->id;
                            return $url;
                        }

                    }



                ],
            ],
        ]); ?>

        <?php ActiveForm::end(); ?>

    </div>
</div>