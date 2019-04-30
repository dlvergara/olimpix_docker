<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClasificacionJineteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clasificacion-jinete-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_clasificacion_jinete') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'nombre_corto') ?>

    <?= $form->field($model, 'categoria_nacional') ?>

    <?= $form->field($model, 'categoria_internacional') ?>

    <?php // echo $form->field($model, 'categoria_liga') ?>

    <?php // echo $form->field($model, 'edad_minima') ?>

    <?php // echo $form->field($model, 'edad_maxima') ?>

    <?php // echo $form->field($model, 'altura_salto_minima') ?>

    <?php // echo $form->field($model, 'altura_salto_max') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
