<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contacto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Gracias por contactarnos. Le responderemos lo antes posible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

     
  <!--      <div class="section-top-border">
        <div class="row">
           <div class="col-lg-8 col-md-8">
                <div class="row align-items-center justify-content-center d-flex">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
                   </div>  
            </div>
        </div>

    <?php endif; ?>
</div> -->

<section class="booking-area section-gap relative" id="consultancy">
    
       
				<div class="overlay overlay-bg"></div>
				<div class="container">
                    
          
					<div class="row justify-content-between align-items-center">
						<div class="col-lg-6 col-md-6 booking-left">
                              <h4>
            Si tiene consultas comerciales u otras preguntas, complete el siguiente formulario para contactarnos.
            Gracias
            </h4>
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
								<h4 class="mb-19">Formulario de Contacto</h4>
                            
                             <div class="section-top-border" class="mb-19">
                             <div class="row" class="mb-19">
          
                            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                                <?= $form->field($model, 'email') ?>

                                <?= $form->field($model, 'subject') ?>

                                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                    'template' => '<div class="row"><div class="col-lg-5">{image}</div><div class="col-lg-6">{input}</div></div>',
                                ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
   	              </div>  
        	    </div>
               </div>
              </div>
             </div>
           
        
   </section>
						<!--	<form action="#">
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
				</div> -->
			