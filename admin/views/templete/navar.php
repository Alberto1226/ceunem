<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo constant('URL') ?>panel" class="brand-link">
    <img src="<?php echo constant('URL') ?>assets/image/favicon.ico" alt="CEUNEM Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">CEUNEM</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Inicio -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Inicio
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo constant('URL') ?>slider1" class="nav-link">
              <i class="fas fa-image nav-icon"></i>
              <p>Imágen Slider 1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo constant('URL') ?>slider2" class="nav-link">
              <i class="fas fa-image nav-icon"></i>
              <p>Imágen Slider 2</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo constant('URL') ?>slider3" class="nav-link">
              <i class="fas fa-image nav-icon"></i>
              <p>Imágen Slider 3</p>
            </a>
          </li>
        </ul>
      </li>
      <!-- Nosotros -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Nosotros
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?php echo constant('URL') ?>programaCalidad" class="nav-link">
              <i class="fas fa-certificate nav-icon"></i>
              <p>Programa de Calidad</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo constant('URL') ?>mision" class="nav-link">
              <i class="fas fa-bullseye nav-icon"></i>
              <p>Misión</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Filosofía
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo constant('URL') ?>vision" class="nav-link">
                  <i class="fas fa-arrow-circle-right nav-icon"></i>
                  <p>Visión</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo constant('URL') ?>objetivo" class="nav-link">
                  <i class="fas fa-arrow-circle-right nav-icon"></i>
                  <p>Objetivos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo constant('URL') ?>valor" class="nav-link">
                  <i class="fas fa-arrow-circle-right nav-icon"></i>
                  <p>Valores</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo constant('URL') ?>equipo" class="nav-link">
              <i class="fas fa-people-carry nav-icon"></i>
              <p>Equipo de trabajo</p>
            </a>
          </li>
        </ul>
      </li>
      <!-- oferta educativa -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-graduation-cap"></i>
          <p>
            Oferta Educativa
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-edit nav-icon"></i>
              <p>Descripción</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo constant('URL') ?>licenciatura" class="nav-link">
              <i class="fas fa-edit nav-icon"></i>
              <p>Licenciaturas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo constant('URL') ?>maestria" class="nav-link">
              <i class="fas fa-edit nav-icon"></i>
              <p>Maestrías</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo constant('URL') ?>continua" class="nav-link">
              <i class="fas fa-edit nav-icon"></i>
              <p>Educación Continua</p>
            </a>
          </li>
        </ul>
      </li>
      <!-- Blog -->
      <li class="nav-item">
        <a href="<?php echo constant('URL') ?>blog" class="nav-link">
          <i class="nav-icon fas fa-rss"></i>
          <p>Blog</p>
        </a>
      </li>
      <!-- Contacto -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-envelope"></i>
          <p>
            Contacto
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          
          <li class="nav-item">
            <a href="<?php echo constant('URL') ?>contacto" class="nav-link">
              <i class="fas fa-list-ul nav-icon"></i>
              <p>Formulario de contacto</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo constant('URL') ?>telefono" class="nav-link">
              <i class="fab fa-whatsapp nav-icon"></i>
              <p>Whatsapp</p>
            </a>
          </li>
        </ul>
      </li>
      <!-- Configuracion -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cog"></i>
          <p>
            Configuración General
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo constant('URL') ?>colores" class="nav-link">
              <i class="fas fa-edit nav-icon"></i>
              <p>Paleta de colores</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo constant('URL') ?>servidor" class="nav-link">
              <i class="fas fa-server nav-icon"></i>
              <p>Servidor de correos</p>
            </a>
          </li>
        </ul>
      </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>