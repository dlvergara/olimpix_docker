<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicioContratado */
/* @var $servicioDisponible \app\models\ServicioDisponible
 * @var $form yii\widgets\ActiveForm
 */

$attributeToShow = ['altura', 'distancia', 'tiempo_limite'];

?>
<div class="col-lg-6 single-blog">
    <h4>Inscripción <?= ucfirst(strtolower($servicioDisponible->pruebaSaltoIdPrueba->nombre)) ?></h4>
    <ul class="tags">
        <?php
        foreach ($servicioDisponible->pruebaSaltoIdPrueba->attributes as $index => $attribute) {
            if (in_array($index, $attributeToShow) && !empty($attribute)) {
                ?>
                <li><a href="#"><?= $servicioDisponible->pruebaSaltoIdPrueba->getAttributeLabel($index) ?>
                        : <?= $attribute ?></a></li>
                <?php
            }
        }
        ?>
    </ul>

    <?php $form = ActiveForm::begin(); ?>

    <!-- JINETE -->
    <?= $this->render("jinete", ['model' => $model, 'form' => $form ,'servicioDisponible' => $servicioDisponible]) ?>

    <p>Caballo:
        <?= $form->field($model, 'caballo_id_caballo')->hiddenInput()->label("") ?>
    </p>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>