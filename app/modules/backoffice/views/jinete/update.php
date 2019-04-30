<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jinete */

$this->title = 'Update Jinete: ' . $model->id_jinete;
$this->params['breadcrumbs'][] = ['label' => 'Jinetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jinete, 'url' => ['view', 'id' => $model->id_jinete]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jinete-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
