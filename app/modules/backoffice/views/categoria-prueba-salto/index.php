<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriaPruebaSaltoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categoria Prueba Saltos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-prueba-salto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Categoria Prueba Salto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_categoria_prueba',
            'nombre',
            'altura',
            'valor_preventa',
            'valor_venta',
            //'valor_posventa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
