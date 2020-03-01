<?php
/* @var $this yii\web\View */

use app\models\ReservaForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\Util;

/* @var $model \app\models\Evento
 * @var $form yii\widgets\ActiveForm
 * @var $formModel \app\models\ReservaForm
 * @var $formModels array
 * @var $subtotal float
 */
$this->title = $model->nombre;
$servicios = $model->getServicioDisponibles()->where(['prueba_salto_id_prueba' => null])->all();

//$serviciosPrueba = $model->getServicioDisponibles()->joinWith('pruebaSaltoIdPrueba')->where(['not', ['prueba_salto_id_prueba' => null]])->orderBy('prueba_salto.fecha')->all();
$pruebas = $model->getPruebaSaltos()->orderBy('fecha')->all();

$subtotal = isset($subtotal) ? $subtotal : 0;
$postUrl = 'evento/reservar';
if (Yii::$app->request->isPost) {
    $postUrl = 'evento/pagar';
}

$form = ActiveForm::begin([
    //'options' => ['data' => ['pjax' => true]],
    'action' => Yii::$app->getUrlManager()->createUrl([$postUrl, 'evento' => $model->id_evento]),
]);


if (count($model->pruebaSaltos) > 0) {
    ?>
    <!-- Start pruebas Area -->
    <section class="training-area">
        <div class="container">
            <div class="row">
                <h3 class="mb-30"><b>Pruebas</b></h3>
            </div>
            <div class="row">
                <?php
                $pruebasArray = [];
                $max = 0;
                foreach ($model->pruebaSaltos as $index => $prueba) {
                    $fechaPrueba = DateTime::createFromFormat("Y-m-d H:i:s", $prueba->fecha);
                    $fechaLlave = Util::DayName($fechaPrueba) . ' ' . $fechaPrueba->format('d') . ' de ' . Util::DayMonth($fechaPrueba);
                    $pruebasArray[$fechaLlave][$prueba->orden] = $prueba;
                    $max = max($max, count($pruebasArray[$fechaLlave]));
                }

                foreach ($pruebasArray as $index => $fechaPrueba) {
                    ?>
                    <div class="col-md-3">
                        <h3><?= $index ?></h3>
                        <?php
                        $conteoFilas = 0;
                        ksort($fechaPrueba);
                        /* @var Prueba $prueba */
                        foreach ($fechaPrueba as $i => $prueba) {
                            $resultadosUrl = Yii::$app->getUrlManager()->createUrl(['resultados', 'prueba' => $prueba->id_prueba]);
                            ?>

                            <div class="row" style="margin-left: 0%;margin-right: 0%;">
                                <a href="<?= $resultadosUrl ?>" class="nav-menu">
                                    <?= ucwords(strtolower($prueba->nombre)) ?>
                                </a>
                            </div>
                            <div class="row" style="margin-left: 0%;margin-right: 0%;">
                                <span style="font-size: 10px"><?= $prueba->fecha ?></span>
                            </div>
                            <div class="row" style="margin-left: 0%;margin-right: 0%;">
                                <?php
                                $cantidadResultados = count($prueba->resultadoSaltos);
                                if ($cantidadResultados > 0) {
                                    ?>
                                    <a href="<?= $resultadosUrl ?>"><span
                                                style="font-size: 10px">Ver detalles</span></a><br>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="row" style="margin-left: 0%;margin-right: 0%;">
                                <?= $this->render('view-prueba-salto', ['prueba' => $prueba, 'form' => $form, 'formModels' => $formModels]) ?>
                            </div>
                            <div class="row" style="margin-left: 0%;margin-right: 0%;">&nbsp;</div>
                            <?php
                            $conteoFilas++;
                        }
                        for ($i = $conteoFilas; $i < $max; $i++) {
                            ?>
                            <div class="row" style="margin-left: 0%;margin-right: 0%;">&nbsp;</div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }

                ?>
            </div>
        </div>
    </section>
    <?php
}

//RESERVA DE OTROS SERVICIOS
if (count($servicios) > 0) {
    ?>
    <!-- Start training Area -->
    <section class="training-area">
        <div class="container">
            <div class="row">
                <h3 class="mb-30"><b>Reservar Servicios</b></h3>
            </div>
            <div class="row">
                <?php
                /**
                 * @var $servicioDisponible \app\models\ServicioDisponible
                 */
                foreach ($servicios as $index => $servicioDisponible) {
                    $showService = false;
                    $fechaInicio = DateTime::createFromFormat("Y-m-d H:i:s", $servicioDisponible->fecha_inicio);
                    $fechaFin = DateTime::createFromFormat("Y-m-d H:i:s", $servicioDisponible->fecha_fin);
                    $ahora = new DateTime();
                    $idServicio = $servicioDisponible->id_servicio_disponible;
                    if (isset($formModels[$idServicio])) {
                        $formModel = $formModels[$idServicio];
                    } else {
                        $formModel = new ReservaForm();
                    }
                    $checked = !empty($formModel->servicio) ? true : false;
                    $cantidad = !empty($formModel->servicio) ? $formModel->cantidad : 0;
                    $display = 'none';
                    if ($checked) {
                        $display = 'block';
                    }

                    if ($ahora->getTimestamp() >= $fechaInicio->getTimestamp()
                        && $ahora->getTimestamp() <= $fechaFin->getTimestamp()
                        && boolval($servicioDisponible->disponible)
                        && $servicioDisponible->cantidad_disponible > 0
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
                                            <?php
                                            $checkBoxName = 'ReservaForm[' . $idServicio . '][servicio]';
                                            $checkBoxOptions = [
                                                'id' => 'check-' . $idServicio,
                                                'value' => $idServicio,
                                                'onclick' => 'enableService(this)',
                                            ];

                                            echo \yii\bootstrap\Html::checkbox(
                                                $checkBoxName, $checked, $checkBoxOptions
                                            );
                                            ?>
                                            <label for="check-<?= $idServicio ?>"></label>
                                        </div>
                                    </div>
                                    <?= $form->errorSummary($formModel) ?>
                                    <span style="display: <?= $display ?>" id="cantidad-<?= $idServicio ?>"><br>
                                    <?=
                                    $form->field($formModel, 'cantidad')
                                        ->textInput([
                                            'name' => 'ReservaForm[' . $idServicio . '][cantidad]',
                                            'type' => 'number',
                                            'min' => 0,
                                            'value' => $cantidad,
                                            'id' => 'reservaform-cantidad-' . $idServicio,
                                        ])
                                        ->label(false)
                                    ?>
                                    </span>
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
        </div>
    </section>
    <!-- End training Area -->
    <?php
}

if (!Yii::$app->request->isPost) {
    ?>


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?= Html::submitButton(' <span class="glyphicon glyphicon-shopping-cart"></span> Reservar', ['class' => 'genric-btn primary btn-block e-large']) ?>

        </div>
    </div>


    <?php
}
ActiveForm::end();
?>
<script type="application/javascript">
    function enableService(obj) {
        var objeto = $(obj);
        var id = obj.id.replace("check-", "");
        console.log($("#reservaform-cantidad-" + id).val())
        if (objeto.is(':checked')) {
            $("#reservaform-cantidad-" + id).val(1);
        } else {
            $("#reservaform-cantidad-" + id).val(0);
        }
        $("#cantidad-" + id).toggle();
    }
</script>
