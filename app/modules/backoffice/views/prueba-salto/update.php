<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PruebaSalto */

$this->title = 'Update Prueba Salto: ' . $model->id_prueba;
$this->params['breadcrumbs'][] = ['label' => 'Prueba Saltos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_prueba, 'url' => ['view', 'id' => $model->id_prueba]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prueba-salto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
