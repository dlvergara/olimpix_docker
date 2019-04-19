<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderHasPaymentMethod */

$this->title = 'Create Order Has Payment Method';
$this->params['breadcrumbs'][] = ['label' => 'Order Has Payment Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-has-payment-method-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
