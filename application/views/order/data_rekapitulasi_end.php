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
              <h4>Data Riwayat Order</h4>
              <div class="card-header-action">
              <a class="btn btn-success" href="<?php echo base_url('rekapitulasi-order')?>"><span class="fa fa-sync"></span> Mulai Lagi</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Instansi</th>
                      <th>Jas</th>
                      <th>Jaket</th>
                      <th>Kemeja</th>
                      <th>Kaos</th>
                      <th>Sweater</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($order as $u):
                    ?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['instansi'];?></td>
                      <td><?= $u['jas'];?></td>
                      <td><?= $u['jaket'];?></td>
                      <td><?= $u['kemeja'];?></td>
                      <td><?= $u['kaos'];?></td>
                      <td><?= $u['sweater'];?></td>
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

    <?php foreach($q as $hq){?>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Iterasi <?php echo $hq['iterasi'];?></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="">
                  <thead>
                    <tr>
                      <th class="text-center">C1</th>
                      <th class="text-center">C2</th>
                      <th class="text-center">C3</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $q2 = $this->db->query('select * from tb_centroid_temp where iterasi='.$hq['iterasi'].'')->result_array();

                    foreach($q2 as $tq):
                      $warna1="";
                      $warna2="";
                      $warna3="";
                
                      if($tq['c1']==1){$warna1='#FFFF00';} else{$warna1='';}
                      if($tq['c2']==1){$warna2='#FFFF00';} else{$warna2='';}
                      if($tq['c3']==1){$warna3='#FFFF00';} else{$warna3='';}
                    ?>
                    <tr align="center">
                      <td bgcolor="<?php echo $warna1; ?>"><?php echo $tq['c1']; ?></td>
                      <td bgcolor="<?php echo $warna2; ?>"><?php echo $tq['c2']; ?></td>
                      <td bgcolor="<?php echo $warna3; ?>"><?php echo $tq['c3']; ?></td>
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
    <?php } ?>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Hasil Klasterisasi</h4>
              <div class="card-header-action">
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="">
                  <thead>
                    <tr>
                      <th class="text-center" width="10px">#</th>
                      <th width="200px">Wilayah</th>
                      <th width="">Instansi</th>
                      <th width="200px">Klaster</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($hasil_klasterisasi as $u):
                    ?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['nama_kota'];?></td>
                      <td><?= $u['instansi'];?></td>
                      <td><?= $u['klaster'];?></td>
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