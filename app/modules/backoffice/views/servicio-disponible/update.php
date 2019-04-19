<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioDisponible */

$this->title = 'Update Servicio Disponible: ' . $model->id_servicio_disponible;
$this->params['breadcrumbs'][] = ['label' => 'Servicio Disponibles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_servicio_disponible, 'url' => ['view', 'id' => $model->id_servicio_disponible]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicio-disponible-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
