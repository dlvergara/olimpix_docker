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

$form = ActiveForm::begin([
    'options' => ['data' => ['pjax' => true]],
    'action' => Yii::$app->getUrlManager()->createUrl(['evento/pagar', 'evento' => $model->id_evento]),
]);

if (count($formModels) > 0) {
    ?>
    <!-- Start training Area -->
    <section class="training-area section-gap">
        <div class="container">
            <div class="row">
                <h3 class="mb-30">Reservar servicios</h3>
            </div>

            <div class="section-top-border">
                <h3 class="mb-30">Table</h3>
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
                            $subtotal = floatval($formModel->getServicioDisponible()->monto) * intval($formModel->cantidad);
                            $total += $subtotal;
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
                                <div class="subtotal"><?= $subtotal ?></div>
                            </div>
                            <?php
                        }
                        ?>
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