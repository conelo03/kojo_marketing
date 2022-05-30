<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Produk</a></div>
        <div class="breadcrumb-item">Edit Produk</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-produk/'.$produk['id_produk']); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Edit Produk</h4>
              </div>
              <div class="card-body">
              <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Jenis Produk</label>
                    <input type="text" name="jenis_produk" class="form-control" value="<?= set_value('jenis_produk', $produk['jenis_produk']); ?>" required="">
                    <?= form_error('jenis_produk', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="<?= set_value('nama_produk', $produk['nama_produk']); ?>" required="">
                    <?= form_error('nama_produk', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Bahan</label>
                    <input type="text" name="bahan" class="form-control" value="<?= set_value('bahan', $produk['bahan']); ?>" required="">
                    <?= form_error('bahan', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Foto Produk</label>
                    <input type="hidden" name="foto_produk_old" class="form-control" value="<?= $produk['foto_produk']; ?>" required="">
                    <input type="file" name="foto_produk" class="form-control" value="<?= set_value('nama_produk'); ?>" >
                  </div>
                </div>

                <h6>Kebutuhan Kain :</h6>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Panjang Kain ukuran S (meter)</label>
                    <input type="text" name="pnj_kain_s" class="form-control" value="<?= set_value('pnj_kain_s', $produk['pnj_kain_s']); ?>" required="">
                    <?= form_error('pnj_kain_s', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Panjang Kain ukuran XL (meter)</label>
                    <input type="text" name="pnj_kain_xl" class="form-control" value="<?= set_value('pnj_kain_xl', $produk['pnj_kain_xl']); ?>" required="">
                    <?= form_error('pnj_kain_xl', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Panjang Kain ukuran M (meter)</label>
                    <input type="text" name="pnj_kain_m" class="form-control" value="<?= set_value('pnj_kain_m', $produk['pnj_kain_m']); ?>" required="">
                    <?= form_error('pnj_kain_m', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Panjang Kain ukuran XXL (meter)</label>
                    <input type="text" name="pnj_kain_xxl" class="form-control" value="<?= set_value('pnj_kain_xxl', $produk['pnj_kain_xxl']); ?>" required="">
                    <?= form_error('pnj_kain_xxl', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Panjang Kain ukuran L (meter)</label>
                    <input type="text" name="pnj_kain_l" class="form-control" value="<?= set_value('pnj_kain_l', $produk['pnj_kain_l']); ?>" required="">
                    <?= form_error('pnj_kain_l', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Harga Kain per Meter</label>
                    <input type="text" name="harga_kain" class="form-control" value="<?= set_value('harga_kain', $produk['harga_kain']); ?>" required="">
                    <?= form_error('harga_kain', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>

                <h6>Kebutuhan Kancing :</h6>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Jumlah Kancing ukuran S</label>
                    <input type="text" name="jml_kancing_s" class="form-control" value="<?= set_value('jml_kancing_s', $produk['jml_kancing_s']); ?>" required="">
                    <?= form_error('jml_kancing_s', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Jumlah Kancing ukuran XL</label>
                    <input type="text" name="jml_kancing_xl" class="form-control" value="<?= set_value('jml_kancing_xl', $produk['jml_kancing_xl']); ?>" required="">
                    <?= form_error('jml_kancing_xl', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Jumlah Kancing ukuran M</label>
                    <input type="text" name="jml_kancing_m" class="form-control" value="<?= set_value('jml_kancing_m', $produk['jml_kancing_m']); ?>" required="">
                    <?= form_error('jml_kancing_m', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Jumlah Kancing ukuran XXL</label>
                    <input type="text" name="jml_kancing_xxl" class="form-control" value="<?= set_value('jml_kancing_xxl', $produk['jml_kancing_xxl']); ?>" required="">
                    <?= form_error('jml_kancing_xxl', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Jumlah Kancing ukuran L</label>
                    <input type="text" name="jml_kancing_l" class="form-control" value="<?= set_value('jml_kancing_l', $produk['jml_kancing_l']); ?>" required="">
                    <?= form_error('jml_kancing_l', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Harga Kancing Satuan</label>
                    <input type="text" name="harga_kancing" class="form-control" value="<?= set_value('harga_kancing', $produk['harga_kancing']); ?>" required="">
                    <?= form_error('harga_kancing', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>

                <h6>Kebutuhan Resleting :</h6>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Panjang Resleting ukuran S</label>
                    <input type="text" name="pnj_resleting_s" class="form-control" value="<?= set_value('pnj_resleting_s', $produk['pnj_resleting_s']); ?>" required="">
                    <?= form_error('pnj_resleting_s', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Panjang Resleting ukuran XL</label>
                    <input type="text" name="pnj_resleting_xl" class="form-control" value="<?= set_value('pnj_resleting_xl', $produk['pnj_resleting_xl']); ?>" required="">
                    <?= form_error('pnj_resleting_xl', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Panjang Resleting ukuran M</label>
                    <input type="text" name="pnj_resleting_m" class="form-control" value="<?= set_value('pnj_resleting_m', $produk['pnj_resleting_m']); ?>" required="">
                    <?= form_error('pnj_resleting_m', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Panjang Resleting ukuran XXL</label>
                    <input type="text" name="pnj_resleting_xxl" class="form-control" value="<?= set_value('pnj_resleting_xxl', $produk['pnj_resleting_xxl']); ?>" required="">
                    <?= form_error('pnj_resleting_xxl', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Panjang Resleting ukuran L</label>
                    <input type="text" name="pnj_resleting_l" class="form-control" value="<?= set_value('pnj_resleting_l', $produk['pnj_resleting_l']); ?>" required="">
                    <?= form_error('pnj_resleting_l', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Harga Resleting per Meter</label>
                    <input type="text" name="harga_resleting" class="form-control" value="<?= set_value('harga_resleting', $produk['harga_resleting']); ?>" required="">
                    <?= form_error('harga_resleting', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>

                <h6>Kebutuhan Prepet :</h6>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Jumlah Prepet ukuran S</label>
                    <input type="text" name="jml_prepet_s" class="form-control" value="<?= set_value('jml_prepet_s', $produk['jml_prepet_s']); ?>" required="">
                    <?= form_error('jml_prepet_s', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Jumlah Prepet ukuran XL</label>
                    <input type="text" name="jml_prepet_xl" class="form-control" value="<?= set_value('jml_prepet_xl', $produk['jml_prepet_xl']); ?>" required="">
                    <?= form_error('jml_prepet_xl', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Jumlah Prepet ukuran M</label>
                    <input type="text" name="jml_prepet_m" class="form-control" value="<?= set_value('jml_prepet_m', $produk['jml_prepet_m']); ?>" required="">
                    <?= form_error('jml_prepet_m', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Jumlah Prepet ukuran XXL</label>
                    <input type="text" name="jml_prepet_xxl" class="form-control" value="<?= set_value('jml_prepet_xxl', $produk['jml_prepet_xxl']); ?>" required="">
                    <?= form_error('jml_prepet_xxl', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Jumlah Prepet ukuran L</label>
                    <input type="text" name="jml_prepet_l" class="form-control" value="<?= set_value('jml_prepet_l', $produk['jml_prepet_l']); ?>" required="">
                    <?= form_error('jml_prepet_l', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Harga Prepet Satuan</label>
                    <input type="text" name="harga_prepet" class="form-control" value="<?= set_value('harga_prepet', $produk['harga_prepet']); ?>" required="">
                    <?= form_error('harga_prepet', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>

                <h6>Kebutuhan Rib :</h6>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Panjang Rib ukuran S</label>
                    <input type="text" name="pnj_rib_s" class="form-control" value="<?= set_value('pnj_rib_s', $produk['pnj_rib_s']); ?>" required="">
                    <?= form_error('pnj_rib_s', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Panjang Rib ukuran XL</label>
                    <input type="text" name="pnj_rib_xl" class="form-control" value="<?= set_value('pnj_rib_xl', $produk['pnj_rib_xl']); ?>" required="">
                    <?= form_error('pnj_rib_xl', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Panjang Rib ukuran M</label>
                    <input type="text" name="pnj_rib_m" class="form-control" value="<?= set_value('pnj_rib_m', $produk['pnj_rib_m']); ?>" required="">
                    <?= form_error('pnj_rib_m', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Panjang Rib ukuran XXL</label>
                    <input type="text" name="pnj_rib_xxl" class="form-control" value="<?= set_value('pnj_rib_xxl', $produk['pnj_rib_xxl']); ?>" required="">
                    <?= form_error('pnj_rib_xxl', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Panjang Rib ukuran L</label>
                    <input type="text" name="pnj_rib_l" class="form-control" value="<?= set_value('pnj_rib_l', $produk['pnj_rib_l']); ?>" required="">
                    <?= form_error('pnj_rib_l', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Harga Rib per Meter</label>
                    <input type="text" name="harga_rib" class="form-control" value="<?= set_value('harga_rib', $produk['harga_rib']); ?>" required="">
                    <?= form_error('harga_rib', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('produk');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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