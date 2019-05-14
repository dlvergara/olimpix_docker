<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioContratado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicio-contratado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'evento_id_evento')->hiddenInput()->label("") ?>

    <?= $form->field($model, 'id_estado_servicio')->hiddenInput()->label("") ?>

    <?= $form->field($model, 'jinete_id_jinete')->textInput() ?>

    <?= $form->field($model, 'caballo_id_caballo')->textInput() ?>

    <?= $form->field($model, 'order_detail_id_order_detail')->textInput() ?>

    <!--
    <?= $form->field($model, 'identificador_servicio_contratado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>
    -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
