<?php

use app\models\Caballo;
use app\models\Jinete;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CaballoHasJineteSearch */
/* @var $form yii\widgets\ActiveForm */

$jinetes = \yii\helpers\ArrayHelper::map(Jinete::find()->all(), 'id_jinete', 'nombre_completo');
$caballos = \yii\helpers\ArrayHelper::map(Caballo::find()->all(), 'id_caballo', 'nombre');

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

    <?= $form->field($model, 'id_jinete')->dropDownList($jinetes, ['prompt' => 'Seleccione...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
