<?php

$js = <<<SCRIPT
$(function(){ $("[data-toggle='popover']").popover();
});
SCRIPT;
$this->registerJs($js);
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use common\models\Cvpersonal;
use yii\helpers\ArrayHelper;
use common\models\Cestadocivil;
use kartik\popover\PopoverX;
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
                <?= $form->field($model, 'rfc', ['showLabels'=>false])->textInput(['maxlength' => true, 'placeholder'=>'RFC', 'style'=>'text-transform:uppercase']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'curp', ['showLabels'=>false])->textInput(['maxlength' => true, 'placeholder'=>'CURP', 'style'=>'text-transform:uppercase']) ?>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'sexo')->dropDownList(Cvpersonal::catSexo(), ['prompt' =>'[ Selecciona ]']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'fnac')
                    ->widget(\kartik\datecontrol\DateControl::className(), [
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
                echo $form->field($model, 'entfed_id')->dropDownList($lista, ['prompt' => '[ Selecciona ] ']); ?>
            </div>
        </div>




        <div class="row">

            <div class="col-md-9">

                <?= Html::submitButton('Guardar y aceptar Aviso de Privacidad', ['class' => 'btn btn-success']) ?>


                <?php

                $contenido = '                                 
<p>La Dirección de Recursos Humanos del H. Ayuntamiento de Xalapa, Veracruz con domicilio en Palacio Municipal calle: Enríquez S/N, zona Centro, C.P 91000, Xalapa-Enríquez, Veracruz, es la responsable del tratamiento de los datos personales que nos proporcione, los cuales serán protegidos conforme a los dispuesto por la Ley 316 de Protección de Datos Personales en Posesión de Sujetos Obligados para el Estado de Veracruz de Ignacio de la Llave y demás normatividad que resulte aplicable.</p>
<p>Le comunicamos que los Datos Personales recabados serán protegidos, incorporados y tratados en el Sistema denominado <b>“Bolsa de Trabajo”</b> de la <b>Dirección de Recursos Humanos</b> del H. AYUNTAMIENTO DE XALAPA. Así mismo, se le informa que la finalidad de recabarlos es para apoyar la inserción de la Ciudadanía en el campo laboral y a su vez
fortalecer las áreas del H. Ayuntamiento. Así también, se le informa que sus datos son resguardados con las medidas de seguridad de nivel básico y no podrán ser difundidos sin su consentimiento expreso, salvo las excepciones previstas en la Ley y en el Reglamento. Para este caso, como complemento de esta Declarativa de Privacidad, se adjunta el <b>ANEXO 1. Términos y Condiciones de Uso de Bolsa de Trabajo del H. Ayuntamiento.</b></p>
<p>Los datos personales que recabamos de Usted se utilizarán para las siguientes finalidades: para llevar un registro y seguimiento a las personas que ingresan documentación a la bolsa de trabajo del Ayuntamiento y hacer uso de la bolsa de trabajo cuando las circunstancias lo requieran.</p>
<p>El fundamento para el tratamiento de datos personales y transferencias son los artículos 39, 40 y 41 de la Ley 316 de Protección de Datos Personales en Posesión de Sujetos Obligados Para el Estado de Veracruz de Ignacio de la Llave.</p>
<p>Adicionalmente los indicados en nuestro Aviso de privacidad que a saber son:</p>
<p>Artículos 43, 48, 49, 52, 85 fracción II de la Ley General de protección de Datos Personales en Posesión de Sujetos Obligados y 60,66, 67, 68, 73,82, fracción II, 133 y 155 de la Ley de Protección de Datos Personales en Posesión de Sujetos Obligados para el Estado de Veracruz de Ignacio de la Llave, Artículos 93 y 94 fracción XIII del Reglamento de la Administración Pública Municipal.</p>
<p><b>Datos de la Unidad Transparencia y Acceso a la Información Pública</b></p>
<p>Domicilio: Avenida Enríquez, s/n, Colonia Centro Código Postal 9100, Xalapa Enríquez, Veracruz. Teléfono: (228) 1650938, correo electrónico institucional: transparencia@xalapa.gob.mx y para mayor información visite la siguiente página: http://ayuntamiento.xalapa.gob.mx/web/transparencia-y-acceso-a-la-información/datospersonales en la sección de datos personales.</p>

<p><b>Términos y condiciones de uso de Bolsa de Trabajo del H. Ayuntamiento de Xalapa</b></p>

<p>Por medio de los presentes términos y condiciones, el H. Ayuntamiento manifiesta que su bolsa de trabajo es una herramienta cuyo medio será contactar a ciudadanos solicitantes de empleo obligándose a respetar la confidencialidad de la Información registrada.</p>
<p><b>El Ciudadano que ingrese sus datos en esta plataforma acepta cada uno de los siguientes incisos y se obliga a ellos.</b></p>
<ol>
<li>La plataforma Bolsa de Trabajo únicamente es un medio de enlace entre el H. Ayuntamiento y los ciudadanos con el objeto de identificar a candidatos capacitados. </li>
<li>Los presentes términos y condiciones excluyen a la Bolsa de Trabajo de cualquier obligación o responsabilidad de otorgar al ciudadano registrado una fuente de empleo o de que el H. Ayuntamiento encuentre al candidato idóneo</li>
<li>Cualquier ciudadano registrado en la Bolsa de Trabajo tendrá en todo momento la posibilidad de actualizar sus datos personales. Los usuarios son responsables de la actualización y mantenimiento de su respectiva información.</li>
<li>Se encuentra estrictamente prohibido publicar en Bolsa de Trabajo del H. Ayuntamiento información sexualmente explícita, obscena, difamatoria, amenazante, acosadora, abusiva, dañina o cualquier cosa que sea embarazosa u ofensiva para otra persona o entidad.</li>
<li>La información que sea encontrada y viole el punto 4, mencionado anteriormente, será removida y al ciudadano se le podrá retirar el acceso al portal y/o a los servicios a criterio exclusivo de Bolsa de Trabajo.</li>
<li>El ciudadano se compromete a no revelar su contraseña personal de acceso a terceros, especialmente a quienes no formen parte de sus personas de confianza.</li>
<li>El ciudadano no podrá postularse al empleo a nombre de otras personas de ninguna manera.</li>
<li>El ciudadano deberá tener siempre en cuenta que la congruencia y veracidad de sus datos personales capturados en la Bolsa de Trabajo son en su propio interés y acrecientan sus posibilidades de concretar una búsqueda exitosa de empleo, ya que su información proporcionada tiene como principal destinatario a su potencial empleador. </li>
<li>Al utilizar los servicios de Bolsa de Trabajo, el ciudadano autoriza al H. Ayuntamiento de Xalapa el tratamiento de sus datos personales únicamente para fines de la demanda laboral. </li>
<li>Cualquier ciudadano que no acepte estos términos y condiciones de uso deberá abstenerse de utilizar los servicios de Bolsa de Trabajo del H. Ayuntamiento. </li>
<li>Finalidades del tratamiento. Los datos personales que recabamos de Usted, los utilizaremos para las siguientes finalidades: Para llevar un registro y seguimiento a las personas que ingresan documentación a la bolsa de trabajo del Ayuntamiento - Haciendo uso de la bolsa de trabajo cuando las circunstancias lo requieran.</li>
</ol>
<p>Bolsa de Trabajo se reserva el derecho a denegar o retirar el acceso al portal, en cualquier momento y sin necesidad de preaviso, a aquellos usuarios que incumplan estos términos y condiciones o las condiciones particulares que resulten de la aplicación.</p>
<p>Bolsa de Trabajo y el Honorable Ayuntamiento de Xalapa, podrán revisar estos términos y condiciones en cualquier momento y actualizar su contenido sin previo aviso.</p>
<p>Última modificación de los Términos y condiciones de uso de Bolsa de Trabajo: 16/10/2018</p>
<br>

                ';


                echo PopoverX::widget([
                    'header' => 'Aviso de Privacidad',
                    'placement'=> PopoverX::ALIGN_BOTTOM_LEFT,
                    'type' => PopoverX::TYPE_WARNING,
                    'size'=> PopoverX::SIZE_LARGE,
                    'content' => $contenido,
                    'toggleButton' => ['label'=>'Aviso de Privacidad', 'class'=>'btn btn-warning']

                ]);

                ?>


            </div>
        </div>




        <div class="form-group">


        </div>

        <?php ActiveForm::end(); ?>











    </div>
</div>

<div class="cvpersonal-form">



</div>
