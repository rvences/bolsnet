<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Bolsa Trabajo';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-xs-6">
                <img class="img-responsive" src="images/logo-florece.png">

            </div>
            <div class="col-xs-6">
                <img class="img-responsive" src="images/logo-armas.png">
                <h1>Bolsnet</h1>

                <p class="lead">Es un espacio creado para cualquier persona interesada en colaborar con el
                    Ayuntamiento de Xalapa, para que cuando contemos con alguna vacante tengan la posibilidad de
                    participar en el proceso de selección.
                    </p>
                <p class="lead">Aquí puedes realizar el registro y actualización de su historia de vida</p>

                <p>Si es tu primera vez, registrate <?php echo Html::a('aquí.', ['/site/signup']); ?></p>

                <p>Si ya cuentas con tu usuario y contraseña <?php echo Html::a('da clic aquí.', ['/site/login']); ?> </p>

                <p>Recuerda que este servicio es gratuito</p>
            </div>
        </div>

    </div>
</div>