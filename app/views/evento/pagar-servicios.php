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
 */

$form = ActiveForm::begin([
    'options' => ['data' => ['pjax' => true]],
    'action' => Yii::$app->getUrlManager()->createUrl(['evento/pagar', 'evento' => $model->id_evento]),
]);

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
                        foreach ($formModels as $index => $formModel) {
                            $total += $formModel->subtotal;
                            $idServicio = $formModel->servicio;
                            $cantidad = intval($formModel->cantidad);
                            $checkBoxName = 'ReservaForm[' . $idServicio . '][servicio]';
                            ?>
                            <div class="table-row">
                                <div class="serial">
                                    <?= $index ?>
                                    <?php
                                    echo $form->field( $formModel, 'servicio')->hiddenInput(['name' => $checkBoxName])->label(false);
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
                                <div class="servicio"><?= $formModel->getServicioDisponible()->nombre ?></div>
                                <div class="precio-unitario"><?= number_format($formModel->getServicioDisponible()->monto, 2, ',', '.') ?></div>
                                <div class="cantidad"><?= $formModel->cantidad ?></div>
                                <div class="subtotal"><?= number_format($formModel->subtotal,2, ',', '.') ?></div>
                            </div>
                            <?php
                        }

                        foreach ($cargosAdicionales as $index => $cargoAdicional) {

                        }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-md-8" >
                        <h3>Datos del comprador</h3>
                        <div class="mt-10">
                            <?= $form->field( $buyerInfo, 'name')->input(['placeholder' => "Nombre completo", 'class' => 'single-input']) ?>
                            <!--<input type="text" name="BuyerInfo[buyer_name]" placeholder="Nombre completo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nombre completo'" required=true class="single-input">-->
                        </div>
                        <div class="mt-10">
                            <?= $form->field( $buyerInfo, 'email')->input(['placeholder' => "Nombre completo", 'class' => 'single-input']) ?>
                            <!--<input type="email" name="BuyerInfo[email]" placeholder="Correo electronico" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Correo electronico'" required=true class="single-input">-->
                        </div>
                        <div class="mt-10">
                            <?= $form->field( $buyerInfo, 'phone')->input(['placeholder' => "Nombre completo", 'class' => 'single-input']) ?>
                            <!--<input type="phone" name="BuyerInfo[phone]" placeholder="Telefono" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Telefono'" required=true class="single-input">-->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?= Html::submitButton('Pagar', ['class' => 'genric-btn primary e-large']) ?>
                </div>
            </div>
    </section>
    <?php
}
ActiveForm::end();
?>