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
		<link rel="stylesheet" href="css/main.css" />              
		<link rel="stylesheet"
			href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" />
		  
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
    <script type="text/javascript">
    if(sessionStorage.getItem("logueado")!="true")
    	location.replace("index.php");		
   
    </script>
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
                            <center> <a class="nav-link" href="home_user.php#0" >Inicio</a></center>
                        </li>
                        <li class="nav-item">
                            <center> <a class="nav-link" href="home_user.php#1" >Programa de Puntos</a></center>
                        </li>
                        <li class="nav-item">
                            <center> <a class="nav-link" href="home_user.php#2" >¿Cómo funciona?</a></center>
                        </li>
                        <li class="nav-item">
                            <center> <a class="nav-link" href="home_user.php#3" >Promociones</a></center>
                        </li>
                        <li class="nav-item">
                            <center> <a class="nav-link active" href="estado_cuenta.php">Mi cuenta</a></center>
                        </li>
                        <li class="nav-item">
                            <center> <a class="nav-link" href="index.php" onclick="javascript:sessionStorage.clear();" >Cerrar sesión</a></center>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#" data-scroll-nav="6">Blog</a>
                        </li> -->
                        <li class="nav-item">
                           <center> <a class="nav-link" href="home_user.php#7" >Soporte</a></center>
                        </li>
                    </ul>
                    
                </div><!-- /.navbar-collapse -->
                				
            </div><!-- /.container -->
				<div class="cont-welcome-profile">
					
				</div>
				<div class="text-welcome-cont">
					<span id="Menu_welcome" style="color: black">Bienvenido</span> <span
						class="menu-bullet-2" style="color: black"> : </span>
					<div id="Menu_welcomeName" class="username">
						<span class='username-fl' style="color: black" id='nombreUsuario'></span>
						<img id="Menu_img_profile" class="img-profile"
						ondragstart="return false" oncontextmenu="return false"
						src="images/profile/user.png" />
					</div>
				</div>
				
			
            
        </nav>
        
        <!-- =====*====== End Navbar =====*===== -->
        <div id="Menu_cont_menu_account" ondragstart="return false;"
			oncontextmenu="return false;">
			<div class="vaciotop" id="account"></div>
			<div class="br-4 hidden-xs"></div>
			<!--New Menu-->
			<div class="col-sm-12 cont-main-menu">
				<div class="row">
					<div id="Menu_section_personal_data" 
						class="col-sm-10 col-xs-12 item-1 cursor hvr-pop" style="height: 100px; ">
						
						<div class="boton-section" style="position:relative; height: 100px;">
													
						</div>
					</div>
					

				</div>
			</div>
		</div>
        <div id="ContentPlaceHolder1_PnlContent">

		

			<!-- contenido -->
			<section class="content-section" ondragstart="return false;"
				oncontextmenu="return false;">
				
				<div class="container">
					<div class="heading-section col-md-12 text-center">
						<button class="linkAsSubmit" onclick="location.replace('info_personal.php')"> <b>Ir a Mi Perfil</b></button> <br /> <br />
						<h2 class="text-uppercase text-red">Mi Estado de Cuenta</h2>
						<div class="clearfix"></div>
						<div class="col-md-12 current-points">
