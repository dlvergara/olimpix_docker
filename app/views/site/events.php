<?php

/* @var $this yii\web\View */
/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\EventoSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;


$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Start upcoming-event Area -->
<section class="upcoming-event-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 pb-40 header-text text-center">
                <h1 class="pb-10"><b>Nuestros próximos concursos</b></h1>
                <p>
                    Revisa el calendario deportivo
                </p>

            </div>
        </div>
        <?php
        /* @var $model app\models\Evento */
        setlocale(LC_ALL, "es_ES");
        foreach ($dataProvider->getModels() as $index => $model)
        {
            $par = ($index % 2 == 0) ? 1 : 2;
            $date = DateTime::createFromFormat("Y-m-d H:i:s", $model->fecha_inicio);
            $eventoNombre = $model->nombre;
            $eventoFecha = strftime("%A %d de %B", $date->getTimestamp());
            $eventoLugar = $model->ciudadIdCiudad->nombre;
            $eventoUbicacion = $model->referencia_ubicacion;
            $eventoUrl = Yii::$app->getUrlManager()->createUrl(['evento', 'evento' => $model->id_evento]);
            ?>
            <div class="row align-items-center upcoming-wrap">
                <div class="col-lg-6 upcoming-left">
                    <img class="img-fluid" src="<?= Url::to('img/pages/ev'.$par.'.jpg', true) ?>" alt="imagen">
                </div>
                <div class="col-lg-6 upcoming-right">
                    <a href="<?= $eventoUrl ?>"><h4><?= $eventoNombre ?></h4></a>
                    <p class="meta">
                        <span><?= $eventoFecha ?></span> en <?= $eventoLugar . ' - ' . $eventoUbicacion ?>
                    </p>
                    <p>
                        <?= $model->descripcion ?>
                    </p>
                    <a class="primary-btn text-uppercase" href="<?= $eventoUrl ?>">ver detalles</a>
                </div>
            </div>
            <?php
        }
        ?>

       
    </div>

</section>
<!-- End upcoming-event Area -->