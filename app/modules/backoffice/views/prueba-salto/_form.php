<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PruebaSalto */
/* @var $form yii\widgets\ActiveForm */
$clasificacionJineteArray = ArrayHelper::map(\app\models\ClasificacionJinete::find()->all(), 'id_clasificacion_jinete', 'nombre');
$eventosArray = ArrayHelper::map(\app\models\Evento::find()->all(), 'id_evento', 'nombre');
?>

<div class="prueba-salto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'distancia')->textInput() ?>

    <?= $form->field($model, 'tiempo_acordado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'presidente_jurado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_saltos')->textInput() ?>

    <?= $form->field($model, 'velocidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'altura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tiempo_limite')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_clasificados')->textInput() ?>

    <?= $form->field($model, 'evento_id_evento')->dropDownList($eventosArray, ['prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'pista_id_pista')->textInput() ?>

    <?= $form->field($model, 'categoria_id_categoria')->textInput() ?>

    <?= $form->field($model, 'clasificacion_jinete_id_clasificacion_jinete')->dropDownList($clasificacionJineteArray, ['prompt' => 'Seleccione...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
