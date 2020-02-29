<?php
/* @var $row \app\models\ResultadoSalto */
/* @var $this yii\web\View */

/* @var $model \app\models\PruebaSalto */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

/*
Pjax::begin([
    'id' => 'savePrueba_' . $model->id_prueba . '_' . $row->id_resultado_salto,
    'enablePushState' => false,
    'options' => ['class' => 'row']
]);
*/

$form = ActiveForm::begin([
    'id' => 'form_prueba_' . $model->id_prueba . '_' . $row->id_resultado_salto,
    //'layout' => 'horizontal',
    //'class' => 'row',
    'action' => ['/backoffice/prueba-salto/calificar', 'id' => $row->id_resultado_salto],
    'fieldConfig' => ['options' => ['class' => 'form-group col-md-1']],
    'options' => ['data-pjax' => '1', 'class' => 'row'],
]);
?>
    <div class="col-md-2"><?= $row->orden_participacion . '. ' . $row->caballoHasJinete->jinete->nombre_completo ?></div>
<div class="col-md-1"><?= $row->caballoHasJinete->caballo->nombre ?></div>
<?= $form->field($row, 'falta_obst')->textInput(['type' => 'number'])->label(false) ?>
<?= $form->field($row, 'tiempo')->textInput(['type' => 'number', 'step' => '0.01'])->label(false) ?>
<?= $form->field($row, 'faltas_tiempo')->textInput(['type' => 'number'])->label(false) ?>
<?= $form->field($row, 'faltas_totales')->textInput(['type' => 'number'])->label(false) ?>
<?= $form->field($row, 'clasificacion')->textInput(['type' => 'number'])->label(false) ?>
<?= $form->field($row, 'observaciones')->textInput(['rows' => 6])->label(false) ?>
<?= $form->field($row, 'cantidad_rehuso')->textInput(['type' => 'number'])->label(false) ?>
<?= $form->field($row, 'eliminado')->checkbox()->label(false) ?>
<?= $form->field($row, 'no_se_presento')->checkbox()->label(false) ?>
<?= $form->field($row, 'clasificacion_final')->textInput(['type' => 'number'])->label(false) ?>

<div class="col-md-1">
    <?php
    $buttonMsg = 'Guardar';
    if (!empty($row->tiempo)) {
        $buttonMsg = 'Actualizar';
    }
    echo Html::submitButton($buttonMsg, ['class' => 'btn btn-success']);
    echo $form->field($row, 'id_resultado_salto')->hiddenInput()->label(false);
    ?>
</div>

<?php
ActiveForm::end();
//Pjax::end();
?>