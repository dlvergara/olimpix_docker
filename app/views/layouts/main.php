<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="no-js">
<head>

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
	<link rel="shortcut icon" href="<?= Url::base(true) ?>/img/fav.png">
    <!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">

    <!-- meta character set -->
    <meta charset="<?= Yii::$app->charset ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/linearicons.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/nice-select.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/animate.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/main.css">

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <?php
    $this->render("header");
    ?>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>

    <?php
    $this->render("footer");
    ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
