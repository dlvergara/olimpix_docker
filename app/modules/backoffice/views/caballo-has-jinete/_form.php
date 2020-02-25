<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Jinete;
use app\models\Caballo;

/* @var $this yii\web\View */
/* @var $model app\models\CaballoHasJinete */
/* @var $form yii\widgets\ActiveForm */

$jinetes = \yii\helpers\ArrayHelper::map(Jinete::find()->all(), 'id_jinete', 'nombre_completo');
$caballos = \yii\helpers\ArrayHelper::map(Caballo::find()->all(), 'id_caballo', 'nombre');
?>

<div class="caballo-has-jinete-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_caballo')->dropDownList($caballos, ['prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'id_jinete')->dropDownList($jinetes, ['prompt' => 'Seleccione...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
