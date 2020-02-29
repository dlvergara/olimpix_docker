<?php

use app\models\Caballo;
use app\models\Jinete;
use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CaballoHasJineteSearch */
/* @var $form yii\widgets\ActiveForm */

//$jinetes = \yii\helpers\ArrayHelper::map(, 'id_jinete', 'nombre_completo');
$caballos = \yii\helpers\ArrayHelper::map(Caballo::find()->all(), 'id_caballo', 'nombre');

foreach (Jinete::find()->all() as $row) {
    $jinetes[] = ['id' => $row->id_jinete, 'label' => $row->nombre_completo, 'value' => $row->id_jinete];
}

?>

<div class="caballo-has-jinete-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_caballo_has_jinete') ?>

    <?= $form->field($model, 'id_caballo')->dropDownList($caballos, ['prompt' => 'Seleccione...']) ?>

    <?php //echo $form->field($model, 'id_jinete')->dropDownList($jinetes, ['prompt' => 'Seleccione...']) ?>
    <?php echo $form->field($model, 'id_jinete')->hiddenInput()->label(false) ?>

    <label for="autocompleteCaballoJinete">Jinete: </label>
    <br>
    <?=
    AutoComplete::widget([
        'id' => 'autocompleteJinete',
        'value' => $model->jinete->nombre_completo,
        'clientOptions' => [
            'source' => $jinetes,
            'minLength' => '3',
            'autoFill' => true,
            'select' => new JsExpression("function( event, ui ) {
                        $('#caballohasjinetesearch-id_jinete').val(ui.item.id);
                     }")
        ],
        'options' => ['class' => 'form-control'],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
