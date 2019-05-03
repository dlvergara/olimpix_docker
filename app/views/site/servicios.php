<?php

/* @var $this yii\web\View */

$this->title = 'servicios'; 
?>

<section class="carousel slide">
    <div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/mbr-1.jpg" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="img/mbr-2.jpg" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="img/mbr-3.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
    </div>
</section>



<div class="panel panel-default">
  <div class="panel-body">
<!-- Start Sample Area -->
		<section class="about-video-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 about-video-left">
							<h6 class="text-uppercase">NUEVA APLICACIÓN PARA DISIPLINAS ECUESTRES</h6>
							<h1>
								Hacemos las cosas más faciles <br>
								para cambiar tu vida.
							</h1>
							<p>
								<span>Estamos aquí para dar soluciones simples</span>
							</p>
							<p>
								Conoce los diferentes deportes ecuestres por modalidades reglamentadas por la 
                                Federación Ecustre Internacional.
							</p>
							<a class="primary-btn" href="#">Empieza Ahora</a>
						</div>
						<div class="col-lg-6 about-video-right justify-content-center align-items-center d-flex">
							<a class="play-btn" href="https://www.youtube.com/watch?v=ARA0AxrnHdM"><img class="img-fluid mx-auto" src="img/play.png" alt=""></a>
						</div>
					</div>
				</div>
			</section>

        </div>
    </div>

<div class="panel panel-default">
  <div class="panel-body">
	<!-- Start booking Area -->
			<section class="booking-area section-gap relative" id="consultancy">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-lg-6 col-md-6 booking-left">
							<div class="active-review-carusel">
								<div class="single-carusel">
									<img src="img/r1.png" alt="">
									<div class="title justify-content-start d-flex">
										<h4>Fannie Rowe</h4>
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</div>
									</div>
									<p>
										Comentarios 
									</p>
									<img src="img/r2.png" alt="">
									<div class="title justify-content-start d-flex">
										<h4>Hulda Sutton</h4>
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</div>
									</div>
									<p>
										Comentarios 
									</p>
								</div>
								<div class="single-carusel">
									<img src="img/r1.png" alt="">
									<div class="title justify-content-start d-flex">
										<h4>Fannie Rowe</h4>
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</div>
									</div>
									<p>
										Comentarios 
									</p>
									<img src="img/r2.png" alt="">
									<div class="title justify-content-start d-flex">
										<h4>Hulda Sutton</h4>
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</div>
									</div>
									<p>
										Comentarios 
									</p>
								</div>
								<div class="single-carusel">
									<img src="img/r1.png" alt="">
									<div class="title justify-content-start d-flex">
										<h4>Fannie Rowe</h4>
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</div>
									</div>
									<p>
										Comentarios 
									</p>
									<img src="img/r2.png" alt="">
									<div class="title justify-content-start d-flex">
										<h4>Hulda Sutton</h4>
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</div>
									</div>
									<p>
										Comentarios 
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 booking-right">
								<h4 class="mb-20">Formulario de Contacto</h4>
								<form action="#">
									<input class="form-control" type="text" name="name" placeholder="Nombres" required>
									<input class="form-control" type="email" name="email" placeholder="Email" required>
									<input class="form-control" type="text" name="phone" placeholder="Número de Telefono" required>
									<div class="input-group dates-wrap">
										<input id="datepicker" class="dates form-control" id="exampleAmount" placeholder="Fecha y hora" type="text">
										<div class="input-group-prepend">
											<span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
										</div>
									</div>
									<textarea class="common-textarea form-control mt-10" name="message" placeholder="Mensage" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"></textarea>
									<button  class="btn btn-default btn-lg btn-block text-center">¡Reservar ahora!</button>
								</form>
						</div>
					</div>
				</div>
			</section>
      	</div>
	</div>
      
			<!-- End booking Area -->