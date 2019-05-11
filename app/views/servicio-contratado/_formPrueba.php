<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use lo\widgets\modal\ModalAjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioContratado */
/* @var $servicioDisponible \app\models\ServicioDisponible
 * @var $form yii\widgets\ActiveForm
 */

$jinetes = \app\models\Jinete::find()
    ->select(['nombre_completo as value', 'nombre_completo as  label', 'id_jinete as id'])
    ->asArray()
    ->all();

$modalId = 'modalJinete-' . $servicioDisponible->id_servicio_disponible;
$idAutoCompleteJinete = $servicioDisponible->id_servicio_disponible . '-' . 'jinete_id_jinete';

?>
<h3>Inscripción <?= ucfirst(strtolower($servicioDisponible->pruebaSaltoIdPrueba->nombre)) ?></h3>
<div class="row">
    <?php $form = ActiveForm::begin(); ?>

    <h4>Jinete</h4>
    <?php
    echo AutoComplete::widget([
        'id' => $idAutoCompleteJinete . '-autocomplete',
        'clientOptions' => [
            'source' => $jinetes,
            'minLength' => '3',
            'autoFill' => true,
            'select' => new JsExpression("function( event, ui ) {
			        $('#{$idAutoCompleteJinete}').val(ui.item.id);
			     }")
        ],
    ]);
    echo ModalAjax::widget([
        'id' => $modalId,
        'header' => 'Registrar Jinete',
        'toggleButton' => [
            'label' => '+',
            'class' => 'btn btn-primary pull-right'
        ],
        'events' => [
            ModalAjax::EVENT_MODAL_SUBMIT => new \yii\web\JsExpression("
            function(event, data, status, xhr, selector) {
                if(status == 'success') {
                    var jineteLoaded = setInfoJinete( data.model, data.servicio, data.autocomplete );
                    if(jineteLoaded) {
                        $('#{$modalId}').modal('toggle');
                    }
                }
            }
        "),
        ],
        'size' => ModalAjax::SIZE_LARGE,
        'url' => Url::to(['jinete/create', 'servicio' => $servicioDisponible->id_servicio_disponible]), // Ajax view with form to load
        'ajaxSubmit' => true, // Submit the contained form as ajax, true by default
    ]);
    echo $form->field($model, 'jinete_id_jinete')->hiddenInput(['id' => $idAutoCompleteJinete])->label("");
    ?>

    <h4>Caballo</h4>
    <?= $form->field($model, 'caballo_id_caballo')->hiddenInput()->label("") ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
