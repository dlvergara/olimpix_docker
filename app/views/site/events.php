<?php

/* @var $this yii\web\View */
/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\EventoSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;


$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Start upcoming-event Area -->
<section class="upcoming-event-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 pb-40 header-text text-center">
                <h1 class="pb-10">Checkout our Upcoming Events</h1>
                <p>
                    Who are in extremely love with eco friendly system.
                </p>
            </div>
        </div>

        <?php
        /* @var $model app\models\Evento */
        setlocale(LC_ALL,"es_ES");
        foreach ($dataProvider->getModels() as $index => $model) {
            $date = DateTime::createFromFormat("Y-m-d H:i:s", $model->fecha_inicio);
            $eventoNombre = $model->nombre;
            $eventoFecha = strftime("%A %d de %B", $date->getTimestamp());
            $eventoLugar = $model->ciudadIdCiudad->nombre;
            $eventoUbicacion = $model->referencia_ubicacion;
            $eventoUrl = Yii::$app->getUrlManager()->createUrl(['evento', 'evento' => $model->id_evento]);
            ?>
            <div class="row align-items-center upcoming-wrap">
                <div class="col-lg-6 upcoming-left">
                    <img class="img-fluid" src="img/pages/ev1.jpg" alt="">
                </div>
                <div class="col-lg-6 upcoming-right">
                    <a href="#"><h4><?= $eventoNombre ?></h4></a>
                    <p class="meta">
                        <span><?= $eventoFecha ?></span> en <?= $eventoLugar . ' - ' . $eventoUbicacion ?>
                    </p>
                    <p>
                        <?= $model->descripcion ?>
                    </p>
                    <a class="primary-btn text-uppercase" href="<?= $eventoUrl ?>">ver detalles</a>
                </div>
            </div>
            <?php
        }
        ?>
        <!--
                        <div class="row align-items-center upcoming-wrap">
                            <div class="col-lg-6 upcoming-left">
                                <img class="img-fluid" src="img/pages/ev1.jpg" alt="">
                            </div>
                            <div class="col-lg-6 upcoming-right">
                                <a href="#"><h4>Event on the rock solid carbon</h4></a>
                                <p class="meta">
                                    <span>21st February</span>
                                    at Central government museum
                                </p>
                                <p>
                                    inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially.
                                </p>
                                <a class="primary-btn text-uppercase" href="#">view details</a>
                            </div>
                        </div>

                        <div class="row align-items-center upcoming-wrap">
                            <div class="col-lg-6 upcoming-left">
                                <a href="#"><h4>Event on the rock solid carbon</h4></a>
                                <p class="meta">
                                    <span>21st February</span>
                                    at Central government museum
                                </p>
                                <p>
                                    inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially.
                                </p>
                                <a class="primary-btn text-uppercase" href="#">view details</a>
                            </div>
                            <div class="col-lg-6 upcoming-right">
                                <img class="img-fluid" src="img/pages/ev2.jpg" alt="">
                            </div>
                        </div>

                        <div class="row align-items-center upcoming-wrap">
                            <div class="col-lg-6 upcoming-left">
                                <img class="img-fluid" src="img/pages/ev3.jpg" alt="">
                            </div>
                            <div class="col-lg-6 upcoming-right">
                                <a href="#"><h4>Event on the rock solid carbon</h4></a>
                                <p class="meta">
                                    <span>21st February</span>
                                    at Central government museum
                                </p>
                                <p>
                                    inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially.
                                </p>
                                <a class="primary-btn text-uppercase" href="#">view details</a>
                            </div>
                        </div>
                        <div class="row align-items-center upcoming-wrap">
                            <div class="col-lg-6 order-1 upcoming-left">
                                <a href="#"><h4>Event on the rock solid carbon</h4></a>
                                <p class="meta">
                                    <span>21st February</span>
                                    at Central government museum
                                </p>
                                <p>
                                    inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially.
                                </p>
                                <a class="primary-btn text-uppercase" href="#">view details</a>
                            </div>
                            <div class="col-lg-6 order-2 upcoming-right">
                                <img class="img-fluid" src="img/pages/ev4.jpg" alt="">
                            </div>
                        </div>
                    </div>
        -->
    </div>
</section>
<!-- End upcoming-event Area -->