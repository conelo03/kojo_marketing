<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Agenda</a></div>
        <div class="breadcrumb-item">Tambah Agenda</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-agenda'); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Tambah Agenda</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Agenda</label>
                  <input type="text" name="nama_agenda" class="form-control" value="<?= set_value('nama_agenda'); ?>" required="">
                  <?= form_error('nama_agenda', '<span class="text-danger small">', '</span>'); ?>
                </div>  
                <div class="form-group">
                  <label>Tanggal Agenda</label>
                  <input type="date" name="tanggal_agenda" class="form-control" value="<?= set_value('tanggal_agenda'); ?>" required="">
                  <?= form_error('tanggal_agenda', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Tenggat Tanggal Agenda</label>
                  <input type="date" name="tenggat_agenda" class="form-control" value="<?= set_value('tenggat_agenda'); ?>" required="">
                  <?= form_error('tenggat_agenda', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Tempat</label>
                  <input type="text" name="tempat" class="form-control" value="<?= set_value('tempat'); ?>" required="">
                  <?= form_error('tempat', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Waktu</label>
                  <input type="time" name="waktu" class="form-control" value="<?= set_value('waktu'); ?>" required="">
                  <?= form_error('waktu', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" name="keterangan" class="form-control" value="<?= set_value('keterangan'); ?>" required="">
                  <?= form_error('keterangan', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('agenda');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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