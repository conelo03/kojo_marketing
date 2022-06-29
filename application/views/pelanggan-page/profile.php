<?php $this->load->view('pelanggan-page/template/header');?>
<?php $this->load->view('pelanggan-page/template/sidebar');?>
<!-- Main Content -->
<div class="main-content" style="padding-top: 100px;">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Profile</a></div>
        <div class="breadcrumb-item">Edit Profile</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form method="POST" action="<?= base_url('profile-pelanggan/'.$p['id_pelanggan']) ?>">
              <div class="card-header">
                <h4>Form Edit Profile</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-6">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" value="<?= set_value('nama_pelanggan', $p['nama_pelanggan']); ?>" required="">
                    <?= form_error('nama_pelanggan', '<span class="text-danger small">', '</span>'); ?>
                  </div>  
                  <div class="form-group col-6">
                    <label>No. Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" value="<?= set_value('no_telepon', $p['no_telepon']); ?>" required="">
                    <?= form_error('no_telepon', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="d-block">Jenis Kelamin</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="exampleRadios3" <?= set_value('jenis_kelamin', $p['jenis_kelamin']) == 'Laki-laki' ? 'checked' : '' ; ?> >
                    <label class="form-check-label" for="exampleRadios3">
                      Laki-laki
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="exampleRadios4" <?= set_value('jenis_kelamin', $p['jenis_kelamin']) == 'Perempuan' ? 'checked' : '' ; ?> >
                    <label class="form-check-label" for="exampleRadios4">
                      Perempuan
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" value="<?= set_value('alamat', $p['alamat']); ?>" required="">
                  <?= form_error('alamat', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Kota</label>
                  <select class="form-control" name="id_kota" id="select-kota" data-live-search="true">
                    <option disabled selected>-- Pilih Kota --</option>
                    <?php foreach ($kota as $key) { ?>
                      <option value="<?= $key['id_kota'] ?>" <?= set_value('id_kota', $p['id_kota']) == $key['id_kota'] ? 'selected' : '' ?>><?= $key['nama_kota'] ?></option>
                    <?php } ?>
                  </select>
                  <?= form_error('id_kota', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Instansi</label>
                  <input type="text" name="instansi" class="form-control" value="<?= set_value('instansi', $p['instansi']); ?>" required="">
                  <?= form_error('instansi', '<span class="text-danger small">', '</span>'); ?>
                </div>

                <div class="form-group">
                  <label for="email">Username</label>
                  <input id="email" type="text" class="form-control" name="username" value="<?= set_value('username', $p['username']); ?>">
                  <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
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