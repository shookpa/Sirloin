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
		<span> <i class="fa fa-chevron-up" aria-hidden="true"></i>
		</span>
	</div>
	<!-- =====*===== End Button Top =====*===== -->

	<!-- =====*===== Start Navbar =====*===== -->
	<nav class="navbar navbar-expand-md">
		<div class="container">

			<!-- Logo and toggle get grouped for better mobile display -->
			<a class="logo" href="index.php"><span>Programa</span>de<span>Puntos</span>VIP</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-icon-collapse" aria-controls="nav-icon-collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>

			<!-- Collect the nav links, and other content for toggling -->
			<div class="collapse navbar-collapse" id="nav-icon-collapse">

				<!-- Links -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a class="nav-link active" href="#" data-scroll-nav="0">Inicio</a></li>
					<li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="1">Programa de Puntos</a></li>
					<li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="2">¿Cómo funciona?</a></li>
					<li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="3">Promociones</a></li>
					<li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="4">Regístrate</a></li>
					<li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="5">Iniciar sesión</a></li>
					<!-- <li class="nav-item">
                            <a class="nav-link" href="#" data-scroll-nav="6">Blog</a>
                        </li> -->
					<li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="7">Soporte</a></li>
				</ul>

			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
	<!-- =====*====== End Navbar =====*===== -->

	<!-- =====*===== Start Header Menú Inicio =====*===== -->
	<section class="header carousel" data-scroll-index="0">
		<div class="container-fluid">
			<div class="owl-carousel owl-theme wraper">
                
            	<?php
													// LISTADO DE LAS PROMOCIONES PARA TODOS LAS UBICACIONES:
													require_once 'php/lib/conexionMysql.php';
													
													$dir = "images/promociones/";
													$sql = "SELECT DISTINCT foto FROM promociones WHERE CURDATE() BETWEEN inicio_vigencia AND fecha_expiracion";
													$rsd = traedatosmysql ( $sql );
													
													while ( ! $rsd->EOF ) {
														
														// echo '<div class="item" style="background-size:cover!important;background-image:url('.$dir.$rsd->fields["foto"].')!important"></div>';
														echo '
								 <div class="item slide-1">
									<div class="v-middle text-center caption">
											
												<img src="' . $dir . $rsd->fields ["foto"] . '" width="100%" height="100%"/>
											
									</div>
								</div>';
														$rsd->MoveNext ();
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
						<p>Porque nos gusta consentir, premiar y distinguir la fidelidad de nuestros clientes más valiosos, creamos un Programa de Puntos a través de una tarjeta de fidelidad para recompensar tu preferencia, que tendrá grandes beneficios para ti. Podrás utilizar y gozar de tu Tarjeta de Programa de
							Puntos y otros beneficios como descuentos, promociones, etc., exclusivamente en todas las sucursales de Sirloin Stockade de la CDMX.</p>
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
				<li data-class="services-tab-1" class="col-md col-sm-6 active"><span class="icon icon-wallet"></span>
					<h5>Adquierela</h5></li>
				<!-- Service-Tab-2 -->
				<li data-class="services-tab-2" class="col-md col-sm-6"><span class="icon icon-browser"></span>
					<h5>Regístrate</h5></li>
				<!-- Service-Tab-3 -->
				<li data-class="services-tab-3" class="col-md col-sm-6"><span class="icon icon-happy"></span>
					<h5>Utilízala</h5></li>
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
							<h5 class="item-title">
								<img src="images/adquierela.png" />
							</h5>
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
							<h5 class="logo">
								<span>Programa</span>de<span>Puntos</span>VIP
							</h5>
						</div>
						<div class="col-lg-8">
							<h5 class="item-title">
								Realiza la activación de tu tarjeta desde esta página web en la sección <a href="#" class="text-danger" data-scroll-nav="4"><strong>Regístrate</strong></a>.
							</h5>
						</div>
					</div>
				</div>
				<!-- Service-Tab-Content-3 -->
				<div class="services-tab-3 services-item">
					<div class="row">
						<div class="col-lg-4">
							<h5 class="item-title">
								<img src="images/utilizala.png" />
							</h5>
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
                	<?php
																	// LISTADO DE LAS PROMOCIONES PARA TODOS LAS UBICACIONES:
																	$sqlProm = "SELECT DISTINCT desc_ubicacion FROM promociones INNER JOIN cat_ubicaciones ON cat_ubicaciones.id_ubicacion = promociones.id_ubicacion WHERE CURDATE() BETWEEN inicio_vigencia AND fecha_expiracion";
																	$rsdProm = traedatosmysql ( $sqlProm );
																	echo '<span data-filter="*" class="active">Todas</span>';
																	while ( ! $rsdProm->EOF ) {
																		$ub = $rsdProm->fields ["desc_ubicacion"];
																		echo '<span data-filter=".' . $ub . '">' . $ub . '</span>';
																		$rsdProm->MoveNext ();
																	}
																	?>    
                </div>

			<!-- Gallery -->
			<div class="gallery">
				<div class="row">
					<!-- Gallery Items -->
                        <?php
																								$sqlProm = "SELECT * FROM promociones INNER JOIN cat_ubicaciones ON cat_ubicaciones.id_ubicacion = promociones.id_ubicacion WHERE CURDATE() BETWEEN inicio_vigencia AND fecha_expiracion";
																								$rsdProm = traedatosmysql ( $sqlProm );
																								$dir = "images/promociones/";
																								while ( ! $rsdProm->EOF ) {
																									$im = $dir . $rsdProm->fields ["foto"];
																									$ub = $rsdProm->fields ["desc_ubicacion"];
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
																									$rsdProm->MoveNext ();
																								}
																								?>
                    </div>
			</div>
		</div>
	</section>
	<!-- =====*===== End Promociones =====*===== -->

	<!-- =====*===== Start Regístrate =====*===== -->
	<section class="contact section-padding text-center" data-scroll-index="4">
		<div class="container">
			<div class="section-head">
				<h6>Regístrate</h6>
				<h3>Y únete a nuestro Programa de Puntos</h3>
				<!-- <p>En Sirloin Stockade estámos comprometidos a servirte, por lo que te pedimos llenes la forma de contacto y envíanos tu duda.</p> -->
			</div>

			<!-- Contact Form -->
			<div class="row">
				<div class="col-lg-10 col-md-11 mx-auto">
					<form class='form' id='register-form' method='post' onsubmit="return  __doPostBack('Register_BtnSave')">

						<div class="messages"></div>


						<!-- =====*===== Campo Número de tarjeta =====*===== -->
						<div class="row">
							<div class="col-md-3">
								<p align="right">
									Número de tarjeta: <span class="text-danger">*</span>
								</p>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<input id="Register_TbxCardNumber" class="numeric-input" pattern="\d{16}" maxlength="16" type="text" title="Ingrese un numero de tarjeta valido" name="Register_TbxCardNumber" placeholder="Número de tarjeta *" required data-error="Número de tarjeta es requerido."
										onblur="javascript:ejecutaWSFact();">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<!-- =====*===== Campo Nombre =====*===== -->
						<div class="row">
							<div class="col-md-3">
								<p align="right">
									Nombre: <span class="text-danger">*</span>
								</p>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<input id="Register_TbxName" class="alpha-input" type="text" name="Register_TbxName" title="Ingrese un nombre valido" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,50}" placeholder="Nombre *" required data-error="Nombre es requerido.">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<!-- =====*===== Campo Apellido paterno =====*===== -->
						<div class="row">
							<div class="col-md-3">
								<p align="right">
									Apellido paterno: <span class="text-danger">*</span>
								</p>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<input id="Register_TbxLastName" class="alpha-input" type="text" name="Register_TbxLastName" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,50}" title="Ingrese un apellido valido" placeholder="Apellido paterno *" required data-error="Apellido paterno es requerido.">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<!-- =====*===== Campo Apellido materno =====*===== -->
						<div class="row">
							<div class="col-md-3">
								<p align="right">
									Apellido materno: <span class="text-danger">*</span>
								</p>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<input id="Register_TbxFirstName" class="alpha-input" type="text" name="Register_TbxFirstName" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,50}" title="Ingrese un apellido valido" placeholder="Apellido materno *" required data-error="Apellido materno es requerido.">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<!-- =====*===== Campo Genero =====*===== -->
						<div class="row">
							<div class="col-md-3">
								<p align="right">
									Género: <span class="text-danger">*</span>
								</p>
							</div>
							<div class="col-md-9">
								<table id="Register_RdoBtnLstGender">
									<tr>
										<td class="alert-light"><input id="Register_RdoBtnLstGender_F" type="radio" required name="Register_RdoBtnLstGender" value="Femenino" /><label for="Register_RdoBtnLstGender_F">Femenino</label></td>
									</tr>
									<tr>
										<td class="alert-light"><input id="Register_RdoBtnLstGender_M" type="radio" required name="Register_RdoBtnLstGender" value="Masculino" /><label for="Register_RdoBtnLstGender_M">Masculino</label></td>
									</tr>
								</table>
								<span id="Register_RequiredFieldValidator11" class="error_required" style="display: none;">El género es requerido</span>
							</div>
							<!-- =====*===== Campo Fecha de nacimiento =====*===== -->
							<div class="col-md-3">
								<p align="right">
									Fecha de nacimiento: <span class="text-danger">*</span>
								</p>
							</div>
							<div class="row col-md-9">
								<div class="col-xs-3">
									<div class=" form-group">
										<select name="Register_ddlDay" id="Register_ddlDay" required class="input-group-addon">
											<option value="">Día</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
										</select>
									</div>
								</div>
								<span id="Register_RequiredFieldValidator13" class="error_required" style="display: none;">Seleccione su día de nacimiento</span>
								<div class="col-xs-3">
									<div class="form-group">
										<select name="Register_ddlMonth" id="Register_ddlMonth" required class="input-group-addon">
											<option value="">Mes</option>
											<option value="1">Enero</option>
											<option value="2">Febrero</option>
											<option value="3">Marzo</option>
											<option value="4">Abril</option>
											<option value="5">Mayo</option>
											<option value="6">Junio</option>
											<option value="7">Julio</option>
											<option value="8">Agosto</option>
											<option value="9">Septiembre</option>
											<option value="10">Octubre</option>
											<option value="11">Noviembre</option>
											<option value="12">Diciembre</option>
										</select>
									</div>
								</div>
								<span id="Register_RequiredFieldValidator22" class="error_required" style="display: none;">Seleccione su mes de nacimiento</span>
								<div class="col-xs-3">
									<div class=" form-group">
										<select name="Register_ddlAnio" id="Register_ddlAnio" required class="input-group-addon">
											<option value="">Año</option>
											<option value="2005">2005</option>
											<option value="2004">2004</option>
											<option value="2003">2003</option>
											<option value="2002">2002</option>
											<option value="2001">2001</option>
											<option value="2000">2000</option>
											<option value="1999">1999</option>
											<option value="1998">1998</option>
											<option value="1997">1997</option>
											<option value="1996">1996</option>
											<option value="1995">1995</option>
											<option value="1994">1994</option>
											<option value="1993">1993</option>
											<option value="1992">1992</option>
											<option value="1991">1991</option>
											<option value="1990">1990</option>
											<option value="1989">1989</option>
											<option value="1988">1988</option>
											<option value="1987">1987</option>
											<option value="1986">1986</option>
											<option value="1985">1985</option>
											<option value="1984">1984</option>
											<option value="1983">1983</option>
											<option value="1982">1982</option>
											<option value="1981">1981</option>
											<option value="1980">1980</option>
											<option value="1979">1979</option>
											<option value="1978">1978</option>
											<option value="1977">1977</option>
											<option value="1976">1976</option>
											<option value="1975">1975</option>
											<option value="1974">1974</option>
											<option value="1973">1973</option>
											<option value="1972">1972</option>
											<option value="1971">1971</option>
											<option value="1970">1970</option>
											<option value="1969">1969</option>
											<option value="1968">1968</option>
											<option value="1967">1967</option>
											<option value="1966">1966</option>
											<option value="1965">1965</option>
											<option value="1964">1964</option>
											<option value="1963">1963</option>
											<option value="1962">1962</option>
											<option value="1961">1961</option>
											<option value="1960">1960</option>
											<option value="1959">1959</option>
											<option value="1958">1958</option>
											<option value="1957">1957</option>
											<option value="1956">1956</option>
											<option value="1955">1955</option>
											<option value="1954">1954</option>
											<option value="1953">1953</option>
											<option value="1952">1952</option>
											<option value="1951">1951</option>
											<option value="1950">1950</option>
											<option value="1949">1949</option>
											<option value="1948">1948</option>
											<option value="1947">1947</option>
											<option value="1946">1946</option>
											<option value="1945">1945</option>
											<option value="1944">1944</option>
											<option value="1943">1943</option>
											<option value="1942">1942</option>
											<option value="1941">1941</option>
											<option value="1940">1940</option>
											<option value="1939">1939</option>
											<option value="1938">1938</option>
											<option value="1937">1937</option>
											<option value="1936">1936</option>
											<option value="1935">1935</option>
											<option value="1934">1934</option>
											<option value="1933">1933</option>
											<option value="1932">1932</option>
											<option value="1931">1931</option>
											<option value="1930">1930</option>
											<option value="1929">1929</option>
											<option value="1928">1928</option>
											<option value="1927">1927</option>
											<option value="1926">1926</option>
											<option value="1925">1925</option>
											<option value="1924">1924</option>
											<option value="1923">1923</option>
											<option value="1922">1922</option>
											<option value="1921">1921</option>
											<option value="1920">1920</option>
											<option value="1919">1919</option>
											<option value="1918">1918</option>
											<option value="1917">1917</option>
										</select>
									</div>
								</div>
								<span id="Register_RequiredFieldValidator14" class="error_required" style="display: none;">Seleccione su año de nacimiento</span>
							</div>
							<!-- =====*===== Campo Correo electrónico  =====*===== -->
							<div class="col-md-3">
								<p align="right">
									Correo-e: <span class="text-danger">*</span>
								</p>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<input id="Register_TbxEmail" type="email" class="form-control" name="" placeholder="Correo-e *" data-error="Correo-e es requerido." required>
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<!-- <input id="txtSignUpPassword" name="" placeholder="Password" class="form-control" type="password" required="" data-error="Password required" maxlength="20"> -->
							<!-- <input id="txtSignUpConfirmPassword" name="textinput" placeholder="Confirm Password" class=" form-control" type="password" data-match="#txtSignUpPassword" data-match-error="Password does not match !" required="" data-error="Confirm password required" maxlength="20"> -->


							<!-- =====*===== Campo confirmación de Correo electrónico  =====*===== -->
							<div class="col-md-3">
								<p align="right">
									Confirmación de correo-e: <span class="text-danger">*</span>
								</p>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<input id="Register_TbxConfirmEmail" type="email" class="form-control" name="Register_TbxConfirmEmail" data-equalto="Register_TbxEmail" placeholder="Confirmación de correo-e *" data-match="#Register_TbxEmail" data-match-error="Los correos introducidos no coinciden, favor de verificar"
										required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<!-- =====*===== Campo Número de celular  =====*===== -->
							<div class="col-md-3">
								<p align="right">
									Número de celular: <span class="text-danger">*</span>
								</p>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<input id="Register_TbxPhone" type="text" pattern="\d{10}" class="numeric-input" title="Numero celular a 10 digitos" name="Register_TbxPhone" maxlength="10" placeholder="Número a 10 digitos incluyendo clave LADA *" required data-error="Número de celular es requerido.">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<!-- =====*===== Campo Código Postal  =====*===== -->
							<div class="col-md-3">
								<p align="right">
									Código Postal: <span class="text-danger">*</span>
								</p>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<input id="Register_TbxPostalCode" type="text" pattern="\d{5}" class="numeric-input" title="Introduza Codigo Postal valido" name="Register_TbxPostalCode" maxlength="5" placeholder="Código Postal *" required data-error="Código Postal es requerido.">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<!-- =====*===== Campo Contraseña  =====*===== -->
							<div class="col-md-3">
								<p align="right">
									Contraseña: <span class="text-danger">*</span>
								</p>
							</div>
							<div class="col-md-9">
								<input name="Register_TbxPassword" type="password" pattern=".{6,10}" title="Seis a 10 caracteres" maxlength="30" id="Register_TbxPassword" placeholder="Contraseña *" required data-error="Contraseña es requerida."> <span id="Register_RequiredFieldValidator9" class="error_required"
									style="display: none;">La contraseña es requerida</span> <span id="Register_RegularExpressionValidator6" class="error_required" style="display: none;">La contraseña debe ser de mínimo 6 caracteres</span>
								<p align="justify" class="blockquote-footer">La contraseña debe ser mínimo de 6 caracteres, puede incluir mayúsculas, minúsculas, números y caracteres especiales.</p>
							</div>
							<!-- =====*===== Campo Confirmación de contraseña  =====*===== -->
							<div class="col-md-3">
								<p align="right">
									Confirmar contraseña: <span class="text-danger">*</span>
								</p>
							</div>
							<div class="col-md-9">
								<input name="Register_TbxConfirmPassword" type="password" maxlength="30" pattern=".{6,10}" title="Seis a 10 caracteres" id="Register_TbxConfirmPassword" placeholder="Confirmar contraseña *" required data-error="Contraseña es requerida."> <span id="Register_RequiredFieldValidator9"
									class="error_required" style="display: none;">La contraseña es requerida</span> <span id="Register_RegularExpressionValidator6" class="error_required" style="display: none;">La contraseña debe ser de mínimo 6 caracteres</span>
							</div>
							<!-- =====*===== Campos obligatorios  =====*===== -->
							<div class="col-md-3">
								<p align="right"></p>
							</div>
							<div class="col-md-9">
								<p>
									<span class="text-danger"><strong>*</strong></span><strong> Campos obligatorios</strong>
								</p>
							</div>
							<!-- =====*===== Campo Aceptar términos y condiciones  =====*===== -->
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<div class="custom-checkbox">
											<span class="alert-light"><input id="Register_ChkBxAccep" type="checkbox" name="Register_ChkBxAccep" required /><label for="Register_ChkBxAccep">Acepto los </label></span><a href="#terminos" onclick="$('#ModalTerminos').modal('toggle');" class="text-danger" data-toggle="modal"> Términos y
												Condiciones</a>.<span id="Register_CustomValidator1" class="error_required" style="display: none;">Asegurate de Aceptar los Términos y Condiciones</span>
										</div>
									</div>
									<div class="col-md-12">
										<div class="custom-checkbox">
											<span class="alert-light"><input id="Register_ChkBxPolices" type="checkbox" name="Register_ChkBxPolices" required /><label for="Register_ChkBxPolices">Estoy de acuerdo con el </label></span><a href="#privacidad" onclick="$('#ModalPrivacidad').modal('toggle');" class="text-danger"
												data-toggle="modal"> Aviso de Privacidad</a>. <span id="Register_CustomValidator2" class="error_required" style="display: none;">Asegurate de Aceptar el Aviso de Privacidad</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input type="submit" id="btnSubmitRegistro" value="Enviar datos de registro">
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- =====*===== End Regístrate =====*===== -->
	<div class="modal face" id="ModalTerminos">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body text-justify">
					<div class="cont_user_registered">
						<p class="text-center">
							<span class="span_congrats"><b>TÉRMINOS Y CONDICIONES DE SIRLOIN STOCKADE </b><br /> <b>Programa de Puntos VIP</b></span><br />
						</p>
						<br /> <b>TARJETA DE BENEFICIOS</b> <br /> Porque nos gusta consentir, premiar y distinguir la fidelidad de nuestros Clientes más valiosos, creamos un Programa de Puntos a través de una tarjeta de fidelidad para recompensar tu preferencia, que tendrá grandes beneficios para ti. podrás utilizar
						y gozar de tu Tarjeta de Programa de Puntos VIP y otros beneficios como descuentos, promociones, etc., exclusivamente en todas las sucursales del Restaurante Sirloin Stockade de la CDMX. <br /> <b>¿CÓMO OBTENERLA?</b><br /> Podrás obtener tu tarjeta de Programa de Puntos VIP en cualquier
						Restaurante Sirloin Stockade de la CDMX, con un costo de $50.00 pesos (cincuenta pesos 00/100 M.N). Llena la solicitud en línea y acepta el aviso de privacidad y uso de datos personales. <br>Al aceptar los términos y condiciones de esta página, la tarjeta se activará y estará lista para usarse
						en el programa y te bonificaremos 50 puntos de regalo por la activación y registro al programa. Los puntos acumulados en tu Tarjeta tienen una VIGENCIA hasta el 28 de febrero de cada año. Si no utilizas los puntos antes de la fecha anteriormente indicada se perderán. Los puntos serán
						personales e intransferibles, no se pueden regalar, prestar o vender. <br /> <b>BENEFICIOS Y LINEAMIENTOS</b><br /> La Tarjeta de Programa de Puntos VIP, así como sus beneficios, lineamientos, descuentos y promociones anunciados, serán válidos y aplicados exclusivamente en todas las sucursales
						del Restaurante Sirloin Stockade de la CDMX. En cada visita que realices obtendrás un 10% (diez por ciento) del monto total de tu compra en puntos, cada punto acumulado equivale a $1.00 peso (un peso 00/100 M.N), que podrás utilizar como dinero en tus siguientes visitas. Por lo que, de manera
						automática se acumularán los puntos correspondientes a los consumos realizados. Los puntos deberán acumularse en el momento de la compra. Es indispensable presentar tu Tarjeta de Programa de Puntos VIP Sirloin Stockade al inicio de la transacción de compra para poder abonar tus puntos, de lo
						contrario no será posible acumular tus puntos y no se podrá hacer posterior a la compra. Los puntos obtenidos serán abonados a tu tarjeta dentro de un lapso de 1(una) hora a 24 horas., siguientes a la transacción o compra realizada, por lo que podrás hacer uso de esos puntos pasando dicho
						término. <br />Nos reservamos el derecho discrecional de terminar con el uso o aplicación de beneficios de las Tarjetas en cualquier momento, debiendo notificar previamente dicha situación a nuestros Clientes. Con posterioridad a la fecha de terminación que se hayan establecido, los puntos y
						cualesquier otro aspecto relacionado directa o indirectamente con las Tarjetas concluirá definitivamente en la fecha que así se señale y por lo tanto dejarán de ser válidos, precisamente a partir de dicha fecha de terminación.  <br />Bajo ninguna circunstancia se realizarán transferencias de
						saldos entre tarjetas, ni será canjeada por dinero en efectivo. El usuario acepta que la tarjeta se rige por las políticas y lineamientos establecidos por la empresa. Cualquier término y/o condición establecida con relación a las promociones, lineamientos y beneficios, es en adición a las
						políticas y lineamientos internos vigentes de la empresa, las cuales prevalecerán en todo momento sobre el programa. La cuota de inscripción o pago de la tarjeta no es reembolsable, ni serán abonados como puntos, solo en el caso que se mencione lo contrario en este documento. El pago del
						consumo que hayan sido realizadas con los puntos acumulados o adquiridos, no generan puntos. No nos hacemos responsables en caso de robo o extravío de las tarjetas proporcionadas, ni por el mal uso que se haga de ella, toda vez que es responsabilidad del Cliente que la recibió. Así mismo, por
						el mal uso de la Tarjeta adquirida, el Cliente responderá de los daños y perjuicios causados a la empresa o a terceros. Los puntos acumulados en caso de Robo o Extravío de la Tarjeta se perderán automáticamente por lo que, no podrán ser recuperados o transferidos a otra tarjeta. <br />
						<p class="text-center">
							<input type="submit" data-toggle="modal" value=" Aceptar " class="botones" onclick="javascript:$('#ModalTerminos').modal('toggle');$('#Register_ChkBxAccep').prop( 'checked', true );" />
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="modal face" id="ModalPrivacidad">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body text-justify">
					<div class="cont_user_registered">
						<p class="text-center">
							<span class="span_congrats"><b>AVISO DE PRIVACIDAD</b><br /> <b>Programa de Puntos VIP</b></span><br />
						</p>
						<br /> Preservar tu privacidad y la seguridad de tu información personal es importante para nosotros por lo cual estamos comprometidos con la protección de los Datos Personales de nuestros clientes. Cuidamos la privacidad de tus Datos para brindarte la confianza de que tus Datos Personales
						están protegidos. Únicamente las personas autorizadas tendrán acceso a tus Datos Personales, con el propósito de brindarte un mejor servicio por parte de nosotros y así evitar una divulgación indebida. Por favor, antes de proporcionarnos tus Datos Personales tómate un momento para leer el
						siguiente Aviso de Privacidad. Todos tus Datos Personales serán tratados con base en los principios de licitud, consentimiento, información, responsabilidad y finalidad de conformidad con la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, su Reglamento y sus
						Lineamientos, tus Datos son recabados con la finalidad de brindarte productos o servicios y comunicarte promociones. Al proporcionarnos tus Datos personales daremos por entendido que estás de acuerdo con los términos de este Aviso de Privacidad, las finalidades del tratamiento de tus Datos,
						así como los medios y procedimiento que ponemos a tu disposición para ejercer tus derechos de acceso y rectificación. MAS – RF SOLUTIONS SA DE CV en adelante “MAS RFID” Con domicilio en AV. CANOA 521 DESP. 202, COLONIA TIZAPAN SAN ANGEL, MEXICO D.F. CP 01090 es responsable de recabar sus datos
						personales, del uso que se le dé a los mismos y de su protección. Por lo anterior, “MAS RFID” ha establecido los siguientes lineamientos para proteger dicha Información en la medida de lo posible, los cuales pueden cambiar en cualquier momento, por lo que sugerimos consultarlos periódicamente.
						“MAS RFID” solicita información personal de identidad de los usuarios del PROGRAMA DE PUNTOS - VIP, únicamente de manera voluntaria para poder operar el programa de Lealtad denominado PROGRAMA DE PUNTOS VIP que ofrece en este sitio y en los formularios Los datos personales que requerimos son
						los siguientes: Número de Tarjeta del Programa de Puntos VIP • Nombre Completo y Apellidos • Sexo • Teléfono • Correo Electrónico • Código Postal • Fecha de Nacimiento : La información capturada es revisada internamente y se utiliza para la operación y registro dentro del programa, así como
						para envío de promociones especiales, para notificar a nuestros usuarios acerca de actualizaciones y para responder a preguntas hechas por ellos mismos. Los datos personales recabados tienen también como finalidad: a) Dar seguimiento al servicio que se les dio en nuestras instalaciones, así
						como comentarios o sugerencias. b) Darle información que le permita realizar alguna reservación posterior o servicios adicionales que tenemos. c) Envío a través de correo electrónico de comunicaciones, publicidad o promociones. d) Evaluar la calidad en el servicio e) Envío de promociones y
						aviso de lanzamiento de nuevos productos o nuevas sucursales. NOTA: Las finalidades mencionadas en los incisos a) b) c) d) y e) tienen como objetivo brindarle un mejor servicio y son consideradas necesarias para la prestación del mismo. Para las finalidades mencionadas en el párrafo anterior,
						usted tiene un plazo de 5 días hábiles para manifestar su negativa al tratamiento de su información personal, enviando la misma al correo electrónico baja@programadepuntos-vip.com o comunicándose al 5616-1645. NOTA: La información personal que requerimos no es considerada como sensible de
						acuerdo con la Ley Federal de Protección de Datos Personales en Posesión de Particulares. Le informamos que no transferimos sus datos personales dentro o fuera del país con personas distintas a las encargadas de dicha información. Finalidades de dichas transferencias, en términos En caso de
						que nos veamos obligados o necesitemos transferir su información personal a terceros nacionales o extranjeros, será informado previamente de esta situación a efecto de solicitarle su autorización e informarle sobre los destinatarios o terceros receptores y finalidades de dichas transferencias,
						en términos de lo previsto en los artículos 36 y 37 de la Ley Federal de Protección de Datos Personales en Posesión de los Particulares y 68 de su reglamento. Así mismo nos comprometemos a que estos terceros tendrán conocimiento del alcance y contenido del aviso de privacidad, haciendo
						especial énfasis, en las finalidades a las que usted sujetó el uso y aprovechamiento de su información personal. Usted tiene derecho de acceder, rectificar y cancelar sus datos personales, así como de oponerse al tratamiento de los mismos o revocar el consentimiento que para tal fin nos haya
						otorgado, a través de los procedimientos que hemos implementado. Para conocer dichos procedimientos, los requisitos, plazos, se pueden poner en contacto con nosotros a través del correo electrónico baja@programadepuntos-vip.com Si usted desea limitar el uso y divulgación de sus datos
						personales, concretamente, respecto al uso de su información personal para fines publicitarios o mercadotécnicos, podrá solicitarlo a través de nuestro departamento administrativo. “MAS RFID”. Podrá revelar Información cuando por mandato de ley y/o de autoridad competente le fuere requerido o
						por considerar de buena fe que dicha revelación es necesaria para: I) Cumplir con procesos legales; II) Cumplir con el Convenio del Usuario; III) Responder reclamaciones que involucren cualquier Contenido que menoscabe derechos de terceros o; IV) Proteger los derechos, la propiedad, o la
						seguridad de “MAS RFID”, sus Usuarios y el público en general. ACEPTACIÓN DE LA POLÍTICA DE PRIVACIDAD Si usted no está de acuerdo con la Política de Privacidad aquí enunciada, por favor no utilice este sitio ni los servicios ofrecidos por el mismo. El uso de este sitio web por su parte,
						indica la aceptación de nuestra política de Privacidad. LOS DERECHOS ARCO Y REVOCAR EL CONSENTIMIENTO Para poder ejercer los derechos de Acceso, Rectificación, Cancelación y Oposición o revocar su consentimiento, el titular, por sí mismo o mediante un representante legal debidamente
						acreditado, deberá presentar formalmente su solicitud ante el Departamento Administrativo de “MAS RFID”. La solicitud para ejercer los Derechos ARCO ó revocar el consentimiento debe ser en formato libre y debe venir acompañada de la siguiente documentación: 1. Identificación oficial vigente
						del Titular 2. En los casos en que el ejercicio de los Derechos ARCO se realice a través del representante legal del Titular, además de la acreditación de la identidad de ambos, se deberá entregar el poder notarial correspondiente o carta poder firmada ante dos testigos o declaración en
						comparecencia del Titular. 3. Cuando se quiera ejercer el derecho de rectificación, se tendrá que entregar la documentación que acredite el cambio solicitado de acuerdo a los datos personales a rectificar. La respuesta a dicha solicitud, así como el acceso a los datos personales que en su caso
						se soliciten, será por escrito y se entregará por el Responsable de la Administración y Protección de Datos Personales de los Particulares de “MAS RFID” en las instalaciones ubicadas en AV. CANOA 521 DESP. 202, COLONIA TIZAPAN SAN ANGEL, MEXICO D.F. CP 01090 en un plazo de 20 días hábiles
						contados a partir de la fecha en que fue recibida la solicitud, previa acreditación de la identidad del solicitante, o en su caso, de la personalidad de su representante. El Responsable podrá ampliar éste plazo hasta por 20 días hábiles más, cuando el caso lo amerite, con previa notificación
						de esto al titular. PROCEDIMIENTO DE AVISO DE ACTUALIZACIONES A NUESTRO AVISO DE PRIVACIDAD Cualquier modificación o actualización de nuestro aviso de privacidad o medios para ejercer los derechos ARCO serán publicadas Fecha de actualización 10/mayo/2018. <br /> <br />
						<p class="text-center">
							<input type="submit" data-toggle="modal" value=" Aceptar " class="botones" onclick="javascript:$('#ModalPrivacidad').modal('toggle');$('#Register_ChkBxPolices').prop( 'checked', true );" />
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>
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
	<div class="modal face" id="ModalRegistrySuccess">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body text-center">
					<div class="cont_img_register_2" ondragstart="return false;" oncontextmenu="return false;">
						<img src="images/iconos/user.png" style="width: 200px;" />
					</div>
					<div class="cont_user_registered">
						<br />
						<p class="text-center">
							<span class="span_congrats">¡Felicidades!</span><br />Se ha registrado tu tarjeta exitosamente.
						</p>
						<br /> A partir de este momento tu tarjeta está activada para acumulación y canje de puntos, además puedes acceder a tu cuenta, para consultar tu saldo, estado de cuenta, así como actualizar tus datos personales, y de acceso.
					</div>
					<input type="submit" data-toggle="modal" name="Register_BtnSignIn" value=" Acceder a mi cuenta " id="Register_BtnSignIn" class="botones" onclick="javascript:aceptaRegistroExitoso();" />

				</div>
			</div>
		</div>
	</div>
	<div class="modal face" id="ModalRegistryError">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body text-center">
					<div class="cont_img_register_2" ondragstart="return false;" oncontextmenu="return false;">
						<img src="images/iconos/cross.gif" style="width: 50px;" />
					</div>
					<div class="cont_user_registered">
						<br />
						<p class="text-center">
							<span class="span_congrats">¡Error!</span><br /> El registro se su tarjeta no ha sido exitoso.
						
						
						<p id="mensajeModalError"></p>

						<br /> Favor de verificar la información ingresada.
					</div>
					<input type="submit" data-toggle="modal" name="Register_BtnSignIn" value=" Intentar Nuevamente " id="Register_BtnSignIn" class="botones" onclick="javascript:$('#ModalRegistryError').modal('toggle');" />
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
	<div class="modal face" id="ModalRecoverPass" ondragstart="return false;" oncontextmenu="return false;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body text-center">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<br /> <img src="images/logo/logo_header_2.png" width="200" alt=""> <br />
					<h2 class="txtpopup text-center">Recuperación de contraseña</h2>
					<br />
					<form class='form' id='recover-form' onsubmit="return  __doPostBack('Login_BtnRecover')">
						<input name="Login_TbxEmail" type="email" id="Login_TbxEmail" class="form-control" placeholder="Correo electr&oacute;nico" required data-error="Es requerido un email válido." oninvalid="this.setCustomValidity('Usuario es requerido.')" oninput="setCustomValidity('')" />
						<div class="loading-progress"></div>
						<input type="submit" name="Login_BtnRecover" value="Recuperar" id="Login_BtnRecover" class="botones" />
					</form>
					<br /> <br /> <br />
				</div>
			</div>
		</div>
	</div>
	<div class="modal face" id="ModalLoginError">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body text-center">
					<div class="cont_img_register_2" ondragstart="return false;" oncontextmenu="return false;">
						<img src="images/iconos/cross.gif" style="width: 50px;" />
					</div>
					<div class="cont_user_registered">
						<br />
						<p class="text-center">
							<span class="span_congrats">¡Error!</span><br /> El acceso a su cuenta no ha sido exitoso.
						</p>
						<br /> Favor de verificar la información ingresada.
					</div>
					<input type="submit" data-toggle="modal" name="Register_BtnSignIn" value=" Intentar Nuevamente " id="Register_BtnSignIn" class="botones" onclick="javascript:$('#ModalLoginError').modal('toggle');" />
				</div>
			</div>
		</div>
	</div>




	<!-- =====*===== Start Iniciar Sesión =====*===== -->
	<section class="contact section-padding text-center" data-scroll-index="5">
		<div class="container">
			<div class="section-head">
				<h6>Iniciar Sesión</h6>
				<h3>Revisa tus Puntos</h3>
				<!-- <p>En Sirloin Stockade estámos comprometidos a servirte, por lo que te pedimos llenes la forma de contacto y envíanos tu duda.</p> -->
			</div>

			<!-- Inicio de sesión Form -->
			<div class="row">
				<div class="col-lg-10 col-md-11 mx-auto">
					<form class='form' id='login-form' onsubmit="return __doPostBack('Login_Login_BtnSignIn')">
						<div class="messages"></div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input id="Login_Login_UserName" type="email" name="Login_Login_UserName" placeholder="Usuario *" required data-error="Usuario es requerido." oninvalid="this.setCustomValidity('Usuario es requerido.')" oninput="setCustomValidity('')">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input id="Login_Login_Password" type="password" name="Login_Login_Password" placeholder="Contraseña *" required data-error="Contraseña es requerida." oninvalid="this.setCustomValidity('Contraseña es requerida.')" oninput="setCustomValidity('')">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input type="submit" value="Iniciar Sesión">
							</div>
							<div class="col-md-12">
								<p class="item-title">
									<a href="#ModalRecoverPass" data-toggle="modal" class="text-danger"><strong>Recuperar contraseña</strong></a>
								</p>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- =====*===== End Iniciar Sesión =====*===== -->

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
					<a href="https://www.facebook.com/SirloinDF" target="_blank"> <span><i class="fa fa-facebook" aria-hidden="true"></i></span>
					</a> <a href="https://www.twitter.com/SirloinDF" target="_blank" > <span><i class="fa fa-twitter" aria-hidden="true"></i></span>
					</a> <a href="https://www.instagram.com/sirloincdmx/" target="_blank"> <span><i class="fa fa-instagram" aria-hidden="true"></i></span>
					</a>
				</div>
				<!-- Copyright -->
				<div class="copyright">
					<span>Powered by<img src="images/logo_mas_rfid.png" class="col-4 col-lg-4" /></span>
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

</body>

</html>