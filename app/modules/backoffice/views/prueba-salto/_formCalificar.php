
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
    'enableClientValidation' => true,
    //'layout' => 'horizontal',
    //'class' => 'row',
    'action' => ['/backoffice/prueba-salto/calificar', 'id' => $row->id_resultado_salto],
  // 'fieldConfig' => ['options' => ['class' => 'form-group']],
    'options' => ['data-pjax' => '1', 'class' => 'row'],
]);
?>
 
    <div class="table-responsive{-sm|-md|-lg|-xl}">
            <div style="text-align:center;">
    <table class="table table-striped  table-bordered table-hover">
        <tbody>
        <tr class="bg-warning">
            <td class="col-md-1"><?= $row->orden_participacion ?></td>
            <td class="col-md-2"
                style="width 300px"><?= ucwords(strtolower($row->caballoHasJinete->jinete->nombre_completo)) ?></td>
            <td class="col-md-1"><?= ucwords(strtolower($row->caballoHasJinete->caballo->nombre)) ?></td>
            <td class="col-md-1"><?= $form->field($row, 'falta_obst')->textInput(['type' => 'number'])->label(false) ?></td>
            <td class="col-md-1"><?= $form->field($row, 'tiempo')->textInput(['type' => 'number', 'step' => '0.01'])->label(false) ?></td>
            <td class="col-md-1"><?= $form->field($row, 'faltas_tiempo')->textInput(['type' => 'number'])->label(false) ?></td>
            <td class="col-md-1"><?= $form->field($row, 'faltas_totales')->textInput(['type' => 'number'])->label(false) ?></td>
            <td class="col-md-1"><?= $form->field($row, 'clasificacion')->textInput(['type' => 'number'])->label(false) ?></td>
            <td class="col-md-1"><?= $form->field($row, 'observaciones')->textInput(['rows' => 6])->label(false) ?></td>
            <td class="col-md-1"><?= $form->field($row, 'cantidad_rehuso')->textInput(['type' => 'number'])->label(false) ?></td>
            <td class="col-md-1"><?= $form->field($row, 'eliminado')->checkbox()->label(false) ?></td>
            <td class="col-md-1"><?= $form->field($row, 'no_se_presento')->checkbox()->label(false) ?></td>
            <td class="col-md-1"><?= $form->field($row, 'clasificacion_final')->textInput(['type' => 'number'])->label(false) ?></td>
            <td class="col-md-2">
                <?php
                $buttonMsg = 'Guardar';
                if (!empty($row->tiempo)) {
                    $buttonMsg = 'Actualizar';
                }
                echo Html::submitButton($buttonMsg, ['class' => 'btn btn-success']);
                echo $form->field($row, 'id_resultado_salto')->hiddenInput()->label(false);
                ?>
            </td>
        </tr>
        <tr>
            <?php
            foreach ($row->obstaculos as $obstaculo) {
                ?>
                <td>&nbsp;</td>
                <?php
            }
            ?>
        </tr>
        </tbody>
    </table>
    </div>
 </div>

    <!--
    <div class="col-md-2"><?= $row->orden_participacion . '. ' . ucwords(strtolower($row->caballoHasJinete->jinete->nombre_completo)) ?></div>
    <div class="col-md-1"><?= ucwords(strtolower($row->caballoHasJinete->caballo->nombre)) ?></div>
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
-->
<?php
ActiveForm::end();
//Pjax::end();
?>