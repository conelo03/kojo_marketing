<div class="modal fade" id="modal-add-cutting">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Pegawai Cutting</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Order/tambah_pegawai_cutting/'.$order['id_order']) ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="1">Nama Pegawai</label>
          <select name="id_pegawai" class="form-control" required="">
            <option disabled="" selected="">-- Pilih Pegawai --</option>
            <?php foreach ($pegawai as $key) { ?>
              <option value="<?= $key['id_pegawai'] ?>"><?= $key['nama'] ?> - <?= $key['jabatan'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="1">Pola Potongan</label>
          <input type="text" class="form-control" id="1" name="pola_potongan" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Detail Ukuran</label>
          <input type="text" class="form-control" id="1" name="detail_ukuran" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Jumlah</label>
          <input type="number" class="form-control" id="1" name="jumlah" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Harga</label>
          <input type="number" class="form-control" id="1" name="harga" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Kasbon</label>
          <input type="number" class="form-control" id="1" name="kasbon" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Tanggal Pencairan</label>
          <input type="date" class="form-control" id="1" name="tgl_cair" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Catatan Potongan</label>
          <textarea class="form-control" name="catatan_potongan"></textarea>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>

<?php foreach ($pegawai_cutting as $u): ?>
<div class="modal fade" id="modal-edit-cutting<?= $u['id_pegawai_cutting'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Pegawai Cutting</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Order/edit_pegawai_cutting/'.$order['id_order'].'/'.$u['id_pegawai_cutting']) ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="1">Nama Pegawai</label>
          <select name="id_pegawai" class="form-control" required="">
            <option disabled="" selected="">-- Pilih Pegawai --</option>
            <?php foreach ($pegawai as $key) { ?>
              <option value="<?= $key['id_pegawai'] ?>" <?= $u['id_pegawai'] == $key['id_pegawai'] ? 'selected' : '' ?>><?= $key['nama'] ?> - <?= $key['jabatan'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="1">Pola Potongan</label>
          <input type="text" class="form-control" id="1" name="pola_potongan" value="<?= $u['pola_potongan'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Detail Ukuran</label>
          <input type="text" class="form-control" id="1" name="detail_ukuran" value="<?= $u['detail_ukuran'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Jumlah</label>
          <input type="number" class="form-control" id="1" name="jumlah" value="<?= $u['jumlah'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Harga</label>
          <input type="number" class="form-control" id="1" name="harga" value="<?= $u['harga'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Kasbon</label>
          <input type="number" class="form-control" id="1" name="kasbon" value="<?= $u['kasbon'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Tanggal Pencairan</label>
          <input type="date" class="form-control" id="1" name="tgl_cair" value="<?= $u['tgl_cair'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Catatan Potongan</label>
          <textarea class="form-control" name="catatan_potongan" required=""><?= $u['catatan_potongan'] ?></textarea>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<div class="modal fade" id="modal-add-jahit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Pegawai Jahit</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Order/tambah_pegawai_jahit/'.$order['id_order']) ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="1">Nama Pegawai</label>
          <select name="id_pegawai" class="form-control" required="">
            <option disabled="" selected="">-- Pilih Pegawai --</option>
            <?php foreach ($pegawai as $key) { ?>
              <option value="<?= $key['id_pegawai'] ?>"><?= $key['nama'] ?> - <?= $key['jabatan'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="1">Ukuran (pendek)</label>
          <input type="text" class="form-control" id="1" name="ukuran_pendek" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Ukuran (panjang)</label>
          <input type="text" class="form-control" id="1" name="ukuran_panjang" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Jumlah</label>
          <input type="number" class="form-control" id="1" name="jumlah" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Harga</label>
          <input type="number" class="form-control" id="1" name="harga" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Kasbon</label>
          <input type="number" class="form-control" id="1" name="kasbon" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Tanggal Pencairan</label>
          <input type="date" class="form-control" id="1" name="tgl_cair" value="" required="">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>

<?php foreach ($pegawai_jahit as $u): ?>
<div class="modal fade" id="modal-edit-jahit<?= $u['id_pegawai_jahit'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Pegawai Jahit</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Order/edit_pegawai_jahit/'.$order['id_order'].'/'.$u['id_pegawai_jahit']) ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="1">Nama Pegawai</label>
          <select name="id_pegawai" class="form-control" required="">
            <option disabled="" selected="">-- Pilih Pegawai --</option>
            <?php foreach ($pegawai as $key) { ?>
              <option value="<?= $key['id_pegawai'] ?>" <?= $u['id_pegawai'] == $key['id_pegawai'] ? 'selected' : '' ?>><?= $key['nama'] ?> - <?= $key['jabatan'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="1">Ukuran (pendek)</label>
          <input type="text" class="form-control" id="1" name="ukuran_pendek" value="<?= $u['ukuran_pendek'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Ukuran (panjang)</label>
          <input type="text" class="form-control" id="1" name="ukuran_panjang" value="<?= $u['ukuran_panjang'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Jumlah</label>
          <input type="number" class="form-control" id="1" name="jumlah" value="<?= $u['jumlah'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Harga</label>
          <input type="number" class="form-control" id="1" name="harga" value="<?= $u['harga'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Kasbon</label>
          <input type="number" class="form-control" id="1" name="kasbon" value="<?= $u['kasbon'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Tanggal Pencairan</label>
          <input type="date" class="form-control" id="1" name="tgl_cair" value="<?= $u['tgl_cair'] ?>" required="">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<div class="modal fade" id="modal-add-qc">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Pegawai QC & Packaging</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Order/tambah_pegawai_qc/'.$order['id_order']) ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="1">Nama Pegawai</label>
          <select name="id_pegawai" class="form-control" required="">
            <option disabled="" selected="">-- Pilih Pegawai --</option>
            <?php foreach ($pegawai as $key) { ?>
              <option value="<?= $key['id_pegawai'] ?>"><?= $key['nama'] ?> - <?= $key['jabatan'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="1">Ukuran (pendek)</label>
          <input type="text" class="form-control" id="1" name="ukuran_pendek" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Ukuran (panjang)</label>
          <input type="text" class="form-control" id="1" name="ukuran_panjang" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Jumlah</label>
          <input type="number" class="form-control" id="1" name="jumlah" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Harga</label>
          <input type="number" class="form-control" id="1" name="harga" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Kasbon</label>
          <input type="number" class="form-control" id="1" name="kasbon" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Tanggal Pencairan</label>
          <input type="date" class="form-control" id="1" name="tgl_cair" value="" required="">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>

<?php foreach ($pegawai_qc as $u): ?>
<div class="modal fade" id="modal-edit-qc<?= $u['id_pegawai_qc'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Pegawai QC & Packaging</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Order/edit_pegawai_qc/'.$order['id_order'].'/'.$u['id_pegawai_qc']) ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="1">Nama Pegawai</label>
          <select name="id_pegawai" class="form-control" required="">
            <option disabled="" selected="">-- Pilih Pegawai --</option>
            <?php foreach ($pegawai as $key) { ?>
              <option value="<?= $key['id_pegawai'] ?>" <?= $u['id_pegawai'] == $key['id_pegawai'] ? 'selected' : '' ?>><?= $key['nama'] ?> - <?= $key['jabatan'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="1">Ukuran (pendek)</label>
          <input type="text" class="form-control" id="1" name="ukuran_pendek" value="<?= $u['ukuran_pendek'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Ukuran (panjang)</label>
          <input type="text" class="form-control" id="1" name="ukuran_panjang" value="<?= $u['ukuran_panjang'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Jumlah</label>
          <input type="number" class="form-control" id="1" name="jumlah" value="<?= $u['jumlah'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Harga</label>
          <input type="number" class="form-control" id="1" name="harga" value="<?= $u['harga'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Kasbon</label>
          <input type="number" class="form-control" id="1" name="kasbon" value="<?= $u['kasbon'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Tanggal Pencairan</label>
          <input type="date" class="form-control" id="1" name="tgl_cair" value="<?= $u['tgl_cair'] ?>" required="">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
