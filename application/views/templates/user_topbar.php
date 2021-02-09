<!-- Content Wrapper -->
<div style="min-height:100vh">

</div>
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <ul class="navbar-nav sidebar-dark">
        <a href="<?= base_url('user_diagnosa')?>" class="sidebar-brand d-flex align-items-center justify-content-center" style="text-decoration: none">
          <span class="fa-stack fa-lg">
            <i class="fas fa-circle fa-stack-2x"></i>
            <i class="fas fa-stethoscope fa-stack-1x fa-inverse" style="color:#4e73df"></i>
          </span>
          <span style="text-decoration:none;font-size:1.5rem;font-weight:800;padding:1.5rem 1rem;text-align:center;text-transform:uppercase;letter-spacing:.05rem;">
            Diagnosa Covid-19
          </span>
        </a>
      </ul>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav sidebar-dark ml-auto">
        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->
        
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span> -->
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/doctor.jpg') ?>">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?= base_url(); ?>auth">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Menu Admin
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->