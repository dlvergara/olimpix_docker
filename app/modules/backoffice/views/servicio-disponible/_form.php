<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Evento;
use app\models\Servicio;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioDisponible */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="servicio-disponible-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'id_servicio_disponible')->textInput() ?>

    <?= $form->field($model, 'evento_id_evento')->dropDownList(ArrayHelper::map(Evento::find()->all(), 'id_evento', 'nombre'), ['prompt' => 'select']) ?>

    <?= $form->field($model, 'servicio_id_servicio')->dropDownList(ArrayHelper::map(Servicio::find()->all(), 'id_servicio', 'nombre'), ['prompt' => 'select']) ?>

    <?= $form->field($model, 'fecha_inicio')->textInput(['class' => 'form-control', 'type' => 'date']) ?>

    <?= $form->field($model, 'fecha_fin')->textInput((['class' => 'form-control', 'type' => 'date'])) ?>

    <?= $form->field($model, 'disponible')->checkbox() ?>

    <?= $form->field($model, 'cantidad_disponible')->textInput(['maxlength' => true,'type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="javascript">
    //Date picker
    $('#serviciodisponible-fecha_inicio').datepicker({
        autoclose: true
    })
</script>