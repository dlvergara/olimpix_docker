<?php

use app\models\Caballo;
use app\models\Jinete;
use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResultadoSaltoSearch */
/* @var $form yii\widgets\ActiveForm */

$caballosJinetes = [];
$caballosJinetesData = \app\models\CaballoHasJinete::find()->joinWith(['caballo', 'jinete'])->orderBy(['jinete.nombre_completo' => SORT_ASC])->all();
foreach ($caballosJinetesData as $row) {
    $caballosJinetes[] = ['id' => $row->id_caballo_has_jinete, 'label' => $row->jinete->nombre_completo . ' - ' . $row->caballo->nombre, 'value' => $row->id_caballo_has_jinete];
}

$pruebas = [];
$pruebasData = \app\models\PruebaSalto::find()->joinWith('eventoIdEvento')->where(['cerrada' => 0])->all();
foreach ($pruebasData as $prueba) {
    $pruebas[$prueba->id_prueba] = $prueba->eventoIdEvento->nombre . ' - ' . $prueba->nombre;
}
?>

<div class="resultado-salto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

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
                        $('#resultadosaltosearch-id_caballo_has_jinete').val(ui.item.id);
                     }")],
    ]);
    ?>

    <?= $form->field($model, 'id_prueba')->dropDownList($pruebas, ['prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'falta_obst') ?>

    <?= $form->field($model, 'fecha_inicial') ?>

    <?php // echo $form->field($model, 'fecha_final') ?>

    <?php // echo $form->field($model, 'faltas_tiempo') ?>

    <?php // echo $form->field($model, 'faltas_totales') ?>

    <?php // echo $form->field($model, 'clasificacion') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'cantidad_obstaculos') ?>

    <?php // echo $form->field($model, 'puntaje') ?>

    <?php // echo $form->field($model, 'fecha_inscripcion') ?>

    <?php // echo $form->field($model, 'clasificacion_final') ?>

    <?php // echo $form->field($model, 'orden_participacion') ?>

    <?php // echo $form->field($model, 'fecha_participacion') ?>

    <?php // echo $form->field($model, 'cantidad_rehuso') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
