<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClasificacionJinete */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clasificacion-jinete-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_corto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoria_nacional')->textInput() ?>

    <?= $form->field($model, 'categoria_internacional')->textInput() ?>

    <?= $form->field($model, 'categoria_liga')->textInput() ?>

    <?= $form->field($model, 'edad_minima')->textInput() ?>

    <?= $form->field($model, 'edad_maxima')->textInput() ?>

    <?= $form->field($model, 'altura_salto_minima')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'altura_salto_max')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
