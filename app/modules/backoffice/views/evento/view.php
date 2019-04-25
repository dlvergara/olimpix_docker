<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */

$this->title = $model->id_evento;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="evento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_evento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_evento], [
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
            'id_evento',
            'fecha_inicio',
            'fecha_fin',
            'ciudad_id_ciudad',
            'nombre',
            'referencia_ubicacion',
            'url_bases_tenicas:ntext',
            'liga_id_liga',
            'cerrado',
            'fecha_cierre',
            'sorteado',
            'fecha_sorteo',
            'descripcion:ntext',
            'direccion:ntext',
            'tipo_evento',
        ],
    ]) ?>

</div>
