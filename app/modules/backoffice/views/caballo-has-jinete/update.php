<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CaballoHasJinete */

$this->title = 'Update Caballo Has Jinete: ' . $model->id_caballo_has_jinete;
$this->params['breadcrumbs'][] = ['label' => 'Caballo Has Jinetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_caballo_has_jinete, 'url' => ['view', 'id' => $model->id_caballo_has_jinete]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caballo-has-jinete-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
