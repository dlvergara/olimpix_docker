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
        <?= Html::a('Crear Prueba Salto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br><br>
    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_prueba',
            'eventoIdEvento.nombre',
            'fecha',
            'nombre',
            //'distancia',
            //'tiempo_acordado',
            //'presidente_jurado',
            //'numero_saltos',
            //'velocidad',
            //'altura',
            //'tiempo_limite',
            //'numero_clasificados',
            //'pista_id_pista',
            //'categoria_id_categoria',

            ['class' => 'yii\grid\ActionColumn',
                'header' => '',
                'template' => '{update} {view} {delete} {calificarPrueba}',
                'buttons' => [
                    'calificarPrueba' => function ($url, $model) {
                        $t = Yii::$app->getUrlManager()->createUrl(['backoffice/prueba-salto/calificar-prueba', 'idPrueba' => $model->id_prueba]);

                        return Html::a('<span class="glyphicon glyphicon-fire"></span>', $t, ['value' => $t, 'class' => 'btn btn-default btn-xs', 'id' => 'modalButtonView']);
                    },
                ],
            ]
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
