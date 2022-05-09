<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="section-header">
      <h6>Selamat Datang di Aplikasi Marketing <b>Kojo Cloth</b></h6>

    </div>
    <?php if(is_admin() || is_produksi()):?>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Order Yang Masih Berjalan</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-user">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Tgl Order</th>
                      <th>Klien</th>
                      <th>Produk</th>
                      <th>Jumlah</th>
                      <th>Nama Marketing</th>
                      <th>Status</th>
                      <!-- <th class="text-center" style="width: 250px;">Aksi</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($order as $u):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['tgl_order'];?></td>
                      <td>
                        <?= $u['nama_pelanggan'];?><br>
                        (<?= $u['no_telepon'];?>)<br>
                        <?= $u['instansi'];?><br>
                      </td>
                      <td><?= $u['nama_produk'];?></td>
                      <td>
                        S : <?= $u['jumlah_ukuran_s'];?><br>
                        M : <?= $u['jumlah_ukuran_m'];?><br>
                        L : <?= $u['jumlah_ukuran_l'];?><br>
                        XL : <?= $u['jumlah_ukuran_xl'];?><br>
                        XXL : <?= $u['jumlah_ukuran_xxl'];?>
                      </td>
                      <td><?= $u['nama'];?></td>
                      <td><?= status($u['status_order']);?></td>
                      <!-- <td class="text-center">
                        <a href="<?= base_url('detail-order/'.$u['id_order']);?>" class="btn btn-light"><i class="fa fa-eye"></i> Detail</a>
                      </td> -->
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<?php endif;?>
  </section>
  
</div>
<?php $this->load->view('template/footer');?>