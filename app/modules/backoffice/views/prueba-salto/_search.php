<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PruebaSaltoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prueba-salto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_prueba') ?>

    <?= $form->field($model, 'categoria') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'distancia') ?>

    <?= $form->field($model, 'tiempo_acordado') ?>

    <?php // echo $form->field($model, 'presidente_jurado') ?>

    <?php // echo $form->field($model, 'numero_saltos') ?>

    <?php // echo $form->field($model, 'velocidad') ?>

    <?php // echo $form->field($model, 'altura') ?>

    <?php // echo $form->field($model, 'tiempo_limite') ?>

    <?php // echo $form->field($model, 'numero_clasificados') ?>

    <?php // echo $form->field($model, 'evento_id_evento') ?>

    <?php // echo $form->field($model, 'pista_id_pista') ?>

    <?php // echo $form->field($model, 'categoria_id_categoria') ?>

    <?php // echo $form->field($model, 'clasificacion_jinete_id_clasificacion_jinete') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
