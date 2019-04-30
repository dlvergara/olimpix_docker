<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JineteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jinete-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_jinete') ?>

    <?= $form->field($model, 'club_id_club') ?>

    <?= $form->field($model, 'nombre_completo') ?>

    <?= $form->field($model, 'tipo_identificacion') ?>

    <?= $form->field($model, 'identificacion') ?>

    <?php // echo $form->field($model, 'liga_id_liga') ?>

    <?php // echo $form->field($model, 'pais_id_pais') ?>

    <?php // echo $form->field($model, 'fecha_nacimiento') ?>

    <?php // echo $form->field($model, 'registro_fec') ?>

    <?php // echo $form->field($model, 'activo_fec') ?>

    <?php // echo $form->field($model, 'activo_equi') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
