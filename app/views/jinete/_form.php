<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Pais;
use yii\helpers\ArrayHelper;
use app\models\Liga;
use app\models\Club;

/* @var $this yii\web\View */
/* @var $model app\models\Jinete */
/* @var $form yii\widgets\ActiveForm */

$paisesArray = ArrayHelper::map(Pais::find()->all(), 'id_pais', 'nombre');
$ligasArray = ArrayHelper::map(Liga::find()->all(), 'id_liga', 'nombre');
$clubesArray = ArrayHelper::map(Club::find()->all(), 'id_club', 'nombre');
?>

<div class="jinete-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_completo')->textarea() ?>

    <?= $form->field($model, 'tipo_identificacion')->dropDownList([ 'CC' => 'CC', 'CE' => 'CE', 'TI' => 'TI', 'PA' => 'PA', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'identificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'liga_id_liga')->dropDownList($ligasArray, ['prompt' => '']) ?>

    <?= $form->field($model, 'club_id_club')->dropDownList($clubesArray, ['prompt' => '']) ?>

    <?= $form->field($model, 'pais_id_pais')->dropDownList($paisesArray, ['prompt' => '']) ?>

    <?= $form->field($model, 'fecha_nacimiento')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'registro_fec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activo_fec')->checkbox() ?>

    <?= $form->field($model, 'email')->textarea() ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
