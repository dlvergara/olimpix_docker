<?php
/**
 * Created by PhpStorm.
 * User: David Leonardo
 * Date: 5/11/2019
 * Time: 4:48 PM
 */

use yii\jui\AutoComplete;
use yii\web\JsExpression;
use lo\widgets\modal\ModalAjax;
use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $model app\models\ServicioContratado
 * @var $servicioDisponible \app\models\ServicioDisponible
 * @var $form yii\widgets\ActiveForm
 */

$jinetes = \app\models\Jinete::find()
    ->select(['nombre_completo as value', 'nombre_completo as  label', 'id_jinete as id'])
    ->asArray()
    ->all();

$modalId = 'modalJinete-' . $servicioDisponible->id_servicio_disponible;
$idAutoCompleteJinete = $servicioDisponible->id_servicio_disponible . '-' . 'jinete_id_jinete';
$modalUrl = Url::to(['jinete/create', 'servicio' => $servicioDisponible->id_servicio_disponible]);
?>
<p>Jinete:
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
        'options' => [
            'class' => 'single-input',
            'style' => 'max-width: 80%; display: inline-block;'
        ]
    ]);
    echo ModalAjax::widget([
        'id' => $modalId,
        'header' => 'Registrar Jinete',
        'toggleButton' => [
            'label' => '+',
            'class' => 'btn btn-primary'
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
        'url' => $modalUrl,
        'ajaxSubmit' => true, // Submit the contained form as ajax, true by default
    ]);
    echo $form->field($model, 'jinete_id_jinete')->hiddenInput(['id' => $idAutoCompleteJinete])->label("");
    ?>
</p>