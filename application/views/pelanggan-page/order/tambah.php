<?php $this->load->view('pelanggan-page/template/header');?>
<?php $this->load->view('pelanggan-page/template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Order</a></div>
        <div class="breadcrumb-item">Tambah Order</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-order-pelanggan'); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Tambah Order</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Tgl Order</label>
                    <input type="date" name="tgl_order" class="form-control" value="<?= set_value('tgl_order', date('Y-m-d')); ?>" required="">
                    <?= form_error('tgl_order', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="" class="form-control" value="<?= $nama_pelanggan; ?>" disabled>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Produk</label>
                    <select name="id_produk" class="form-control">
                      <option disabled="" selected="">-- Pilih Produk --</option>
                      <?php foreach ($produk as $key) { ?>
                        <option value="<?= $key['id_produk'] ?>" <?= set_value('id_produk') == $key['id_produk'] ? 'selected' : '' ?>><?= $key['nama_produk'] ?> - <?= $key['jenis_produk'] ?></option>
                      <?php } ?>
                    </select>
                    <?= form_error('id_produk', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Jumlah (Ukuran S)</label>
                    <input type="number" name="jumlah_ukuran_s" class="form-control" value="<?= set_value('jumlah_ukuran_s'); ?>" required="">
                    <?= form_error('jumlah_ukuran_s', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Jumlah (Ukuran M)</label>
                    <input type="number" name="jumlah_ukuran_m" class="form-control" value="<?= set_value('jumlah_ukuran_m'); ?>" required="">
                    <?= form_error('jumlah_ukuran_m', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Jumlah (Ukuran L)</label>
                    <input type="number" name="jumlah_ukuran_l" class="form-control" value="<?= set_value('jumlah_ukuran_l'); ?>" required="">
                    <?= form_error('jumlah_ukuran_l', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Jumlah (Ukuran XL)</label>
                    <input type="number" name="jumlah_ukuran_xl" class="form-control" value="<?= set_value('jumlah_ukuran_xl'); ?>" required="">
                    <?= form_error('jumlah_ukuran_xl', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Jumlah (Ukuran XXL)</label>
                    <input type="number" name="jumlah_ukuran_xxl" class="form-control" value="<?= set_value('jumlah_ukuran_xxl'); ?>" required="">
                    <?= form_error('jumlah_ukuran_xxl', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label>Design Order</label>
                  <input type="file" name="design_order" class="form-control" required="">
                  <?= form_error('design_order', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Catatan</label>
                  <input type="text" name="catatan" class="form-control" value="<?= set_value('catatan'); ?>" required="">
                  <?= form_error('catatan', '<span class="text-danger small">', '</span>'); ?>
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