<!-- 							Saldo en <span id="ContentPlaceHolder1_ctl00_account_type" -->
<!-- 								class="span-pm">Puntos</span> al d&iacute;a de hoy: <span -->
<!-- 								id="ContentPlaceHolder1_ctl00_ActualPoints" -->
<!-- 								class="span-current-points">10.00 puntos</span> -->
							<table id="tablaSaldos" class="display" width="100%"></table>
 						</div> 

						
						
						<div id="ContentPlaceHolder1_ctl00_PanelTransactions">

							<div class="br-5"></div>
							<h3>Transacciones</h3>
						

							<!---->
							<div class="clearfix"></div>
						
							
							<div id="ContentPlaceHolder1_ctl00_cont_transactions">
								<div class="title">Detalle del periodo</div>
								<div id="ContentPlaceHolder1_ctl00_transactions_rec">
									<div class='table-responsive table'>
									<table id="tablaMovimientos" class="display" width="100%"></table>

									</div>
								</div>
								<div class="clearfix"></div>
								
								<div class="clearfix"></div>
							</div>
						</div>						
						<div class="br-4"></div>
						<div
							class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 expiration-text" style="margin: auto;">
							<i class="fa fa-calendar" aria-hidden="true"></i> <i
								class="fa fa-check-circle" aria-hidden="true"></i> 
								Recuerda que todos tus puntos vencer&aacute;n el pr&oacute;ximo 28 de febrero.
						</div>
					</div>
				</div>
				<!-- /container -->
			</section>
			<script type="text/javascript">
			    
			</script>
		</div>
        
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
                               <span>Powered by<img src="images/logo_mas_rfid.png" class="col-4 col-lg-4"/></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- =====*===== End Footer =====*===== -->



        
        
        <!-- jQuery Library -->

	
        <script src="js/jquery-3.2.1.min.js"></script>
        <script
		src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"
		type="text/javascript"></script>
	
        <script src="js/DataTable.js" type="text/javascript"></script>
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
        <!-- Custom JS -->
        <script src="js/custom.min.js"></script>
        <script type="text/javascript" src="js/menu_logueado.js"></script>
        <script type="text/javascript" src="js/userFunctions.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
        	
        	$.ajax({
        		url: "php/obtainUser.php",
        		type: "POST",
        		dataType: "JSON",
        		data: {store_data: [{idUser: sessionStorage.getItem("iduser")
        			}]}, //body
        		success: function (resultado) {
        			console.debug('ajax1 success', resultado);
        			if(resultado.success)
        			{				
        			
        				$('#nombreUsuario').html(resultado.nombre + ' '+resultado.a_paterno+' '+resultado.a_materno);
        				
        				
        			}			
//         			else
//         				alert(resultado.mensaje);
        			
        		
        	    },
        	    error: function (xhr, ajaxOptions, thrownError) {
        	    	console.log(xhr);
//         	    	alert("Verificar informacion ingresada");
        	    }
        	});
        	$.ajax({
        		url: "php/obtainMovimientosUser.php",
        		type: "POST",
        		dataType: "JSON",
        		data: {store_data: [{idUser: sessionStorage.getItem("iduser")
        			}]}, //body
        		success: function (resultado) {
        			console.debug('ajax1 success', resultado);
        			if(resultado.success)
        			{				
        				$('#tablaMovimientos').DataTable( {
        			        data: resultado.data,
        			        language: {
        			            url: 'js/datatable.spanish.json'
        			        },
        			        "searching":     false,
        			        columns: [			        	
        			            { "data": "nombre_restaurante" ,title: "Restaurante" },
        			            { "data": "user" ,title: "Tarjeta" },
        			            { "data": "fec_vip" ,title: "Fecha" },
        			            { "data": "det_vip" ,title: "Movimiento" },
        			            { "data": "mon_vip" ,title: "Monto" }
        			            
        			        ]
        			    } );			
        				
        			}			
//         			else
//         				alert(resultado.mensaje);
        			
        		
        	    },
        	    error: function (xhr, ajaxOptions, thrownError) {
        	    	console.log(xhr);
//         	    	alert("Verificar informacion ingresada");
        	    }
        	});

        	$.ajax({
        		url: "php/obtainSaldosUser.php",
        		type: "POST",
        		dataType: "JSON",
        		data: {store_data: [{idUser: sessionStorage.getItem("iduser")
        			}]}, //body
        		success: function (resultado) {
        			console.debug('ajax1 success', resultado);
        			if(resultado.success)
        			{				
        				$('#tablaSaldos').DataTable( {
        			        data: resultado.data,		
        			        "paging":   false,
        			        "ordering": false,
        			        "info":     false,
        			        "searching":     false,			        
        			        	        
        			        columns: [
        			            { "data": "user" ,title: "Tarjeta" },
        			            { "data": "pto_vip" ,title: "Saldo en puntos" }
        			        ]
        			    } );			
        				
        			}			
//         			else
//         				alert(resultado.mensaje);
        			
        		
        	    },
        	    error: function (xhr, ajaxOptions, thrownError) {
        	    	console.log(xhr);
//         	    	alert("Verificar informacion ingresada");
        	    }
        	});
        			
        		       
        			
        });

        $(function () {
	        $("[id^='table']").each(function () {
	            formatearTabla($(this));
	        });
	    });
        </script>
    </body>

</html>