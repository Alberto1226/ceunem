<!-- Footer Start -->
<div class="container-fluid menuPag text-white-50 footer mt-5 pt-5 wow fadeIn " data-wow-delay="0.1s" id="footerPag">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <img src="<?php echo constant('URL') ?>assets/img/LOGO CEUNEM.png" width="136" height="46" alt="" />
                <h1 class="fw-bold text-primary mb-4"><span class="text-white">&nbsp;</span></h1>
                <!--<p>#Puedo y hago que suceda&nbsp;</p>-->
                <div class="d-flex pt-2">

                <a class="btn btn-square me-1" id="facebook-link" ><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square me-1" id="instagram-link" ><i class="fab fa-instagram"></i></a>
                
                <div ></div>
                <div ></div>
                    
                    
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Domicilio:</h5>
                <div id="domicilio1"></div>
                <div id="domicilio2"></div>
                
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Accesos rápidos</h5>
                <a class="btn btn-link" href="<?php echo constant('URL') ?>nosotros">Nosotros</a>
                <a class="btn btn-link" href="<?php echo constant('URL') ?>contacto">Contacto</a>
                <a class="btn btn-link" href="<?php echo constant('URL') ?>licenciatura">Oferta Educativa</a>
                <a class="btn btn-link" href="<?php echo constant('URL') ?>aviso">Aviso de Privacidad</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Noticias</h5>
                <p>Mantente actualizado sobre todo lo referente al mundo universitario.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2 btnPag">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0" id="leyenda">
                    &copy; <a href="https://www.ceunem.edu.mx/">
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
<!-- JavaScript Libraries -->
<!-- libreria de axios -->
<script src="<?php echo constant('URL') ?>assets/js/colores.js"></script>
<script src="<?php echo constant('URL') ?>assets/js/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/wow/wow.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/easing/easing.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/waypoints/waypoints.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/owlcarousel/owl.carousel.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/parallax/parallax.min.js"></script>

<!-- Template Javascript -->
<script src="<?php echo constant('URL') ?>assets/js/main.js"></script>

<!-- Swiper Carousel -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
</body>
</html>