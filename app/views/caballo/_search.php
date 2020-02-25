<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CaballoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="caballo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_caballo') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'fecha_nacimiento') ?>

    <?= $form->field($model, 'fecha_grado') ?>

    <?= $form->field($model, 'puntaje') ?>

    <?php // echo $form->field($model, 'identificacion') ?>

    <?php // echo $form->field($model, 'raza_id_raza') ?>

    <?php // echo $form->field($model, 'id_caballo_padre') ?>

    <?php // echo $form->field($model, 'id_caballo_madre') ?>

    <?php // echo $form->field($model, 'id_propietario') ?>

    <?php // echo $form->field($model, 'registro_fec') ?>

    <?php // echo $form->field($model, 'pasaporte_fec') ?>

    <?php // echo $form->field($model, 'vigente_ica') ?>

    <?php // echo $form->field($model, 'fecha_vigencia_ica') ?>

    <?php // echo $form->field($model, 'vigente_fec') ?>

    <?php // echo $form->field($model, 'fecha_vigencia_fec') ?>

    <?php // echo $form->field($model, 'num_microchip_principal') ?>

    <?php // echo $form->field($model, 'liga_id_liga') ?>

    <?php // echo $form->field($model, 'club_id_club') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
