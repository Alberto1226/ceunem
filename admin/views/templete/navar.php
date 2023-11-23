<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo constant('URL')?>panel" class="brand-link">
      <img src="<?php echo constant('URL')?>assets/image/favicon.ico" alt="CEUNEM Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CEUNEM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
                <a href="<?php echo constant('URL')?>licenciatura" class="nav-link">
                  <i class="fas fa-edit nav-icon"></i>
                  <p>Licenciaturas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo constant('URL')?>maestria" class="nav-link">
                  <i class="fas fa-edit nav-icon"></i>
                  <p>Maestrías</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo constant('URL')?>continua" class="nav-link">
                  <i class="fas fa-edit nav-icon"></i>
                  <p>Educación Continua</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo constant('URL')?>blog" class="nav-link">
              <i class="nav-icon fas fa-rss"></i>
              <p>Blog</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>