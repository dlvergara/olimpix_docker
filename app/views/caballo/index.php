<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CaballoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Caballos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caballo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Caballo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_caballo',
            'nombre',
            'fecha_nacimiento',
            'fecha_grado',
            'puntaje',
            //'identificacion',
            //'raza_id_raza',
            //'id_caballo_padre',
            //'id_caballo_madre',
            //'id_propietario',
            //'registro_fec',
            //'pasaporte_fec',
            //'vigente_ica',
            //'fecha_vigencia_ica',
            //'vigente_fec',
            //'fecha_vigencia_fec',
            //'num_microchip_principal',
            //'liga_id_liga',
            //'club_id_club',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
