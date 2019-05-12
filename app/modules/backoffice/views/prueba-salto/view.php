<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PruebaSalto */

$this->title = $model->id_prueba;
$this->params['breadcrumbs'][] = ['label' => 'Prueba Saltos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prueba-salto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_prueba], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_prueba], [
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
            'id_prueba',
            'nombre',
            'fecha',
            'distancia',
            'tiempo_acordado',
            'presidente_jurado',
            'numero_saltos',
            'velocidad',
            'altura',
            'tiempo_limite',
            'numero_clasificados',
            'evento_id_evento',
            'pista_id_pista',
            'categoria_id_categoria',
        ],
    ]) ?>

</div>
