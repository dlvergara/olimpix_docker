<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResultadoSaltoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resultado Saltos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resultado-salto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Resultado Salto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_resultado_salto',
            //'id_caballo_has_jinete',
            [
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'label' => 'Evento',
                'value' => function ($data) {
                    return $data->prueba->eventoIdEvento->nombre;
                },
            ],
            [
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'label' => 'Caballo',
                'value' => function ($data) {
                    return $data->caballoHasJinete->caballo->nombre;
                },
            ],
            [
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'label' => 'Jinete',
                'value' => function ($data) {
                    return $data->caballoHasJinete->jinete->nombre_completo;
                },
            ],
            [
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'label' => 'Prueba',
                'value' => function ($data) {
                    return $data->prueba->nombre;
                },
            ],
            //'id_prueba',
            'orden_participacion',
            'clasificacion',
            'falta_obst',
            //'fecha_inicial',
            //'fecha_final',
            //'faltas_tiempo',
            //'faltas_totales',
            //'observaciones:ntext',
            //'cantidad_obstaculos',
            //'puntaje',
            //'fecha_inscripcion',
            //'clasificacion_final',
            //'fecha_participacion',
            //'cantidad_rehuso',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
