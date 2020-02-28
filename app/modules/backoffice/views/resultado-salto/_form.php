<?php

use app\models\Caballo;
use app\models\CaballoHasJineteSearch;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\ResultadoSalto */
/* @var $form yii\widgets\ActiveForm */

$caballosJinetes = [];
$caballosJinetesData = \app\models\CaballoHasJinete::find()->joinWith(['caballo', 'jinete'])->orderBy(['jinete.nombre_completo' => SORT_ASC])->all();
foreach ($caballosJinetesData as $row) {
    $caballosJinetes[] = ['id' => $row->id_caballo_has_jinete, 'label' => $row->jinete->nombre_completo . ' - ' . $row->caballo->nombre, 'value' => $row->id_caballo_has_jinete];
}

$pruebas = \yii\helpers\ArrayHelper::map(\app\models\PruebaSalto::find()->where(['cerrada' => 0])->all(), 'id_prueba', 'nombre');
?>

<div class="resultado-salto-form">

    <?php $form = ActiveForm::begin(['id' => 'resultadoSaltoForm']); ?>

    <?= $form->field($model, 'id_caballo_has_jinete')->hiddenInput()->label(false) ?>
    <label for="autocompleteCaballoJinete">Jinete y caballo: </label>
    <br>
    <?=
    AutoComplete::widget([
        'id' => 'autocompleteCaballoJinete',
        'value' => $model->id_caballo_has_jinete,
        'clientOptions' => [
            'source' => $caballosJinetes,
            'minLength' => '3',
            'autoFill' => true,
            'select' => new JsExpression("function( event, ui ) {
                        $('#resultadosalto-id_caballo_has_jinete').val(ui.item.id);
                     }")],
    ]);
    /*
    $viewUrl = Yii::$app->getUrlManager()->createUrl(['backoffice/caballo-has-jinete/list']);
    Modal::begin(
        [
            'header' => '<h2>Hello world</h2>',
            'toggleButton' => ['label' => 'Buscar Jinete y Caballo'],
            'size' => 'modal-lg',
            'clientOptions' => [
                'remote' => $viewUrl,
            ]
        ]
    );
    ?>
    <?php
    //<iframe src="" style="width: 100%" ></iframe>
    Modal::end();
    */
    ?>

    <hr>

    <?= $form->field($model, 'id_prueba')->dropDownList($pruebas, ['prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'orden_participacion')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'fecha_participacion')->textInput(['type' => 'datetime']) ?>

    <?= $form->field($model, 'fecha_inscripcion')->textInput(['type' => 'datetime']) ?>

    <hr>

    <?= $form->field($model, 'falta_obst')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'tiempo')->textInput(['type' => 'number', 'step' => '0.01']) ?>

    <?= $form->field($model, 'faltas_tiempo')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'faltas_totales')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'cantidad_rehuso')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'clasificacion')->textInput() ?>

    <?= $form->field($model, 'eliminado')->checkbox() ?>

    <?= $form->field($model, 'no_se_presento')->checkbox() ?>


    <hr>

    <?= $form->field($model, 'clasificacion_final')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cantidad_obstaculos')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'puntaje')->textInput() ?>

    <hr>

    <?= $form->field($model, 'fecha_inicial')->textInput() ?>

    <?= $form->field($model, 'fecha_final')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
