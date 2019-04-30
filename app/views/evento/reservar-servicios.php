<?php
/* @var $this yii\web\View */

use app\models\ReservaForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model \app\models\Evento
 * @var $form yii\widgets\ActiveForm
 * @var $formModel \app\models\ReservaForm
 * @var $formModels array
 * @var $subtotal float
 */
$servicios = $model->getServicioDisponibles()->where(['prueba_salto_id_prueba' => null])->all();
$serviciosPrueba = $model->getServicioDisponibles()->joinWith('pruebaSaltoIdPrueba')->where(['not', ['prueba_salto_id_prueba' => null]])->orderBy('prueba_salto.fecha')->all();

$subtotal = isset($subtotal) ? $subtotal : 0;
$postUrl = 'evento/reservar';
if( Yii::$app->request->isPost ) {
    $postUrl = 'evento/pagar';
}

if (count($servicios) > 0) {
    $form = ActiveForm::begin([
        'options' => ['data' => ['pjax' => true]],
        'action' => Yii::$app->getUrlManager()->createUrl([$postUrl, 'evento' => $model->id_evento]),
    ]);
    ?>
    <script type="application/javascript" >
        function enableService(obj)
        {
            var objeto = $(obj);
            var id = obj.id.replace("check-", "");
            console.log($("#reservaform-cantidad-"+id).val())
            if (objeto.is(':checked')) {
                $("#reservaform-cantidad-"+id).val(1);
            } else {
                $("#reservaform-cantidad-"+id).val(0);
            }
            $("#cantidad-"+id).toggle();
        }
    </script>
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
                foreach ($servicios as $index => $servicioDisponible) {
                    $showService = false;
                    $fechaInicio = DateTime::createFromFormat("Y-m-d H:i:s", $servicioDisponible->fecha_inicio);
                    $fechaFin = DateTime::createFromFormat("Y-m-d H:i:s", $servicioDisponible->fecha_fin);
                    $ahora = new DateTime();
                    $idServicio = $servicioDisponible->id_servicio_disponible;
                    if( isset($formModels[$idServicio]) ) {
                        $formModel = $formModels[$idServicio];
                    } else {
                        $formModel = new ReservaForm();
                    }
                    $checked = !empty($formModel->servicio) ? true : false;
                    $cantidad = !empty($formModel->servicio) ? $formModel->cantidad : 0;
                    $display = 'none';
                    if($checked) {
                        $display = 'block';
                    }

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

            <div class="row" >
                <?php
                foreach ($serviciosPrueba as $index => $item) {
                    $showService = false;
                    $fechaInicio = DateTime::createFromFormat("Y-m-d H:i:s", $servicioDisponible->fecha_inicio);
                    $fechaFin = DateTime::createFromFormat("Y-m-d H:i:s", $servicioDisponible->fecha_fin);
                    $ahora = new DateTime();
                    $idServicio = $servicioDisponible->id_servicio_disponible;
                    if ($ahora->getTimestamp() >= $fechaInicio->getTimestamp()
                        && $ahora->getTimestamp() <= $fechaFin->getTimestamp()
                        && boolval($servicioDisponible->disponible)
                    ) {
                        $showService = true;
                    }
                        if ($showService) {

                        }
                    }
                ?>
            </div>

            <?php
            if( !Yii::$app->request->isPost ) {
                ?>
            <div class="row">
                <?= Html::submitButton('Reservar', ['class' => 'genric-btn primary e-large']) ?>
            </div>
                <?php
            }
            ?>
        </div>
    </section>
    <!-- End training Area -->
    <?php
    ActiveForm::end();
}
?>