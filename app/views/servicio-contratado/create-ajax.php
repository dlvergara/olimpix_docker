<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioContratado */

$this->title = 'Create Servicio Contratado';
$this->params['breadcrumbs'][] = ['label' => 'Servicio Contratados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicio-contratado-create">

    <?= $this->render('_form-ajax', [
        'model' => $model,
    ]) ?>

</div>