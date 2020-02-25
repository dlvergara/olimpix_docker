<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResultadoSalto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resultado-salto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_caballo_has_jinete')->textInput() ?>

    <?= $form->field($model, 'id_prueba')->textInput() ?>

    <?= $form->field($model, 'falta_obst')->textInput() ?>

    <?= $form->field($model, 'fecha_inicial')->textInput() ?>

    <?= $form->field($model, 'fecha_final')->textInput() ?>

    <?= $form->field($model, 'faltas_tiempo')->textInput() ?>

    <?= $form->field($model, 'faltas_totales')->textInput() ?>

    <?= $form->field($model, 'clasificacion')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cantidad_obstaculos')->textInput() ?>

    <?= $form->field($model, 'puntaje')->textInput() ?>

    <?= $form->field($model, 'fecha_inscripcion')->textInput() ?>

    <?= $form->field($model, 'clasificacion_final')->textInput() ?>

    <?= $form->field($model, 'orden_participacion')->textInput() ?>

    <?= $form->field($model, 'fecha_participacion')->textInput() ?>

    <?= $form->field($model, 'cantidad_rehuso')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
