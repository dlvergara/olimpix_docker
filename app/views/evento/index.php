<?php
/* @var $this yii\web\View */
/* @var $model \app\models\Evento */
/* @var $formModel \app\models\ReservaForm */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

$date = DateTime::createFromFormat("Y-m-d H:i:s", $model->fecha_inicio);
$terminosCondiciones = $model->getTerminoCondicions()->all();
$resultadosUrl = Yii::$app->getUrlManager()->createAbsoluteUrl(['/evento', 'evento' => $model->id_evento]);
?>
    <!-- start banner Area -->
    <section class="banner-area relative" id="banner">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        <?= $model->nombre ?>
                    </h1>
                    <p class="text-white link-nav">
                        <a href="<?= Yii::$app->getHomeUrl() ?>">Inicio </a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="<?= Yii::$app->getUrlManager()->createUrl(['site/events']) ?>"> Eventos</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <section class="sample-text-area">
        <div class="container">
            <div class="col-md-8">
                <h1 class="text-heading"><?= $model->nombre ?></h1>
                <p class="sample-text">
                    <?= $model->descripcion ?>
                </p>
                <h3>Lugar: </h3>
                <span><?= $model->ciudadIdCiudad->nombre . ', ' . ucwords($model->ciudadIdCiudad->paisIdPais->nombre) ?></span><br>
                <h3>Fecha: </h3><span><?= strftime("%A %d de %B", $date->getTimestamp()) ?></span><br>
                <h3>Hora: </h3><span><?= strftime("%l:%M%p", $date->getTimestamp()) ?></span><br>
            </div>
            <div class="col-md-4">
                <img src="https://chart.googleapis.com/chart?cht=qr&chl=<?= $resultadosUrl ?>&choe=UTF-8&chs=177x177"/>
            </div>
        </div>
    </section>

    <div class="whole-wrap">
        <div class="container">
            <div class="section-top-border">
                <h3 class="mb-30">Información general</h3>
                <div class="row">
                    <?php
                    /**
                     * @var $terminoCondicion \app\models\TerminoCondicion
                     */
                    foreach ($terminosCondiciones as $index => $terminoCondicion) {
                        if ($index >= 3) {
                            break;
                        }
                        ?>
                        <div class="col-md-4">
                            <div class="single-defination">
                                <h4 class="mb-20"><?= $index . '. ' . $terminoCondicion->titulo ?></h4>
                                <p><?= nl2br($terminoCondicion->texto) ?></p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <a href="#" class="genric-btn primary btn-block e-large"
               onclick="event.preventDefault(); $('#moreInfo').toggle()"><span
                        class="glyphicon glyphicon-info-sign"></span> Más información <span class="glyphicon glyphicon-menu-right"></span></a>
        </div>
    </div>
    <!-- Mas info -->
    <div class="whole-wrap" id="moreInfo" style="display: none;">
        <div class="container">
            <div class="row">
                <?php
                /**
                 * @var $terminoCondicion \app\models\TerminoCondicion
                 */
                foreach ($terminosCondiciones as $index => $terminoCondicion) {
                    if ($index < 3) continue;//img/elements/d.jpg
                    $align = ($index % 2 == 0) ? 'text-right' : '';
                    ?>
                    <div class="section-top-border <?= $align ?>">
                        <h3 class="mb-30"><?= $index . '. ' . $terminoCondicion->titulo ?></h3>
                        <div class="row">
                            <?php
                            if (empty($align)) {
                                ?>
                                <!--
                            <div class="col-md-3">
                                <img src="img/Logo-2.png" alt="" class="img-fluid">
                            </div> -->
                                <?php
                            }
                            ?>
                            <!--
                    <div class="col-md-9 mt-sm-20">
                        <p><?= nl2br($terminoCondicion->texto) ?></p>
                    </div>
                    -->
                            <div class="col-lg-12">
                                <blockquote class="generic-blockquote">
                                    <?= nl2br($terminoCondicion->texto) ?>
                                </blockquote>
                            </div>
                            <?php
                            if (!empty($align)) {
                                ?>
                                <!--
                                <div class="col-md-3">
                                    <img src="img/Logo-2.png" alt="" class="img-fluid">
                                </div>
                                -->
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <a href="#" class="genric-btn primary-border circle arrow"
               onclick="event.preventDefault(); $('#moreInfo').toggle()">Menos información<span
                        class="lnr lnr-arrow-right"></span></a>
        </div>
    </div>
<?php
Pjax::begin([
    //'enablePushState' => false,
]);

/*
$form = ActiveForm::begin([
    'options' => ['data' => ['pjax' => true]],
    'action' => Yii::$app->getUrlManager()->createUrl(['evento/search-jinete', 'evento' => $model->id_evento]),
]);

echo $form->field($formaJinete, 'identificacion_jinete')->textInput();
echo $form->field($formaJinete, 'identificacion_caballo')->textInput();
echo Html::submitButton('Buscar', ['class' => 'genric-btn primary e-large']);

ActiveForm::end();
*/

echo $this->render('reservar-servicios', ['model' => $model, 'formModels' => []]);

Pjax::end();
?>