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
              <ul class="nav nav-tabs" id="myTab2" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">
                    <button type="button" class="btn btn-<?= color_btn($order['status_order']) ?>">Overview</button>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="keuangan-tab" data-toggle="tab" href="#keuangan" role="tab" aria-controls="keuangan" aria-selected="false">
                    <button type="button" class="btn btn-<?= color_btn($keuangan['status_keuangan']) ?>">Keuangan</button>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="purchase-tab" data-toggle="tab" href="#purchase" role="tab" aria-controls="purchase" aria-selected="false">
                    <button type="button" class="btn btn-<?= color_btn($purchase['status_purchase']) ?>">Purchase</button>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="cutting-tab" data-toggle="tab" href="#cutting" role="tab" aria-controls="cutting" aria-selected="false">
                    <button type="button" class="btn btn-<?= color_btn($cutting['status_cutting']) ?>">Cutting</button>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="bordir-tab" data-toggle="tab" href="#bordir" role="tab" aria-controls="bordir" aria-selected="false">
                    <button type="button" class="btn btn-<?= color_btn($bordir['status_bordir']) ?>">Bordir / Sablon</button>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="jahit-tab" data-toggle="tab" href="#jahit" role="tab" aria-controls="jahit" aria-selected="false">
                    <button type="button" class="btn btn-<?= color_btn($jahit['status_jahit']) ?>">Jahit</button>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="qc-tab" data-toggle="tab" href="#qc" role="tab" aria-controls="qc" aria-selected="false">
                    <button type="button" class="btn btn-<?= color_btn($qc['status_qc']) ?>">QC & Packaging</button>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pengiriman-tab" data-toggle="tab" href="#pengiriman" role="tab" aria-controls="pengiriman" aria-selected="false">
                    <button type="button" class="btn btn-<?= color_btn($pengiriman['status_pengiriman']) ?>">Pengiriman</button>
                  </a>
                </li>
              </ul>
              <div class="tab-content tab-bordered" id="myTab3Content">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                  <h5>Overview</h5>
                  <br>
                  <div class="row">
                    <div class="col-md-4"><h6>Tgl Order</h6></div>
                    <div class="col-md-8"><h6>: <?= $order['tgl_order'] ?></h6></div>
                  </div>
                  <div class="row">
                    <div class="col-md-4"><h6>Nama Klien</h6></div>
                    <div class="col-md-8"><h6>: <?= $order['klien'] ?></h6></div>
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
                <div class="tab-pane fade" id="keuangan" role="tabpanel" aria-labelledby="keuangan-tab">
                  <h5>Keuangan</h5> 
                  <br>
                  <form action="<?= base_url('Order/update_keuangan/'.$order['id_order'].'/'.$keuangan['id_keuangan']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Status</h6></div>
                      <div class="col-md-8"><h6>: <?= status($keuangan['status_keuangan']) ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Nama Pegawai</h6></div>
                      <?php $p_keuangan = $this->db->get_where('tb_pegawai', ['id_pegawai' => $keuangan['id_pegawai']])->row_array(); ?>
                      <div class="col-md-8"><h6>: <?= $p_keuangan['nama'] ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Last Update</h6></div>
                      <div class="col-md-8"><h6>: <?= $keuangan['updated_at'] ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Update Status</h6></div>
                      <div class="col-md-8">
                        <select name="status_keuangan" class="form-control">
                          <option disabled="" selected="">-- Pilih Status --</option>
                          <option value="0" <?= $keuangan['status_keuangan'] == '0' ? 'selected' : '' ?>>Belum Dikerjakan</option>
                          <option value="1" <?= $keuangan['status_keuangan'] == '1' ? 'selected' : '' ?>>Sedang Dikerjakan</option>
                          <option value="2" <?= $keuangan['status_keuangan'] == '2' ? 'selected' : '' ?>>Tidak Diperlukan</option>
                          <option value="3" <?= $keuangan['status_keuangan'] == '3' ? 'selected' : '' ?>>Ada Masalah</option>
                          <option value="4" <?= $keuangan['status_keuangan'] == '4' ? 'selected' : '' ?>>Selesai</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Catatan</h6></div>
                      <div class="col-md-8"><textarea name="catatan_keuangan" class="form-control"><?= $keuangan['catatan_keuangan'] ?></textarea></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Upload File</h6></div>
                      <div class="col-md-8"><input type="file" name="file_keuangan" class="form-control"></div>
                    </div>
                    <input type="hidden" name="file_keuangan_old" value="<?= $keuangan['file_keuangan'] ?>" class="form-control">
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Download File</h6></div>
                      <?php $nama_file = 'file_keuangan/'.$keuangan['file_keuangan']; ?>
                      <div class="col-md-8">
                        <h6>: 
                          <?php if(empty($keuangan['file_keuangan']) || is_null($keuangan['file_keuangan'])){
                            echo "no files.";
                          } else { ?>
                            <a href="<?= base_url('assets/upload/'.$nama_file) ?>" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                          <?php } ?>
                          
                        </h6>
                      </div>
                    </div>
                    <?php if(is_admin() || is_keuangan()):?> 
                    <div class="row">
                      <div class="col-md-4"><h6></h6></div>
                      <div class="col-md-8 text-right"><h6><button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Update</button></h6></div>
                    </div>
                    <?php endif;?>
                  </form>
                </div>
                <div class="tab-pane fade" id="purchase" role="tabpanel" aria-labelledby="purchase-tab">
                  <h5>Purchase</h5>
                  <br>
                  <form action="<?= base_url('Order/update_purchase/'.$order['id_order'].'/'.$purchase['id_purchase']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Status</h6></div>
                      <div class="col-md-8"><h6>: <?= status($purchase['status_purchase']) ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Nama Pegawai</h6></div>
                      <?php $p_purchase = $this->db->get_where('tb_pegawai', ['id_pegawai' => $purchase['id_pegawai']])->row_array(); ?>
                      <div class="col-md-8"><h6>: <?= $p_purchase['nama'] ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Last Update</h6></div>
                      <div class="col-md-8"><h6>: <?= $purchase['updated_at'] ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Update Status</h6></div>
                      <div class="col-md-8">
                        <select name="status_purchase" class="form-control">
                          <option disabled="" selected="">-- Pilih Status --</option>
                          <option value="0" <?= $purchase['status_purchase'] == '0' ? 'selected' : '' ?>>Belum Dikerjakan</option>
                          <option value="1" <?= $purchase['status_purchase'] == '1' ? 'selected' : '' ?>>Sedang Dikerjakan</option>
                          <option value="2" <?= $purchase['status_purchase'] == '2' ? 'selected' : '' ?>>Tidak Diperlukan</option>
                          <option value="3" <?= $purchase['status_purchase'] == '3' ? 'selected' : '' ?>>Ada Masalah</option>
                          <option value="4" <?= $purchase['status_purchase'] == '4' ? 'selected' : '' ?>>Selesai</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Catatan</h6></div>
                      <div class="col-md-8"><textarea name="catatan_purchase" class="form-control"><?= $purchase['catatan_purchase'] ?></textarea></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Upload File</h6></div>
                      <div class="col-md-8"><input type="file" name="file_purchase" class="form-control"></div>
                    </div>
                    <input type="hidden" name="file_purchase_old" value="<?= $purchase['file_purchase'] ?>" class="form-control">
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Download File</h6></div>
                      <?php $nama_file = 'file_purchase/'.$purchase['file_purchase']; ?>
                      <div class="col-md-8">
                        <h6>: 
                          <?php if(empty($purchase['file_purchase']) || is_null($purchase['file_purchase'])){
                            echo "no files.";
                          } else { ?>
                            <a href="<?= base_url('assets/upload/'.$nama_file) ?>" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                          <?php } ?>
                          
                        </h6>
                      </div>
                    </div>
                    <?php if(is_admin() || is_purchase()):?> 
                    <div class="row">
                      <div class="col-md-4"><h6></h6></div>
                      <div class="col-md-8 text-right"><h6><button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Update</button></h6></div>
                    </div>
                    <?php endif;?>
                  </form>
                </div>
                <div class="tab-pane fade" id="cutting" role="tabpanel" aria-labelledby="cutting-tab">
                  <h5>Cutting</h5>
                  <br>
                  <form action="<?= base_url('Order/update_cutting/'.$order['id_order'].'/'.$cutting['id_cutting']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Status</h6></div>
                      <div class="col-md-8"><h6>: <?= status($cutting['status_cutting']) ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Nama Pegawai</h6></div>
                      <?php $p_cutting = $this->db->get_where('tb_pegawai', ['id_pegawai' => $cutting['id_pegawai']])->row_array(); ?>
                      <div class="col-md-8"><h6>: <?= $p_cutting['nama'] ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Last Update</h6></div>
                      <div class="col-md-8"><h6>: <?= $cutting['updated_at'] ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Update Status</h6></div>
                      <div class="col-md-8">
                        <select name="status_cutting" class="form-control">
                          <option disabled="" selected="">-- Pilih Status --</option>
                          <option value="0" <?= $cutting['status_cutting'] == '0' ? 'selected' : '' ?>>Belum Dikerjakan</option>
                          <option value="1" <?= $cutting['status_cutting'] == '1' ? 'selected' : '' ?>>Sedang Dikerjakan</option>
                          <option value="2" <?= $cutting['status_cutting'] == '2' ? 'selected' : '' ?>>Tidak Diperlukan</option>
                          <option value="3" <?= $cutting['status_cutting'] == '3' ? 'selected' : '' ?>>Ada Masalah</option>
                          <option value="4" <?= $cutting['status_cutting'] == '4' ? 'selected' : '' ?>>Selesai</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Catatan</h6></div>
                      <div class="col-md-8"><textarea name="catatan_cutting" class="form-control"><?= $cutting['catatan_cutting'] ?></textarea></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Upload File</h6></div>
                      <div class="col-md-8"><input type="file" name="file_cutting" class="form-control"></div>
                    </div>
                    <input type="hidden" name="file_cutting_old" value="<?= $cutting['file_cutting'] ?>" class="form-control">
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Download File</h6></div>
                      <?php $nama_file = 'file_cutting/'.$cutting['file_cutting']; ?>
                      <div class="col-md-8">
                        <h6>: 
                          <?php if(empty($cutting['file_cutting']) || is_null($cutting['file_cutting'])){
                            echo "no files.";
                          } else { ?>
                            <a href="<?= base_url('assets/upload/'.$nama_file) ?>" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                          <?php } ?>
                          
                        </h6>
                      </div>
                    </div>
                    <?php if(is_admin() || is_produksi()):?> 
                    <div class="row">
                      <div class="col-md-4"><h6></h6></div>
                      <div class="col-md-8 text-right"><h6><button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Update</button></h6></div>
                    </div>
                    <?php endif;?>
                  </form>
                  <hr>
                  <div class="row mt-2 mb-4">
                    <div class="col-md-6">
                      <h5>Data Pegawai Cutting</h5>
                    </div>
                    <div class="col-md-6 text-right">
                      <?php if(is_admin() || is_produksi()):?>
                      <a href="#" data-toggle="modal" data-target="#modal-add-cutting" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
                      <?php endif;?>
                    </div>
                  </div>
                      
                  <div class="table-responsive">
                    <table id="datatables-cutting" class="table table-striped">
                      <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th>Nama Pegawai</th>
                        <th>Pola Potongan</th>
                        <th>Detail Ukuran</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Kasbon</th>
                        <th>Total Bayar</th>
                        <th>Catatan</th>
                        <th>Tgl Pencairan</th>
                        <th class="text-center" style="width: 30px;">Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($pegawai_cutting as $u): ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $u['nama'] ?></td>
                            <td><?= $u['pola_potongan'] ?></td>
                            <td><?= $u['detail_ukuran'] ?></td>
                            <td><?= $u['jumlah'] ?></td>
                            <td><?= number_format($u['harga'], 0, ',', '.') ?></td>
                            <td><?= number_format($u['jumlah']*$u['harga'], 0, ',', '.') ?></td>
                            <td><?= number_format($u['kasbon'], 0, ',', '.') ?></td>
                            <td><?= number_format(($u['jumlah']*$u['harga'])-$u['kasbon'], 0, ',', '.') ?></td>
                            <td><?= $u['catatan_potongan'] ?></td>
                            <td><?= $u['tgl_cair'] ?></td>
                            <td class="text-center">
                              <?php if(is_admin() || is_produksi()):?>
                              <button type="button" data-toggle="modal" data-target="#modal-edit-cutting<?= $u['id_pegawai_cutting'] ?>" class="btn btn-info"><i class="fa fa-edit"></i></button>
                              <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('Order/hapus_pegawai_cutting/'.$order['id_order'].'/'.$u['id_pegawai_cutting']); ?>';"><i class="fa fa-trash"></i></button>
                              <?php endif;?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="bordir" role="tabpanel" aria-labelledby="bordir-tab">
                  <h5>Bordir / Sablon</h5>
                  <br>
                  <form action="<?= base_url('Order/update_bordir/'.$order['id_order'].'/'.$bordir['id_bordir']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Status</h6></div>
                      <div class="col-md-8"><h6>: <?= status($bordir['status_bordir']) ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Nama Pegawai</h6></div>
                      <?php $p_bordir = $this->db->get_where('tb_pegawai', ['id_pegawai' => $bordir['id_pegawai']])->row_array(); ?>
                      <div class="col-md-8"><h6>: <?= $p_bordir['nama'] ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Last Update</h6></div>
                      <div class="col-md-8"><h6>: <?= $purchase['updated_at'] ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Update Status</h6></div>
                      <div class="col-md-8">
                        <select name="status_bordir" class="form-control">
                          <option disabled="" selected="">-- Pilih Status --</option>
                          <option value="0" <?= $bordir['status_bordir'] == '0' ? 'selected' : '' ?>>Belum Dikerjakan</option>
                          <option value="1" <?= $bordir['status_bordir'] == '1' ? 'selected' : '' ?>>Sedang Dikerjakan</option>
                          <option value="2" <?= $bordir['status_bordir'] == '2' ? 'selected' : '' ?>>Tidak Diperlukan</option>
                          <option value="3" <?= $bordir['status_bordir'] == '3' ? 'selected' : '' ?>>Ada Masalah</option>
                          <option value="4" <?= $bordir['status_bordir'] == '4' ? 'selected' : '' ?>>Selesai</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Catatan</h6></div>
                      <div class="col-md-8"><textarea name="catatan_bordir" class="form-control"><?= $bordir['catatan_bordir'] ?></textarea></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Upload File</h6></div>
                      <div class="col-md-8"><input type="file" name="file_bordir" class="form-control"></div>
                    </div>
                    <input type="hidden" name="file_bordir_old" value="<?= $bordir['file_bordir'] ?>" class="form-control">
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Download File</h6></div>
                      <?php $nama_file = 'file_bordir/'.$bordir['file_bordir']; ?>
                      <div class="col-md-8">
                        <h6>: 
                          <?php if(empty($bordir['file_bordir']) || is_null($bordir['file_bordir'])){
                            echo "no files.";
                          } else { ?>
                            <a href="<?= base_url('assets/upload/'.$nama_file) ?>" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                          <?php } ?>
                          
                        </h6>
                      </div>
                    </div>
                    <?php if(is_admin() || is_produksi()):?>
                    <div class="row">
                      <div class="col-md-4"><h6></h6></div>
                      <div class="col-md-8 text-right"><h6><button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Update</button></h6></div>
                    </div>
                    <?php endif;?>
                  </form>
                </div>
                <div class="tab-pane fade" id="jahit" role="tabpanel" aria-labelledby="jahit-tab">
                  <h5>Jahit</h5>
                  <br>
                  <form action="<?= base_url('Order/update_jahit/'.$order['id_order'].'/'.$jahit['id_jahit']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Status</h6></div>
                      <div class="col-md-8"><h6>: <?= status($jahit['status_jahit']) ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Nama Pegawai</h6></div>
                      <?php $p_jahit = $this->db->get_where('tb_pegawai', ['id_pegawai' => $jahit['id_pegawai']])->row_array(); ?>
                      <div class="col-md-8"><h6>: <?= $p_jahit['nama'] ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Last Update</h6></div>
                      <div class="col-md-8"><h6>: <?= $jahit['updated_at'] ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Update Status</h6></div>
                      <div class="col-md-8">
                        <select name="status_jahit" class="form-control">
                          <option disabled="" selected="">-- Pilih Status --</option>
                          <option value="0" <?= $jahit['status_jahit'] == '0' ? 'selected' : '' ?>>Belum Dikerjakan</option>
                          <option value="1" <?= $jahit['status_jahit'] == '1' ? 'selected' : '' ?>>Sedang Dikerjakan</option>
                          <option value="2" <?= $jahit['status_jahit'] == '2' ? 'selected' : '' ?>>Tidak Diperlukan</option>
                          <option value="3" <?= $jahit['status_jahit'] == '3' ? 'selected' : '' ?>>Ada Masalah</option>
                          <option value="4" <?= $jahit['status_jahit'] == '4' ? 'selected' : '' ?>>Selesai</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Catatan</h6></div>
                      <div class="col-md-8"><textarea name="catatan_jahit" class="form-control"><?= $jahit['catatan_jahit'] ?></textarea></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Upload File</h6></div>
                      <div class="col-md-8"><input type="file" name="file_jahit" class="form-control"></div>
                    </div>
                    <input type="hidden" name="file_jahit_old" value="<?= $jahit['file_jahit'] ?>" class="form-control">
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Download File</h6></div>
                      <?php $nama_file = 'file_jahit/'.$jahit['file_jahit']; ?>
                      <div class="col-md-8">
                        <h6>: 
                          <?php if(empty($jahit['file_jahit']) || is_null($jahit['file_jahit'])){
                            echo "no files.";
                          } else { ?>
                            <a href="<?= base_url('assets/upload/'.$nama_file) ?>" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                          <?php } ?>
                          
                        </h6>
                      </div>
                    </div>
                    <?php if(is_admin() || is_produksi()):?>
                    <div class="row">
                      <div class="col-md-4"><h6></h6></div>
                      <div class="col-md-8 text-right"><h6><button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Update</button></h6></div>
                    </div>
                    <?php endif;?>
                  </form>
                  <hr>
                  <div class="row mt-2 mb-4">
                    <div class="col-md-6">
                      <h5>Data Pegawai Jahit</h5>
                    </div>
                    <div class="col-md-6 text-right">
                      <?php if(is_admin() || is_produksi()):?>
                      <a href="#" data-toggle="modal" data-target="#modal-add-jahit" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
                      <?php endif;?>
                    </div>
                  </div>
                      
                  <div class="table-responsive">
                    <table id="datatables-jahit" class="table table-striped">
                      <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th>Nama Pegawai</th>
                        <th>Ukuran Pendek</th>
                        <th>Ukuran Panjang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Kasbon</th>
                        <th>Total Bayar</th>
                        <th>Tgl Pencairan</th>
                        <th class="text-center" style="width: 30px;">Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($pegawai_jahit as $u): ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $u['nama'] ?></td>
                            <td><?= $u['ukuran_pendek'] ?></td>
                            <td><?= $u['ukuran_panjang'] ?></td>
                            <td><?= $u['jumlah'] ?></td>
                            <td><?= number_format($u['harga'], 0, ',', '.') ?></td>
                            <td><?= number_format($u['jumlah']*$u['harga'], 0, ',', '.') ?></td>
                            <td><?= number_format($u['kasbon'], 0, ',', '.') ?></td>
                            <td><?= number_format(($u['jumlah']*$u['harga'])-$u['kasbon'], 0, ',', '.') ?></td>
                            <td><?= $u['tgl_cair'] ?></td>
                            <td class="text-center">
                              <?php if(is_admin() || is_produksi()):?>
                              <button type="button" data-toggle="modal" data-target="#modal-edit-jahit<?= $u['id_pegawai_jahit'] ?>" class="btn btn-info"><i class="fa fa-edit"></i></button>
                              <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('Order/hapus_pegawai_jahit/'.$order['id_order'].'/'.$u['id_pegawai_jahit']); ?>';"><i class="fa fa-trash"></i></button>
                              <?php endif;?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="qc" role="tabpanel" aria-labelledby="qc-tab">
                  <h5>QC & Packaging</h5>
                  <br>
                  <form action="<?= base_url('Order/update_qc/'.$order['id_order'].'/'.$qc['id_qc']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Status</h6></div>
                      <div class="col-md-8"><h6>: <?= status($qc['status_qc']) ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Nama Pegawai</h6></div>
                      <?php $p_qc = $this->db->get_where('tb_pegawai', ['id_pegawai' => $qc['id_pegawai']])->row_array(); ?>
                      <div class="col-md-8"><h6>: <?= $p_qc['nama'] ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Last Update</h6></div>
                      <div class="col-md-8"><h6>: <?= $qc['updated_at'] ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Update Status</h6></div>
                      <div class="col-md-8">
                        <select name="status_qc" class="form-control">
                          <option disabled="" selected="">-- Pilih Status --</option>
                          <option value="0" <?= $qc['status_qc'] == '0' ? 'selected' : '' ?>>Belum Dikerjakan</option>
                          <option value="1" <?= $qc['status_qc'] == '1' ? 'selected' : '' ?>>Sedang Dikerjakan</option>
                          <option value="2" <?= $qc['status_qc'] == '2' ? 'selected' : '' ?>>Tidak Diperlukan</option>
                          <option value="3" <?= $qc['status_qc'] == '3' ? 'selected' : '' ?>>Ada Masalah</option>
                          <option value="4" <?= $qc['status_qc'] == '4' ? 'selected' : '' ?>>Selesai</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Catatan</h6></div>
                      <div class="col-md-8"><textarea name="catatan_qc" class="form-control"><?= $qc['catatan_qc'] ?></textarea></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Upload File</h6></div>
                      <div class="col-md-8"><input type="file" name="file_qc" class="form-control"></div>
                    </div>
                    <input type="hidden" name="file_qc_old" value="<?= $qc['file_qc'] ?>" class="form-control">
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Download File</h6></div>
                      <?php $nama_file = 'file_qc/'.$qc['file_qc']; ?>
                      <div class="col-md-8">
                        <h6>: 
                          <?php if(empty($qc['file_qc']) || is_null($qc['file_qc'])){
                            echo "no files.";
                          } else { ?>
                            <a href="<?= base_url('assets/upload/'.$nama_file) ?>" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                          <?php } ?>
                          
                        </h6>
                      </div>
                    </div>
                    <?php if(is_admin() || is_produksi()):?>
                    <div class="row">
                      <div class="col-md-4"><h6></h6></div>
                      <div class="col-md-8 text-right"><h6><button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Update</button></h6></div>
                    </div>
                    <?php endif;?>
                  </form>
                  <hr>
                  <div class="row mt-2 mb-4">
                    <div class="col-md-6">
                      <h5>Data Pegawai QC & Packaging</h5>
                    </div>
                    <div class="col-md-6 text-right">
                      <?php if(is_admin() || is_produksi()):?>
                      <a href="#" data-toggle="modal" data-target="#modal-add-qc" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
                      <?php endif;?>
                    </div>
                  </div>
                      
                  <div class="table-responsive">
                    <table id="datatables-qc" class="table table-striped">
                      <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th>Nama Pegawai</th>
                        <th>Ukuran Pendek</th>
                        <th>Ukuran Panjang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Kasbon</th>
                        <th>Total Bayar</th>
                        <th>Tgl Pencairan</th>
                        <th class="text-center" style="width: 30px;">Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($pegawai_qc as $u): ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $u['nama'] ?></td>
                            <td><?= $u['ukuran_pendek'] ?></td>
                            <td><?= $u['ukuran_panjang'] ?></td>
                            <td><?= $u['jumlah'] ?></td>
                            <td><?= number_format($u['harga'], 0, ',', '.') ?></td>
                            <td><?= number_format($u['jumlah']*$u['harga'], 0, ',', '.') ?></td>
                            <td><?= number_format($u['kasbon'], 0, ',', '.') ?></td>
                            <td><?= number_format(($u['jumlah']*$u['harga'])-$u['kasbon'], 0, ',', '.') ?></td>
                            <td><?= $u['tgl_cair'] ?></td>
                            <td class="text-center">
                              <?php if(is_admin() || is_produksi()):?>
                              <button type="button" data-toggle="modal" data-target="#modal-edit-qc<?= $u['id_pegawai_qc'] ?>" class="btn btn-info"><i class="fa fa-edit"></i></button>
                              <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('Order/hapus_pegawai_qc/'.$order['id_order'].'/'.$u['id_pegawai_qc']); ?>';"><i class="fa fa-trash"></i></button>
                              <?php endif;?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="pengiriman" role="tabpanel" aria-labelledby="pengiriman-tab">
                  <h5>Pengiriman</h5>
                  <br>
                  <form action="<?= base_url('Order/update_pengiriman/'.$order['id_order'].'/'.$pengiriman['id_pengiriman']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Status</h6></div>
                      <div class="col-md-8"><h6>: <?= status($pengiriman['status_pengiriman']) ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Nama Pegawai</h6></div>
                      <?php $p_pengiriman = $this->db->get_where('tb_pegawai', ['id_pegawai' => $pengiriman['id_pegawai']])->row_array(); ?>
                      <div class="col-md-8"><h6>: <?= $p_pengiriman['nama'] ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Last Update</h6></div>
                      <div class="col-md-8"><h6>: <?= $pengiriman['updated_at'] ?></h6></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Update Status</h6></div>
                      <div class="col-md-8">
                        <select name="status_pengiriman" class="form-control">
                          <option disabled="" selected="">-- Pilih Status --</option>
                          <option value="0" <?= $pengiriman['status_pengiriman'] == '0' ? 'selected' : '' ?>>Belum Dikerjakan</option>
                          <option value="1" <?= $pengiriman['status_pengiriman'] == '1' ? 'selected' : '' ?>>Sedang Dikerjakan</option>
                          <option value="2" <?= $pengiriman['status_pengiriman'] == '2' ? 'selected' : '' ?>>Tidak Diperlukan</option>
                          <option value="3" <?= $pengiriman['status_pengiriman'] == '3' ? 'selected' : '' ?>>Ada Masalah</option>
                          <option value="4" <?= $pengiriman['status_pengiriman'] == '4' ? 'selected' : '' ?>>Selesai</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Catatan</h6></div>
                      <div class="col-md-8"><textarea name="catatan_pengiriman" class="form-control"><?= $pengiriman['catatan_pengiriman'] ?></textarea></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Upload File</h6></div>
                      <div class="col-md-8"><input type="file" name="file_pengiriman" class="form-control"></div>
                    </div>
                    <input type="hidden" name="file_pengiriman_old" value="<?= $pengiriman['file_pengiriman'] ?>" class="form-control">
                    <div class="row mb-2">
                      <div class="col-md-4"><h6>Download File</h6></div>
                      <?php $nama_file = 'file_pengiriman/'.$pengiriman['file_pengiriman']; ?>
                      <div class="col-md-8">
                        <h6>: 
                          <?php if(empty($pengiriman['file_pengiriman']) || is_null($pengiriman['file_pengiriman'])){
                            echo "no files.";
                          } else { ?>
                            <a href="<?= base_url('assets/upload/'.$nama_file) ?>" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                          <?php } ?>
                          
                        </h6>
                      </div>
                    </div>
                    <?php if(is_admin() || is_produksi()):?>
                    <div class="row">
                      <div class="col-md-4"><h6></h6></div>
                      <div class="col-md-8 text-right"><h6><button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Update</button></h6></div>
                    </div>
                    <?php endif;?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('order/modal_pegawai') ?>
<?php $this->load->view('template/footer');?>