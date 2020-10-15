<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- Bootstrap CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        
        <!-- Font Awesome CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <!-- Include all css plugins (below), or include individual files as needed -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.1.0/flickity.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" type="text/css">
        
        <!-- Theme CSS -->
        <link href="assets/css/theme.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        
        <!-- Color Scheme CSS -->
        <link href="assets/css/color_green.css" rel="stylesheet" type="text/css">
    </head>
    <body id="page-top">
        
        <!-- Header Start -->
        <header class="header-dark fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 navbar-header">
                        <a class="navbar-brand page-scroll" href="#page-top">
                            <img src="assets/images/logo-text-black.png" alt="" class="logo-text-dark">
                            <img src="assets/images/logo-text-white.png" alt="" class="logo-text-light">
                        </a>
                        
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <!-- //.col-lg-3 -->
                    
                    <div class="col-lg-9 navbar-wrapper justify-content-end">
                        <div id="navigation" class="navbar navbar-expand-lg">
                            <div class="collapse navbar-collapse" id="navbar-header">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link page-scroll" href="#about">{{__('Acerca de')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link page-scroll" href="#skills">{{__('Características')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link page-scroll" href="#services">{{__('Servicios')}}</a>
                                    </li>
                                    <!-- li class="nav-item">
                                        <a class="nav-link page-scroll" href="#gallery">{{__('Galeria')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link page-scroll" href="#team">{{__('Equipo')}}</a>
                                    </li -->
                                    <!-- 1i class="nav-item">
                                        <a class="nav-link page-scroll" href="#pricing">{{__('Precios')}}</a>
                                    </li  -->
                                    <li class="nav-item">
                                        <a class="nav-link page-scroll" href="#contact">{{__('Contacto')}}</a>
                                    </li>
                                    @auth
                                        <li class="nav-item">
                                            <a class="nav-link page-scroll btn btn-base-color" style="padding:0em 2em!important;" href="{{ url('/home#/proyectos') }}"><b>{{__('Ingresar')}}</b></a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link page-scroll" href="{{ route('login') }}">{{__('Ingresar')}}</a>
                                        </li>
                                        @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link page-scroll btn btn-base-color" style="padding:0em 2em!important;" href="{{ route('register') }}">{{__('Registrarse')}}</a>
                                        </li>
                                        @endif
                                    @endauth
                                </ul>
                            </div>
                            <!-- //.navbar-collapse -->
                        </div>
                        <!-- //.navbar -->
                    </div>
                    <!-- //.col-lg-9 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </header>
        <!-- //Header End -->
        
        
        <!-- Section - Home Start -->
        <section id="home-bg-parallax" class="h-100 overflow-hidden p-0 w-100">
            <!-- BG Parallax -->
            <div class="bg-parallax bg-overlay-black-6"></div>
            
            <div class="h-100 left-0 position-absolute top-0 w-100">
                <div class="container h-100">
                    <div class="row align-items-center h-100 justify-content-center">
                        <div class="col-lg-8 pt-3 text-center">
                            <span class="d-block font-alt font-w-600 letter-spacing-2 text-medium text-uppercase text-white">
                                Introducción
                            </span>

                            <span class="bg-base-color d-inline-block mt-4 sep-line-medium-thick"></span>

                            <h2 class="font-alt font-w-600 letter-spacing-2 mb-3 mt-3 text-uppercase text-white title-xs-extra-large title-extra-large-3">
                                 <u>TECNOLOGÍA DE CALIDAD</u>
                            </h2>

                            <span class="d-block font-alt letter-spacing-2 mb-3 mt-4 text-large text-uppercase text-white">
                                Esta diseñado para hacer gestionar el trabajo en equipo durante la ejecución de un proyecto,
                                de forma participativa y dinámica.
                            </span>

                            <a href="#about" class="page-scroll btn btn-base-color btn-large btn-shadow mr-0 mt-4">Ver más</a>
                        </div>
                        <!-- //.col-lg-8 -->
                    </div>
                    <!-- //.row -->
                </div>
                <!-- //.container -->
            </div>
            <!-- //.h-100 -->
        </section>
        <!-- //Section - Home End -->

        
        <!-- Intro Start -->
        <div class="intro bg-gray-light p-5">
            <div class="container py-5">
                <div class="row justify-content-center py-4">
                    <div class="col-lg-8 text-center">
                        <p class="font-alt mb-0 text-xs-large text-extra-large">Cuenta con un tablero para la organización y seguimiento de tareas. Permite subir, versionar y descargar los archivos generados durante la ejecución del proyecto.</p>
                        <span class="bg-base-color d-inline-block mt-4 sep-line-long"></span>
                    </div>
                    <!-- //.col-lg-8 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </div>
        <!-- //Intro End -->
        
        
        <!-- Section - About Start -->
        <section id="about" class="bg-white">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-lg-9 pb-lg-4 text-center">
                        <h3 class="font-alt font-w-600 letter-spacing-2 text-uppercase title-xs-small title-extra-large-2">Quienes somos</h3>
                        <p class="font-alt mb-0 mt-3 text-xs-large text-uppercase title-medium">Algunas cosas que debe saber el equipo</p>
                        <span class="bg-base-color d-inline-block mt-4 sep-line-thick-long"></span>
                    </div>
                    <!-- //.col-lg-9 -->
                </div>
                <!-- //.row -->
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="carousel-custom" data-pagedots="true" data-draggable="false" data-autoplay="5000">
                            <div class="carousel-cell w-100">
                                <img src="assets/images/about-1.jpg" alt="" class="img-fluid box-shadow-shallow rounded"/>
                            </div>
                            <!-- //.carousel-cell -->
                            
                            <div class="carousel-cell w-100">
                                <img src="assets/images/about-2.jpg" alt="" class="img-fluid box-shadow-shallow rounded"/>
                            </div>
                            <!-- //.carousel-cell -->
                            
                            <div class="carousel-cell w-100">
                                <img src="assets/images/about-3.jpg" alt="" class="img-fluid box-shadow-shallow rounded"/>
                            </div>
                            <!-- //.carousel-cell -->
                        </div>
                        <!-- //.carousel-custom -->
                    </div>
                    <!-- //.col-lg-6 -->
                    
                    <div class="col-lg-6">
                        <div class="pl-lg-4 pt-5 pt-lg-0">
                            <p class="font-alt text-extra-large">Somos un grupo de consultores expertos en la elaboración y ejecución de proyectos. Con experiencia en areas de construcción civil, salud, banca, desarrollo de software empresarial entre otras.</p>
                            <p class="font-alt mt-2 text-extra-large">Contamos con más de 10 años de experiencia.</p>
                            <a href="#fun-facts" class="page-scroll btn btn-base-color btn-shadow mt-1">Ver más</a>
                        </div>
                        <!-- //.pl-lg-4 -->
                    </div>
                    <!-- //.col-lg-6 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - About End -->
        
        
        <!-- Section - Fun Facts Start -->
        <section id="fun-facts" class="bg-cover bg-gray bg-overlay-black-6">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-lg-9 pb-lg-4 text-center text-white">
                        <h3 class="font-alt font-w-600 letter-spacing-2 text-uppercase title-xs-small title-extra-large-2">Datos interesantes</h3>
                        <p class="font-alt mb-0 mt-3 text-xs-large text-uppercase title-medium">Algunos datos interesantes sobre la empresa</p>
                        <span class="bg-base-color d-inline-block mt-4 sep-line-thick-long"></span>
                    </div>
                    <!-- //.col-lg-9 -->
                </div>
                <!-- //.row -->
                
                <div class="row align-items-center justify-content-center py-4">
                    <div class="col-md-3 text-center">
                        <i class="fa fa-thumbs-o-up text-base-color title-extra-large-4"></i>
                        <span class="timer d-block font-alt font-w-600 letter-spacing-2 mt-3 text-white title-md-large title-extra-large-3" data-from="0" data-to="15" data-speed="1500">0</span>
                        <span class="d-inline-block font-alt letter-spacing-2 mt-2 title-small text-uppercase text-white">Proyectos</span>
                    </div>
                    <!-- //.col-md-3 -->
                    
                    <div class="col-md-3 mt-5 mt-md-0 text-center">
                        <i class="fa fa-smile-o text-base-color title-extra-large-4"></i>
                        <span class="timer d-block font-alt font-w-600 letter-spacing-2 mt-3 text-white title-md-large title-extra-large-3" data-from="0" data-to="5" data-speed="1500">0</span>
                        <span class="d-inline-block font-alt letter-spacing-2 mt-2 title-small text-uppercase text-white">Clientes</span>
                    </div>
                    <!-- //.col-md-3 -->
                    
                    <div class="col-md-3 mt-5 mt-md-0 text-center">
                        <i class="fa fa-coffee text-base-color title-extra-large-4"></i>
                        <span class="timer d-block font-alt font-w-600 letter-spacing-2 mt-3 text-white title-md-large title-extra-large-3" data-from="0" data-to="1211" data-speed="1500">0</span>
                        <span class="d-inline-block font-alt letter-spacing-2 mt-2 title-small text-uppercase text-white">Cafés</span>
                    </div>
                    <!-- //.col-md-3 -->
                    
                    <div class="col-md-3 mt-5 mt-md-0 text-center">
                        <i class="fa fa-gift text-base-color title-extra-large-4"></i>
                        <span class="timer d-block font-alt font-w-600 letter-spacing-2 mt-3 text-white title-md-large title-extra-large-3" data-from="0" data-to="3" data-speed="1500">0</span>
                        <span class="d-inline-block font-alt letter-spacing-2 mt-2 title-small text-uppercase text-white">Logros</span>
                    </div>
                    <!-- //.col-md-3 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - Fun Facts End -->
        
        
        <!-- Section - Why Us Start -->
        <section id="why-us" class="bg-gray-light">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-lg-9 pb-lg-4 text-center">
                        <h3 class="font-alt font-w-600 letter-spacing-2 text-uppercase title-xs-small title-extra-large-2">Por que nosotros</h3>
                        <p class="font-alt mb-0 mt-3 text-xs-large text-uppercase title-medium">6 razones por las que somos los mejores</p>
                        <span class="bg-base-color d-inline-block mt-4 sep-line-thick-long"></span>
                    </div>
                    <!-- //.col-lg-9 -->
                </div>
                <!-- //.row -->
                
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="pl-5 position-relative">
                            <i class="fa fa-rocket bg-base-color left-0 mt-1 p-3 position-absolute top-0 rounded text-white"></i>
                            <div class="ml-3">
                                <span class="d-block font-alt letter-spacing-2 title-medium text-uppercase">Velocidad</span>
                                <p class="mt-1 text-large">La estimación correcta del esfuerzo requerido nos permite tener una velocidad constante en la ejecución de proyectos.</p>
                            </div>
                            <!-- //.ml-3 -->
                        </div>
                        <!-- //.pl-5 -->
                    </div>
                    <!-- //.md-6 -->
                    
                    <div class="col-md-6 col-lg-4 mt-5 mt-md-0">
                        <div class="pl-5 position-relative">
                            <i class="fa fa-thumbs-o-up bg-base-color left-0 mt-1 p-3 position-absolute top-0 rounded text-white"></i>
                            <div class="ml-3">
                                <span class="d-block font-alt letter-spacing-2 title-medium text-uppercase">Calidad</span>
                                <p class="mt-1 text-large">La calidad es lo más importante para nuestro equipo, para cumplir con los requisitos y espectativas del cliente.</p>
                            </div>
                            <!-- //.ml-3 -->
                        </div>
                        <!-- //.pl-5 -->
                    </div>
                    <!-- //.md-6 -->
                    
                    <div class="col-md-6 col-lg-4 mt-5 mt-lg-0">
                        <div class="pl-5 position-relative">
                            <i class="fa fa-star-o bg-base-color left-0 mt-1 p-3 position-absolute top-0 rounded text-white"></i>
                            <div class="ml-3">
                                <span class="d-block font-alt letter-spacing-2 title-medium text-uppercase">Experiencia</span>
                                <p class="mt-1 text-large">Tenemos mas de 10 años de experiencia en la elaboración de proyectos y soluciones de ingeniería.</p>
                            </div>
                            <!-- //.ml-3 -->
                        </div>
                        <!-- //.pl-5 -->
                    </div>
                    <!-- //.md-6 -->
                    
                    <div class="col-md-6 col-lg-4 mt-5">
                        <div class="pl-5 position-relative">
                            <i class="fa fa-shield bg-base-color left-0 mt-1 p-3 position-absolute top-0 rounded text-white"></i>
                            <div class="ml-3">
                                <span class="d-block font-alt letter-spacing-2 title-medium text-uppercase">Seguridad</span>
                                <p class="mt-1 text-large">La seguridad es fundamental para garantizar la privacidad y disponibilidad de su información. </p>
                            </div>
                            <!-- //.ml-3 -->
                        </div>
                        <!-- //.pl-5 -->
                    </div>
                    <!-- //.md-6 -->
                    
                    <div class="col-md-6 col-lg-4 mt-5">
                        <div class="pl-5 position-relative">
                            <i class="fa fa-paper-plane-o bg-base-color left-0 mt-1 p-3 position-absolute top-0 rounded text-white"></i>
                            <div class="ml-3">
                                <span class="d-block font-alt letter-spacing-2 title-medium text-uppercase">Fiabilidad</span>
                                <p class="mt-1 text-large">Contamos con un equipo especializado y con herramientas de control de calidad.</p>
                            </div>
                            <!-- //.ml-3 -->
                        </div>
                        <!-- //.pl-5 -->
                    </div>
                    <!-- //.md-6 -->
                    
                    <div class="col-md-6 col-lg-4 mt-5">
                        <div class="pl-5 position-relative">
                            <i class="fa fa-support bg-base-color left-0 mt-1 p-3 position-absolute top-0 rounded text-white"></i>
                            <div class="ml-3">
                                <span class="d-block font-alt letter-spacing-2 title-medium text-uppercase">Precio</span>
                                <p class="mt-1 text-large">Contamos con diferentes planes adecuados para todo tipo y tamaño de emplesa.</p>
                            </div>
                            <!-- //.ml-3 -->
                        </div>
                        <!-- //.pl-5 -->
                    </div>
                    <!-- //.md-6 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - Why Us End -->
        
        
        <!-- Section - Skills Start -->
        <section id="skills" class="bg-cover bg-gray bg-overlay-black-6">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-lg-9 pb-lg-4 text-center text-white">
                        <h3 class="font-alt font-w-600 letter-spacing-2 text-uppercase title-xs-small title-extra-large-2">Características</h3>
                        <p class="font-alt mb-0 mt-3 text-xs-large text-uppercase title-medium">Tenemos creatividad y conocimiento para el desarrollo.</p>
                        <span class="bg-base-color d-inline-block mt-4 sep-line-thick-long"></span>
                    </div>
                    <!-- //.col-lg-9 -->
                </div>
                <!-- //.row -->
                
                <div class="row">
                    <div class="col-md-6 col-lg-3 text-center">
                        <div class="pie-chart opacity-9-5">
                            <div class="chart font-alt text-white" data-percent="0" data-percent-update="93" data-bar-color="#0baf4e" data-track-color="#ffffff">
                                <span class="percent font-alt font-w-600 title-extra-large-2">0%</span>
                            </div>
                            <!-- //.chart -->
                        </div>
                        <!-- //.pie-chart -->
                        
                        <span class="d-block font-alt letter-spacing-2 mt-3 title-medium text-uppercase text-white">Administración</span>
                    </div>
                    <!-- //.col-md-6 -->
                    
                    <div class="col-md-6 col-lg-3 mt-5 mt-md-0 text-center">
                        <div class="pie-chart opacity-9-5">
                            <div class="chart font-alt text-white" data-percent="0" data-percent-update="87" data-bar-color="#0baf4e" data-track-color="#ffffff">
                                <span class="percent font-alt font-w-600 title-extra-large-2">0%</span>
                            </div>
                            <!-- //.chart -->
                        </div>
                        <!-- //.pie-chart -->
                        
                        <span class="d-block font-alt letter-spacing-2 mt-3 title-medium text-uppercase text-white">Gestión</span>
                    </div>
                    <!-- //.col-md-6 -->
                    
                    <div class="col-md-6 col-lg-3 mt-5 mt-lg-0 text-center">
                        <div class="pie-chart opacity-9-5">
                            <div class="chart font-alt text-white" data-percent="0" data-percent-update="81" data-bar-color="#0baf4e" data-track-color="#ffffff">
                                <span class="percent font-alt font-w-600 title-extra-large-2">0%</span>
                            </div>
                            <!-- //.chart -->
                        </div>
                        <!-- //.pie-chart -->
                        
                        <span class="d-block font-alt letter-spacing-2 mt-3 title-medium text-uppercase text-white">Bases de datos</span>
                    </div>
                    <!-- //.col-md-6 -->
                    
                    <div class="col-md-6 col-lg-3 mt-5 mt-lg-0 text-center">
                        <div class="pie-chart opacity-9-5">
                            <div class="chart font-alt text-white" data-percent="0" data-percent-update="73" data-bar-color="#0baf4e" data-track-color="#ffffff">
                                <span class="percent font-alt font-w-600 title-extra-large-2">0%</span>
                            </div>
                            <!-- //.chart -->
                        </div>
                        <!-- //.pie-chart -->
                        
                        <span class="d-block font-alt letter-spacing-2 mt-3 title-medium text-uppercase text-white">Diseño</span>
                    </div>
                    <!-- //.col-md-6 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - Skills End -->
        
        
        <!-- Section - Services Start -->
        <section id="services" class="bg-gray-light">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-lg-9 pb-lg-4 text-center">
                        <h3 class="font-alt font-w-600 letter-spacing-2 text-uppercase title-xs-small title-extra-large-2">Nuestros Servicios</h3>
                        <p class="font-alt mb-0 mt-3 text-xs-large text-uppercase title-medium">Nosotros somos expertos en desarrollar tu negocio</p>
                        <span class="bg-base-color d-inline-block mt-4 sep-line-thick-long"></span>
                    </div>
                    <!-- //.col-lg-9 -->
                </div>
                <!-- //.row -->
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="features-block text-center">
                            <div class="block-icon ease">
                                <i class="fa fa-lightbulb-o ease"></i>
                            </div>
                            <!-- //.block-icon -->
                            
                            <span class="d-block font-alt letter-spacing-2 mt-4 text-uppercase title-medium">Diseño Web</span>
                            <span class="bg-base-color d-inline-block mt-2 sep-line"></span>
                            <p class="mt-2 text-large">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        </div>
                        <!-- //.features-block -->
                    </div>
                    <!-- //.col-md-4 -->
                    
                    <div class="col-md-4 mt-5 mt-md-0">
                        <div class="features-block text-center">
                            <div class="block-icon ease">
                                <i class="fa fa-heart-o ease"></i>
                            </div>
                            <!-- //.block-icon -->
                            
                            <span class="d-block font-alt letter-spacing-2 mt-4 text-uppercase title-medium">Diseño Grafico</span>
                            <span class="bg-base-color d-inline-block mt-2 sep-line"></span>
                            <p class="mt-2 text-large">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        </div>
                        <!-- //.features-block -->
                    </div>
                    <!-- //.col-md-4 -->
                    
                    <div class="col-md-4 mt-5 mt-md-0">
                        <div class="features-block border-0 text-center">
                            <div class="block-icon ease">
                                <i class="fa fa-flask ease"></i>
                            </div>
                            <!-- //.block-icon -->
                            
                            <span class="d-block font-alt letter-spacing-2 mt-4 text-uppercase title-medium">Branding</span>
                            <span class="bg-base-color d-inline-block mt-2 sep-line"></span>
                            <p class="mt-2 text-large">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        </div>
                        <!-- //.features-block -->
                    </div>
                    <!-- //.col-md-4 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - Services End -->
        
        
        <!-- Section - Quote Start -->
        <section id="quote" class="bg-cover bg-gray bg-overlay-black-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <i class="fa fa-quote-right text-base-color title-extra-large-3"></i>
                        <h3 class="d-block mt-4 font-alt text-white title-extra-large">"Tan asombrosos son los hechos en esta conexión que parecería que el creador mismo había diseñado este planeta".</h3>
                        <span class="d-block mt-4 font-alt text-base-color title-extra-large">(Nikola Tesla)</span>
                    </div>
                    <!-- //.col-lg-10 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - Quote End -->
        
        
        <!-- Section - Gallery Start -->
        <section id="gallery" class="bg-white">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-lg-9 pb-lg-4 text-center">
                        <h3 class="font-alt font-w-600 letter-spacing-2 text-uppercase title-xs-small title-extra-large-2">Our Gallery</h3>
                        <p class="font-alt mb-0 mt-3 text-xs-large text-uppercase title-medium">We're all working together, that's the secret</p>
                        <span class="bg-base-color d-inline-block mt-4 sep-line-thick-long"></span>
                    </div>
                    <!-- //.col-lg-9 -->
                </div>
                <!-- //.row -->
                
                <div class="row">
                    <div class="col-12">
                        <div class="gallery-filter">
                            <ul class="mb-5 p-0 text-center">
                                <li class="list-inline-item"><a href="#" data-filter="*" class="btn btn-base-color btn-small disabled mb-1 mr-1">All</a></li>
                                <li class="list-inline-item"><a href="#" data-filter=".culture" class="btn btn-base-color btn-small mb-1 mr-1">Culture</a></li>
                                <li class="list-inline-item"><a href="#" data-filter=".team" class="btn btn-base-color btn-small mb-1 mr-1">Team</a></li>
                                <li class="list-inline-item"><a href="#" data-filter=".work-space" class="btn btn-base-color btn-small mb-1 mr-0">Work Space</a></li>
                            </ul>
                        </div>
                        <!-- //.gallery-filter -->
                        
                        <div class="gallery-wrapper">
                            <div class="gallery-grid grid-col-3 gutter-medium">
                                <div class="item team">
                                    <figure>
                                        <div class="gallery-img">
                                            <img src="assets/images/gallery-1.jpg" alt="">
                                        </div>
                                        <!-- //.gallery-img -->
                                        
                                        <figcaption>
                                            <a href="assets/images/gallery-1.jpg" title="Image Caption 1">
                                                <div class="d-table">
                                                    <div class="d-table-cell align-middle">
                                                        <span class="d-block font-alt letter-spacing-2 text-extra-large text-uppercase text-white">Image Caption 1</span>
                                                    </div>
                                                    <!-- //.d-table-cell -->
                                                </div>
                                                <!-- //.d-table -->
                                            </a>
                                        </figcaption>
                                    </figure>
                                </div>
                                <!-- //.item -->
                                
                                <div class="item work-space">
                                    <figure>
                                        <div class="gallery-img">
                                            <img src="assets/images/gallery-2.jpg" alt="">
                                        </div>
                                        <!-- //.gallery-img -->
                                        
                                        <figcaption>
                                            <a href="assets/images/gallery-2.jpg" title="Image Caption 2">
                                                <div class="d-table">
                                                    <div class="d-table-cell align-middle">
                                                        <span class="d-block font-alt letter-spacing-2 text-extra-large text-uppercase text-white">Image Caption 2</span>
                                                    </div>
                                                    <!-- //.d-table-cell -->
                                                </div>
                                                <!-- //.d-table -->
                                            </a>
                                        </figcaption>
                                    </figure>
                                </div>
                                <!-- //.item -->
                                
                                <div class="item culture">
                                    <figure>
                                        <div class="gallery-img">
                                            <img src="assets/images/gallery-3.jpg" alt="">
                                        </div>
                                        <!-- //.gallery-img -->
                                        
                                        <figcaption>
                                            <a href="assets/images/gallery-3.jpg" title="Image Caption 3">
                                                <div class="d-table">
                                                    <div class="d-table-cell align-middle">
                                                        <span class="d-block font-alt letter-spacing-2 text-extra-large text-uppercase text-white">Image Caption 3</span>
                                                    </div>
                                                    <!-- //.d-table-cell -->
                                                </div>
                                                <!-- //.d-table -->
                                            </a>
                                        </figcaption>
                                    </figure>
                                </div>
                                <!-- //.item -->
                                
                                <div class="item team">
                                    <figure>
                                        <div class="gallery-img">
                                            <img src="assets/images/gallery-4.jpg" alt="">
                                        </div>
                                        <!-- //.gallery-img -->
                                        
                                        <figcaption>
                                            <a href="assets/images/gallery-4.jpg" title="Image Caption 4">
                                                <div class="d-table">
                                                    <div class="d-table-cell align-middle">
                                                        <span class="d-block font-alt letter-spacing-2 text-extra-large text-uppercase text-white">Image Caption 4</span>
                                                    </div>
                                                    <!-- //.d-table-cell -->
                                                </div>
                                                <!-- //.d-table -->
                                            </a>
                                        </figcaption>
                                    </figure>
                                </div>
                                <!-- //.item -->
                                
                                <div class="item work-space culture">
                                    <figure>
                                        <div class="gallery-img">
                                            <img src="assets/images/gallery-5.jpg" alt="">
                                        </div>
                                        <!-- //.gallery-img -->
                                        
                                        <figcaption>
                                            <a href="assets/images/gallery-5.jpg" title="Image Caption 5">
                                                <div class="d-table">
                                                    <div class="d-table-cell align-middle">
                                                        <span class="d-block font-alt letter-spacing-2 text-extra-large text-uppercase text-white">Image Caption 5</span>
                                                    </div>
                                                    <!-- //.d-table-cell -->
                                                </div>
                                                <!-- //.d-table -->
                                            </a>
                                        </figcaption>
                                    </figure>
                                </div>
                                <!-- //.item -->
                                
                                <div class="item culture">
                                    <figure>
                                        <div class="gallery-img">
                                            <img src="assets/images/gallery-6.jpg" alt="">
                                        </div>
                                        <!-- //.gallery-img -->
                                        
                                        <figcaption>
                                            <a href="assets/images/gallery-6.jpg" title="Image Caption 6">
                                                <div class="d-table">
                                                    <div class="d-table-cell align-middle">
                                                        <span class="d-block font-alt letter-spacing-2 text-extra-large text-uppercase text-white">Image Caption 6</span>
                                                    </div>
                                                    <!-- //.d-table-cell -->
                                                </div>
                                                <!-- //.d-table -->
                                            </a>
                                        </figcaption>
                                    </figure>
                                </div>
                                <!-- //.item -->
                                
                                <div class="item team work-space">
                                    <figure>
                                        <div class="gallery-img">
                                            <img src="assets/images/gallery-7.jpg" alt="">
                                        </div>
                                        <!-- //.gallery-img -->
                                        
                                        <figcaption>
                                            <a href="assets/images/gallery-7.jpg" title="Image Caption 7">
                                                <div class="d-table">
                                                    <div class="d-table-cell align-middle">
                                                        <span class="d-block font-alt letter-spacing-2 text-extra-large text-uppercase text-white">Image Caption 7</span>
                                                    </div>
                                                    <!-- //.d-table-cell -->
                                                </div>
                                                <!-- //.d-table -->
                                            </a>
                                        </figcaption>
                                    </figure>
                                </div>
                                <!-- //.item -->
                                
                                <div class="item culture">
                                    <figure>
                                        <div class="gallery-img">
                                            <img src="assets/images/gallery-8.jpg" alt="">
                                        </div>
                                        <!-- //.gallery-img -->
                                        
                                        <figcaption>
                                            <a href="assets/images/gallery-8.jpg" title="Image Caption 8">
                                                <div class="d-table">
                                                    <div class="d-table-cell align-middle">
                                                        <span class="d-block font-alt letter-spacing-2 text-extra-large text-uppercase text-white">Image Caption 8</span>
                                                    </div>
                                                    <!-- //.d-table-cell -->
                                                </div>
                                                <!-- //.d-table -->
                                            </a>
                                        </figcaption>
                                    </figure>
                                </div>
                                <!-- //.item -->
                                
                                <div class="item work-space">
                                    <figure>
                                        <div class="gallery-img">
                                            <img src="assets/images/gallery-9.jpg" alt="">
                                        </div>
                                        <!-- //.gallery-img -->
                                        
                                        <figcaption>
                                            <a href="assets/images/gallery-9.jpg" title="Image Caption 9">
                                                <div class="d-table">
                                                    <div class="d-table-cell align-middle">
                                                        <span class="d-block font-alt letter-spacing-2 text-extra-large text-uppercase text-white">Image Caption 9</span>
                                                    </div>
                                                    <!-- //.d-table-cell -->
                                                </div>
                                                <!-- //.d-table -->
                                            </a>
                                        </figcaption>
                                    </figure>
                                </div>
                                <!-- //.item -->
                            </div>
                            <!-- //.gallery-grid -->
                        </div>
                        <!-- //.gallery-wrapper -->
                    </div>
                    <!-- //.col-12 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - Gallery End -->
        
        
        <!-- Section - Keep In Touch Start -->
        <section id="keep-in-touch" class="bg-cover bg-gray bg-overlay-black-6">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-lg-9 pb-lg-4 text-center text-white">
                        <h3 class="font-alt font-w-600 letter-spacing-2 text-uppercase title-xs-small title-extra-large-2">Keep In Touch</h3>
                        <p class="font-alt mb-0 mt-3 text-xs-large text-uppercase title-medium">We would love to know from you</p>
                        <span class="bg-base-color d-inline-block mt-4 sep-line-thick-long"></span>
                    </div>
                    <!-- //.col-lg-9 -->
                </div>
                <!-- //.row -->
                
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-2">
                        <a href="#" class="d-block ease opacity-8 text-center text-hover-base-color text-white">
                            <i class="fa fa-facebook title-extra-large-4"></i>
                            <span class="d-block font-alt letter-spacing-2 mt-3 text-extra-large text-uppercase">Facebook</span>
                        </a>
                    </div>
                    <!-- //.col-sm-6 -->
                    
                    <div class="col-sm-6 col-md-4 col-lg-2 mt-5 mt-sm-0">
                        <a href="#" class="d-block ease opacity-8 text-center text-hover-base-color text-white">
                            <i class="fa fa-twitter title-extra-large-4"></i>
                            <span class="d-block font-alt letter-spacing-2 mt-3 text-extra-large text-uppercase">Twitter</span>
                        </a>
                    </div>
                    <!-- //.col-sm-6 -->
                    
                    <div class="col-sm-6 col-md-4 col-lg-2 mt-5 mt-md-0">
                        <a href="#" class="d-block ease opacity-8 text-center text-hover-base-color text-white">
                            <i class="fa fa-google title-extra-large-4"></i>
                            <span class="d-block font-alt letter-spacing-2 mt-3 text-extra-large text-uppercase">Google</span>
                        </a>
                    </div>
                    <!-- //.col-sm-6 -->
                    
                    <div class="col-sm-6 col-md-4 col-lg-2 mt-5 mt-lg-0">
                        <a href="#" class="d-block ease opacity-8 text-center text-hover-base-color text-white">
                            <i class="fa fa-youtube title-extra-large-4"></i>
                            <span class="d-block font-alt letter-spacing-2 mt-3 text-extra-large text-uppercase">YouTube</span>
                        </a>
                    </div>
                    <!-- //.col-sm-6 -->
                    
                    <div class="col-sm-6 col-md-4 col-lg-2 mt-5 mt-lg-0">
                        <a href="#" class="d-block ease opacity-8 text-center text-hover-base-color text-white">
                            <i class="fa fa-pinterest title-extra-large-4"></i>
                            <span class="d-block font-alt letter-spacing-2 mt-3 text-extra-large text-uppercase">Pinterest</span>
                        </a>
                    </div>
                    <!-- //.col-sm-6 -->
                    
                    <div class="col-sm-6 col-md-4 col-lg-2 mt-5 mt-lg-0">
                        <a href="#" class="d-block ease opacity-8 text-center text-hover-base-color text-white">
                            <i class="fa fa-instagram title-extra-large-4"></i>
                            <span class="d-block font-alt letter-spacing-2 mt-3 text-extra-large text-uppercase">Instagram</span>
                        </a>
                    </div>
                    <!-- //.col-sm-6 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - Keep In Touch End -->
        
        
        <!-- Section - Team Start -->
        <section id="team" class="bg-white">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-lg-9 pb-lg-4 text-center">
                        <h3 class="font-alt font-w-600 letter-spacing-2 text-uppercase title-xs-small title-extra-large-2">Meet The Team</h3>
                        <p class="font-alt mb-0 mt-3 text-xs-large text-uppercase title-medium">We are here to help you with anything you need</p>
                        <span class="bg-base-color d-inline-block mt-4 sep-line-thick-long"></span>
                    </div>
                    <!-- //.col-lg-9 -->
                </div>
                <!-- //.row -->
                
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <figure class="team-block rounded">
                            <img src="assets/images/team-1.jpg" alt="" class="img-fluid ease rounded">
                            
                            <figcaption class="ease h-100 left-0 position-absolute rounded top-0 w-100">
                                <div class="d-table h-100 position-relative px-4 w-100">
                                    <div class="d-table-cell align-middle text-center">
                                        <span class="d-block font-alt letter-spacing-2 title-medium text-uppercase text-white">Nick Carraway</span>
                                        <span class="bg-base-color d-inline-block mt-2 sep-line-thick"></span>
                                        <span class="d-block font-alt letter-spacing-2 mt-3 text-medium text-uppercase text-white">ECD / Founder</span>
                                    </div>
                                    <!-- //.d-table-cell -->
                                </div>
                                <!-- //.d-table -->
                            </figcaption>
                        </figure>
                    </div>
                    <!-- //.col-md-6 -->
                    
                    <div class="col-md-6 col-lg-3">
                        <figure class="team-block rounded">
                            <img src="assets/images/team-2.jpg" alt="" class="img-fluid ease rounded">
                            
                            <figcaption class="ease h-100 left-0 position-absolute rounded top-0 w-100">
                                <div class="d-table h-100 position-relative px-4 w-100">
                                    <div class="d-table-cell align-middle text-center">
                                        <span class="d-block font-alt letter-spacing-2 title-medium text-uppercase text-white">Daisy Buchanan</span>
                                        <span class="bg-base-color d-inline-block mt-2 sep-line-thick"></span>
                                        <span class="d-block font-alt letter-spacing-2 mt-3 text-medium text-uppercase text-white">CEO / Co-Founder</span>
                                    </div>
                                    <!-- //.d-table-cell -->
                                </div>
                                <!-- //.d-table -->
                            </figcaption>
                        </figure>
                    </div>
                    <!-- //.col-md-6 -->
                    
                    <div class="col-md-6 col-lg-3">
                        <figure class="team-block rounded">
                            <img src="assets/images/team-3.jpg" alt="" class="img-fluid ease rounded">
                            
                            <figcaption class="ease h-100 left-0 position-absolute rounded top-0 w-100">
                                <div class="d-table h-100 position-relative px-4 w-100">
                                    <div class="d-table-cell align-middle text-center">
                                        <span class="d-block font-alt letter-spacing-2 title-medium text-uppercase text-white">Myrtle Wilson</span>
                                        <span class="bg-base-color d-inline-block mt-2 sep-line-thick"></span>
                                        <span class="d-block font-alt letter-spacing-2 mt-3 text-medium text-uppercase text-white">Creative Director</span>
                                    </div>
                                    <!-- //.d-table-cell -->
                                </div>
                                <!-- //.d-table -->
                            </figcaption>
                        </figure>
                    </div>
                    <!-- //.col-md-6 -->
                    
                    <div class="col-md-6 col-lg-3">
                        <figure class="team-block rounded">
                            <img src="assets/images/team-4.jpg" alt="" class="img-fluid ease rounded">
                            
                            <figcaption class="ease h-100 left-0 position-absolute rounded top-0 w-100">
                                <div class="d-table h-100 position-relative px-4 w-100">
                                    <div class="d-table-cell align-middle text-center">
                                        <span class="d-block font-alt letter-spacing-2 title-medium text-uppercase text-white">Catherine Kelly</span>
                                        <span class="bg-base-color d-inline-block mt-2 sep-line-thick"></span>
                                        <span class="d-block font-alt letter-spacing-2 mt-3 text-medium text-uppercase text-white">Public Relation</span>
                                    </div>
                                    <!-- //.d-table-cell -->
                                </div>
                                <!-- //.d-table -->
                            </figcaption>
                        </figure>
                    </div>
                    <!-- //.col-md-6 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - Team End -->
       
        
        <!-- Section - Testimonial Start -->
        <section id="testimonial" class="bg-gray-light">
            <div class="container">
                <div id="carousel-testimonial" class="carousel-custom" data-pagedots="true" data-draggable="true" data-autoplay="false">
                    <div class="carousel-cell w-100">
                        <div class="row justify-content-center text-center text-md-left">
                            <div class="col-5 col-md-3 col-lg-2">
                                <img src="assets/images/testimonial-1.jpg" alt="" class="img-fluid">
                            </div>
                            <!-- //.col-5 -->
                            
                            <div class="col-md-9 col-lg-7 mt-4 mt-md-0">
                                <div class="pl-lg-3">
                                    <p class="font-alt mb-0 text-xs-large text-xs-large title-medium">Praesent vulputate dolor velit, in condimentum odio pellentesin condimentum odio pellentesque libero. Nulla facilisi. Ut enim ad minim veniam, quis nostrud exercitation. Nulla facilisi.</p>
                                    <span class="d-block font-alt font-w-600 letter-spacing-2 mt-3 text-medium text-uppercase">Kurnia Yanti, Vietnam</span>
                                    <span class="d-block font-alt font-w-600 letter-spacing-2 mt-1 text-gray-dark text-small text-uppercase">Co-Founder at Cisco</span>
                                </div>
                                <!-- //.pl-lg-3 -->
                            </div>
                            <!-- //.col-md-9 -->
                        </div>
                        <!-- //.row -->
                    </div>
                    <!-- //.carousel-cell -->
                    
                    <div class="carousel-cell w-100">
                        <div class="row justify-content-center text-center text-md-left">
                            <div class="col-5 col-md-3 col-lg-2">
                                <img src="assets/images/testimonial-2.jpg" alt="" class="img-fluid">
                            </div>
                            <!-- //.col-5 -->
                            
                            <div class="col-md-9 col-lg-7 mt-4 mt-md-0">
                                <div class="pl-lg-3">
                                    <p class="font-alt mb-0 text-xs-large text-xs-large title-medium">Praesent vulputate dolor velit, in condimentum odio pellentesin condimentum odio pellentesque libero. Nulla facilisi. Ut enim ad minim veniam, quis nostrud exercitation. Nulla facilisi.</p>
                                    <span class="d-block font-alt font-w-600 letter-spacing-2 mt-3 text-medium text-uppercase">Rima Melati, Thailand</span>
                                    <span class="d-block font-alt font-w-600 letter-spacing-2 mt-1 text-gray-dark text-small text-uppercase">Creative Director at Apple</span>
                                </div>
                                <!-- //.pl-lg-3 -->
                            </div>
                            <!-- //.col-md-9 -->
                        </div>
                        <!-- //.row -->
                    </div>
                    <!-- //.carousel-cell -->
                    
                    <div class="carousel-cell w-100">
                        <div class="row justify-content-center text-center text-md-left">
                            <div class="col-5 col-md-3 col-lg-2">
                                <img src="assets/images/testimonial-3.jpg" alt="" class="img-fluid">
                            </div>
                            <!-- //.col-5 -->
                            
                            <div class="col-md-9 col-lg-7 mt-4 mt-md-0">
                                <div class="pl-lg-3">
                                    <p class="font-alt mb-0 text-xs-large text-xs-large title-medium">Praesent vulputate dolor velit, in condimentum odio pellentesin condimentum odio pellentesque libero. Nulla facilisi. Ut enim ad minim veniam, quis nostrud exercitation. Nulla facilisi.</p>
                                    <span class="d-block font-alt font-w-600 letter-spacing-2 mt-3 text-medium text-uppercase">Monika, Indonesia</span>
                                    <span class="d-block font-alt font-w-600 letter-spacing-2 mt-1 text-gray-dark text-small text-uppercase">Managet at Microsoft</span>
                                </div>
                                <!-- //.pl-lg-3 -->
                            </div>
                            <!-- //.col-md-9 -->
                        </div>
                        <!-- //.row -->
                    </div>
                    <!-- //.carousel-cell -->
                </div>
                <!-- //.carousel-custom -->    
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - Testimonial End -->
        
        
        <!-- Section - Pricing Start -->
        <section id="pricing" class="bg-white">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-lg-9 pb-lg-4 text-center">
                        <h3 class="font-alt font-w-600 letter-spacing-2 text-uppercase title-xs-small title-extra-large-2">Our Pricing</h3>
                        <p class="font-alt mb-0 mt-3 text-xs-large text-uppercase title-medium">What we can offer for our customers</p>
                        <span class="bg-base-color d-inline-block mt-4 sep-line-thick-long"></span>
                    </div>
                    <!-- //.col-lg-9 -->
                </div>
                <!-- //.row -->
                
                <div class="row m-lg-0">
                    <div class="col-md-6 col-lg-3 px-lg-0">
                        <div class="pricing border-base-color border-top border-extra-thick box-shadow text-center">
                            <div class="pricing-header bg-black border-base-color border-bottom border-medium-thick px-3 py-4">
                                <span class="d-block font-alt letter-spacing-2 text-uppercase text-white title-large">Starter</span>
                                <span class="price d-block mt-4 text-white">
                                    <span class="symbol title-medium">$</span>
                                    <span class="title-extra-large-5">18</span>
                                    <span class="text-medium">/Month</span>
                                </span>
                                <p class="opacity-8 m-0 mt-3 text-small text-white"><i>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</i></p>
                            </div>
                            <!-- //.pricing-header -->

                            <div class="pricing-body">
                                <span class="bg-gray d-block p-4 text-large">4 Core Processor</span>
                                <span class="bg-white d-block p-4 text-large">100GB Storage</span>
                                <span class="bg-gray d-block p-4 text-large">24/7 Free Support</span>
                                <span class="bg-white d-block p-4 text-large">Weekly Backups</span>
                            </div>
                            <!-- //.pricing-body -->

                            <div class="pricing-footer bg-base-color">
                                <a href="#" class="d-block font-alt font-w-600 letter-spacing-2 text-medium text-uppercase text-white p-3 w-100">Get Started</a>
                            </div>
                            <!-- //.pricing-footer -->
                        </div>
                        <!-- //.pricing -->
                    </div>
                    <!-- //.col-md-6 --> 
                    
                    <div class="col-md-6 col-lg-3 mt-5 mt-md-0 px-lg-0">
                        <div class="pricing border-base-color border-top border-extra-thick box-shadow text-center">
                            <div class="pricing-header bg-black border-base-color border-bottom border-medium-thick px-3 py-4">
                                <span class="d-block font-alt letter-spacing-2 text-uppercase text-white title-large">Basic</span>
                                <span class="price d-block mt-4 text-white">
                                    <span class="symbol title-medium">$</span>
                                    <span class="title-extra-large-5">29</span>
                                    <span class="text-medium">/Month</span>
                                </span>
                                <p class="opacity-8 m-0 mt-3 text-small text-white"><i>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</i></p>
                            </div>
                            <!-- //.pricing-header -->

                            <div class="pricing-body">
                                <span class="bg-gray d-block p-4 text-large">4 Core Processor</span>
                                <span class="bg-white d-block p-4 text-large">300GB Storage</span>
                                <span class="bg-gray d-block p-4 text-large">24/7 Free Support</span>
                                <span class="bg-white d-block p-4 text-large">Daily Backups</span>
                            </div>
                            <!-- //.pricing-body -->

                            <div class="pricing-footer bg-base-color">
                                <a href="#" class="d-block font-alt font-w-600 letter-spacing-2 text-medium text-uppercase text-white p-3 w-100">Get Started</a>
                            </div>
                            <!-- //.pricing-footer -->
                        </div>
                        <!-- //.pricing -->
                    </div>
                    <!-- //.col-md-6 --> 
                    
                    <div class="col-md-6 col-lg-3 mt-5 mt-lg-0 px-lg-0">
                        <div class="pricing border-base-color border-top border-extra-thick box-shadow text-center">
                            <div class="pricing-header bg-black border-base-color border-bottom border-medium-thick px-3 py-4">
                                <span class="d-block font-alt letter-spacing-2 text-uppercase text-white title-large">Pro</span>
                                <span class="price d-block mt-4 text-white">
                                    <span class="symbol title-medium">$</span>
                                    <span class="title-extra-large-5">50</span>
                                    <span class="text-medium">/Month</span>
                                </span>
                                <p class="opacity-8 m-0 mt-3 text-small text-white"><i>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</i></p>
                            </div>
                            <!-- //.pricing-header -->

                            <div class="pricing-body">
                                <span class="bg-gray d-block p-4 text-large">4 Core Processor</span>
                                <span class="bg-white d-block p-4 text-large">1TB Storage</span>
                                <span class="bg-gray d-block p-4 text-large">24/7 Free Support</span>
                                <span class="bg-white d-block p-4 text-large">Hourly Backups</span>
                            </div>
                            <!-- //.pricing-body -->

                            <div class="pricing-footer bg-base-color">
                                <a href="#" class="d-block font-alt font-w-600 letter-spacing-2 text-medium text-uppercase text-white p-3 w-100">Get Started</a>
                            </div>
                            <!-- //.pricing-footer -->
                        </div>
                        <!-- //.pricing -->
                    </div>
                    <!-- //.col-md-6 -->
                    
                    <div class="col-md-6 col-lg-3 mt-5 mt-lg-0 px-lg-0">
                        <div class="pricing border-base-color border-top border-extra-thick box-shadow text-center">
                            <div class="pricing-header bg-black border-base-color border-bottom border-medium-thick px-3 py-4">
                                <span class="d-block font-alt letter-spacing-2 text-uppercase text-white title-large">Ultra</span>
                                <span class="price d-block mt-4 text-white">
                                    <span class="symbol title-medium">$</span>
                                    <span class="title-extra-large-5">99</span>
                                    <span class="text-medium">/Month</span>
                                </span>
                                <p class="opacity-8 m-0 mt-3 text-small text-white"><i>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</i></p>
                            </div>
                            <!-- //.pricing-header -->

                            <div class="pricing-body">
                                <span class="bg-gray d-block p-4 text-large">4 Core Processor</span>
                                <span class="bg-white d-block p-4 text-large">3TB Storage</span>
                                <span class="bg-gray d-block p-4 text-large">24/7 Free Support</span>
                                <span class="bg-white d-block p-4 text-large">Hourly Backups</span>
                            </div>
                            <!-- //.pricing-body -->

                            <div class="pricing-footer bg-base-color">
                                <a href="#" class="d-block font-alt font-w-600 letter-spacing-2 text-medium text-uppercase text-white p-3 w-100">Get Started</a>
                            </div>
                            <!-- //.pricing-footer -->
                        </div>
                        <!-- //.pricing -->
                    </div>
                    <!-- //.col-md-6 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - Pricing End -->
        
        
        <!-- Section - Coming Soon Start -->
        <section id="coming-soon" class="bg-cover bg-gray bg-overlay-black-6">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-lg-9 pb-lg-4 text-center text-white">
                        <h3 class="font-alt font-w-600 letter-spacing-2 text-uppercase title-xs-small title-extra-large-2">Coming Soon</h3>
                        <p class="font-alt mb-0 mt-3 text-xs-large text-uppercase title-medium">We're making something interesting & awesome</p>
                        <span class="bg-base-color d-inline-block mt-4 sep-line-thick-long"></span>
                    </div>
                    <!-- //.col-lg-9 -->
                </div>
                <!-- //.row -->
                
                <div class="row justify-content-center text-center">
                    <div id="clock" data-until-date="2021/05/25" class="clock"></div>                    
                </div>
                <!-- //.row -->
                
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-9 text-center">
                        <p class="opacity-9 text-extra-large text-white">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    </div>
                    <!-- //.col-lg-9 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - Coming Soon End -->
        
        
        <!-- Section - History Start -->
        <section id="history" class="bg-white">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-lg-9 pb-lg-4 text-center">
                        <h3 class="font-alt font-w-600 letter-spacing-2 text-uppercase title-xs-small title-extra-large-2">Our History</h3>
                        <p class="font-alt mb-0 mt-3 text-xs-large text-uppercase title-medium">Travel through time with us!</p>
                        <span class="bg-base-color d-inline-block mt-4 sep-line-thick-long"></span>
                    </div>
                    <!-- //.col-lg-9 -->
                </div>
                <!-- //.row -->
                
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="timeline clearfix py-2 py-lg-5">
                            <div class="timeline-item">
                                <div class="card box-shadow">
                                    <img src="assets/images/history-1.jpg" alt="" class="card-img-top img-fluid">

                                    <div class="card-block">
                                        <div class="p-2">
                                            <h4 class="card-title font-alt m-0 title-large">Timeline Event</h4>
                                            <span class="bg-base-color d-inline-block mt-2 sep-line-thick"></span>
                                            <p class="card-text mt-2 text-large">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Nulla facilisi.</p>
                                        </div>
                                        <!-- //.p-2 -->
                                    </div>
                                    <!-- //.card-block -->
                                </div>
                                <!-- //.card -->
                            </div>
                            <!-- //.timeline-item -->
                            
                            <div class="timeline-item timeline-inverted">
                                <div class="card box-shadow">
                                    <img src="assets/images/history-2.jpg" alt="" class="card-img-top img-fluid">

                                    <div class="card-block">
                                        <div class="p-2">
                                            <h4 class="card-title font-alt m-0 title-large">Timeline Event</h4>
                                            <span class="bg-base-color d-inline-block mt-2 sep-line-thick"></span>
                                            <p class="card-text mt-2 text-large">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Nulla facilisi.</p>
                                        </div>
                                        <!-- //.p-2 -->
                                    </div>
                                    <!-- //.card-block -->
                                </div>
                                <!-- //.card -->
                            </div>
                            <!-- //.timeline-item -->
                            
                            <div class="timeline-item">
                                <div class="card box-shadow">
                                    <img src="assets/images/history-3.jpg" alt="" class="card-img-top img-fluid">

                                    <div class="card-block">
                                        <div class="p-2">
                                            <h4 class="card-title font-alt m-0 title-large">Timeline Event</h4>
                                            <span class="bg-base-color d-inline-block mt-2 sep-line-thick"></span>
                                            <p class="card-text mt-2 text-large">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Nulla facilisi.</p>
                                        </div>
                                        <!-- //.p-2 -->
                                    </div>
                                    <!-- //.card-block -->
                                </div>
                                <!-- //.card -->
                            </div>
                            <!-- //.timeline-item -->
                            
                            <div class="timeline-item timeline-inverted">
                                <div class="card box-shadow">
                                    <img src="assets/images/history-4.jpg" alt="" class="card-img-top img-fluid">

                                    <div class="card-block">
                                        <div class="p-2">
                                            <h4 class="card-title font-alt m-0 title-large">Timeline Event</h4>
                                            <span class="bg-base-color d-inline-block mt-2 sep-line-thick"></span>
                                            <p class="card-text mt-2 text-large">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Nulla facilisi.</p>
                                        </div>
                                        <!-- //.p-2 -->
                                    </div>
                                    <!-- //.card-block -->
                                </div>
                                <!-- //.card -->
                            </div>
                            <!-- //.timeline-item -->
                            
                            <div class="timeline-item">
                                <div class="card box-shadow">
                                    <img src="assets/images/history-5.jpg" alt="" class="card-img-top img-fluid">

                                    <div class="card-block">
                                        <div class="p-2">
                                            <h4 class="card-title font-alt m-0 title-large">Timeline Event</h4>
                                            <span class="bg-base-color d-inline-block mt-2 sep-line-thick"></span>
                                            <p class="card-text mt-2 text-large">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Nulla facilisi.</p>
                                        </div>
                                        <!-- //.p-2 -->
                                    </div>
                                    <!-- //.card-block -->
                                </div>
                                <!-- //.card -->
                            </div>
                            <!-- //.timeline-item -->
                        </div>
                        <!-- //.timeline -->
                    </div>
                    <!-- //.col -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - History End -->
        
        
        <!-- Section - Contact Start -->
        <section id="contact" class="bg-cover bg-gray bg-overlay-black-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-white">
                        <h3 class="font-alt font-w-600 letter-spacing-2 text-uppercase title-xs-small title-extra-large-2">Get In Touch</h3>
                        <p class="font-alt mb-0 mt-3 text-xs-large text-uppercase title-medium">Don't hesitate to contact us</p>
                        <span class="bg-base-color d-inline-block mt-4 sep-line-thick-long"></span>
                        
                        <div class="mt-4 text-extra-large text-white">
                            <p>Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days.</p>
                            <span class="d-block">E: enquiry@coredump.com</span>
                            <span class="d-block mt-1">P: 0264 123 4567</span>
                        </div>
                        <!-- //.mt-4 -->
                    </div>
                    <!-- //.col-lg-6 -->
                    
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <form action="contact/send_mail.php" method="post" id="form-contact">
                            <div class="form-group">
                                <span class="d-block font-alt letter-spacing-1 text-medium text-uppercase text-white">Your Name</span>
                                <input type="text" name="name" class="font-alt form-control mt-2 required" id="name" placeholder="">
                            </div>
                            <!-- //.form-group -->
                            
                            <div class="form-group">
                                <span class="d-block font-alt letter-spacing-1 text-medium text-uppercase text-white">Your Email</span>
                                <input type="email" name="email" class="font-alt form-control mt-2 required email" id="email" placeholder="">
                            </div>
                            <!-- //.form-group -->
                            
                            <div class="form-group">
                                <span class="d-block font-alt letter-spacing-1 text-medium text-uppercase text-white">Message</span>
                                <textarea name="message" class="font-alt form-control mt-2 required" id="message" rows="6" placeholder=""></textarea>
                            </div>
                            <!-- //.form-group -->
                            
                            <span class="d-block font-alt letter-spacing-1 text-small text-uppercase text-white">*Please complete all fields correctly</span>
                            <button type="submit" class="btn btn-shadow btn-base-color mt-4 text-uppercase" id="btn-form-contact">Send Message</button>
                        </form>
                    </div>
                    <!-- //.col-lg-6 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </section>
        <!-- //Section - Contact End -->
        
        
        <!-- Footer Start -->
        <footer class="bg-white py-5">
            <div class="container">
                <div class="row align-items-center pb-5">
                    <div class="col-md-4 text-center text-md-left">
                        <img src="assets/images/logo-text-black.png" alt="" class="footer-logo opacity-5"/>
                    </div>
                    <!-- //.col-md-8 -->
                    
                    <div class="col-md-8">
                        <ul class="footer-icon-social mb-0 mt-4 p-0 text-center text-md-right title-xs-small title-medium">
                            <li class="list-inline-item">
                                <a href="#" class="text-gray-dark"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item pl-4">
                                <a href="#" class="text-gray-dark"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item pl-4">
                                <a href="#" class="text-gray-dark"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li class="list-inline-item pl-4">
                                <a href="#" class="text-gray-dark"><i class="fa fa-pinterest"></i></a>
                            </li>
                            <li class="list-inline-item pl-4">
                                <a href="#" class="text-gray-dark"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- //.col-md-8 -->
                </div>
                <!-- //.row -->
                
                <div class="row align-items-center border-top pt-5">
                    <div class="col text-center">
                        <span class="font-alt font-w-600 letter-spacing-1 text-gray-dark text-small text-uppercase">&copy; 2020 Rinjani Multi-Purpose One Page Theme. All rights reserved.</span>
                    </div>
                    <!-- //.col -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.container -->
        </footer>
        <!-- //Footer End -->
        
        
        <!-- Scroll to top -->
        <a href="#page-top" class="page-scroll scroll-to-top"><i class="fa fa-angle-up"></i></a>
        
        
        <!-- Main JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.3/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <!-- Include all js plugins (below) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inview/1.0.0/jquery.inview.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countto/1.2.0/jquery.countTo.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.1.0/flickity.pkgd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
        
        <!-- BG Parallax -->
        <script src="assets/js/lib/greensock/TweenMax.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
        <script src="assets/js/animation.gsap.min.js"></script>
        
        <!-- Theme JS -->
        <script src="assets/js/theme.js"></script>
        
    </body>
</html>
