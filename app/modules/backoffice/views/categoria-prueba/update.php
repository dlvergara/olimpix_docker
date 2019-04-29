<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoriaPrueba */

$this->title = 'Update Categoria Prueba: ' . $model->id_categoria_prueba;
$this->params['breadcrumbs'][] = ['label' => 'Categoria Pruebas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_categoria_prueba, 'url' => ['view', 'id' => $model->id_categoria_prueba]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoria-prueba-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
