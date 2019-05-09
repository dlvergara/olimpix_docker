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

echo ModalAjax::widget([
    'id' => 'createCompany',
    'header' => 'Registrar Jinete',
    'toggleButton' => [
        'label' => 'Registrar Jinete',
        'class' => 'btn btn-primary pull-right'
    ],
    'url' => Url::to(['jinete/create']), // Ajax view with form to load
    'ajaxSubmit' => true, // Submit the contained form as ajax, true by default
    // ... any other yii2 bootstrap modal option you need
]);
?>
<h2>Inscripción <?= ucfirst(strtolower($servicioDisponible->pruebaSaltoIdPrueba->nombre)) ?></h2>
<div class="row">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'caballo_id_caballo')->hiddenInput() ?>

    <?=
    $form->field($model, 'jinete_id_jinete')->hiddenInput()->label("") .
    AutoComplete::widget([
        'clientOptions' => [
            'source' => $jinetes,
            'minLength' => '3',
            'autoFill' => true,
            'select' => new JsExpression("function( event, ui ) {
			        $('#serviciocontratado-jinete_id_jinete').val(ui.item.id);
			     }")
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
