<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-2">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand mb-4">
              <!-- <img src="<?= base_url(); ?>assets/img/kojo.jpg" alt="logo" width="100" class="shadow-light rounded-square mb-2"> -->
              <!-- <h2 style="color: #006400;">Aplikasi</h2>
              <h6 style="color: #DAA520;">Marketing</h6> -->
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Register Pelanggan</h4>
              </div>
                
              
              <div class="card-body">
                <form method="POST" action="<?= base_url('registrasi-pelanggan') ?>">
                  <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" value="<?= set_value('nama_pelanggan'); ?>" required="">
                    <?= form_error('nama_pelanggan', '<span class="text-danger small">', '</span>'); ?>
                  </div>  
                  <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" value="<?= set_value('no_telepon'); ?>" required="">
                    <?= form_error('no_telepon', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label class="d-block">Jenis Kelamin</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="exampleRadios3" <?= set_value('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' ; ?> >
                      <label class="form-check-label" for="exampleRadios3">
                        Laki-laki
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="exampleRadios4" <?= set_value('jenis_kelamin') == 'Perempuan' ? 'checked' : '' ; ?> >
                      <label class="form-check-label" for="exampleRadios4">
                        Perempuan
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?= set_value('alamat'); ?>" required="">
                    <?= form_error('alamat', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Kota</label>
                    <select class="form-control" name="id_kota" id="select-kota" data-live-search="true">
                      <option disabled selected>-- Pilih Kota --</option>
                      <?php foreach ($kota as $key) { ?>
                        <option value="<?= $key['id_kota'] ?>" <?= set_value('id_kota') == $key['id_kota'] ? 'selected' : '' ?>><?= $key['nama_kota'] ?></option>
                      <?php } ?>
                    </select>
                    <?= form_error('id_kota', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Instansi</label>
                    <input type="text" name="instansi" class="form-control" value="<?= set_value('instansi'); ?>" required="">
                    <?= form_error('instansi', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>" required="">
                    <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>" >
                    <?= form_error('password', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password2" class="form-control" value="<?= set_value('password2'); ?>" >
                    <?= form_error('password2', '<span class="text-danger small">', '</span>'); ?>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Sudah punya akun? <a href="<?= base_url('LoginPelanggan') ?>">Login</a>
            </div>
            <div class="text-muted text-center">
              <a href="<?= base_url('') ?>">Kembali ke menu utama</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2022
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

  <script src="<?= base_url(); ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
