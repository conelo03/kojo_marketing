<?php $this->load->view('pelanggan-page/template/header');?>
<?php $this->load->view('pelanggan-page/template/sidebar');?>
<!-- Main Content -->
<div class="main-content" style="padding-top: 100px;">
  <section class="section">
    <div class="section-header">
      <h1>Riwayat Order</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Home</a></div>
        <div class="breadcrumb-item"><a href="#">My Order</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h4>Data Riwayat Order</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="datatables-user">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>Desain Order</th>
                  <th>Produk</th>
                  <th>Tgl Order</th>
                  <th>Klien</th>
                  <th>Jumlah</th>
                  <th>Ulasan</th>
                  <th class="text-center" style="width: 100px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1; 
                foreach($order as $u):?>
                <tr>
                  <td class="text-center"><?= $no++;?></td>
                  <td><img src="<?= base_url('assets/upload/design_order/'.$u['design_order']) ?>" width="200px" /></td>
                  <td><?= $u['nama_produk'];?></td>
                  <td><?= $u['tgl_order'];?></td>
                  <td>
                    <?= $u['nama_pelanggan'];?><br>
                    (<?= $u['no_telepon'];?>)<br>
                    <?= $u['instansi'];?><br>
                  </td>
                  <td>
                    S : <?= $u['jumlah_ukuran_s'];?><br>
                    M : <?= $u['jumlah_ukuran_m'];?><br>
                    L : <?= $u['jumlah_ukuran_l'];?><br>
                    XL : <?= $u['jumlah_ukuran_xl'];?><br>
                    XXL : <?= $u['jumlah_ukuran_xxl'];?>
                  </td>
                  <td>
                    <?php 
                      if ($u['rate'] != 0 || $u['rate'] != NULL) {
                        for ($i=1; $i <= 5; $i++) { 
                          if ($i <= $u['rate']) {?>
                            <span class="fa fa-star checked-star"></span>
                          <?php } else { ?>
                            <span class="fa fa-star"></span>
                          <?php }
                        }
                      }
                    ?>
                    <br/><?= $u['ulasan'] ?>
                  </td>
                  <td class="text-center">
                    <button class="btn btn-info"  data-toggle="modal" data-target="#exampleModal<?= $u['id_order'] ?>"><i class="fa fa-edit"></i> Ulasan</button>
                  </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<?php
$no = 1; 
foreach($order as $u):?>
<div class="modal fade" id="exampleModal<?= $u['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ulasan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('ulasan-order/'.$u['id_order']) ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="">Berikan Penilaian</label><br>
          <div class="rate">
            <input type="radio" id="star5" name="rate" value="5" <?= $u['rate'] == '5' ? 'checked' : '' ?>/>
            <label for="star5" title="text">5 stars</label>
            <input type="radio" id="star4" name="rate" value="4" <?= $u['rate'] == '4' ? 'checked' : '' ?>/>
            <label for="star4" title="text">4 stars</label>
            <input type="radio" id="star3" name="rate" value="3" <?= $u['rate'] == '3' ? 'checked' : '' ?>/>
            <label for="star3" title="text">3 stars</label>
            <input type="radio" id="star2" name="rate" value="2" <?= $u['rate'] == '2' ? 'checked' : '' ?>/>
            <label for="star2" title="text">2 stars</label>
            <input type="radio" id="star1" name="rate" value="1" <?= $u['rate'] == '1' ? 'checked' : '' ?>/>
            <label for="star1" title="text">1 star</label>
          </div>
        </div>
        <br/>
        <br/>
        <div class="form-group">
          <label>Deskripsi Ulasan</label>
          <textarea name="ulasan" class="form-control" required=""><?= $u['ulasan']; ?></textarea>
          <?= form_error('ulasan', '<span class="text-danger small">', '</span>'); ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>
<?php $this->load->view('pelanggan-page/template/footer');?>