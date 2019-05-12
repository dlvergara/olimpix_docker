<?php

use app\models\Evento;
use \app\models\Order;

/**
 * Created by PhpStorm.
 * User: David Leonardo
 * Date: 5/5/2019
 * Time: 1:15 PM
 * @var $eventoModel Evento
 * @var $ordenModel Order
 * @var $post array
 */

$script = <<< JS
    function setInfoJinete(jinete, servicio, autocomplete) {
        $("#"+servicio).val( jinete.id_jinete );
        $("#"+autocomplete).val( jinete.nombre_completo );
        return true;
    }
    function setInfoCaballo(jinete, servicio, autocomplete) {
        $("#"+servicio).val( jinete.id_caballo );
        $("#"+autocomplete).val( jinete.nombre );
        return true;
    }
JS;
$this->registerJs($script);

?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Orden aceptada
                </h1>
                <!--
                <p class="text-white link-nav">
                    <a href="index.html">Home </a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="about.html"> Orden aceptada</a>
                </p>
                -->
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start pruebas Area -->
<section class="training-area">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Tu orden ha sido procesada exitosamente.</h1>
                    <p>Ahora por favor completa la siguiente información: </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="latest-blog-area">
    <div class="container">
        <div class="row">
            <?php
            /**
             * @var $orderDetail \app\models\OrderDetail
             */
            foreach ($ordenModel->orderDetails as $index => $orderDetail) {
                $servicioContratado = $orderDetail->getServicioContratados()->one();
                if (empty($servicioContratado)) {
                    $servicioContratado = new \app\models\ServicioContratado();
                }

                $form = '../servicio-contratado/_formPrueba';
                if (empty($orderDetail->servicioDisponibleIdServicioDisponible->prueba_salto_id_prueba)) {
                    $form = '../servicio-contratado/_formPesebrera';
                }
                echo $this->render($form, ['model' => $servicioContratado, 'servicioDisponible' => $orderDetail->servicioDisponibleIdServicioDisponible]);
            }
            ?>
        </div>
    </div>
</section>
