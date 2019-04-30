<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PruebaSalto */

$this->title = 'Create Prueba Salto';
$this->params['breadcrumbs'][] = ['label' => 'Prueba Saltos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prueba-salto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
