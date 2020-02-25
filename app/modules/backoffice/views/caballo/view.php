<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Caballo */

$this->title = $model->id_caballo;
$this->params['breadcrumbs'][] = ['label' => 'Caballos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="caballo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_caballo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_caballo], [
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
            'id_caballo',
            'nombre',
            'fecha_nacimiento',
            'fecha_grado',
            'puntaje',
            'identificacion',
            'raza_id_raza',
            'id_caballo_padre',
            'id_caballo_madre',
            'id_propietario',
            'registro_fec',
            'pasaporte_fec',
            'vigente_ica',
            'fecha_vigencia_ica',
            'vigente_fec',
            'fecha_vigencia_fec',
            'num_microchip_principal',
            'liga_id_liga',
            'club_id_club',
        ],
    ]) ?>

</div>
