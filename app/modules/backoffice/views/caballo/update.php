<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caballo */

$this->title = 'Update Caballo: ' . $model->id_caballo;
$this->params['breadcrumbs'][] = ['label' => 'Caballos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_caballo, 'url' => ['view', 'id' => $model->id_caballo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caballo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
