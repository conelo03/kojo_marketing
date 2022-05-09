<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Order</a></div>
        <div class="breadcrumb-item">Edit Order</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-order/'.$order['id_order']); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Edit Order</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Tgl Order</label>
                    <input type="date" name="tgl_order" class="form-control" value="<?= set_value('tgl_order', $order['tgl_order']); ?>" required="">
                    <?= form_error('tgl_order', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Pelanggan</label>
                    <select name="id_pelanggan" class="form-control">
                      <option disabled="" selected="">-- Pilih Pelanggan --</option>
                      <?php foreach ($pelanggan as $key) { ?>
                        <option value="<?= $key['id_pelanggan'] ?>" <?= set_value('id_pelanggan', $order['id_pelanggan']) == $key['id_pelanggan'] ? 'selected' : '' ?>><?= $key['nama_pelanggan'] ?> - <?= $key['instansi'] ?></option>
                      <?php } ?>
                    </select>
                    <?= form_error('id_produk', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Produk</label>
                    <select name="id_produk" class="form-control">
                      <option disabled="" selected="">-- Pilih Produk --</option>
                      <?php foreach ($produk as $key) { ?>
                        <option value="<?= $key['id_produk'] ?>" <?= set_value('id_produk', $order['id_produk']) == $key['id_produk'] ? 'selected' : '' ?>><?= $key['nama_produk'] ?> - <?= $key['jenis_produk'] ?></option>
                      <?php } ?>
                    </select>
                    <?= form_error('id_produk', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Jumlah (Ukuran S)</label>
                    <input type="number" name="jumlah_ukuran_s" class="form-control" value="<?= set_value('jumlah_ukuran_s', $order['jumlah_ukuran_s']); ?>" required="">
                    <?= form_error('jumlah_ukuran_s', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Jumlah (Ukuran M)</label>
                    <input type="number" name="jumlah_ukuran_m" class="form-control" value="<?= set_value('jumlah_ukuran_m', $order['jumlah_ukuran_m']); ?>" required="">
                    <?= form_error('jumlah_ukuran_m', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Jumlah (Ukuran L)</label>
                    <input type="number" name="jumlah_ukuran_l" class="form-control" value="<?= set_value('jumlah_ukuran_l', $order['jumlah_ukuran_l']); ?>" required="">
                    <?= form_error('jumlah_ukuran_l', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Jumlah (Ukuran XL)</label>
                    <input type="number" name="jumlah_ukuran_xl" class="form-control" value="<?= set_value('jumlah_ukuran_xl', $order['jumlah_ukuran_xl']); ?>" required="">
                    <?= form_error('jumlah_ukuran_xl', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Jumlah (Ukuran XXL)</label>
                    <input type="number" name="jumlah_ukuran_xxl" class="form-control" value="<?= set_value('jumlah_ukuran_xxl', $order['jumlah_ukuran_xxl']); ?>" required="">
                    <?= form_error('jumlah_ukuran_xxl', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label>Design Order</label>
                  <input type="file" name="design_order" class="form-control">
                  <input type="hidden" name="design_order_old" value="<?= $order['design_order'] ?>">
                  <?= form_error('design_order', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="row">  
                  <div class="col-md-6 form-group">
                    <label>Catatan</label>
                    <input type="text" name="catatan" class="form-control" value="<?= set_value('catatan', $order['catatan']); ?>" required="">
                    <?= form_error('catatan', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Status</label>
                    <select name="status_order" class="form-control">
                      <option disabled="" selected="">-- Pilih Status --</option>
                      <option value="0" <?= set_value('status_order', $order['status_order']) == '0' ? 'selected' : '' ?>>Belum Dikerjakan</option>
                      <option value="1" <?= set_value('status_order', $order['status_order']) == '1' ? 'selected' : '' ?>>Sedang Dikerjakan</option>
                      <option value="2" <?= set_value('status_order', $order['status_order']) == '2' ? 'selected' : '' ?>>Tidak Diperlukan</option>
                      <option value="3" <?= set_value('status_order', $order['status_order']) == '3' ? 'selected' : '' ?>>Ada Masalah</option>
                      <option value="4" <?= set_value('status_order', $order['status_order']) == '4' ? 'selected' : '' ?>>Selesai</option>
                    </select>
                    <?= form_error('status_order', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('order');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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