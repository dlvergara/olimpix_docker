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
        <div class="row">
            <h3>Tu orden ha sido procesada exitosamente.</h3>
            <p>Ahora por favor completa la siguiente información: </p>
            <?php
            /**
             * @var $orderDetail \app\models\OrderDetail
             */
            foreach ($ordenModel->orderDetails as $index => $orderDetail) {
                $servicioContratado = $orderDetail->getServicioContratados()->one();
                if(empty($servicioContratado)) {
                    $servicioContratado = new \app\models\ServicioContratado();
                }
                echo $this->render('../servicio-contratado/_form', ['model' => $servicioContratado,] );
            }
            ?>
        </div>
    </div>
</section>