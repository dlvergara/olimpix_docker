<?php

/* @var $this yii\web\View */

$this->title = 'Galeria'; 
?>

			<!-- Start gallery Area -->

<section class="gallery-block grid-gallery">
            <div class="container">
                <div class="heading">
                    <h2>Galleria</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4 item">
                        <a class="lightbox" href="img/g1.jpg">
                            <img class="img-fluid image scale-on-hover" src="img/g1.jpg">
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <a class="lightbox" href="img/g1.jpg">
                            <img class="img-fluid image scale-on-hover" src="img/g2.jpg">
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <a class="lightbox" href="img/g3.jpg">
                            <img class="img-fluid image scale-on-hover" src="img/g3.jpg">
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <a class="lightbox" href="img/g4.jpg">
                            <img class="img-fluid image scale-on-hover" src="img/g4.jpg">
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <a class="lightbox" href="img/g5.jpg">
                            <img class="img-fluid image scale-on-hover" src="img/g5.jpg">
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <a class="lightbox" href="img/g6.jpg">
                            <img class="img-fluid image scale-on-hover" src="img/g6.jpg">
                        </a>
                    </div>
                    
                </div>
            </div>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
        <script>
            baguetteBox.run('.grid-gallery', { animation: 'slideIn'});
        </script>

<!-- End gallery Area -->
