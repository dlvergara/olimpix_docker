<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $model \app\models\Evento
 * @var $form yii\widgets\ActiveForm
 * @var $formModel \app\models\ReservaForm
 */
?>

<!-- Start training Area -->
<section class="training-area section-gap">
    <div class="container">
        <div class="row">
            <h3 class="mb-30">Reservar servicios</h3>
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

                if ($ahora->getTimestamp() >= $fechaInicio->getTimestamp()
                    && $ahora->getTimestamp() <= $fechaFin->getTimestamp()
                    && boolval($servicioDisponible->disponible)
                ) {
                    $showService = true;
                }
                if ($showService) {
                    $img = $servicioDisponible->image_url;
                    if (empty($img)) {
                        $img = "img/pages/tr3.jpg";
                    }
                    ?>
                    <div class="col-lg-4 cl-md-6">
                        <div class="single-training">
                            <div class="thumb relative">
                                <div class="overlay-bg"></div>
                                <img class="img-fluid" src="<?= $img ?>" alt="">
                            </div>
                            <div class="details">
                                <div class="title justify-content-between d-flex">
                                    <h4><?= $servicioDisponible->nombre ?></h4>
                                    <p class="price">
                                        $ <?= number_format($servicioDisponible->monto, 2) ?>
                                    </p>
                                    <div class="primary-switch">
                                        <?=
                                        Html::checkbox('ReservaForm[servicio][]', true, ['id' => 'primary-switch-' . $servicioDisponible->id_servicio_disponible, 'class' => '', 'value' => $servicioDisponible->id_servicio_disponible])
                                        ?>
                                        <label for="primary-switch-<?= $servicioDisponible->id_servicio_disponible ?>"></label>
                                    </div>
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
        </div>
        <?=
        Html::submitButton('Reservar', ['class' => 'genric-btn primary e-large'])
        ?>
        <!--<a href="#" class="genric-btn primary e-large">Reservar</a>-->
    </div>
</section>
<!-- End training Area -->

