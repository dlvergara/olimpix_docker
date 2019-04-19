<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioDisponible */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicio-disponible-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_servicio_disponible')->textInput() ?>

    <?= $form->field($model, 'evento_id_evento')->textInput() ?>

    <?= $form->field($model, 'servicio_id_servicio')->textInput() ?>

    <?= $form->field($model, 'fecha_inicio')->textInput() ?>

    <?= $form->field($model, 'fecha_fin')->textInput() ?>

    <?= $form->field($model, 'disponible')->textInput() ?>

    <?= $form->field($model, 'cantidad_disponible')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
