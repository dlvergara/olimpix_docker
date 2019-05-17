<?php

/**
 * @var $this yii\web\View
 * @var $model app\models\ServicioContratado
 * @var $orderDetail \app\models\OrderDetail
 * @var $servicioDisponible \app\models\ServicioDisponible
 * @var $form yii\widgets\ActiveForm
 * @var $eventoModel \app\models\Evento
 */

$attributeToShow = ['altura', 'distancia', 'tiempo_limite'];

?>
<div class="col-lg-6 single-blog">
    <!-- Inscripción -->
    <h4><?= ucfirst(strtolower($servicioDisponible->pruebaSaltoIdPrueba->nombre)) ?></h4>
    <ul class="tags">
        <?php
        foreach ($servicioDisponible->pruebaSaltoIdPrueba->attributes as $index => $attribute) {
            if (in_array($index, $attributeToShow) && !empty($attribute)) {
                ?>
                <li>
                    <a href="#">
                        <?= $servicioDisponible->pruebaSaltoIdPrueba->getAttributeLabel($index) ?>
                        : <?= $attribute ?>
                    </a>
                </li>
                <?php
            }
        }
        ?>
    </ul>

    <?php
    if( boolval($servicioDisponible->pruebaSaltoIdPrueba->cerrada) ) {
        echo $this->render('prueba', [
                'model' => $model,
                'servicioDisponible' => $orderDetail->servicioDisponibleIdServicioDisponible,
                'eventoModel' => $eventoModel,
                'orderDetail' => $orderDetail,
            ]
        );
    } else {
        ?>
        <p>Esta prueba ha finalizado.</p>
        <?php
    }
    ?>

</div>