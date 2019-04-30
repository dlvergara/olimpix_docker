<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jinete */

$this->title = $model->id_jinete;
$this->params['breadcrumbs'][] = ['label' => 'Jinetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jinete-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_jinete], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_jinete], [
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
            'id_jinete',
            'club_id_club',
            'nombre_completo:ntext',
            'tipo_identificacion',
            'identificacion',
            'liga_id_liga',
            'pais_id_pais',
            'fecha_nacimiento',
            'registro_fec',
            'activo_fec',
            'activo_equi',
            'email:ntext',
            'telefono',
            'direccion:ntext',
        ],
    ]) ?>

</div>
