<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Aldea | CrowdSourcing</title>

    <!-- Favicon -->
    <link rel="icon" href="/img/core-img/AldeaFavicon.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="/styleAldea.css">

    @stack('styles')
    @stack('scripts')

</head>


<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="/"><img src="/img/core-img/AldeaLogo.png" alt=""></a>
                            </div>
                            <div class="login-content">
                                @if (Route::has('login'))
                                    <div class="top-right links">
                                        @auth
                                            <a href="{{ url('/admin') }}">Perfil | {{auth()->user()->name}}</a>
                                        @else
                                            <a href="{{ route('login') }}">Iniciar sesión</a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}">Registrarse</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="#">Proyectos</a>
                                        <ul class="dropdown">
                                            @if(isset(auth()->user()->name))
                                            <li><a href="{{route('admin.posts.index')}}">Tus proyectos</a></li>
                                            @endif
                                            <li><a href="{{route('post.catalog')}}">Catalogo</a></li>
                                            <li><a href="/suscripcion">Premium</a></li>
                                        </ul>
                                    </li>
                                   
                                    <li><a href="/about-us">Nosotros</a></li>
                                    <li><a href="/faq">FAQ</a></li>
                                    <li><a href="/contact">Contacto</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href="tel:+654563325568889"><i class="icon-telephone-2"></i> <span>(+52) 444 215 1898</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="footer-area">
        <div class="main-footer-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <a href="#"><img src="/img/core-img/AldeaLogo2.png" alt=""></a>
                            </div>
                            <p>Aldea el sitio donde puedes trabajar en proyectos escolares o profesionales, sube tu proyecto o unete a
                            a alguno.</p>
                            
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Redes Sociales</h6>
                            </div>
                            <nav>
                                <ul class="useful-links">
                                    <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i>  Twitter</a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i> Instagram</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            
                            
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Contacto</h6>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-placeholder"></i>
                                <p>Calle Urbano Villalón 500, La Ladrillera, 78369 San Luis, S.L.P.,México</p>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-telephone-1"></i>
                                <p>Telefono: 444 504 7512</p>
                            </div>
                            <div class="single-contact d-flex">
                                <i class="icon-contract"></i>
                                <p>aldea_oficial@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="/js/active.js"></script>
</body>

</html>