<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ClasificacionJineteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clasificacion Jinetes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificacion-jinete-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Clasificacion Jinete', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_clasificacion_jinete',
            'nombre',
            'nombre_corto',
            'categoria_nacional',
            'categoria_internacional',
            //'categoria_liga',
            //'edad_minima',
            //'edad_maxima',
            //'altura_salto_minima',
            //'altura_salto_max',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
