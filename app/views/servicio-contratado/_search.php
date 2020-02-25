<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioContratadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicio-contratado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_servicio_contratado') ?>

    <?= $form->field($model, 'evento_id_evento') ?>

    <?= $form->field($model, 'id_estado_servicio') ?>

    <?= $form->field($model, 'caballo_id_caballo') ?>

    <?= $form->field($model, 'jinete_id_jinete') ?>

    <?php // echo $form->field($model, 'identificador_servicio_contratado') ?>

    <?php // echo $form->field($model, 'monto') ?>

    <?php // echo $form->field($model, 'order_detail_id_order_detail') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
