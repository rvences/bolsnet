<?php
use yii\helpers\Html;
?>

<ul>
    <li><?php echo Html::a('Datos Personales', ['cvpersonal/index']); ?></li>
    <li><?php echo ($estado > 0) ? Html::a('Estudios Académicos', ['cvpersonal/update-nivel-estudio']) : "Estudios Académicos" ; ?></li>
    <li><?php echo ($estado > 1) ? Html::a('Experiencia', ['cvpersonal/update-experiencia']) : "Experiencia" ; ?></li>
    <li><?php echo ($estado > 2) ? Html::a('Puesto ( Cuando exista vacante)', ['cvpersonal/update-puestos']) : "Puesto ( Cuando exista vacante)" ; ?></li>
    <li><?php echo ($estado > 3) ? Html::a('Cursos', ['cvpersonal/update-cursos']) : "Cursos" ; ?></li>
    <li><?php echo ($estado > 4) ? Html::a('Idiomas', ['cvpersonal/update-idiomas']) : "Idiomas" ; ?></li>

<?php //    <li><?php echo ($estado > 0) ? Html::a('Documentos', ['cvpersonal/update-archivos']) : "Documentos" ; ?></li>

</ul>