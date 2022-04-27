<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Akun</a></div>
        <div class="breadcrumb-item">Edit Akun</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-akun/'.$akun['id_akun']); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Edit Akun</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Pegawai</label>
                  <select name="id_pegawai" class="form-control">
                    <option disabled="" selected="">-- Pilih Pegawai --</option>
                    <?php 
                      foreach ($pegawai as $key) { ?>
                        <option value="<?= $key['id_pegawai'] ?>" <?= set_value('id_pegawai', $akun['id_pegawai']) == $key['id_pegawai'] ? 'selected' : ''; ?>><?= $key['nama'] ?> - <?= $key['jabatan'] ?></option>
                    <?php  }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?= set_value('username', $akun['username']); ?>" required="">
                  <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>" >
                  <?= form_error('password', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input type="password" name="password2" class="form-control" value="<?= set_value('password2'); ?>" >
                  <?= form_error('password2', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <?php
                $roles = explode(",", $akun['role']);

                ?>
                <div class="form-group">
                  <label class="form-label">Roles</label>
                  <div class="selectgroup selectgroup-pills">
                    <label class="selectgroup-item">
                      <input type="checkbox" name="role[]" value="Admin" class="selectgroup-input" <?= in_array("Admin", $roles) == true ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Admin</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="checkbox" name="role[]" value="Marketing" class="selectgroup-input" <?= in_array("Marketing", $roles) == true ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Marketing</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="checkbox" name="role[]" value="Purchase" class="selectgroup-input" <?= in_array("Purchase", $roles) == true ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Purchase</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="checkbox" name="role[]" value="Keuangan" class="selectgroup-input" <?= in_array("Keuangan", $roles) == true ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Keuangan</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="checkbox" name="role[]" value="Kepala Produksi" class="selectgroup-input" <?= in_array("Kepala Produksi", $roles) == true ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Kepala Produksi</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="checkbox" name="role[]" value="Owner" class="selectgroup-input" <?= in_array("Owner", $roles) == true ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Owner</span>
                    </label>
                  </div>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('akun');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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
<?php $this->load->view('template/footer');?>