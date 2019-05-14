<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $model app\models\ServicioContratado
 * @var $orderDetail \app\models\OrderDetail
 * @var $servicioDisponible \app\models\ServicioDisponible
 * @var $form yii\widgets\ActiveForm
 * @var $eventoModel \app\models\Evento
 */

$attributeToShow = ['altura', 'distancia', 'tiempo_limite'];
$postUrl = Url::to(['servicio-contratado/create', 'evento' => $eventoModel->id_evento,]);
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

    <?php Pjax::begin(); ?>
    <?php
    $model->order_detail_id_order_detail = $orderDetail->id_order_detail;
    $form = ActiveForm::begin([
        'id' => 'form-' . $servicioDisponible->id_servicio_disponible,
        'action' => $postUrl,
        'enableAjaxValidation' => true,
        //'validationUrl' => 'validation-rul',
    ]); ?>

    <!-- JINETE -->
    <?= $this->render("jinete", ['model' => $model, 'form' => $form, 'servicioDisponible' => $servicioDisponible]) ?>

    <!-- CABALLO -->
    <?= $this->render("caballo", ['model' => $model, 'form' => $form, 'servicioDisponible' => $servicioDisponible]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => 'btn btn-success']) ?>
    </div>

    <?= $form->field($model, 'order_detail_id_order_detail')->hiddenInput()->label("") ?>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>

</div>