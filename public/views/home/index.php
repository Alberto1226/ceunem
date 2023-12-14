<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="<?php echo constant('URL') ?>assets/img/carousel-1.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 pt-5">
                                <h1 class="display-4 text-white mb-3 animated slideInDown">Creando líderes y emprendedores</h1>
                                <p class="fs-5 text-white-50 mb-5 animated slideInDown">Nuestro objetivo principal es empoderar académicamente a nuestros estudiantes a través de la formación de conocimientos y competencias profesionales en disciplinas de corte humanista, académico-administrativo y de comunicación.</p>
                                <a class="btn btn-primary py-2 px-3 animated slideInDown" href="<?php echo constant('URL') ?>nosotros">
                                    Más información
                                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="<?php echo constant('URL') ?>assets/img/carousel-2.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 pt-5">
                                <h1 class="display-4 text-white mb-3 animated slideInDown">Crea tu futuro profesional 100% online</h1>
                                <p class="fs-5 text-white-50 mb-5 animated slideInDown">Becas de hasta el 70%</p>
                                <a class="btn btn-primary py-2 px-3 animated slideInDown" href="<?php echo constant('URL') ?>contacto">
                                    Más Información
                                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->
<?php
include_once 'models/clases/video.php';
foreach ($this->ini1 as $row) {
    $ini2 = new Video();
    $ini2 = $row;
?>
<div class="container-fluid text-center">
    <video autoplay loop control muted src="<?php echo constant('ARCHIVOS') . $ini2->vid_url;?>"></video>
</div>
<?php
}
?>
<!-- Nosotros Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                    <img class="position-absolute w-100 h-100 pt-5 pe-5" src="<?php echo constant('URL') ?>assets/img/nosotros-1.jpg" alt="" style="object-fit: cover;">
                    <img class="position-absolute top-0 end-0 bg-white ps-2 pb-2" src="<?php echo constant('URL') ?>assets/img/nosotros-2.jpg" alt="" style="width: 200px; height: 200px;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-20">
                    <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3">Nosotros</div>
                </div>
                <h1 class="display-6 mb-5">Programas de Calidad</h1>
                <p class="mb-5">Como una institución acreditada, CEUNEM proporciona a sus estudiantes una educación de la más alta calidad en un ambiente flexible. Nuestros reconocidos programas en línea incluyen instrucción en tiempo real y materiales prácticos para asegurar que cada estudiante no solo enfrente un desafío sino que también sienta el apoyo durante todo el curso. Contáctenos hoy mismo para obtener más información sobre lo que tenemos para ofrecer. Nos esforzamos por brindar educación de alta calidad, flexible y personalizada. Contamos con becas del 100% en inscripción y reinscripción así como becas del 50% en colegiaturas únicamente por ser alumno fundador CEUNEM.&nbsp;</p>
                <a class="btn btn-primary py-2 px-3 me-3" href="<?php echo constant('URL') ?>nosotros">
                    Conocer más
                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
                <a class="btn btn-outline-primary py-2 px-3" href="<?php echo constant('URL') ?>contacto">
                    Contáctanos
                    <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Nosotros End -->


<!-- Blog Start -->
<div class="container-xxl bg-light my-5 py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3">Blog&nbsp;</div>
            <h1 class="display-6 mb-5">Mantente actualizado sobre todo lo referente al mundo universitario en México y el mundo&nbsp;</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                    <div class="text-center p-4 pt-0">
                        <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                            <small>Salud</small>
                        </div>
                        <h5 class="mb-3">5 Maneras para Apoyar la Salud Mental de los Estudiantes</h5>
                        <p>Muchos estudiantes pasan aproximadamente una sexta parte de sus horas de vigilia en la escuela, por lo que apoyar la salud mental de los estudiantes cae sobre los hombros de los docentes. &nbsp;</p>
                    </div>
                    <div class="position-relative mt-auto">
                        <img class="img-fluid" src="<?php echo constant('URL') ?>assets/img/blog-1.jpg" alt="">
                        <div class="causes-overlay">
                            <a class="btn btn-outline-primary" href="">
                                Leer más
                                <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                    <div class="text-center p-4 pt-0">
                        <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                            <small>Administración</small>
                        </div>
                        <h5 class="mb-3">Tips para Retener a los Docentes&nbsp;</h5>
                        <p>Los docentes abandonan los puestos y la profesión docente por muchas razones. En nuestra región, los docentes son difíciles de encontrar y los puestos son a menudo difíciles de cubrir.</p>
                    </div>
                    <div class="position-relative mt-auto">
                        <img class="img-fluid" src="<?php echo constant('URL') ?>assets/img/blog-2.jpg" alt="">
                        <div class="causes-overlay">
                            <a class="btn btn-outline-primary" href="">
                                Leer más
                                <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                    <div class="text-center p-4 pt-0">
                        <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                            <small>Tecnología</small>
                        </div>
                        <h5 class="mb-3">Seis Recursos Digitales para el Aprendizaje</h5>
                        <p>Llevar a los estudiantes a excursiones a museos puede ser invaluable para su educación, pero si no vives en la misma localidad o cerca de una ciudad importante, puede ser difícil encontrar museos locales para visitar.</p>
                    </div>
                    <div class="position-relative mt-auto">
                        <img class="img-fluid" src="<?php echo constant('URL') ?>assets/img/blog-3.jpg" alt="">
                        <div class="causes-overlay">
                            <a class="btn btn-outline-primary" href="">
                                Leer más
                                <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->


