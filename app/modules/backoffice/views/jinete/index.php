<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\JineteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jinetes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jinete-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jinete', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_jinete',
            'club_id_club',
            'nombre_completo:ntext',
            'tipo_identificacion',
            'identificacion',
            //'liga_id_liga',
            //'pais_id_pais',
            //'fecha_nacimiento',
            //'registro_fec',
            //'activo_fec',
            //'activo_equi',
            //'email:ntext',
            //'telefono',
            //'direccion:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
