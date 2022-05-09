<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Order</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Detail Order <?= $order['nama_produk'] ?></h4>
            </div>
            <div class="card-body">
              <h5>Overview</h5>
              <br>
              <div class="row">
                <div class="col-md-4"><h6>Tgl Order</h6></div>
                <div class="col-md-8"><h6>: <?= $order['tgl_order'] ?></h6></div>
              </div>
              <div class="row">
                <div class="col-md-4"><h6>Nama Pelanggan</h6></div>
                <div class="col-md-8"><h6>: <?= $order['nama_pelanggan'] ?> (<?= $order['no_telepon'] ?>)</h6></div>
              </div>
              <div class="row">
                <div class="col-md-4"><h6>Instansi</h6></div>
                <div class="col-md-8"><h6>: <?= $order['instansi'] ?> </h6></div>
              </div>
              <div class="row">
                <div class="col-md-4"><h6>Produk</h6></div>
                <div class="col-md-8"><h6>: <?= $order['nama_produk'] ?></h6></div>
              </div>
              <div class="row">
                <div class="col-md-4"><h6>Jumlah</h6></div>
                <div class="col-md-8"><h6>: Ukuran S : <?= $order['jumlah_ukuran_s'] ?> pcs</h6></div>
              </div>
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8"><h6>: Ukuran M : <?= $order['jumlah_ukuran_m'] ?> pcs</h6></div>
              </div>
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8"><h6>: Ukuran L : <?= $order['jumlah_ukuran_l'] ?> pcs</h6></div>
              </div>
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8"><h6>: Ukuran XL : <?= $order['jumlah_ukuran_xl'] ?> pcs</h6></div>
              </div>
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8"><h6>: Ukuran XXL : <?= $order['jumlah_ukuran_xxl'] ?> pcs</h6></div>
              </div>
              <div class="row">
                <div class="col-md-4"><h6>Nama Marketing</h6></div>
                <div class="col-md-8"><h6>: <?= $order['nama'] ?></h6></div>
              </div>
              <div class="row">
                <div class="col-md-4"><h6>Catatan</h6></div>
                <div class="col-md-8"><h6>: <?= $order['catatan'] ?></h6></div>
              </div>
              <div class="row">
                <div class="col-md-4"><h6>Status</h6></div>
                <div class="col-md-8"><h6>: <?= status($order['status_order']) ?></h6></div>
              </div>
              <div class="row">
                <div class="col-md-4"><h6>Created At</h6></div>
                <div class="col-md-8"><h6>: <?= $order['created_at'] ?></h6></div>
              </div>
              <div class="row">
                <div class="col-md-4"><h6>Download BOM List</h6></div>
                <div class="col-md-8"><h6>: <button type="button" class="btn btn-primary"><i class="fas fa-download"></i> Download</button></h6></div>
              </div>
              <div class="row">
                <div class="col-md-4"><h6>Design Order</h6></div>
                <div class="col-md-8">
                  <h6>: 
                    <?php if (empty($order['design_order'])) {
                      echo "Tidak ada gambar.";
                    } else { ?>
                    <img src="<?= base_url('assets/upload/design_order/'.$order['design_order']) ?>" class="img"/>
                    <?php } ?>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>