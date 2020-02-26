<?php
/* @var $this yii\web\View */
/* @var $prueba \app\models\PruebaSalto */

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
    </div>
</section>

<?php
if (count($prueba->resultadoSaltos) > 0) {
    ?>
    <div class="whole-wrap">
        <div class="container">
            <div class="section-top-border">
                <h3 class="mb-30">Resultados</h3>
            </div>
        </div>
    </div>
    <div class="whole-wrap" id="moreInfo" style="display: none;">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
    <?php
}
?>
