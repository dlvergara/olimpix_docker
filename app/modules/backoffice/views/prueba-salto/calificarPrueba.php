<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $model \app\models\PruebaSalto */
/* @var $resultadoPrevio \app\models\ResultadoSalto */

$this->title = 'Calificar: ' . $model->nombre;
$porCalificar = $model->getResultadoSaltos()->orderBy("-`clasificacion_final` DESC, orden_participacion ASC")->all();
$pjaxId = 'savePrueba_' . $model->id_prueba;


?>
<script type="javascript" language="JavaScript">
    $(document)
        .on('pjax:start', function () {
            alert('si');
            $('#mainWrapper').fadeOut(200);
        })
        .on('pjax:end', function () {
            alert('si');
            $('#mainWrapper').fadeIn(200);
        })
</script>



<div class="container">
    <div class="row">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php
    Pjax::begin([
        'id' => $pjaxId,
        'enablePushState' => false,
        'options' => ['class' => 'row']
    ]);
    ?>
    <div class="whole-wrap">
        <div class="container" style="margin-left: 0px;padding-left: 0px;">
            <!--
            <div class="row">
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
            -->
            
            <div class="row" data-spy="affix" data-offset-top="90" style="background-color: #ecf0f5; z-index: 99">
            
             <div class="table-responsive{-sm|-md|-lg|-xl}">
               <div style="text-align:center;">
                <table class="table table-striped table-drak table-bordered table-hover"  border="1px solid black">
                    <thead class="bg-warning">
                    <tr  class="table-active" >
                        <td class="col-md-1">#</td>
                        <td class="col-md-2" style="width 300px">Jinete</td>
                        <td class="col-md-1">Caballo</td>
                        <td class="col-md-1">Falta Obst.</td>
                        <td class="col-md-1">Tiempo</td>
                        <td class="col-md-1">Falta Tiempo</td>
                        <td class="col-md-1">Falta Totales</td>
                        <td class="col-md-1">Clasificación</td>
                        <td class="col-md-1">Observaciones</td>
                        <td class="col-md-1">Cantidad Rehusos</td>
                        <td class="col-md-1">Eliminado</td>
                        <td class="col-md-1">No se presento</td>
                        <td class="col-md-1">Clasificación Final</td>
                        <td class="col-md-2">&nbsp;</td>
                    </tr>
                    </thead>
                </table>
               </div>
             </div>
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
    <?php
    Pjax::end();
    ?>
    <script type="application/javascript" language="JavaScript">
        $(document).on('<?= $pjaxId ?>:beforeSend', function () {
            //alert('Seguro?');
        });
    </script>
</div>