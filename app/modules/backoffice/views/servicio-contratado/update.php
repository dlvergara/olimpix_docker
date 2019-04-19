<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioContratado */

$this->title = 'Update Servicio Contratado: ' . $model->id_servicio_contratado;
$this->params['breadcrumbs'][] = ['label' => 'Servicio Contratados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_servicio_contratado, 'url' => ['view', 'id' => $model->id_servicio_contratado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicio-contratado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
