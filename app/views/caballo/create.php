<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caballo */

$this->title = 'Create Caballo';
$this->params['breadcrumbs'][] = ['label' => 'Caballos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caballo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
