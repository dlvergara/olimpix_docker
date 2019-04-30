<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CategoriaPruebaSalto */

$this->title = $model->id_categoria_prueba;
$this->params['breadcrumbs'][] = ['label' => 'Categoria Prueba Saltos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="categoria-prueba-salto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_categoria_prueba], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_categoria_prueba], [
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
            'id_categoria_prueba',
            'nombre',
            'altura',
            'valor_preventa',
            'valor_venta',
            'valor_posventa',
        ],
    ]) ?>

</div>
