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
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- Blog -->
        <li class="nav-item">
          <a href="<?php echo constant('URL') ?>blog" class="nav-link">
            <i class="nav-icon fas fa-rss"></i>
            <p>Blog</p>
          </a>
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
                  <a href="<?php echo constant('URL') ?>licenciatura" class="nav-link">
                    <i class="fas fa-arrow-circle-right nav-icon"></i>
                    <p>Visión</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo constant('URL') ?>maestria" class="nav-link">
                    <i class="fas fa-arrow-circle-right nav-icon"></i>
                    <p>Objetivos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo constant('URL') ?>continua" class="nav-link">
                    <i class="fas fa-arrow-circle-right nav-icon"></i>
                    <p>Valores</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="<?php echo constant('URL') ?>licenciatura" class="nav-link">
                <i class="fas fa-people-carry nav-icon"></i>
                <p>Equipo de trabajo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo constant('URL') ?>licenciatura" class="nav-link">
                <i class="fas fa-business-time nav-icon"></i>
                <p>Servico al cliente</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo constant('URL') ?>licenciatura" class="nav-link">
                <i class="fas fa-university nav-icon"></i>
                <p>Nuestra Historia</p>
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