<?php $this->load->view('pelanggan-page/template/header');?>
<?php $this->load->view('pelanggan-page/template/sidebar');?>
<!-- Main Content -->
<div class="main-content" style="padding-top: 100px;">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Profile</a></div>
        <div class="breadcrumb-item">Ganti Password</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form method="POST" action="<?= base_url('password-pelanggan/'.$p['id_pelanggan']) ?>">
              <div class="card-header">
                <h4>Form Ganti Password</h4>
              </div>
              <div class="card-body">
                
                <div class="form-group">
                  <label for="email">Password Lama</label>
                  <input id="email" type="password" class="form-control" name="password_old">
                  <?= form_error('password_old', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label for="email">Password Baru</label>
                  <input id="email" type="password" class="form-control" name="password">
                  <?= form_error('password', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label for="email">Konfirmasi Password Baru</label>
                  <input id="email" type="password" class="form-control" name="password2">
                  <?= form_error('password2', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('dashboard-pelanggan');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="reset" class="btn btn-danger"><i class="fa fa-sync"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('pelanggan-page/template/footer');?>