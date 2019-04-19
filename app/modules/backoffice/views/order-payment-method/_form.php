<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderHasPaymentMethod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-has-payment-method-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id_order')->textInput() ?>

    <?= $form->field($model, 'payment_method_id_payment_method')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
