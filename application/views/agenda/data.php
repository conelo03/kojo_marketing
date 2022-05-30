<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Agenda</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Agenda</h4>
              <?php if (is_admin() || is_k_marketing()) { ?>
                <div class="card-header-action">
                  <a href="<?= base_url('tambah-agenda');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
              <?php } ?>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-user">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Nama Kegiatan</th>
                      <th>Tanggal</th>
                      <th>Tenggat Waktu</th>
                      <th>Tempat</th>
                      <th>Waktu</th>
                      <th>Keterangan</th>
                      <th class="text-center" style="width: 250px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($agenda as $u):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['nama_agenda'];?></td>
                      <td><?= $u['tanggal_agenda'];?></td>
                      <td><?= $u['tenggat_agenda'];?></td>
                      <td><?= $u['tempat'];?></td>
                      <td><?= $u['waktu'];?></td>
                      <td><?= $u['keterangan'];?></td>
                      <td class="text-center">
                        <a href="<?= base_url('detail-agenda/'.$u['id_agenda']);?>" class="btn btn-light"><i class="fa fa-list"></i> Hasil</a>
                        <?php if (is_admin() || is_k_marketing()) { ?>
                          <a href="<?= base_url('edit-agenda/'.$u['id_agenda']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                          <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-agenda/'.$u['id_agenda']); ?>';"><i class="fa fa-trash"></i> Delete</button>
                        <?php } ?>
                      </td>
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
  </section>
</div>
<?php $this->load->view('template/footer');?>