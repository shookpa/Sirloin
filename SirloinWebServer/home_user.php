<!DOCTYPE html>
<html lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="utf-8">
        <title>PROGRAMA DE PUNTOS VIP | SIRLOIN STOCKADE</title>
        <meta name="description" content="Binz is a responsive creative agency template.">
		<meta name="keywords" content="portfolio, personal, corporate, business, parallax, creative, agency">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
                
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:900">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900">
        <!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
        <!-- Magnific-Popup CSS -->
		<link rel="stylesheet" href="css/magnific-popup.css">
        <!-- Icon Fonts CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/et-line.css">
        <!-- Main CSS -->
        <link rel="stylesheet" href="css/style.min.css">
        
    </head>
    <body>
        
        <!-- =====*===== Start Preloader =====*===== -->
	    <div class="loading">
			<div class="load-circle"></div>
		</div>
		<!-- =====*===== End Preloader =====*===== -->
        
        <!-- =====*===== Start Button Top =====*===== -->
        <div class="button-top" data-scroll-nav="0">
            <span>
                <i class="fa fa-chevron-up" aria-hidden="true"></i>
            </span>
		</div>
        <!-- =====*===== End Button Top =====*===== -->
        
        <!-- =====*===== Start Navbar =====*===== -->
            <nav class="navbar navbar-expand-md">
            <div class="container">
                
                <!-- Logo and toggle get grouped for better mobile display -->
                <a class="logo" href="index.php"><span>Programa</span>de<span>Puntos</span>VIP</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-icon-collapse" aria-controls="nav-icon-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <!-- Collect the nav links, and other content for toggling -->
                <div class="collapse navbar-collapse" id="nav-icon-collapse">
                    
                    <!-- Links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                           <center>  <a class="nav-link active" href="#" data-scroll-nav="0">Inicio</a></center>
                        </li>
                        <li class="nav-item">
                         <center>    <a class="nav-link" href="#" data-scroll-nav="1">Programa de Puntos</a></center>
                        </li>
                        <li class="nav-item">
                         <center>    <a class="nav-link" href="#" data-scroll-nav="2">¿Cómo funciona?</a></center>
                        </li>
                        <li class="nav-item">
                          <center>   <a class="nav-link" href="#" data-scroll-nav="3">Promociones</a></center>
                        </li>
                        <li class="nav-item">
                         <center>    <a class="nav-link" href="estado_cuenta.php">Mi cuenta</a></center>
                        </li>
                        <li class="nav-item">
                           <center>  <a class="nav-link" href="index.php" onclick="javascript:sessionStorage.clear();" >Cerrar sesión</a></center>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#" data-scroll-nav="6">Blog</a>
                        </li> -->
                        <li class="nav-item">
                           <center>  <a class="nav-link" href="#" data-scroll-nav="7">Soporte</a></center> 
                        </li>
                    </ul>
                    
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
        <!-- =====*====== End Navbar =====*===== -->
        
        <!-- =====*===== Start Header Menú Inicio =====*===== -->
        <section class="header carousel" data-scroll-index="0">
            <div class="container-fluid">
                <div class="owl-carousel owl-theme wraper">
					<?php //LISTADO DE LAS PROMOCIONES PARA TODOS LAS UBICACIONES:
						require_once 'php/lib/conexionMysql.php';

						$dir = "images/promociones/";
						$sql="SELECT * FROM promociones WHERE id_ubicacion=1 AND CURDATE() BETWEEN inicio_vigencia AND fecha_expiracion";
						$rsd= traedatosmysql($sql);
						
						while (!$rsd->EOF) {
							echo '<div class="item" style="background-size:cover!important;background-image:url('.$dir.$rsd->fields["foto"].')!important"></div>'; 
							$rsd->MoveNext();
						}
						
					?>
				</div>
            </div>
        </section>
        <!-- =====*===== End Header =====*===== -->
        
        <!-- =====*===== Start Hero Menú Programa de Puntos =====*===== -->
        <section class="hero section-padding text-center" data-scroll-index="1">
            <div class="container">
                
                <div class="section-head">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h6>Programa de Puntos</h6>
                            <h3>y sus beneficios</h3>
                            <p>Porque nos gusta consentir, premiar y distinguir la fidelidad de nuestros clientes más valiosos, creamos un Programa de Puntos a través de una tarjeta de fidelidad para recompensar tu preferencia, que tendrá grandes beneficios para ti. Podrás utilizar y gozar de tu Tarjeta de Programa de Puntos y otros beneficios como descuentos, promociones, etc., exclusivamente en todas las sucursales de Sirloin Stockade de la CDMX.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Hero Items -->
                <div class="row">
                    <!-- Hero Item -->
                    <div class="col-md-6 col-lg-4">
                        <div class="hero-item">
                            <span class="icon icon-layers"></span>
                            <h5>Acumulación de puntos</h5>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Sit amet commodo magna.</p> -->
                        </div>
                    </div>
                    <!-- Hero Item -->
                    <div class="col-md-6 col-lg-4">
                        <div class="hero-item">
                            <span class="icon icon-refresh"></span>
                            <h5>Canje de puntos</h5>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Sit amet commodo magna.</p> -->
                        </div>
                    </div>
                    <!-- Hero Item -->
                    <div class="col-md-6 col-lg-4">
                        <div class="hero-item">
                            <span class="icon icon-gift"></span>
                            <h5>Promociones especiales</h5>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Sit amet commodo magna.</p> -->
                        </div>
                    </div>
                    <!-- Hero Item -->
                    <!-- <div class="col-md-6 col-lg-4">
                        <div class="hero-item">
                            <span class="icon icon-magnifying-glass"></span>
                            <h5>SEO Optymized</h5>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Sit amet commodo magna.</p>
                        </div>
                    </div> -->
                    <!-- Hero Item -->
                    <!-- <div class="col-md-6 col-lg-4">
                        <div class="hero-item">
                            <span class="icon icon-chat"></span>
                            <h5>Technical support</h5>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Sit amet commodo magna.</p>
                        </div>
                    </div> -->
                    <!-- Hero Item -->
                    <!-- <div class="col-md-6 col-lg-4">
                        <div class="hero-item">
                            <span class="icon icon-layers"></span>
                            <h5>High quality</h5>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Sit amet commodo magna.</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- =====*===== End Hero =====*===== -->
        
        <!-- =====*===== Start Services =====*===== -->
        <section class="services section-padding text-center" data-scroll-index="2">
            <div class="container">
                <div class="section-head">
                    <h6>¿Cómo funciona?</h6>
                    <h3>Disfruta de los beneficios</h3>
                </div>
                
                <!-- Service-Tabs -->
                <ul class="services-tabs row">
                    <!-- Service-Tab-1 -->
                    <li data-class="services-tab-1" class="col-md col-sm-6 active">
                        <span class="icon icon-wallet"></span>
                        <h5>Adquierela</h5>
                    </li>
                    <!-- Service-Tab-2 -->
                    <li data-class="services-tab-2" class="col-md col-sm-6">
                        <span class="icon icon-browser"></span>
                        <h5>Regístrate</h5>
                    </li>
                    <!-- Service-Tab-3 -->
                    <li data-class="services-tab-3" class="col-md col-sm-6">
                        <span class="icon icon-happy"></span>
                        <h5>Utilízala</h5>
                    </li>
                    <!-- Service-Tab-4 -->
                    <!-- <li data-class="services-tab-4" class="col-md col-sm-6">
                        <span class="icon icon-piechart"></span>
                        <h5>Marketing</h5>
                    </li> -->
                </ul>
                
                <!-- Service-Tab-Content -->
                <div class="services-tab-content">
                    <!-- Service-Tab-Content-1 -->
                    <div class="services-tab-1 services-item active">
                        <div class="row">
                            <div class="col-lg-4">
                                <h5 class="item-title"><img src="images/adquierela.png"/></h5>
                            </div>
                            <div class="col-lg-8">
                                <h5 class="item-title">Podrás comprar tu tarjeta en cualquier sucursal de Sirloin Stockade de la CDMX.</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Service-Tab-Content-2 -->
                    <div class="services-tab-2 services-item">
                        <div class="row">
                            <div class="col-lg-4">
                                <h5 class="logo"><span>Programa</span>de<span>Puntos</span>VIP</h5>
                            </div>
                            <div class="col-lg-8">
                                <h5 class="item-title">Realiza la activación de tu tarjeta desde esta página web en la sección <a href="#" class="text-danger" data-scroll-nav="4"><strong>Regístrate</strong></a>.</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Service-Tab-Content-3 -->
                    <div class="services-tab-3 services-item">
                        <div class="row">
                            <div class="col-lg-4">
                                <h5 class="item-title"><img src="images/utilizala.png"/></h5>
                            </div>
                            <div class="col-lg-8">
                                <h5 class="item-title">Utiliza tu tarjeta en cualquiera de las nuestras sucursales en la CDMX y aculuma puntos.</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Service-Tab-Content-4 -->
                    
                </div>
            </div>
        </section>
        <!-- =====*===== End Services =====*===== -->
        
        <!-- =====*===== Start Testimonials =====*===== -->
        <!-- <section class="testimonials text-center">
            <div class="container">
                <div class="section-head">
                    <h6>Testimonials</h6>
                    <h3>What Our Clients Say</h3>
                </div>
				<div class="row">
					<div class="col-lg-8 mx-auto">
                        <div class="says text-center">
                            <span class="blockquote-icon"><i class="fa fa-quote-right fa-lg" aria-hidden="true"></i></span>
                            <div class="owl-carousel owl-theme">
                                <div class="item">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Vivamus a tellus.</p>
                                    <h6>Adam Smith <span class="author">Marketing Specialist</span></h6>
                                </div>
                                <div class="item">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Vivamus a tellus.</p>
                                    <h6>Adam Smith <span class="author">Marketing Specialist</span></h6>
                                </div>
                                <div class="item">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Vivamus a tellus.</p>
                                    <h6>Adam Smith <span class="author">Marketing Specialist</span></h6>
                                </div>
                            </div>
					   </div>
				    </div>
                </div>
            </div>
        </section> -->
        <!-- =====*===== End Testimonials =====*===== -->
        
        <!-- =====*===== Start Promociones =====*===== -->
        <section class="portfolio text-center" data-scroll-index="3">
            <div class="container">
                <div class="section-head">
                    <h6>Nuestras Promociones</h6>
                    <h3>Aprovéchalas</h3>
                </div>
                
                <!-- Filter Links -->
                <div class="filtering">
                    <?php //LISTADO DE LAS PROMOCIONES PARA TODOS LAS UBICACIONES:						
						$sqlProm="SELECT DISTINCT desc_ubicacion FROM promociones INNER JOIN cat_ubicaciones ON cat_ubicaciones.id_ubicacion = promociones.id_ubicacion WHERE CURDATE() BETWEEN inicio_vigencia AND fecha_expiracion";
						$rsdProm= traedatosmysql($sqlProm);					
						echo '<span data-filter="*" class="active">Todas</span>';
						while (!$rsdProm->EOF) {
							$ub=$rsdProm->fields["desc_ubicacion"];
							echo '<span data-filter=".'.$ub.'">'.$ub.'</span>';
							$rsdProm->MoveNext();
						}
					?>  
                </div>
                    
                <!-- Gallery -->
                <div class="gallery">
                    <div class="row">
                        <!-- Gallery Items -->
                        <?php 
                        $sqlProm="SELECT * FROM promociones INNER JOIN cat_ubicaciones ON cat_ubicaciones.id_ubicacion = promociones.id_ubicacion WHERE CURDATE() BETWEEN inicio_vigencia AND fecha_expiracion";
                        $rsdProm= traedatosmysql($sqlProm);
                        $dir = "images/promociones/";
                        while (!$rsdProm->EOF) {                        	
                        	$im=$dir.$rsdProm->fields["foto"];
                        	$ub=$rsdProm->fields["desc_ubicacion"];
                        	echo "<div class='col-lg-4 col-md-6 item-img $ub'>
		                            <img src='$im' alt='Image' />
		                            <div class='item-img-overlay'>
		                                <div class='overlay-info v-middle'>
		                                    <h5>$ub</h5>
		                                    <div class='icons'>
		                                        <span class='icon link'>
		                                            <a href='$im' title=''>
		                                                <span class='icon-magnifying-glass'></span>
		                                            </a>
		                                        </span>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>";
                        	$rsdProm->MoveNext();
                        }                        
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- =====*===== End Promociones =====*===== -->        
        <div class="modal face" id="ModalSuccess">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body text-center">
					<div class="cont_img_register_2" ondragstart="return false;" oncontextmenu="return false;">
						<img src="images/iconos/user.png" style="width: 200px;" />
					</div>
					<div class="cont_user_registered">
						<br />
						<p class="text-center">
							<span class="span_congrats">¡Felicidades!</span><br />
						
						
						<p id="mensajeModalExito"></p>

						<br />
						<p id="mensajeModalExito2"></p>
					</div>
					<input type="submit" data-toggle="modal" value=" Aceptar " class="botones" onclick="javascript:$('#ModalSuccess').modal('toggle');" />
				</div>
			</div>
		</div>
	</div>
	<div class="modal face" id="ModalError">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body text-center">
					<div class="cont_img_register_2" ondragstart="return false;" oncontextmenu="return false;">
						<img src="images/iconos/cross.gif" style="width: 50px;" />
					</div>
					<div class="cont_user_registered">
						<br />
						<p class="text-center">
							<span class="span_congrats">¡Error!</span><br />
						
						
						<p id="mensajeModalError2"></p>

						<br /> Favor de verificar la información ingresada.
					</div>
					<input type="submit" data-toggle="modal" name="Register_BtnSignIn" value=" Intentar Nuevamente " id="Register_BtnSignIn" class="botones" onclick="javascript:$('#ModalError').modal('toggle');" />
				</div>
			</div>
		</div>
	</div>
        <!-- =====*===== Start Soporte =====*===== -->
        <section class="contact section-padding text-center" data-scroll-index="7">
            <div class="container">
                <div class="section-head">
                    <h6>Soporte</h6>
                    <h3>Aclara tus dudas</h3>
                    <p>En Sirloin Stockade estámos comprometidos a servirte, por lo que te pedimos llenes la forma de contacto y envíanos tu duda.</p>
                </div>
                
                <!-- Contact Form -->
                <div class="row">
				<div class="col-lg-10 col-md-11 mx-auto">
					<form class='form' id='contact-form' onsubmit="return  __doPostBack('Send_Contact_Form')">
						<div class="messages"></div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input id="contact_name" type="text" name="contact_name" placeholder="Nombre *" required data-error="Nombre es requerido."  title=" " oninvalid="this.setCustomValidity('Nombre es requerido.')" oninput="setCustomValidity('')">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input id="contact_TbxCardNumber" class="numeric-input" pattern="\d{16}" maxlength="16" type="text" title=" " name="contact_TbxCardNumber" placeholder="Número de tarjeta *" required data-error="Número de tarjeta es requerido."
										oninvalid="this.setCustomValidity('Tarjeta es requerido.')" oninput="setCustomValidity('')">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input id="contact_email" type="email" name="contact_email" placeholder="Correo-e *" required data-error="Correo es requerido."   title=" " oninvalid="this.setCustomValidity('Correo es requerido.')" oninput="setCustomValidity('')">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input id="contact_phone" type="tel" name="contact_phone" placeholder="Teléfono *" required data-error="Telefono es requerido."   title=" " oninvalid="this.setCustomValidity('Telefono es requerido.')" oninput="setCustomValidity('')">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<textarea id="contact_message" name="contact_message" placeholder="Mensaje *" rows="4" required data-error="Por favor, agregue el mensaje."  title=" " oninvalid="this.setCustomValidity('El mensaje es requerido.')" oninput="setCustomValidity('')"></textarea>
									<div class="help-block with-errors"></div>
								</div>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-12">
									<input type="submit" value="Enviar mensaje">
							</div>
							
						</div>
					</form>
				</div>
			</div>
            </div>
        </section>
        <!-- =====*===== End Soporte =====*===== -->
        
        <!-- =====*===== Start Footer =====*===== -->
        <footer class="text-center">
            <div class="container-fluit">
                <div class="main-footer">
                    <!-- Social Icons -->
                    <div class="social-icons">
                      <h5 class="text-dark">Síguenos</h5>
                        <a href="#0">
                            <span><i class="fa fa-facebook" aria-hidden="true"></i></span>
                        </a>
                        <a href="#0">
                            <span><i class="fa fa-twitter" aria-hidden="true"></i></span>
                        </a>
                        <a href="#0">
                            <span><i class="fa fa-linkedin" aria-hidden="true"></i></span>
                        </a>
                        <a href="#0">
                            <span><i class="fa fa-pinterest" aria-hidden="true"></i></span>
                        </a>
                        <a href="#0">
                            <span><i class="fa fa-instagram" aria-hidden="true"></i></span>
                        </a>  
                    </div>
                    <!-- Copyright -->
                    <div class="copyright">
                               <span>Powered by<img src="images/logo_mas_rfid.png" class="col-4 col-lg-4"/></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- =====*===== End Footer =====*===== -->



        
        
        <!-- jQuery Library -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/jquery.progresstimer.min.js"></script>
        
        <!-- Popper JS -->
        <script src="js/popper.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="js/bootstrap.min.js"></script>
        <!-- ScrollIt JS -->
        <script src="js/scrollIt.min.js"></script>
        <!-- Owl Carousel JS -->
		<script src="js/owl.carousel.min.js"></script>
        <!-- Magnific-Popup JS -->
		<script src="js/jquery.magnific-popup.min.js"></script>
        <!-- isotope.pkgd JS -->
        <script src="js/isotope.pkgd.min.js"></script>
        <!-- Validator JS -->
      	<script src="js/validator.js"></script>
      	<script src="js/jquery.validate.min.js"></script>
      	
        <!-- Custom JS -->
        <script src="js/custom.min.js"></script>
        <script type="text/javascript" src="js/menu_logueado.js"></script>
        <script type="text/javascript" src="js/userFunctions.js"></script>
        <script type="text/javascript">
        $(window).on("load", function () {
            var urlHash = window.location.href.split("#")[1];
            var targetTop = $('[data-scroll-index=' + urlHash + ']').offset().top;
            $('html,body').animate({
                scrollTop: targetTop
            });
        });
        </script>
    </body>

</html>