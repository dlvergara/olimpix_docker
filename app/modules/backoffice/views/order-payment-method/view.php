<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrderHasPaymentMethod */

$this->title = $model->order_id_order;
$this->params['breadcrumbs'][] = ['label' => 'Order Has Payment Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-has-payment-method-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'order_id_order' => $model->order_id_order, 'payment_method_id_payment_method' => $model->payment_method_id_payment_method], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'order_id_order' => $model->order_id_order, 'payment_method_id_payment_method' => $model->payment_method_id_payment_method], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'order_id_order',
            'payment_method_id_payment_method',
        ],
    ]) ?>

</div>
