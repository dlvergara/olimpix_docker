<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ciudad;
use app\models\Liga;
use \app\models\TipoEvento;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */
/* @var $form yii\widgets\ActiveForm */


$ciudadesArray = \yii\helpers\ArrayHelper::map(Ciudad::find()->all(), 'id_ciudad', 'nombre');
$ligaArray = \yii\helpers\ArrayHelper::map(Liga::find()->all(), 'id_liga', 'nombre');
$tipoEventos = \yii\helpers\ArrayHelper::map(TipoEvento::find()->all(), 'id_tipo_evento', 'nombre');

?>

<div class="evento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tipo_evento')->dropDownList($tipoEventos, ['prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'fecha_inicio')->textInput() ?>

    <?= $form->field($model, 'fecha_fin')->textInput() ?>

    <?= $form->field($model, 'ciudad_id_ciudad')->dropDownList($ciudadesArray, ['prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'referencia_ubicacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_bases_tenicas')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'liga_id_liga')->dropDownList($ligaArray, ['prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'cerrado')->textInput() ?>

    <?= $form->field($model, 'fecha_cierre')->textInput() ?>

    <?= $form->field($model, 'sorteado')->textInput() ?>

    <?= $form->field($model, 'fecha_sorteo')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'direccion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'visible')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
