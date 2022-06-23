<?php $this->load->view('pelanggan-page/template/header');?>
<?php $this->load->view('pelanggan-page/template/sidebar');?>
<!-- Main Content -->
<div class="main-content" style="padding-top: 100px;">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Ulasan</a></div>
        <div class="breadcrumb-item">Edit Ulasan</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form method="POST" action="<?= base_url('ulasan-order/'.$order['id_order']) ?>">
              <div class="card-header">
                <h4>Form Edit Ulasan</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="">Berikan Penilaian</label><br>
                  <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" <?= set_value('rate', $order['rate']) == '5' ? 'checked' : '' ?>/>
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" <?= set_value('rate', $order['rate']) == '4' ? 'checked' : '' ?>/>
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" <?= set_value('rate', $order['rate']) == '3' ? 'checked' : '' ?>/>
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" <?= set_value('rate', $order['rate']) == '2' ? 'checked' : '' ?>/>
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" <?= set_value('rate', $order['rate']) == '1' ? 'checked' : '' ?>/>
                    <label for="star1" title="text">1 star</label>
                  </div>
                  <?= form_error('rate', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <br/>
                <br/>
                <div class="form-group">
                  <label>Deskripsi Ulasan</label>
                  <textarea name="ulasan" class="form-control" required=""><?= $order['ulasan']; ?></textarea>
                  <?= form_error('ulasan', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('riwayat-order');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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