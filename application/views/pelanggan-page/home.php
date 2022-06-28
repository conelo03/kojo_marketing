<?php $this->load->view('pelanggan-page/template/header');?>
<?php $this->load->view('pelanggan-page/template/sidebar_nolog');?>
<!-- Main Content -->
<div class="main-content" style="padding-top: 100px;">
  <section class="section">
    <div class="section-header">
      <h1>Produk</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Home</a></div>
        <div class="breadcrumb-item"><a href="#">Produk</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <?php foreach ($produk as $p) { ?>
          <div class="col-12 col-sm-6 col-md-6 col-lg-4">
            <article class="article article-style-b">
              <div class="article-header">
                <div class="article-image" data-background="<?= custom_url('assets/upload/foto_produk/'.$p['foto_produk']) ?>">
                <img src="<?= custom_url('assets/upload/foto_produk/'.$p['foto_produk']) ?>" width="100%" height="100%" />
                </div>
              </div>
              <div class="article-details">
                <div class="article-title">
                  <h2><a href="#"><?= $p['nama_produk'] ?></a></h2>
                </div>
                <!-- <p>Rp <?= number_format($p['harga_produk'], 2, '.', ',') ?></p> -->
                <div class="article-cta">
                  <a href="<?= base_url('tambah-order-pelanggan/'.$p['id_produk']) ?>">Check Out <i class="fas fa-chevron-right"></i></a>
                </div>
              </div>
            </article>
          </div>
        <?php } ?>
        
      </div>
    </div>
  </section>
</div>

<?php $this->load->view('pelanggan-page/template/footer');?>