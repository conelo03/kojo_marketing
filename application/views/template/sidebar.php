<?php
$id_pegawai = $this->session->userdata('id_pegawai');
$get_user = $this->db->get_where('tb_pegawai', ['id_pegawai' => $id_pegawai])->row_array();
?>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-auto">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url('assets/img/profile/user.png'); ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $get_user['nama'] ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?= base_url('setting');?>" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Edit Akun
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item has-icon text-danger" data-confirm="Logout|Anda yakin ingin keluar?" data-confirm-yes="document.location.href='<?= base_url('logout'); ?>';"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Kojo Cloth</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">KC</a>
          </div>
          <?php
            $judul = explode(' ', $title);
          ?>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="<?= $title == 'Dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('dashboard');?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>  

            <li class="<?= $title == 'Profil Pribadi' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('profile');?>"><i class="fas fa-user"></i> <span>Profil Pribadi</span></a></li> 

            <?php if(is_admin()):?>  
            <li class="menu-header">Data Master</li>      
            <li class="<?= $title == 'Data Pegawai' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('pegawai');?>"><i class="fas fa-users"></i> <span>Data Pegawai</span></a></li> 
            <li class="<?= $title == 'Data Akun' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('akun');?>"><i class="fas fa-users"></i> <span>Data Akun</span></a></li> 
            <li class="<?= $title == 'Data Produk' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('produk');?>"><i class="fas fa-box"></i> <span>Data Produk</span></a></li> 
            <?php endif;?>
            <li class="<?= $title == 'Data Pelanggan' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('pelanggan');?>"><i class="fas fa-users"></i> <span>Data Pelanggan</span></a></li> 

            <li class="menu-header">Data Transaksi</li>   
            <li class="nav-item dropdown <?= $title == 'All Order' || $title == 'Data Order' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-cart-plus"></i> <span>Data Order</span></a>
              <ul class="dropdown-menu">
                <li class="<?= $title == 'All Order' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('all-order');?>">All Order</a></li>
                <li class="<?= $title == 'Data Order' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('order');?>"><?= is_admin() ? 'Data Order' : 'My Order' ?></a></li>
              </ul>
            </li>    
            <li class="<?= $title == 'Riwayat Order' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin-riwayat-order');?>"><i class="fas fa-list"></i> <span>Riwayat Order</span></a></li> 
            <li class="<?= $title == 'Data Agenda' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('agenda');?>"><i class="fas fa-calendar"></i> <span>Data Agenda</span></a></li> 
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <button class="btn btn-danger btn-lg btn-block btn-icon-split" data-confirm="Logout|Anda yakin ingin keluar?" data-confirm-yes="document.location.href='<?= base_url('logout'); ?>';"><i class="fa fa-sign-out-alt"></i> Logout</button>
          </div>
        </aside>
      </div>
      