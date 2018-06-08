<?php
use yii\helpers\Html;
?>

<ul>
    <li><?php echo Html::a('Datos Personales', ['cvpersonal/index']); ?></li>
    <li><?php echo Html::a('Estudios Académicos', ['cvpersonal/update-nivel-estudio']); ?></li>
    <li><?php echo Html::a('Experiencia', ['cvpersonal/update-experiencia']); ?></li>
    <li><?php echo Html::a('Cursos', ['cvpersonal/update-cursos']); ?></li>
    <li><?php echo Html::a('Idiomas', ['cvpersonal/update-idiomas']); ?></li>


</ul>