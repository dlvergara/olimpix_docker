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

    <p>
        <?= Html::a('Crear Caballo y Jinete', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br/>

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
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

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => '{update} {view} {delete} {saveResult}',
                'buttons' => [
                    'saveResult' => function ($url, $model) {
                        $t = Yii::$app->getUrlManager()->createUrl(['backoffice/resultado-salto/create', 'id_caballo_has_jinete' => $model->id_caballo_has_jinete]);

                        return Html::a('<span class="glyphicon glyphicon-fire"></span>', $t, ['value' => $t, 'class' => 'btn btn-default btn-xs', 'id' => 'modalButtonView']);
                    },
                ],
            ]
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
