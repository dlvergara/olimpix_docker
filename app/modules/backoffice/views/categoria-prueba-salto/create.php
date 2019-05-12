<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoriaPruebaSalto */

$this->title = 'Create Categoria Prueba Salto';
$this->params['breadcrumbs'][] = ['label' => 'Categoria Prueba Saltos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-prueba-salto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
