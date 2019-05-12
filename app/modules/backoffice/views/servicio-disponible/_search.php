<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioDisponibleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicio-disponible-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_servicio_disponible') ?>

    <?= $form->field($model, 'evento_id_evento') ?>

    <?= $form->field($model, 'fecha_inicio') ?>

    <?= $form->field($model, 'fecha_fin') ?>

    <?= $form->field($model, 'disponible') ?>

    <?php // echo $form->field($model, 'cantidad_disponible') ?>

    <?php // echo $form->field($model, 'timestamp') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'monto') ?>

    <?php // echo $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'image_url') ?>

    <?php // echo $form->field($model, 'prueba_salto_id_prueba') ?>

    <?php // echo $form->field($model, 'proveedor_id_proveedor') ?>

    <?php // echo $form->field($model, 'porcentaje_comision_olimpix') ?>

    <?php // echo $form->field($model, 'monto_comision_olimpix') ?>

    <?php // echo $form->field($model, 'porcentaje_iva') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
