<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ResultadoSalto */

$this->title = $model->id_resultado_salto;
$this->params['breadcrumbs'][] = ['label' => 'Resultado Saltos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="resultado-salto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_resultado_salto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_resultado_salto], [
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
            'id_resultado_salto',
            'id_caballo_has_jinete',
            'id_prueba',
            'falta_obst',
            'fecha_inicial',
            'fecha_final',
            'faltas_tiempo',
            'faltas_totales',
            'clasificacion',
            'observaciones:ntext',
            'cantidad_obstaculos',
            'puntaje',
            'fecha_inscripcion',
            'clasificacion_final',
            'orden_participacion',
            'fecha_participacion',
            'cantidad_rehuso',
        ],
    ]) ?>

</div>
