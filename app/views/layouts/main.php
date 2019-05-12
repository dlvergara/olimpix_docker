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
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/bootstrap.map">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/jquery.DonutWidget.min.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/jquerysctipttop.css">
    
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/nice-select.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/animate.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/main.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/main.map">
    
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/grid-gallery.css">
    <link rel="stylesheet" href="<?= Url::base(true) ?>/css/compact-gallery.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
   
    
    <?php $this->head() ?>
</head>
<body class="" style="display: block;">
    <button type="button" id="mobile-nav-toggle"><i class="lnr lnr-cross"></i></button>
    <?php $this->beginBody() ?>

    <?=
    $this->render("header");
    ?>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>

    <?= $content ?>

    <?=
    $this->render("footer");
    ?>

    <script src="<?= Url::base(true) ?>/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?= Url::base(true) ?>/js/vendor/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="<?= Url::base(true) ?>/js/easing.min.js"></script>
    <script src="<?= Url::base(true) ?>/js/hoverIntent.js"></script>
    <script src="<?= Url::base(true) ?>/js/superfish.min.js"></script>
    <script src="<?= Url::base(true) ?>/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?= Url::base(true) ?>/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= Url::base(true) ?>/js/owl.carousel.min.js"></script>
    <script src="<?= Url::base(true) ?>/js/jquery.sticky.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?= Url::base(true) ?>/js/jquery.nice-select.min.js"></script>
    <script src="<?= Url::base(true) ?>/js/parallax.min.js"></script>
    <script src="<?= Url::base(true) ?>/js/waypoints.min.js"></script>
    <script src="<?= Url::base(true) ?>/js/jquery.counterup.min.js"></script>
    <script src="<?= Url::base(true) ?>/js/mail-script.js"></script>
    <script src="<?= Url::base(true) ?>/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>

    <nav id="mobile-nav">
        <ul class="" style="touch-action: pan-y;" id="">
            <li class="menu-active"><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="service.html">Service</a></li>
            <li><a href="training.html">training</a></li>
            <li><a href="events.html">events</a></li>
            <li><a href="pricing.html">Pricing</a></li>
            <li class="menu-has-children"><i class="lnr lnr-chevron-down"></i><a href="" class="sf-with-ul">Blog</a>
                <ul style="display: none;">
                    <li><a href="blog-home.html">Blog Home</a></li>
                    <li><a href="blog-single.html">Blog Single</a></li>
                </ul>
            </li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="elements.html">Elements</a></li>
        </ul>
    </nav>
    <div id="mobile-body-overly" style="display: none;"></div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
