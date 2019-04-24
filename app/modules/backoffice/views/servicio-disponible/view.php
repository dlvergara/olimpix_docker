<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioDisponible */

$this->title = $model->id_servicio_disponible;
$this->params['breadcrumbs'][] = ['label' => 'Servicio Disponibles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="servicio-disponible-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_servicio_disponible], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_servicio_disponible], [
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
            'id_servicio_disponible',
            'evento_id_evento',
            'servicio_id_servicio',
            'fecha_inicio',
            'fecha_fin',
            'disponible',
            'cantidad_disponible',
            'timestamp',
            'descripcion:ntext',
            'monto',
            'nombre',
            'image_url:url',
            'proveedor_id_proveedor',
        ],
    ]) ?>

</div>
