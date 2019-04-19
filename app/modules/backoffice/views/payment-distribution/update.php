<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentDistribution */

$this->title = 'Update Payment Distribution: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Payment Distributions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_payment_distribution]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payment-distribution-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
