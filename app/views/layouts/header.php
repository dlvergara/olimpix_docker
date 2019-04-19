<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;use yii\helpers\Url;

/*
NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    */
?>
<!-- HEADER -->
<header id="header" id="home">
    <div class="container">
        <div class="row header-top align-items-center">
            <div class="col-lg-4 col-sm-4 menu-top-left">
                <a href="mailto:info@horseclub.com">
                    <span class="lnr lnr-location"></span>
                </a>
                <a class="tel" href="mailto:info@horseclub.com">info@horseclub.com</a>
            </div>
            <div class="col-lg-4 menu-top-middle justify-content-center d-flex">
                <a href="<?= Yii::$app->getHomeUrl() ?>/">
                    <img class="img-fluid" src="<?= Url::base(true) ?>/img/logo.png" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-sm-4 menu-top-right">
                <a class="tel" href="tel:+880 123 12 658 439">+880 123 12 658 439</a>
                <a href="tel:+880 123 12 658 439"><span class="lnr lnr-phone-handset"></span></a>
            </div>
        </div>
    </div>
        <hr>
    <div class="container">
        <div class="row align-items-center justify-content-center d-flex">
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li class="menu-active"><a href="<?= Yii::$app->getHomeUrl() ?>">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="service.html">Service</a></li>
              <li><a href="training.html">training</a></li>
              <li><a href="<?= Yii::$app->getUrlManager()->createUrl(["site/events"]) ?>">events</a></li>
              <li><a href="pricing.html">Pricing</a></li>
              <li class="menu-has-children"><a href="">Blog</a>
                <ul>
                  <li><a href="blog-home.html">Blog Home</a></li>
                  <li><a href="blog-single.html">Blog Single</a></li>
                </ul>
              </li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="<?= Yii::$app->getUrlManager()->createUrl(["site/elements"]) ?>">Elements</a></li>
            </ul>
          </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header>
<!-- #header -->
