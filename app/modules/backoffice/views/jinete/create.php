<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jinete */

$this->title = 'Create Jinete';
$this->params['breadcrumbs'][] = ['label' => 'Jinetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jinete-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
