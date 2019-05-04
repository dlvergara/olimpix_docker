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
 * @var $total float
 * @var $baseIva float
 * @var $totalIva float
 */
$isTest = true;

$form = ActiveForm::begin([
    'options' => [
        //'data' => ['pjax' => true],
        'target' => ($isTest) ? '_blank' : '',
    ],
    'action' => 'https://secure.payco.co/splitpayments.php',
]);

$csrf = Yii::$app->request->csrfToken;
$url = Yii::$app->getUrlManager()->createAbsoluteUrl(['evento/confirmacion', 'evento' => $model->id_evento, 'orden' => $orden->id_order,]);

$p_id_invoice = time();
$p_cust_id_cliente = Yii::$app->params['epayco']['id-client'];
$p_key = Yii::$app->params['epayco']['api-key'];
$p_amount = $total;
$p_tax = $totalIva;
$p_base = $baseIva;
$p_currency_code = 'COP';

$p_signature = md5($p_cust_id_cliente . '^' . $p_key . '^' . $p_id_invoice . '^' . $p_amount . '^' . $p_currency_code);

$p_split_type = '02';
$p_split_merchant_receiver = Yii::$app->params['epayco']['id-client'];;
$p_split_primary_receiver = Yii::$app->params['epayco']['id-client'];
$p_split_primary_receiver_fee = $buyerInfo->getTotalComision();
$p_split_receivers = array();
$p_signature_receivers = "";
$p_split_receivers[0] = array('id' => '17511', 'fee' => '20');

foreach ($p_split_receivers as $receiver) {
    $p_signature_receivers .= $receiver['id'] . '^' . $receiver['fee'];
}

$p_signature_split = md5($p_split_type . '^' . $p_split_merchant_receiver . '^' . $p_split_primary_receiver . '^' . $p_split_primary_receiver_fee . '^' . $p_signature_receivers);

if (count($formModels) > 0) {
    ?>
    <!-- Start training Area -->
    <section class="training-area section-gap">
        <div class="container">
            <div class="section-top-border">
                <h3 class="mb-30"><b>Reservar servicios</b></h3>
              <table class="table table-responsive">
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
                            if (!empty($formModel->getServicioDisponible()->pruebaSaltoIdPrueba)) {
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
                  
                    </table>
                <br>
                <p align="center" >
                    <input name="p_cust_id_cliente" type="hidden" value="<?php echo $p_cust_id_cliente ?>">
                    <input name="p_key" type="hidden" value="<?php echo $p_key ?>">
                    <input name="p_id_invoice" type="hidden" value="<?php echo $p_id_invoice ?>">
                    <input name="p_description" type="hidden" value="<?= rtrim($paymentDescription, ", ") ?>">
                    <input name="p_currency_code" type="hidden" value="COP">
                    <input name="p_amount" id="p_amount" type="hidden" value="<?php echo $p_amount ?>">
                    <input name="p_tax" id="p_tax" type="hidden" value="<?= $totalIva ?>">
                    <input name="p_amount_base" id="p_amount_base" type="hidden" value="<?= $baseIva ?>">
                    <input name="p_test_request" type="hidden" value="<?= $isTest ?>">
                    <input name="p_signature" type="hidden" id="signature" value="<?php echo $p_signature ?>"/>
                    <input name="p_split_type" type="hidden" value="<?php echo $p_split_type ?>">
                    <input name="p_split_merchant_receiver" type="hidden"
                           value="<?php echo $p_split_merchant_receiver ?>">
                    <input name="p_split_primary_receiver" type="hidden"
                           value="<?php echo $p_split_primary_receiver ?>">
                    <input name="p_split_primary_receiver_fee" type="hidden"
                           value="<?php echo $p_split_primary_receiver_fee ?>">
                    <input name="p_split_receivers[0][id]" type="hidden"
                           value="<?php echo $p_split_receivers[0]['id'] ?>">
                    <input name="p_split_receivers[0][fee]" type="hidden"
                           value="<?php echo $p_split_receivers[0]['fee'] ?>">
                    <input name="p_signature_split" type="hidden" value="<?php echo $p_signature_split ?>">
                    <input name="p_extra3" type="hidden" value="<?= $csrf ?>">
                    <input name="p_url_confirmation" type="hidden" value="<?= $url ?>">
                    <input name="p_url_response" type="hidden" value="<?= $url ?>">
                  
                  
              
                    
                    <input type="image" id="imagen"  
                           src="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/btn1.png" />  
                </p>
            </div>
        
     </div>
    </section>
    <?php
}
ActiveForm::end();
?>