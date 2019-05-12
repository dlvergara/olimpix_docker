<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClasificacionJinete */

$this->title = $model->id_clasificacion_jinete;
$this->params['breadcrumbs'][] = ['label' => 'Clasificacion Jinetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clasificacion-jinete-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_clasificacion_jinete], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_clasificacion_jinete], [
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
            'id_clasificacion_jinete',
            'nombre',
            'nombre_corto',
            'categoria_nacional',
            'categoria_internacional',
            'categoria_liga',
            'edad_minima',
            'edad_maxima',
            'altura_salto_minima',
            'altura_salto_max',
        ],
    ]) ?>

</div>
