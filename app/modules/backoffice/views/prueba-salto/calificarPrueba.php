<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $model \app\models\PruebaSalto */
/* @var $resultadoPrevio \app\models\ResultadoSalto */

$this->title = 'Calificar: ' . $model->nombre;
$porCalificar = $model->getResultadoSaltos()->orderBy("-`clasificacion_final` DESC, orden_participacion ASC")->all();
$pjaxId = 'savePrueba_' . $model->id_prueba;

Pjax::begin([
    'id' => $pjaxId,
    'enablePushState' => false,
    'options' => ['class' => 'row']
]);

?>
<script src="/assets/8b34cb6a/jquery.js?v=<?= time() ?>"></script>
<script src="/assets/db9e8dc/yii.js?v=<?= time() ?>"></script>
<script src="/assets/db9e8dc/yii.validation.js?v=<?= time() ?>"></script>
<script src="/assets/db9e8dc/yii.activeForm.js?v=<?= time() ?>"></script>

<div class="container">

    <div class="row">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="whole-wrap">
        <div class="container" style="margin-left: 0px;padding-left: 0px;">
            <div class="row">`
                <div class="col-md-2">Jinete</div>
                <div class="col-md-1">Caballo</div>
                <div class="col-md-1">Falta Obst.</div>
                <div class="col-md-1">Tiempo</div>
                <div class="col-md-1">Falta Tiempo</div>
                <div class="col-md-1">Falta Totales</div>
                <div class="col-md-1">Clasificación</div>
                <div class="col-md-1">Observaciones</div>
                <div class="col-md-1">Cantidad Rehusos</div>
                <div class="col-md-1">Eliminado</div>
                <div class="col-md-1">No se presento</div>
                <div class="col-md-1">Clasificación Final</div>
                <div class="col-md-2">&nbsp;</div>
            </div>
            <?php
            /* @var $row \app\models\ResultadoSalto */
            foreach ($porCalificar as $row) {
                if ($resultadoPrevio->id_resultado_salto == $row->id_resultado_salto) {
                    $row = $resultadoPrevio;
                }
                echo $this->renderAjax('_formCalificar', ['model' => $model, 'row' => $row]);
            }
            ?>
        </div>
    </div>
    <script type="application/javascript" language="JavaScript">
        $(document).on('<?= $pjaxId ?>:beforeSend', function () {
            //alert('Seguro?');
        });
    </script>
    <?php
Pjax::end();
?>
</div>