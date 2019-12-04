@extends('layout')

@section('content')

<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>Contact</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Google Maps ##### -->
    <section class="contact-area mt-70 section-padding-100">
    <div class="map-area wow fadeInUp" data-wow-delay="300ms">
        <!--<div id="googleMap"></div>-->
        <!--<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-100.98838806152344%2C22.117171087079015%2C-100.98109245300293%2C22.125698803133105&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=17/22.12144/-100.98474">Ver mapa más grande</a></small>-->
    </div>
    </section>
    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-content">
                        <div class="row">
                            <!-- Contact Information -->
                            <div class="col-12 col-lg-5">
                                <div class="contact-information wow fadeInUp" data-wow-delay="400ms">
                                    <div class="section-heading text-left">
                                        <span>Aldea</span>
                                        <h3>Contacto</h3>
                                        <p class="mt-30">Llena el siguiente formulario con tus datos y nosotros nos pondremos en contacto.</p>
                                        <p class="mt-30">Además, contamos con otros medios de contacto, desde visitar nuestras instalaciones, redes sociales, teléfono y correo electrónico.
                                        </p>
                                    </div>

                                    <!-- Contact Social Info -->
                                    <div class="contact-social-info d-flex mb-30">
                                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </div>

                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="icon-placeholder"></i>
                                        </div>
                                        <p>Calle Urbano Villalón 500, La Ladrillera, 78369 <br> San Luis, S.L.P.,México</p>
                                    </div>

                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="icon-telephone-1"></i>
                                        </div>
                                        <p>Telefono: 444 504 7512</p>
                                    </div>

                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="icon-contract"></i>
                                        </div>
                                        <p>aldea_oficial@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Contact Form Area -->
                            <div class="col-12 col-lg-7">
                                <div class="contact-form-area wow fadeInUp" data-wow-delay="500ms">
                                    <form action="#" method="post">
                                        <input type="text" class="form-control" id="name" placeholder="Nombre">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Mensaje"></textarea>
                                        <button class="btn academy-btn mt-30" type="submit">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@stop