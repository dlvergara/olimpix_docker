<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Videoteca';
?>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Clappr Video360</title>
    </head>

<!---Start Gallery Video 360 --->
<!-- 1. Crea un elemento DIV donde será creado el reproductor -->
        <div id="player"></div>

        <!-- 2. Incluye Clappr y el plugin de video 360 -->
        <script src="https://cdn.jsdelivr.net/gh/clappr/clappr@latest/dist/clappr.min.js"></script>
        <script src="https://cdn.rawgit.com/thiagopnts/clappr-video360/master/dist/clappr-video360.min.js"></script>

        <!-- 3. Configurar reproductor de video-->
        <script>
            // La URL al video 360
            var Video360Url = 'href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/20200228_104434.MP4' ?>';

            // Configura el reproducotr clappr
            var PlayerInstance = new Clappr.Player({
                source: Video360Url,
                plugins: {
                    container: [Video360],
                },
                parentId: '#player',
            });

            // Importante desactivar el plugin nativo de click para pausar de clappr
            // de otra manera no podrás usar comodamente el reproductor
            PlayerInstance.getPlugin('click_to_pause').disable();
        </script>




<!---Start Gallery --->

<!--<section class="gallery-block compact-gallery">
    <h1 class="pb-10">Galeria 1</h1>
    <div class="container">
        <div class="heading">
            <h2>Videoteca</h2>
        </div>
        <div class="row no-gutters">
            
            
            <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/h1.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/h1.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Club la Hacienda</span>
                            <span class="description-body">Febrero 3 y 4 - Concurso de salto en la Hacienda Club, Cajicá</span>
                        </span>
                </a>
            </div>
            
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/h5.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/h5.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Club la Hacienda</span>
                            <span class="description-body">Febrero 3 y 4 - Concurso de salto en la Hacienda Club, Cajicá</span>
                        </span>
                </a>
            </div>
            
            
               <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/h3.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/h3.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Club la Hacienda</span>
                            <span class="description-body">Febrero 3 y 4 - Concurso de salto en la Hacienda Club, Cajicá</span>
                        </span>
                </a>
            </div>


            <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/h4.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/h4.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Club la Hacienda</span>
                            <span class="description-body">Febrero 3 y 4 - Concurso de salto en la Hacienda Club, Cajicá</span>
                        </span>
                </a>
            </div>

              <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/h2.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/h2.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Club la Hacienda</span>
                            <span class="description-body">Febrero 3 y 4 - Concurso de salto en la Hacienda Club, Cajicá</span>
                        </span>
                </a>
            </div>
        
            <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/h6.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/h6.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Club la Hacienda</span>
                            <span class="description-body">Febrero 3 y 4 - Concurso de salto en la Hacienda Club, Cajicá</span>
                        </span>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p1.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p1.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Polo Club</span>
                            <span class="description-body">Primer encuentro Ecuestre Copa Coprogreso 2019</span>
                        </span>
                </a>
            </div>

            <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p2.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p2.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Polo Club</span>
                            <span class="description-body">Primer encuentro Ecuestre Copa Coprogreso 2019</span>
                        </span>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p3.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p3.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Polo Club</span>
                            <span class="description-body">Primer encuentro Ecuestre Copa Coprogreso 2019</span>
                        </span>
                </a>
            </div>

            

            <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p4.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p4.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Polo Club</span>
                            <span class="description-body">Primer encuentro Ecuestre Copa Coprogreso 2019</span>
                        </span>
                </a>
            </div>
            
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p6.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p6.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Polo Club</span>
                            <span class="description-body">Primer encuentro Ecuestre Copa Coprogreso 2019</span>
                        </span>
                </a>
            </div>

        

            
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p7.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p7.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Polo Club</span>
                            <span class="description-body">Primer encuentro Ecuestre Copa Coprogreso 2019</span>
                        </span>
                </a>
            </div>
            
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p8.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p8.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Polo Club</span>
                            <span class="description-body">Primer encuentro Ecuestre Copa Coprogreso 2019</span>
                        </span>
                </a>
            </div>
            
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p9.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p9.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Polo Club</span>
                            <span class="description-body">Primer encuentro Ecuestre Copa Coprogreso 2019</span>
                        </span>
                </a>
            </div>
            
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p12.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p12.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Polo Club</span>
                            <span class="description-body">Primer encuentro Ecuestre Copa Coprogreso 2019</span>
                        </span>
                </a>
            </div>
            
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p14.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p14.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Polo Club</span>
                            <span class="description-body">Primer encuentro Ecuestre Copa Coprogreso 2019</span>
                        </span>
                </a>
            </div>
            
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p15.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p15.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Polo Club</span>
                            <span class="description-body">Primer encuentro Ecuestre Copa Coprogreso 2019</span>
                        </span>
                </a>
            </div>
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p16.jpg' ?>">
                    <img class="img-fluid image" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/p16.jpg' ?>">
                    <span class="description">
                            <span class="description-heading">Polo Club</span>
                            <span class="description-body">Primer encuentro Ecuestre Copa Coprogreso 2019</span>
                        </span>
                </a>
            </div>
            
          
             

        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.compact-gallery', {animation: 'slideIn'});
</script>


<!-- Start gallery Area 

<section class="gallery-block grid-gallery">

    <h1 class="pb-10 center">Fotos que inspiran</h1>

    <div class="container">
        <div class="heading">
            <h2>Galeria</h2>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 item">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/g1.jpg' ?>">
                    <img class="img-fluid image scale-on-hover" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/g1.jpg' ?>">
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/g1.jpg' ?>">
                    <img class="img-fluid image scale-on-hover" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/g2.jpg' ?>">
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/g3.jpg' ?>">
                    <img class="img-fluid image scale-on-hover" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/g3.jpg' ?>">
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/g4.jpg' ?>">
                    <img class="img-fluid image scale-on-hover" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/g4.jpg' ?>">
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/g5.jpg' ?>">
                    <img class="img-fluid image scale-on-hover" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/g5.jpg' ?>">
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <a class="lightbox" href="<?= Yii::$app->getUrlManager()->baseUrl.'/img/g6.jpg' ?>">
                    <img class="img-fluid image scale-on-hover" src="<?= Yii::$app->getUrlManager()->baseUrl.'/img/g6.jpg' ?>">
                </a>
            </div>

        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.grid-gallery', {animation: 'slideIn'});
</script>

 End gallery Area -->


