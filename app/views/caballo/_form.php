<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Liga;
use app\models\Club;
use yii\helpers\ArrayHelper;
use app\models\Raza;
use app\models\Caballo;

/* @var $this yii\web\View */
/* @var $model app\models\Caballo */
/* @var $form yii\widgets\ActiveForm */

$ligasArray = ArrayHelper::map(Liga::find()->all(), 'id_liga', 'nombre');
$clubesArray = ArrayHelper::map(Club::find()->all(), 'id_club', 'nombre');
$razasArray = ArrayHelper::map(Raza::find()->all(), 'id_raza', 'nombre');
$caballos = ArrayHelper::map(Caballo::find()->all(), 'id_caballo', 'nombre');
?>

<div class="caballo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num_microchip_principal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <!--
    <?= $form->field($model, 'fecha_nacimiento')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'fecha_grado')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'puntaje')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'raza_id_raza')->dropDownList($razasArray, ['prompt' => '']) ?>

    <?= $form->field($model, 'id_caballo_padre')->dropDownList($caballos, ['prompt' => '']) ?>

    <?= $form->field($model, 'id_caballo_madre')->dropDownList($caballos, ['prompt' => '']) ?>

    <?= $form->field($model, 'id_propietario')->textInput() ?>

    <?= $form->field($model, 'registro_fec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pasaporte_fec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigente_ica')->textInput() ?>

    <?= $form->field($model, 'fecha_vigencia_ica')->textInput() ?>

    <?= $form->field($model, 'vigente_fec')->textInput() ?>

    <?= $form->field($model, 'fecha_vigencia_fec')->textInput() ?>

    <?= $form->field($model, 'liga_id_liga')->dropDownList($ligasArray, ['prompt' => '']) ?>

    <?= $form->field($model, 'club_id_club')->dropDownList($clubesArray, ['prompt' => '']) ?>
    -->
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
