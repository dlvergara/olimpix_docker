<?php
/* @var $this yii\web\View */
/* @var $prueba \app\models\PruebaSalto */
/* @var $resultados array */

$this->title = 'Prueba: ' . $prueba->nombre;
$resultadosUrl = Yii::$app->getUrlManager()->createUrl(['/resultados', 'prueba' => $prueba->id_prueba]);
?>

<!-- start banner Area -->
<section class="banner-area relative" id="banner">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    <?= $prueba->nombre ?>
                </h1>
                <p class="text-white link-nav">
                    <a href="<?= Yii::$app->getHomeUrl() ?>">Inicio </a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl(['evento', 'evento' => $prueba->evento_id_evento]) ?>">Evento: <?= $prueba->eventoIdEvento->nombre ?></a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<section class="sample-text-area">
    <div class="container">
        <h1 class="text-heading"><?= $prueba->nombre ?></h1>
        <h4>Fecha y hora: </h4><span><?= $prueba->fecha ?></span><br>
        <h4>Categoría: </h4><span><?= $prueba->categoriaIdCategoria->nombre ?></span><br>
        <h4>Status: </h4><span><?= ($prueba->cerrada) ? 'Cerrada' : 'Abierta' ?></span><br>
        <h4>Qr code:</h4><span><img
                    src="https://chart.googleapis.com/chart?cht=qr&chl=<?= $resultadosUrl ?>&choe=UTF-8&chs=177x177"/></span>

    </div>
</section>

<?php
if (count($resultados) > 0) {
    ?>
    <div class="whole-wrap">
        <div class="container">
            <div class="section-top-border">
                <h3 class="mb-30">Resultados</h3>
            </div>
        </div>
    </div>
    <div class="whole-wrap">
        <div class="container">
            <div class="row">
                <table style="width: 100%; border: 1px dotted grey;">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Jinete</td>
                        <td>Caballo</td>
                        <td>Faltas Obst.</td>
                        <td>Tiempo</td>
                        <td>Faltas Tiempo</td>
                        <td>Faltas Totales</td>
                        <td>Clasificación</td>
                        <td>Puntaje</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    /* @var $row \app\models\ResultadoSalto */
                    $i = 1;
                    foreach ($resultados as $row) {
                        $tiempo = $row->tiempo;
                        $faltasTotales = $row->faltas_totales;
                        if ($row->cantidad_rehuso >= 2) {
                            $tiempo = "Eliminado";
                            $faltasTotales = "Eliminado";
                        }
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row->caballoHasJinete->jinete->nombre_completo ?></td>
                            <td><?= $row->caballoHasJinete->caballo->nombre ?></td>
                            <td><?= $row->falta_obst ?></td>
                            <td><?= $tiempo ?></td>
                            <td><?= $row->faltas_tiempo ?></td>
                            <td><?= $faltasTotales ?></td>
                            <td><?= $row->clasificacion ?></td>
                            <td><?= $row->puntaje ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
?>
