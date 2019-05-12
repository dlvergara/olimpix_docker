<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PruebaSaltoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prueba Saltos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prueba-salto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Prueba Salto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_prueba',
            'nombre',
            'fecha',
            'distancia',
            'tiempo_acordado',
            //'presidente_jurado',
            //'numero_saltos',
            //'velocidad',
            //'altura',
            //'tiempo_limite',
            //'numero_clasificados',
            //'evento_id_evento',
            //'pista_id_pista',
            //'categoria_id_categoria',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
