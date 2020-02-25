<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResultadoSaltoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resultado-salto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_resultado_salto') ?>

    <?= $form->field($model, 'id_caballo_has_jinete') ?>

    <?= $form->field($model, 'id_prueba') ?>

    <?= $form->field($model, 'falta_obst') ?>

    <?= $form->field($model, 'fecha_inicial') ?>

    <?php // echo $form->field($model, 'fecha_final') ?>

    <?php // echo $form->field($model, 'faltas_tiempo') ?>

    <?php // echo $form->field($model, 'faltas_totales') ?>

    <?php // echo $form->field($model, 'clasificacion') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'cantidad_obstaculos') ?>

    <?php // echo $form->field($model, 'puntaje') ?>

    <?php // echo $form->field($model, 'fecha_inscripcion') ?>

    <?php // echo $form->field($model, 'clasificacion_final') ?>

    <?php // echo $form->field($model, 'orden_participacion') ?>

    <?php // echo $form->field($model, 'fecha_participacion') ?>

    <?php // echo $form->field($model, 'cantidad_rehuso') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