<!-- Oferta Educativa Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3">Oferta Educativa&nbsp;</div>
            <h1 class="display-6 mb-5">Licenciaturas y posgrados enfocados en el ámbito de negocios.&nbsp;</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="<?php echo constant('URL') ?>assets/img/licenciaturas.png" alt="">
                    <h4 class="mb-3">Licenciaturas</h4>
                    <p class="mb-4">En CEUNEM cubrimos una variedad completa de cursos en todos los niveles de creatividad y educación. Como Universidad en línea con experiencia, enseñamos una variedad de clases que abarcan los niveles licenciatura y posgrado enfocados en el ámbito de negocios.</p>
                    <a class="btn btn-outline-primary px-3" href="<?php echo constant('URL') ?>licenciatura">
                        Ver oferta académica
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="<?php echo constant('URL') ?>assets/img/maestrias.png" alt="">
                    <h4 class="mb-3">Maestrías</h4>
                    <p class="mb-4">En CEUNEM cubrimos una variedad completa de cursos en todos los niveles de creatividad y educación. Como Universidad en línea con experiencia, enseñamos una variedad de clases que abarcan los niveles licenciatura y posgrado enfocados en el ámbito de negocios.</p>
                    <a class="btn btn-outline-primary px-3" href="<?php echo constant('URL') ?>maestria">
                        Ver oferta académica
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="<?php echo constant('URL') ?>assets/img/educacion.png" alt="">
                    <h4 class="mb-3">Educación continua</h4>
                    <p class="mb-4">Sabemos que quieres ver la nueva oferta educativa, pero deberás ser paciente un tiempo más. Suscríbete a nuestra lista de contacto para que te notifiquen cuando tengamos disponibles nuevos planes de estudios.</p>
                    <a class="btn btn-outline-primary px-3" href="<?php echo constant('URL') ?>contacto">
                        Sucríbete
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Oferta Educativa End -->


<!-- Contacto Start -->
<div class="container-fluid donate my-5 py-5" data-parallax="scroll" data-image-src="<?php echo constant('URL') ?>assets/img/carousel-2.jpg">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-inline-block rounded-pill bg-secondary text-white px-3 mb-3">Contacto</div>
                <h1 class="display-6 text-white mb-5">¡Comunícate con nosotros!&nbsp;</h1>
                <p class="text-white-50 mb-0">Nos esforzamos por brindar educación de alta calidad, flexible y personalizada. Para unirse a nuestra gran comunidad, ingrese sus datos a continuación para poder recibir información sobre la carrera de su interés y comience el proceso de inscripción hoy mismo.</p>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100 bg-white p-5">
                    <form>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-light border-0" id="name" placeholder="Your Name">
                                    <label for="name">Nombre</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control bg-light border-0" id="email" placeholder=" Email">
                                    <label for="email">Correo</label>
                                </div>
                            </div>
                            <div class="col-12">
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary px-5" style="height: 60px;">
                                Enviar
                                <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Contacto End -->


<!-- Nuestro Equipo Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3">Nuestro Equipo</div>
            <h1 class="display-6 mb-5">Su dedicación es vital para el éxito de nuestra Universidad&nbsp;</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative rounded overflow-hidden">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item position-relative rounded overflow-hidden">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="<?php echo constant('URL') ?>assets/img/team-1.jpg" alt="">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5>Mtro. Carlos Rosales</h5>
                        <p class="text-primary">Departamento de Comunicación y Medios</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item position-relative rounded overflow-hidden">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="<?php echo constant('URL') ?>assets/img/team-2.jpg" alt="">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5>Lic. Elda Flores</h5>
                        <p class="text-primary">Coordinadora de Control Escolar</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item position-relative rounded overflow-hidden">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Nuestro Equipo End -->


<!-- Testimonios Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-white py-1 px-3 mb-3">Testimonios</div>
            <h1 class="display-6 mb-5">Conoce los testimonios de éxito de alumnos y egresados</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item text-center">
                <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="<?php echo constant('URL') ?>assets/img/testimonial-1.jpg" style="width: 100px; height: 100px;">
                <div class="testimonial-text rounded text-center p-4">
                    <p>CEUNEM es una gran universidad y una buena opción para muchas personas. En lo particular me ha brindado la oportunidad de iniciar un sueño muy anhelado.</p>
                    <h5 class="mb-1">Fernando</h5>
                    <span class="fst-italic">Estudiante de Derecho</span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="<?php echo constant('URL') ?>assets/img/testimonial-2.jpg" style="width: 100px; height: 100px;">
                <div class="testimonial-text rounded text-center p-4">
                    <p>Tengo muy buena experiencia con esta universidad 10/10, te atienden de lo mas amable, sus tramites son rápidos y tiene muy buenos maestros :) </p>
                    <h5 class="mb-1">Noemi</h5>
                    <span class="fst-italic">Estudiante de Derecho</span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="<?php echo constant('URL') ?>assets/img/testimonial-3.jpg" style="width: 100px; height: 100px;">
                <div class="testimonial-text rounded text-center p-4">
                    <p>Para mis necesidades ha sido excelente, mi mayor preocupación es sentarme a estudiar, el espacio virtual es perfecto para eso, además encuentro la libertad necesaria para compaginarlo con otras actividades de mi elección.</p>
                    <h5 class="mb-1">Miriam</h5>
                    <span class="fst-italic">Estudiante de Administración</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonios End -->
<?php require 'views/templete/footer.php'; ?>