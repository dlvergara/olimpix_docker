<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gateway */

$this->title = 'Update Gateway: ' . $model->id_gateway;
$this->params['breadcrumbs'][] = ['label' => 'Gateways', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_gateway, 'url' => ['view', 'id' => $model->id_gateway]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gateway-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
