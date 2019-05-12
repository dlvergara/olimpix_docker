<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Caballo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="caballo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_nacimiento')->textInput() ?>

    <?= $form->field($model, 'fecha_grado')->textInput() ?>

    <?= $form->field($model, 'puntaje')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'raza_id_raza')->textInput() ?>

    <?= $form->field($model, 'id_caballo_padre')->textInput() ?>

    <?= $form->field($model, 'id_caballo_madre')->textInput() ?>

    <?= $form->field($model, 'id_propietario')->textInput() ?>

    <?= $form->field($model, 'registro_fec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pasaporte_fec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigente_ica')->textInput() ?>

    <?= $form->field($model, 'fecha_vigencia_ica')->textInput() ?>

    <?= $form->field($model, 'vigente_fec')->textInput() ?>

    <?= $form->field($model, 'fecha_vigencia_fec')->textInput() ?>

    <?= $form->field($model, 'num_microchip_principal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'liga_id_liga')->textInput() ?>

    <?= $form->field($model, 'club_id_club')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
