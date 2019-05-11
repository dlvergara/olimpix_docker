<?php
/**
 * Created by PhpStorm.
 * User: David Leonardo
 * Date: 5/11/2019
 * Time: 4:54 PM
 */

use yii\jui\AutoComplete;
use yii\web\JsExpression;
use lo\widgets\modal\ModalAjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioContratado */
/* @var $servicioDisponible \app\models\ServicioDisponible
 * @var $form yii\widgets\ActiveForm
 */

$caballos = \app\models\Caballo::find()
    ->select(['CONCAT(nombre,"-",num_microchip_principal) as value', 'CONCAT(nombre,"-",num_microchip_principal) as  label', 'id_caballo as id'])
    ->asArray()
    ->all();

$modalId = 'modalCaballo-' . $servicioDisponible->id_servicio_disponible;
$idAutoCompleteCaballo = $servicioDisponible->id_servicio_disponible . '-' . 'caballo_id_caballo';
$modalUrl = Url::to(['caballo/create', 'servicio' => $servicioDisponible->id_servicio_disponible]);
?>
<p>Caballo:
    <?php
    echo AutoComplete::widget([
        'id' => $idAutoCompleteCaballo . '-caballo-autocomplete',
        'clientOptions' => [
            'source' => $caballos,
            'minLength' => '3',
            'autoFill' => true,
            'select' => new JsExpression("function( event, ui ) {
                        $('#{$idAutoCompleteCaballo}').val(ui.item.id);
                     }")
        ],
        'options' => [
            'class' => 'single-input',
            'style' => 'max-width: 75%; display: inline-block;'
        ]
    ]);
    echo ModalAjax::widget([
        'id' => $modalId,
        'header' => 'Registrar Caballo',
        'toggleButton' => [
            'label' => '+',
            'class' => 'btn btn-primary'
        ],
        'events' => [
            ModalAjax::EVENT_MODAL_SUBMIT => new \yii\web\JsExpression("
                function(event, data, status, xhr, selector) {
                    if(status == 'success') {
                        var loaded = setInfoCaballo( data.model, data.servicio, data.autocomplete );
                        if(loaded) {
                            $('#{$modalId}').modal('toggle');
                        }
                    }
                }
            "),
        ],
        'size' => ModalAjax::SIZE_LARGE,
        'url' => $modalUrl,
        'ajaxSubmit' => true, // Submit the contained form as ajax, true by default
    ]);
    $form->field($model, 'caballo_id_caballo')->hiddenInput()->label("") ?>
</p>

