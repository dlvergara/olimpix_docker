<?php
/* @var $this yii\web\View */
/* @var $model \app\models\Evento */

$date = DateTime::createFromFormat("Y-m-d H:i:s", $model->fecha_inicio);

?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    <?= $model->nombre ?>
                </h1>
                <!--
                <p class="text-white link-nav">
                    <a href="index.html">Home </a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="training.html"> Training Programs</a>
                </p>
                -->
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start training Area -->
<section class="training-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 pb-40 header-text text-center">
                <!-- <h1 class="pb-10">Descripción</h1> -->
                <p>
                    <?= $model->descripcion ?>
                </p>
                <p>Lugar: <?= $model->ciudadIdCiudad->nombre.', '.ucwords($model->ciudadIdCiudad->paisIdPais->nombre) ?></p>
                <p>Fecha: <?= strftime("%A %d de %B", $date->getTimestamp());?></p>
                <p>Hora: <?= strftime("%l:%M%p", $date->getTimestamp());?></p>
            </div>
        </div>
        
        <div class="row">
            <?php
            /**
             * @var $servicioDisponible \app\models\ServicioDisponible
             */
            foreach ($model->getServicioDisponibles()->all() as $index => $servicioDisponible) {
                $showService = false;
                $fechaInicio = DateTime::createFromFormat("Y-m-d H:i:s", $servicioDisponible->fecha_inicio);
                $fechaFin = DateTime::createFromFormat("Y-m-d H:i:s", $servicioDisponible->fecha_fin);
                $ahora = new DateTime();

                if( $ahora->getTimestamp() >= $fechaInicio->getTimestamp() && $ahora->getTimestamp() <= $fechaFin->getTimestamp() ) {
                    $showService = true;
                }
                if( $showService ) {
                    $img = $servicioDisponible->image_url;
                    ?>
                    <div class="col-lg-4 cl-md-6">
                        <div class="single-training">
                            <div class="thumb relative">
                                <div class="overlay-bg"></div>
                                <img class="img-fluid" src="<?= $img ?>" alt="">
                                <a class="admission-btn" href="#">Agregar</a>
                            </div>
                            <div class="details">
                                <div class="title justify-content-between d-flex">
                                    <h4><?= $servicioDisponible->nombre ?></h4>
                                    <p class="price">
                                        $<?= $servicioDisponible->monto ?>
                                    </p>
                                </div>
                                <p>
                                    <?= $servicioDisponible->descripcion ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <!--
            <div class="col-lg-4 cl-md-6">
                <div class="single-training">
                    <div class="thumb relative">
                        <div class="overlay-bg"></div>
                        <img class="img-fluid" src="img/pages/tr1.jpg" alt="">
                        <a class="admission-btn" href="#">Admission Going on</a>
                    </div>
                    <div class="details">
                        <div class="title justify-content-between d-flex">
                            <a href="#"><h4>Bsc in Film & Media</h4></a>
                            <p class="price">
                                $2500
                            </p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 cl-md-6">
                <div class="single-training">
                    <div class="thumb relative">
                        <div class="overlay-bg"></div>
                        <img class="img-fluid" src="img/pages/tr2.jpg" alt="">
                        <a class="admission-btn" href="#">Admission Going on</a>
                    </div>
                    <div class="details">
                        <div class="title justify-content-between d-flex">
                            <a href="#"><h4>Bsc in Film & Media</h4></a>
                            <p class="price">
                                $2500
                            </p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 cl-md-6">
                <div class="single-training">
                    <div class="thumb relative">
                        <div class="overlay-bg"></div>
                        <img class="img-fluid" src="img/pages/tr3.jpg" alt="">
                        <a class="admission-btn" href="#">Admission Going on</a>
                    </div>
                    <div class="details">
                        <div class="title justify-content-between d-flex">
                            <a href="#"><h4>Bsc in Film & Media</h4></a>
                            <p class="price">
                                $2500
                            </p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 cl-md-6">
                <div class="single-training">
                    <div class="thumb relative">
                        <div class="overlay-bg"></div>
                        <img class="img-fluid" src="img/pages/tr4.jpg" alt="">
                        <a class="admission-btn" href="#">Admission Going on</a>
                    </div>
                    <div class="details">
                        <div class="title justify-content-between d-flex">
                            <a href="#"><h4>Bsc in Film & Media</h4></a>
                            <p class="price">
                                $2500
                            </p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 cl-md-6">
                <div class="single-training">
                    <div class="thumb relative">
                        <div class="overlay-bg"></div>
                        <img class="img-fluid" src="img/pages/tr5.jpg" alt="">
                        <a class="admission-btn" href="#">Admission Going on</a>
                    </div>
                    <div class="details">
                        <div class="title justify-content-between d-flex">
                            <a href="#"><h4>Bsc in Film & Media</h4></a>
                            <p class="price">
                                $2500
                            </p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 cl-md-6">
                <div class="single-training">
                    <div class="thumb relative">
                        <div class="overlay-bg"></div>
                        <img class="img-fluid" src="img/pages/tr6.jpg" alt="">
                        <a class="admission-btn" href="#">Admission Going on</a>
                    </div>
                    <div class="details">
                        <div class="title justify-content-between d-flex">
                            <a href="#"><h4>Bsc in Film & Media</h4></a>
                            <p class="price">
                                $2500
                            </p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        </p>
                    </div>
                </div>
            </div>
            -->
        </div>
    </div>
</section>
<!-- End training Area -->