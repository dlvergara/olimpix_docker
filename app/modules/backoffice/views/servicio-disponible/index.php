<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ServicioDisponibleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicio Disponibles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicio-disponible-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Servicio Disponible', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_servicio_disponible',
            'evento_id_evento',
            'fecha_inicio',
            'fecha_fin',
            'disponible',
            //'cantidad_disponible',
            //'timestamp',
            //'descripcion:ntext',
            //'monto',
            //'nombre',
            //'image_url:url',
            //'prueba_salto_id_prueba',
            //'proveedor_id_proveedor',
            //'porcentaje_comision_olimpix',
            //'monto_comision_olimpix',
            //'porcentaje_iva',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
