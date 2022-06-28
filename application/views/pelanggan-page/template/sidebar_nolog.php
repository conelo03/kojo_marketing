<div id="app">
  <div class="main-wrapper container">
    <div class="navbar-bg" style="height: 70px"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
      <a href="<?= base_url('dashboard-pelanggan') ?>" class="navbar-brand sidebar-gone-hide">Kojo Cloth</a>
      <div class="navbar-nav">
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
      </div>
      <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
          <i class="fas fa-ellipsis-v"></i>
        </a>
        <ul class="navbar-nav">
          <li class="nav-item <?= $title == 'Home' ? 'active' : '' ?>"><a href="<?= base_url('home-pelanggan') ?>" class="nav-link">Home</a></li>
         </ul>
      </div>
      <ul class="ml-auto navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <div class="d-sm-none d-lg-inline-block">Login</div></a>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="<?= base_url('login-pelanggan') ?>" class="dropdown-item has-icon">
              <i class="fas fa-sign-in-alt"></i> Login
            </a>
            <a href="<?= base_url('registrasi-pelanggan') ?>" class="dropdown-item has-icon">
              <i class="fas fa-download"></i> Registrasi
            </a>
          </div>
        </li>
      </ul>
    </nav>

    <!-- <nav class="navbar navbar-secondary navbar-expand-lg">
      <div class="container">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
              <li class="nav-item"><a href="index-0.html" class="nav-link">General Dashboard</a></li>
              <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
            </ul>
          </li>
          <li class="nav-item active">
            <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Top Navigation</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
            <ul class="dropdown-menu">
              <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
              <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                  <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                      <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                      <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                    </ul>
                  </li>
                  <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav> -->
    