<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioContratado */
/* @var $servicioDisponible \app\models\ServicioDisponible
/* @var $form yii\widgets\ActiveForm */
?>
<h2>Inscripción <?= $servicioDisponible->pruebaSaltoIdPrueba->nombre ?></h2>
<div class="row">
    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'jinete_id_jinete') ?>

    <?= $form->field($model, 'caballo_id_caballo')->hiddenInput() ?>

    <?= $form->field($model, 'jinete_id_jinete')->hiddenInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
