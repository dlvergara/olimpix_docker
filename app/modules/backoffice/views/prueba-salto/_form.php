<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PruebaSalto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prueba-salto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'distancia')->textInput() ?>

    <?= $form->field($model, 'tiempo_acordado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'presidente_jurado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_saltos')->textInput() ?>

    <?= $form->field($model, 'velocidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'altura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tiempo_limite')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_clasificados')->textInput() ?>

    <?= $form->field($model, 'evento_id_evento')->textInput() ?>

    <?= $form->field($model, 'pista_id_pista')->textInput() ?>

    <?= $form->field($model, 'categoria_id_categoria')->textInput() ?>

    <?= $form->field($model, 'clasificacion_jinete_id_clasificacion_jinete')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
