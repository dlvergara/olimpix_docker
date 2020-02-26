<?php

use app\models\CaballoHasJineteSearch;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\ResultadoSalto */
/* @var $form yii\widgets\ActiveForm */

$searchModel = new CaballoHasJineteSearch();
?>

<div class="resultado-salto-form">

    <?php $form = ActiveForm::begin(['id' => 'resultadoSaltoForm']); ?>

    <?= $form->field($model, 'id_caballo_has_jinete')->textInput() ?>
    <?php
    $viewUrl = Yii::$app->getUrlManager()->createUrl(['backoffice/caballo-has-jinete/list']);
    Modal::begin(
        [
            'header' => '<h2>Hello world</h2>',
            'toggleButton' => ['label' => 'Buscar Jinete y Caballo'],
            'size' => 'modal-lg',
            'clientOptions' => [
                'remote' => $viewUrl,
            ]
        ]
    );
    ?>
    <?php
    //<iframe src="" style="width: 100%" ></iframe>
    Modal::end();
    ?>

    <?= $form->field($model, 'id_prueba')->textInput() ?>

    <?= $form->field($model, 'falta_obst')->textInput() ?>

    <?= $form->field($model, 'fecha_inicial')->textInput() ?>

    <?= $form->field($model, 'fecha_final')->textInput() ?>

    <?= $form->field($model, 'faltas_tiempo')->textInput() ?>

    <?= $form->field($model, 'faltas_totales')->textInput() ?>

    <?= $form->field($model, 'clasificacion')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cantidad_obstaculos')->textInput() ?>

    <?= $form->field($model, 'puntaje')->textInput() ?>

    <?= $form->field($model, 'fecha_inscripcion')->textInput() ?>

    <?= $form->field($model, 'clasificacion_final')->textInput() ?>

    <?= $form->field($model, 'orden_participacion')->textInput() ?>

    <?= $form->field($model, 'fecha_participacion')->textInput() ?>

    <?= $form->field($model, 'cantidad_rehuso')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
