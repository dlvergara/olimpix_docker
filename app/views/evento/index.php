<?php
/* @var $this yii\web\View */
/* @var $model \app\models\Evento */

$date = DateTime::createFromFormat("Y-m-d H:i:s", $model->fecha_inicio);
$terminosCondiciones = $model->getTerminoCondicions()->all();
?>
<!-- start banner Area -->
<section class="banner-area relative" id="banner">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    <?= $model->nombre ?>
                </h1>
                <p class="text-white link-nav">
                    <a href="<?= Yii::$app->getHomeUrl() ?>">Inicio </a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl(['site/events']) ?>"> Eventos</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<section class="sample-text-area">
    <div class="container">
        <h1 class="text-heading"><?= $model->nombre ?></h1>
        <p class="sample-text">
            <?= $model->descripcion ?>
        </p>
        <h3>Lugar: </h3>
        <span><?= $model->ciudadIdCiudad->nombre . ', ' . ucwords($model->ciudadIdCiudad->paisIdPais->nombre) ?></span><br>
        <h3>Fecha: </h3><span><?= strftime("%A %d de %B", $date->getTimestamp()) ?></span><br>
        <h3>Hora: </h3><span><?= strftime("%l:%M%p", $date->getTimestamp()) ?></span><br>
    </div>
</section>

<!-- Start training Area -->
<section class="training-area section-gap">
    <div class="container">
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

                if ($ahora->getTimestamp() >= $fechaInicio->getTimestamp()
                    && $ahora->getTimestamp() <= $fechaFin->getTimestamp()
                    && boolval($servicioDisponible->disponible)
                ) {
                    $showService = true;
                }
                if ($showService) {
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
                                        $<?= number_format($servicioDisponible->monto, 2) ?>
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

<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">

            <h3 class="mb-30">Información general</h3>
            <div class="row">
                <?php
                /**
                 * @var $terminoCondicion \app\models\TerminoCondicion
                 */
                foreach ($terminosCondiciones as $index => $terminoCondicion) {
                    if ($index >= 3) {
                        break;
                    }
                    ?>
                    <div class="col-md-4">
                        <div class="single-defination">
                            <h4 class="mb-20"><?= $index .'. '. $terminoCondicion->titulo ?></h4>
                            <p><?= nl2br($terminoCondicion->texto) ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <?php
        /**
         * @var $terminoCondicion \app\models\TerminoCondicion
         */
        foreach ($terminosCondiciones as $index => $terminoCondicion) {
            if ($index < 3) continue;//img/elements/d.jpg
            $align = ($index % 2 == 0) ? '' : 'text-right';//
            ?>
            <div class="section-top-border <?= $align ?>">
                <h3 class="mb-30"><?= $index .'. '. $terminoCondicion->titulo ?></h3>
                <div class="row">
                    <?php
                    if(empty($align)) {
                        ?>
                    <div class="col-md-3">
                        <img src="img/Logo-2.png" alt="" class="img-fluid">
                    </div>
                        <?php
                    }
                    ?>
                    <div class="col-md-9 mt-sm-20">
                        <p><?= nl2br($terminoCondicion->texto) ?></p>
                    </div>
                    <?php
                    if(!empty($align)) {
                        ?>
                        <div class="col-md-3">
                            <img src="img/Logo-2.png" alt="" class="img-fluid">
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>