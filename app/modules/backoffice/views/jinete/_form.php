<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jinete */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jinete-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'club_id_club')->textInput() ?>

    <?= $form->field($model, 'nombre_completo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tipo_identificacion')->dropDownList([ 'CC' => 'CC', 'CE' => 'CE', 'TI' => 'TI', 'PA' => 'PA', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'identificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'liga_id_liga')->textInput() ?>

    <?= $form->field($model, 'pais_id_pais')->textInput() ?>

    <?= $form->field($model, 'fecha_nacimiento')->textInput() ?>

    <?= $form->field($model, 'registro_fec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activo_fec')->textInput() ?>

    <?= $form->field($model, 'activo_equi')->textInput() ?>

    <?= $form->field($model, 'email')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
