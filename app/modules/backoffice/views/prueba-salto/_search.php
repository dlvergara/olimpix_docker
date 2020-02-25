<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PruebaSaltoSearch */
/* @var $form yii\widgets\ActiveForm */

$eventos = \yii\helpers\ArrayHelper::map(\app\models\Evento::find()->all(), 'id_evento', 'nombre');
$pistas = \yii\helpers\ArrayHelper::map(\app\models\Pista::find()->all(), 'id_pista', 'identificador');
$categorias = \yii\helpers\ArrayHelper::map(\app\models\CategoriaPruebaSalto::find()->all(), 'id_categoria_prueba', 'nombre');
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

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'evento_id_evento')->dropDownList($eventos, ['prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'pista_id_pista')->dropDownList($pistas, ['prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'categoria_id_categoria')->dropDownList($categorias, ['prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'distancia') ?>

    <?= $form->field($model, 'tiempo_acordado') ?>

    <?php // echo $form->field($model, 'presidente_jurado') ?>

    <?php // echo $form->field($model, 'numero_saltos') ?>

    <?php // echo $form->field($model, 'velocidad') ?>

    <?php // echo $form->field($model, 'altura') ?>

    <?php // echo $form->field($model, 'tiempo_limite') ?>

    <?php // echo $form->field($model, 'numero_clasificados') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
