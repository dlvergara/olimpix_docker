<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CaballoHasJinete */

$this->title = 'Create Caballo Has Jinete';
$this->params['breadcrumbs'][] = ['label' => 'Caballo Has Jinetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caballo-has-jinete-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
