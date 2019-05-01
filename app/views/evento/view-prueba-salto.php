<?php
/**
 * @var $prueba \app\models\PruebaSalto
 * @var $formModels array
 */

use app\models\ReservaForm;

$servicios = $prueba->servicioDisponibles;

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
                <div class="details">
                    <div class="title justify-content-between">
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
