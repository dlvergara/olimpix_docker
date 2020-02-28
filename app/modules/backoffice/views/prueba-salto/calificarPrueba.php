<?php

/* @var $this yii\web\View */

use yii\widgets\Pjax;

/* @var $model \app\models\PruebaSalto */

$this->title = 'Calificar: ' . $model->nombre;
$porCalificar = $model->getResultadoSaltos()->orderBy("-`clasificacion_final` DESC, orden_participacion ASC")->all();

?>
    <div class="whole-wrap">
        <div class="container">
            <div class="row">`
                <div class="col-md-1">#</div>
                <div class="col-md-1">Jinete</div>
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
                <div class="col-md-1">&nbsp;</div>
            </div>
            <?php
            /* @var $row \app\models\ResultadoSalto */
            foreach ($porCalificar as $row) {
                echo $this->renderAjax('_formCalificar', ['model' => $model, 'row' => $row]);
            }
            ?>
        </div>
    </div>
<?php

?>