<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderHasPaymentMethod */

$this->title = 'Update Order Has Payment Method: ' . $model->order_id_order;
$this->params['breadcrumbs'][] = ['label' => 'Order Has Payment Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_id_order, 'url' => ['view', 'order_id_order' => $model->order_id_order, 'payment_method_id_payment_method' => $model->payment_method_id_payment_method]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-has-payment-method-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
