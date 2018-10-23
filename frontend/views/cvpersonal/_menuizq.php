<?php
use yii\helpers\Html;
use kartik\popover\PopoverX;
?>


<ul>
    <li><?php echo Html::a('Datos Personales', ['cvpersonal/index']); ?></li>
    <li><?php echo ($estado > 0) ? Html::a('Estudios Académicos', ['cvpersonal/update-nivel-estudio']) : "Estudios Académicos" ; ?></li>
    <li><?php echo ($estado > 1) ? Html::a('Experiencia', ['cvpersonal/update-experiencia']) : "Experiencia" ; ?></li>
    <li><?php echo ($estado > 2) ? Html::a('Puestos Tipo', ['cvpersonal/update-puestos']) : "Puesto ( Cuando exista vacante)" ; ?></li>
    <li><?php echo ($estado > 3) ? Html::a('Cursos', ['cvpersonal/update-cursos']) : "Cursos" ; ?></li>
    <li><?php echo ($estado > 4) ? Html::a('Idiomas', ['cvpersonal/update-idiomas']) : "Idiomas" ; ?></li>

    <br>

    <li><?php echo ($estado > 0) ? Html::a('Documentos', ['cvpersonal/create-archivos']) : "Documentos" ; ?></li>

</ul>

<div class="bg-warning">
    Para poder acceder a cada rubro, se debe de actualizar el que le antecede.
</div>



<?php

$contenido = '  
  <h2>Lo que si debes poner en tu CV:</h2>
  <ul>
    <li>Usa una fotografía de frente de la mitad del pecho hacia arriba a color o
blanco y negro, se puede sonreír (honesta)</li>
    <li>De preferencia fotografías de tamaño infantil o digitales (claras)</li>
    <li>Utiliza sólo un tipo de caligrafía legible en todo el CV (por ejemplo, Times
New Roman, Calibri, Arial, Tahoma, etc.) y procura utilizar sólo el color
negro</li>
    <li>Escribe tu CV en un formato sencillo</li>
    <li>Utiliza máximo 2 hojas y mínimo 1 hoja para tu CV</li>
    <li>Indica claramente la información de tus datos personales, Nombre
completo, dirección actual, teléfono fijo y celular (especifica cuál es teléfono
fijo y cuál es celular), correo electrónico, edad.</li>
    <li>Procura utilizar un correo electrónico profesional</li>
    <li>Indica sólo los últimos grados de estudio (Licenciatura, Maestría,
Doctorado) Especifica si tienes varias Licenciaturas o si estás estudiando
actualmente y en que horario.</li>
    <li>Indica solo tus cursos más recientes (diplomados, talleres, etc.) de
preferencia comprobables</li>
    <li>En la experiencia laboral es importante indicar:
        <ul>
                <li>Nombre de la empresa (nombre comercial y logo)</li>
                <li>Período en que laboraste</li>
                <li>Puesto desempeñado</li>
                <li>Actividades que desarrollaste</li>
                <li>Logros</li>
                <li>Nombre del jefe directo con teléfono y correo electrónico</li>
        </ul>
    </li>
    <li>La información de educación y empleos debe ir en orden cronológico, del
más reciente al más antiguo.</li>
    <li>En la sección de experiencias laborales, para el caso de recién egresados,
especifica tus prácticas profesionales y servicio social. Si ya tienes varias
experiencias laborales, evita poner empleos de mucho tiempo atrás</li>
    <li>Indica los idiomas, la paquetería, software o sistemas especializados que
dominas</li>
    <li>Muy importante al finalizar de crear tu CV, revisar la <b>ORTOGRAFÍA</b></li>
  </ul>
  <b>IMPORTANTE: Siempre acompaña tu CV con una carta de presentación</b>
  <b>Tu carta de presentación o email tiene que responder las siguientes preguntas:</b>
  <ul>
    <li>¿Quién eres? Datos personales y de contacto, así como tu perfil
profesional</li>
    <li>¿Cómo te enteraste de la vacante o de la compañía? Especifica el nombre
de la vacante que te interesa</li>
    <li>¿Por qué estás interesado en la vacante y/o en esta compañía?</li>
    <li>¿Cómo podrían tus cualidades encajar con las necesidades específicas del
puesto? Describe tus principales actitudes laborales (ejemplo: Liderazgo,
trabajo en equipo, iniciativa, creatividad, adaptabilidad, etc.)</li>
    <li>Repite que esperas con mucho interés ser considerado para el trabajo</li>
    <li>Leer, nuevamente, la carta con cuidado y revisa ortografía, gramática y
errores de puntuación. Sería bueno que alguien más leyera la carta</li>
    <li>Tiene que ser breve, no más de una cuartilla</li>
    <li>Si vas a enviar tu CV y carta por email, escribe tu carta de presentación en
el cuerpo del correo, no como documento adjunto y en el título del correo
escribe el nombre de la vacante que te interesa y tu nombre</li>
    <li>No envíes documentos comprobatorios, solo la carta y el CV</li>
  </ul>
  
<br>

                ';


echo PopoverX::widget([
    'header' => 'Consejos para elaborar tu CV',
    'placement'=> PopoverX::ALIGN_BOTTOM_LEFT,
    'type' => PopoverX::TYPE_WARNING,
    'size'=> PopoverX::SIZE_LARGE,
    'content' => $contenido,
    'toggleButton' => ['label'=>'Ayuda para elaborar CV', 'class'=>'btn btn-warning']

]);