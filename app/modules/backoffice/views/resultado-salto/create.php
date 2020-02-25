<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ResultadoSalto */

$this->title = 'Create Resultado Salto';
$this->params['breadcrumbs'][] = ['label' => 'Resultado Saltos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resultado-salto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
