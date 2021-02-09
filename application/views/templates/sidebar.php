<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home'); ?>">
    <div class="sidebar-brand-icon">
      <i class="fas fa-laptop-medical"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Menu Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Query Menu -->


  <!-- Looping menu -->
  <div class="sidebar-heading text-white">
    Admin
  </div>

  <!-- HOME -->
  <?php if ($judul == 'Home') : ?>
    <li class="nav-item active">
    <?php else : ?>
    <li class="nav-item">
    <?php endif; ?>
    <a class="nav-link pb-0" href="<?= base_url('home'); ?>">
      <i class="fas fa-fw fa-home"></i>
      <span>Dashboard</span></a>
    </li>
    <!-- SUB MENU -->

    <!-- menampilkan sub menu -->
    <?php if ($judul == 'Riwayat') : ?>
      <li class="nav-item active">
      <?php else : ?>
      <li class="nav-item">
      <?php endif; ?>
      <a class="nav-link pb-0" href="<?= base_url('riwayat'); ?>">
        <i class="fas fa-fw fa-history"></i>
        <span>Riwayat</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider mt-3">

      <!-- Looping menu -->
      <div class="sidebar-heading text-white">
        Certainty Factor
      </div>
      <?php if ($judul == 'Penyakit' || $judul == 'Gejala' || $judul == 'Rule Gejala' || $judul == 'Konsultasi') : ?>
        <li class="nav-item active">
          <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-stethoscope"></i>
            <span>Diagnosa</span>
          </a>
          <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
          <?php else : ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-stethoscope"></i>
            <span>Diagnosa</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
          <?php endif; ?>

            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Menu</h6>

              <!-- sub menu gejala -->
              <?php if ($judul == 'Gejala') : ?>
                <a class="collapse-item active" href="<?= base_url('gejala') ?>">Gejala</a>
              <?php else : ?>
                <a class="collapse-item" href="<?= base_url('gejala') ?>">Gejala</a>
              <?php endif; ?>

              <!-- sub menu Konsultasi -->
              <?php if ($judul == 'Konsultasi') : ?>
                <a class="collapse-item active" href="<?= base_url('konsultasi') ?>">Konsultasi</a>
              <?php else : ?>
                <a class="collapse-item" href="<?= base_url('konsultasi') ?>">Konsultasi</a>
              <?php endif; ?>

            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>auth/logout">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->