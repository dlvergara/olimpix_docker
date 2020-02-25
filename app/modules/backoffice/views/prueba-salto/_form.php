<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PruebaSalto */
/* @var $form yii\widgets\ActiveForm */
$eventosArray = \yii\helpers\ArrayHelper::map(\app\models\Evento::find()->all(), 'id_evento', 'nombre');
$pistaArray = \yii\helpers\ArrayHelper::map(\app\models\Pista::find()->all(), 'id_pista', 'identificador');
$categoriaArray = \yii\helpers\ArrayHelper::map(\app\models\CategoriaPruebaSalto::find()->all(), 'id_categoria_prueba', 'nombre');
$proveedorArray= \yii\helpers\ArrayHelper::map(\app\models\Proveedor::find()->all(), 'id_proveedor', 'nombre');

$servicioDisponibleFormPreVenta = new \app\models\ServicioDisponible();
$servicioDisponibleFormVenta = new \app\models\ServicioDisponible();
$servicioDisponibleFormPosVenta = new \app\models\ServicioDisponible();
?>

<div class="prueba-salto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->textInput(['type' => 'datetime-local']) ?>

    <?= $form->field($model, 'evento_id_evento')->dropDownList($eventosArray, ['prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'pista_id_pista')->dropDownList($pistaArray, ['prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'categoria_id_categoria')->dropDownList($categoriaArray, ['prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'distancia')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'tiempo_acordado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'presidente_jurado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_saltos')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'velocidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'altura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tiempo_limite')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_clasificados')->textInput(['type' => 'number']) ?>

    <div>
        <h2>Inscripciones</h2>
        <div>
           <h3>Pre venta</h3>
            <?= $form->field($servicioDisponibleFormPreVenta, '[preventa]monto')->textInput(['maxlength' => true, 'name']) ?>
            <?= $form->field($servicioDisponibleFormPreVenta, '[preventa]nombre')->textInput(['maxlength' => true]) ?>
            <?= $form->field($servicioDisponibleFormPreVenta, '[preventa]proveedor_id_proveedor')->dropDownList($proveedorArray, ['prompt' => 'Seleccione...']) ?>
        </div>
        <div>
            <h3>Venta</h3>
            <?= $form->field($servicioDisponibleFormVenta, '[venta]monto')->textInput(['maxlength' => true]) ?>
            <?= $form->field($servicioDisponibleFormVenta, '[venta]nombre')->textInput(['maxlength' => true]) ?>
            <?= $form->field($servicioDisponibleFormVenta, '[venta]proveedor_id_proveedor')->dropDownList($proveedorArray, ['prompt' => 'Seleccione...']) ?>
        </div>
        <div>
            <h3>Pos venta</h3>
            <?= $form->field($servicioDisponibleFormPosVenta, '[posventa]monto')->textInput(['maxlength' => true]) ?>
            <?= $form->field($servicioDisponibleFormPosVenta, '[posventa]nombre')->textInput(['maxlength' => true]) ?>
            <?= $form->field($servicioDisponibleFormPosVenta, '[posventa]proveedor_id_proveedor')->dropDownList($proveedorArray, ['prompt' => 'Seleccione...']) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
