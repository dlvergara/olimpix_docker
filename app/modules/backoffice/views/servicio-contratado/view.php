<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioContratado */

$this->title = $model->id_servicio_contratado;
$this->params['breadcrumbs'][] = ['label' => 'Servicio Contratados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="servicio-contratado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_servicio_contratado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_servicio_contratado], [
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
            'id_servicio_contratado',
            'evento_id_evento',
            'id_estado_servicio',
            'caballo_id_caballo',
            'jinete_id_jinete',
            'identificador_servicio_contratado',
            'monto',
            'servicio_disponible_id_servicio_disponible',
        ],
    ]) ?>

</div>
