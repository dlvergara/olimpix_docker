<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioDisponible */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicio-disponible-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'evento_id_evento')->textInput() ?>

    <?= $form->field($model, 'fecha_inicio')->textInput() ?>

    <?= $form->field($model, 'fecha_fin')->textInput() ?>

    <?= $form->field($model, 'disponible')->textInput() ?>

    <?= $form->field($model, 'cantidad_disponible')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prueba_salto_id_prueba')->textInput() ?>

    <?= $form->field($model, 'proveedor_id_proveedor')->textInput() ?>

    <?= $form->field($model, 'porcentaje_comision_olimpix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'monto_comision_olimpix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'porcentaje_iva')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
