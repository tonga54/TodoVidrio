<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Todovidrio</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel="manifest" href="site.webmanifest"> -->
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<!-- Place favicon.ico in the root directory -->

	<!-- CSS here -->
	<link rel="stylesheet" href="{{ asset('@public/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('@public/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('@public/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('@public/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('@public/css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('@public/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('@public/css/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('@public/css/gijgo.css') }}">
	<link rel="stylesheet" href="{{ asset('@public/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('@public/css/slicknav.css') }}">
	<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
	<link rel="stylesheet" href="{{ asset('@public/css/style.css') }}">
	<!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
	<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

		<header>
			<div class="header-area ">
				<div id="sticky-header" class="main-header-area">
					<div class="container-fluid p-0">
						<div class="row align-items-center no-gutters">
							<div class="col-xl-2 col-lg-2">
								<div class="logo">
									<a href="index.html">
										<img src="{{ asset('@public/img/logo.png') }}" alt="" style="height: 90px;">
									</a>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6">
								<div class="main-menu  d-none d-lg-block">
									<nav>
										<ul id="navigation">
											<li><a class="active" href="/inicio">Inicio</a></li>
											<li><a href="/sobre-nosotros">Sobre nosotros</a></li>
											<li><a href="/productos">Productos</a></li>
											<li><a class="active" href="/nuestros-trabajos">Nuestros trabajos</a></li>
											<li><a href="/contacto">Contacto</a></li>
										</ul>
									</nav>
								</div>
							</div>
							<div class="col-12">
								<div class="mobile_menu d-block d-lg-none"></div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</header>
		<!-- header-end -->

    <!-- bradcam_area  -->
    <div style="margin-top:0px; padding-top: 80px;  padding-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about_info pl-70">
                        <div class="section_title mb-55">
                            <h3>Productos</h3>
                            <div class="devider">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container" style="margin-top:50px; font-size: 0px; padding: 0;">
    <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12" style="padding:0px;">

        @foreach($productos as $producto)
            <div class="col-md-12 col-lg-4 col-xl-4 col-xs-12 col-sm-4 productCard">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xs-12 col-sm-12 product">
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xs-12 col-sm-12 productImage" style="background-image: url('{{$producto->imagenes[0]->path}}');">
                    
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xs-12 col-sm-12 productTextDiv">
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xs-12 col-sm-12 productPdiv">
                            <p class="productP">{{$producto->titulo}}</p>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xs-12 col-sm-12 productDivBtn">
                            <a style="font-size: 14px;" href="/productos/detalle/{{$producto->id}}" class="genric-btn danger-border radius">Leer más</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
		
</div>
</div>
	


    <!-- footer_start  -->
    <footer class="footer footer_bg_1">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget ">
                            <h3 class="footer_title">
                                Sobre nosotros
                            </h3>
                            <p>Somos Todovidrio, desde el 2002 ofreciendo el mejor servicio calidad-precio del mercado, nos diferencia el compromiso.</p>
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="{{ asset('@public/img/logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget ">
                            <h3 class="footer_title">
                                Contáctenos
                            </h3>
                            <p>Dirección : Lombardini 3835, Unión, Montevideo</p>
                            <ul>
                                <li><a href="tel:099155991">Teléfono : 099 155 991</a></li>
                                <li><a href="mailto:info@todovidrio.uy">Email : info@todovidrio.uy</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget ">
                            <h3 class="footer_title">
                                Links importantes
                            </h3>
                            <ul>
                                <li><a href="/inicio">Inicio</a></li>
                                <li><a href="/contacto">Contáctenos</a></li>
                                <li><a href="/nuestros-trabajos">Nuestros trabajos</a></li>
                                <li><a href="/sobre-nosotros">Sobre nosotros</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Novedades
                            </h3>
                            <p class="newsletter_text">
                                ¡Subscríbase a las últimas ofertas y noticias!
                            </p>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Ingrese su email">
                                <button type="submit"> <i class="fa fa-paper-plane"></i> </button>
                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-lg-8">
                        <p class="copy_right">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados <a href="https://colorlib.com" target="_blank"></a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="https://www.instagram.com/todo_vidrio_srl/">
                                        <i class="ti-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end  -->

  <!-- Modal -->
  <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="serch_form">
            <input type="text" placeholder="Search" >
            <button type="submit">search</button>
        </div>
      </div>
    </div>
  </div>

	<!-- JS here -->
	<script src="{{ asset('@public/js/vendor/modernizr-3.5.0.min.js') }}"></script>
	<script src="{{ asset('@public/js/vendor/jquery-1.12.4.min.js') }}"></script>
	<script src="{{ asset('@public/js/popper.min.js') }}"></script>
	<script src="{{ asset('@public/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('@public/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('@public/js/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('@public/js/ajax-form.js') }}"></script>
	<script src="{{ asset('@public/js/waypoints.min.js') }}"></script>
	<script src="{{ asset('@public/js/jquery.counterup.min.js') }}"></script>
	<script src="{{ asset('@public/js/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('@public/js/scrollIt.js') }}"></script>
	<script src="{{ asset('@public/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('@public/js/wow.min.js') }}"></script>
	<script src="{{ asset('@public/js/nice-select.min.js') }}"></script>
	<script src="{{ asset('@public/js/jquery.slicknav.min.js') }}"></script>
	<script src="{{ asset('@public/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('@public/js/plugins.js') }}"></script>
	<script src="{{ asset('@public/js/gijgo.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset:-100,
            duration:1700
        });
    </script>
	<!--contact js-->
	<script src="{{ asset('@public/js/contact.js') }}"></script>
	<script src="{{ asset('@public/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('@public/js/jquery.form.js') }}"></script>
	<script src="{{ asset('@public/js/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('@public/js/mail-script.js') }}"></script>

	<script src="{{ asset('@public/js/main.js') }}"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
    </script>
</body>
</html>