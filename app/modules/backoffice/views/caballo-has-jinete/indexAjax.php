<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CaballoHasJineteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Caballo Has Jinetes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caballo-has-jinete-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    Pjax::begin(['id' => 'ajaxSearchCaballoHasJinete']);
    echo $this->render('_searchAjax', ['model' => $searchModel]);
    ?>
    <br/><br/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            #'id_caballo_has_jinete',
            #'id_caballo',
            #'id_jinete',
            [
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'label' => 'Jinete',
                'value' => function ($data) {
                    return $data->jinete->nombre_completo;
                },
            ],
            [
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'label' => 'Caballo',
                'value' => function ($data) {
                    return $data->caballo->nombre;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
