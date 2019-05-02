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
 * @var $cargosAdicionales array
 * @var $buyerInfo \app\models\BuyerInfoForm
 * @var $orden \app\models\Order
 */

$form = ActiveForm::begin([
    'options' => ['data' => ['pjax' => true]],
    'action' => Yii::$app->getUrlManager()->createUrl(['evento/pagar', 'evento' => $model->id_evento]),
]);
?>
    <script type="text/javascript" src="https://checkout.epayco.co/checkout.js"></script>
<?php
if (count($formModels) > 0) {
    ?>
    <!-- Start training Area -->
    <section class="training-area section-gap">
        <div class="container">
            <div class="section-top-border">
                <h3 class="mb-30">Reservar servicios</h3>
              
                <div class="progress-table-wrap">
                    
                    <div class="progress-table">
                        <div class="table-head">
                            <div class="serial">#</div>
                            <div class="servicio">Servicio</div>
                            <div class="precio-unitario">Precio Unitario</div>
                            <div class="cantidad">Cantidad</div>
                            <div class="subtotal">Subtotal</div>
                        </div>
                        <?php
                        $total = 0;
                        $conteoItems = 1;
                        $paymentDescription = '';
                        foreach ($formModels as $index => $formModel) {
                            $total += $formModel->subtotal;
                            $idServicio = $formModel->servicio;
                            $cantidad = intval($formModel->cantidad);
                            $checkBoxName = 'ReservaForm[' . $idServicio . '][servicio]';

                            $paymentConcept = $formModel->getServicioDisponible()->nombre;
                            if( !empty($formModel->getServicioDisponible()->pruebaSaltoIdPrueba) ) {
                                $paymentConcept = $formModel->getServicioDisponible()->pruebaSaltoIdPrueba->nombre . ' - ' . $formModel->getServicioDisponible()->nombre;
                            }
                            $paymentDescription .= $paymentConcept . ', ';
                            ?>
                            <div class="table-row">
                                <div class="serial">
                                    <?= $conteoItems ?>
                                    <?php
                                    echo $form->field($formModel, 'servicio')->hiddenInput(['name' => $checkBoxName])->label(false);
                                    echo $form->field($formModel, 'cantidad')
                                        ->hiddenInput([
                                            'name' => 'ReservaForm[' . $idServicio . '][cantidad]',
                                            'min' => 0,
                                            'value' => $cantidad,
                                            'id' => 'reservaform-cantidad-' . $idServicio,
                                        ])
                                        ->label(false)
                                    ?>
                                </div>
                                <div class="servicio"><?= $paymentConcept ?></div>
                                <div class="precio-unitario"><?= number_format($formModel->getServicioDisponible()->monto, 2, ',', '.') ?></div>
                                <div class="cantidad"><?= $formModel->cantidad ?></div>
                                <div class="subtotal"><?= number_format($formModel->subtotal, 2, ',', '.') ?></div>
                            </div>
                            <?php
                            $conteoItems++;
                        }

                        /**
                         * @var $cargoAdicional \app\models\CargoAdicional
                         */
                        foreach ($cargosAdicionales as $index => $cargoAdicional) {
                            $total += $cargoAdicional->monto;
                            ?>
                            <div class="table-row">
                                <div class="serial">
                                    <?= $conteoItems ?>
                                </div>
                                <div class="servicio"><?= $cargoAdicional->concepto ?></div>
                                <div class="precio-unitario">&nbsp;</div>
                                <div class="cantidad">&nbsp;</div>
                                <div class="subtotal"><?= number_format($cargoAdicional->monto, 2, ',', '.') ?></div>
                            </div>
                            <?php
                            $conteoItems++;
                        }
                        ?>
                        <div class="table-row">
                            <div class="serial">
                                <b>Total</b>
                            </div>
                            <div class="servicio">&nbsp;</div>
                            <div class="precio-unitario">&nbsp;</div>
                            <div class="cantidad">&nbsp;</div>
                            <div class="subtotal"><b><?= number_format($total, 2, ',', '.') ?></b></div>
                        </div>
                    </div>
                </div>

                <!--
                <div class="row">
                    <div class="col-lg-8 col-md-8" >
                        <h3>Datos del comprador</h3>
                        <div class="mt-10">
                            <?= $form->field($buyerInfo, 'name')->input(['placeholder' => "Nombre completo", 'class' => 'single-input']) ?>
                        </div>
                        <div class="mt-10">
                            <?= $form->field($buyerInfo, 'email')->input(['placeholder' => "Nombre completo", 'class' => 'single-input']) ?>
                        </div>
                        <div class="mt-10">
                            <?= $form->field($buyerInfo, 'phone')->input(['placeholder' => "Nombre completo", 'class' => 'single-input']) ?>
                        </div>
                    </div>
                </div>
                -->

                <div class="row">
                    <?php
                    $csrf = Yii::$app->request->csrfToken;
                    $url = Yii::$app->getUrlManager()->createAbsoluteUrl(['evento/confirmacion', 'evento' => $model->id_evento, 'orden' => $orden->id_order,]);
                    echo $url;
                    ?>
                    <!-- <?= Html::submitButton('Pagar', ['class' => 'genric-btn primary e-large']) ?> -->
                    <script
                            src="https://checkout.epayco.co/checkout.js"
                            class="epayco-button"
                            data-epayco-key="491d6a0b6e992cf924edd8d3d088aff1"
                            data-epayco-tax-base="<?= $total ?>"
                            data-epayco-amount="<?= $total ?>"
                            data-epayco-name="Pago de servicios para evento Ecuestre"
                            data-epayco-description="<?= rtrim($paymentDescription, ", ") ?>"
                            data-epayco-currency="cop"
                            data-epayco-country="co"
                            data-epayco-test="true"
                            data-epayco-external="true"
                            data-epayco-response="<?= $url ?>"
                            data-epayco-invoice="<?= $orden->id_order ?>"
                            data-epayco-confirmation="<?= $url ?>"
                            data-epayco-extra3="<?= $csrf ?>">
                    </script>
                </div>
            </div>
        
     </div>
    </section>
    <?php
}
ActiveForm::end();
?>