<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ResultadoSalto */

$this->title = 'Update Resultado Salto: ' . $model->id_resultado_salto;
$this->params['breadcrumbs'][] = ['label' => 'Resultado Saltos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_resultado_salto, 'url' => ['view', 'id' => $model->id_resultado_salto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resultado-salto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
