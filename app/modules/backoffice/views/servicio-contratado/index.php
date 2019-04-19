<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ServicioContratadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicio Contratados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicio-contratado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Servicio Contratado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_servicio_contratado',
            'evento_id_evento',
            'servicio_id_servicio',
            'id_estado_servicio',
            'caballo_id_caballo',
            //'jinete_id_jinete',
            //'identificador_servicio_contratado',
            //'monto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
