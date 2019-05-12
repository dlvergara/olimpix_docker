<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoriaPruebaSalto */

$this->title = 'Update Categoria Prueba Salto: ' . $model->id_categoria_prueba;
$this->params['breadcrumbs'][] = ['label' => 'Categoria Prueba Saltos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_categoria_prueba, 'url' => ['view', 'id' => $model->id_categoria_prueba]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoria-prueba-salto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
