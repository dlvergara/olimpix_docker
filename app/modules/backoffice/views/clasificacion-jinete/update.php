<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClasificacionJinete */

$this->title = 'Update Clasificacion Jinete: ' . $model->id_clasificacion_jinete;
$this->params['breadcrumbs'][] = ['label' => 'Clasificacion Jinetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_clasificacion_jinete, 'url' => ['view', 'id' => $model->id_clasificacion_jinete]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clasificacion-jinete-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
