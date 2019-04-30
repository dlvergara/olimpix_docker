<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CategoriaPruebaSalto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoria-prueba-salto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'altura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor_preventa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor_venta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor_posventa')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
