<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\file\FileInput;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Cvpersonal;
use common\models\Cestadocivil;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Cvpersonal */

$this->title = 'CV de ' . $model->nombre . ' ' . $model->apaterno . ' ' . $model->amaterno;
$this->params['breadcrumbs'][] = ['label' => 'CV Aspirantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="cvpersonal-view">

    <h3>Datos Personales</h3>

    <div class="row bg-dark">
        <div class="col-md-6">
            <strong>Nombre: </strong> <?php echo $model->nombre . ' ' . $model->apaterno . ' ' . $model->amaterno; ?>
        </div>
        <div class="col-md-3"><strong>RFC: </strong> <?=$model->rfc; ?></div>
        <div class="col-md-3"><strong>CURP: </strong> <?=$model->curp; ?></div>
    </div>
    <div class="row bg-light">
        <div class="col-md-1"><strong>Sexo: </strong> <?=$model->sexo; ?></div>
        <div class="col-md-3"><strong>Fecha Nacimiento: </strong> <?=$model->fnac; ?></div>
        <div class="col-md-4"><strong>Estado Civil: </strong> <?=($model->estadocivil_id > 0 ? $model->estadocivil->estadocivil : ''); ?></div>
        <div class="col-md-4"><strong>Correo: </strong> <?=$model->correo; ?></div>
    </div>
    <div class="row bg-dark">
        <div class="col-md-3"><strong>Tel Oficina: </strong><?=$model->tel_ofna; ?> Ext: <?=$model->tel_ofna_ext; ?></div>
        <div class="col-md-3"><strong>Tel Móvil: </strong> <?=$model->tel_movil; ?></div>
        <div class="col-md-3"><strong>Tel Casa: </strong> (<?=$model->tel_casa_lada; ?> ) <?=$model->tel_casa; ?></div>
    </div>

    <div class="row bg-light">
        <div class="col-md-12"><strong>Dirección: </strong>
            <?=$model->calle; ?> No: <?=$model->numero; ?> Entre <?=$model->entrecalle?>
            Colonia: <?=$model->colonia ?> CP: <?=$model->cp;?>
            Municipio: <?=$model->municipio; ?> Estado: <?= ($model->entfed_id > 0 ? $model->entfed->entidad : '' ); ?>

        </div>

    </div>

    <h3>Estudios Académicos</h3>

    <?php foreach ($estudios as $estudio) { ?>
        <div class="row bg-dark">
            <div class="col-md-12">
                <strong><?=$estudio->cnivelestudio->nivelestudio?></strong>
                <?php if ($estudio->cprofesion_id > 0) { echo "<strong>Profesión: </strong>" . $estudio->cprofesion->profesion; } ?>
                    <?php if ($estudio->certificado > 0) { echo " Certificado " ; } ?>
                    <?php if ($estudio->titulo > 0) { echo " Título "; } ?>
                    <?php if ($estudio->cedula > 0) { echo " Cédula "; } ?>
                </strong><strong>Escuela: </strong> <?php echo $estudio->escuela ; ?>
            </div>
        </div>
    <?php } ?>

    <h3>Experiencia</h3>

    <?php foreach ($experiencias as $experiencia) { ?>
        <div class="row bg-dark">
            <div class="col-md-6"> <strong><?=$experiencia->puesto ?></strong>  <?=$experiencia->empresa ?> </div>
            <div class="col-md-4">de: <?= $experiencia->iniciopuesto ?> a <?=$experiencia->finpuesto ?></div>
            <div class="col-md-2 <?php if ($experiencia->empleoactual == 1) { echo 'bg-primary';} ?>"> <?php if ($experiencia->empleoactual == 1) { echo "Empleo Actual";} ?> </div>
        </div>

        <div class="row bg-light">
            <div class="col-md-10"><?=$experiencia->actividades;?></div>
        </div>

    <?php } ?>

    <h3>Puestos de interés</h3>

    <?php foreach ($puestos as $puesto) { ?>
        <div class="row bg-dark">
            <div class="col-md-10"> <strong><?=$puesto->puestos->puesto ?></strong>  </div>
        </div>

    <?php } ?>

    <h3>Cursos</h3>

    <?php foreach ($cursos as $curso) { ?>
        <div class="row bg-dark">
            <div class="col-md-6"> <strong><?=$curso->curso ?></strong>  <?=$curso->escuela ?> </div>
            <div class="col-md-4">de: <?= $curso->iniciocurso ?> a <?=$curso->fincurso ?></div>
            <div class="col-md-2"> <?php if ($curso->estado == 1) echo "Finalizado"; else echo "Trunco"; ?> </div>
        </div>
    <?php } ?>

    <h3>Idiomas</h3>

    <?php foreach ($idiomas as $idioma) { ?>
        <div class="row bg-dark">
            <div class="col-md-6"> <strong><?=$idioma->idiomas->idioma ?></strong>
                <?php echo "Hablado (" . $idioma->habla . ")%";?>
                <?php echo "Escrito (" . $idioma->escribe . ")%";?>
                <?php echo "Comprensión (" . $idioma->lee . ")%";?>
            </div>
        </div>
    <?php } ?>

    <h3>Documentos</h3>
    <?php
    $allimage = array();
    foreach ($archivos as $index => $archivo) {
        $allimage[] =  Url::base(true) . '/../uploads/'.$archivo->archivo;
        $imagesOptions[] = ['caption' => $archivo->filename, 'downloadUrl'=>Url::base(true) . '/../uploads/'.$archivo->archivo];
    }

    if (!empty($allimage)) {
        echo FileInput::widget([
            'name' => 'documentos[]',
            'pluginOptions' => [
                'initialPreview'=>$allimage,
                'initialPreviewAsData'=>true,
                'showUpload' => false,
                'initialPreviewConfig' => $imagesOptions,

                //'overwriteInitial'=>false,

            ]
        ]);
    } else {
        echo "<p>No se han indicado archivos</p>";
    }


    ?>

</div>
