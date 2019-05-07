<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioContratado */
/* @var $form yii\widgets\ActiveForm */
?>
<h2><?= $servicioDisponible->nombre ?></h2>
<div class="row">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'caballo_id_caballo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
