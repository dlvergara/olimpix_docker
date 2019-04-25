<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TerminoCondicion */

$this->title = 'Create Termino Condicion';
$this->params['breadcrumbs'][] = ['label' => 'Termino Condicions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termino-condicion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
