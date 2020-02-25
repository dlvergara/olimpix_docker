<?php

/**
 * @var $this yii\web\View
 * @var $model app\models\ServicioContratado
 * @var $orderDetail \app\models\OrderDetail
 * @var $servicioDisponible \app\models\ServicioDisponible
 * @var $form yii\widgets\ActiveForm
 * @var $eventoModel \app\models\Evento
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

$postUrl = Url::to(['servicio-contratado/create', 'evento' => $eventoModel->id_evento, 'orderDetailId' => $orderDetail->id_order_detail]);

Pjax::begin();
if (empty($model->order_detail_id_order_detail)) {
    $model->order_detail_id_order_detail = $orderDetail->id_order_detail;
}
$form = ActiveForm::begin([
    'id' => 'form-' . $servicioDisponible->id_servicio_disponible,
    'action' => $postUrl,
    'enableAjaxValidation' => true,
    //'validationUrl' => 'validation-rul',
]);
if (!empty($model->caballo_id_caballo) || !empty($model->jinete_id_jinete)) {
    echo $form->field($model, 'id_servicio_contratado')->hiddenInput()->label("");
}
?>
    <!-- JINETE -->
<?= $this->render("jinete", ['model' => $model, 'form' => $form, 'servicioDisponible' => $servicioDisponible]) ?>

    <!-- CABALLO -->
<?= $this->render("caballo", ['model' => $model, 'form' => $form, 'servicioDisponible' => $servicioDisponible]) ?>

<?php
if (empty($model->caballo_id_caballo) || empty($model->jinete_id_jinete)) {
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => 'btn btn-success']) ?>
    </div>
    <?php
}
?>

<?= $form->field($model, 'order_detail_id_order_detail')->hiddenInput()->label("") ?>

<?php
ActiveForm::end();
Pjax::end();