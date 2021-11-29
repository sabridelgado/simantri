<div class="container-fluid">
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah rekomendasi';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update rekomendasi';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete rekomendasi';
  }
  ?>
  <?php if (isset($message)) { ?>
    <script>
      $(document).ready(function() {
        $.toast({
          text: '<?php echo $message; ?>',
          heading: '<?php echo $heading; ?>',
          position: 'top-right',
          width: 'auto',
          showHideTransition: 'slide',
          icon: 'info',
          hideAfter: 5000
        })
      });
    </script>
  <?php } ?>
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Hasil Perhitungan</h1>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?php echo site_url('calon_aslab') ?>" class="btn btn-primary btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-arrow-left"></i>
        </span>
        <span class="text">Kembali</span>
      </a>
      <a href="<?php echo site_url('rekomendasi') ?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Refresh Halaman</span>
      </a>
      <?php
      if ($hasil_ranking_topsis!=[]) {
      ?>
        <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#asisten_praktikumModal">
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
          <span class="text">Tambah Data ASPRA</span>
        </a>

        <!-- asisten_praktikum Modal-->
        <div class="modal fade" id="asisten_praktikumModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data ASPRA</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <?php echo form_open("asisten_praktikum/input") ?>
              <div class="modal-body">
                <div class="row">
                  <div class="col-xs-2" style="width: 50%">
                      <label for=""><b>METODE ARAS</b></label>
                  </div>
                  <div class="col-xs-2" style="width: 50%">
                      <label for=""><b>METODE TOPSIS</b></label>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-2" style="width: 50%">
                  <?php foreach ($hasil_ranking_aras_10 as $key => $value) { ?>
                    <div class="form-group">
                        <input type="hidden" name="matakuliah_id" value="<?php echo $value[2]?>">
                        <input type="hidden" name="tahun_ajaran_id" value="<?php echo $value[3] ?>">
                      <select class="form-control" name="mahasiswa_nim[]">
                        <option value="">.:: Pilih Mahasiswa ::.</option>
                        <?php
                           foreach ($hasil_ranking_aras as $k=>$keys) { 
                            if($value[1] == $keys[1]){?>
                              <option value="<?php echo $keys[1] ?>" selected><?php echo $keys[4] ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $keys[1] ?>"><?php echo $keys[4]?></option>
                      <?php
                          }
                        } ?>
                      </select>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="col-xs-2" style="width: 50%">
                  <?php foreach ($hasil_ranking_topsis_10 as $key => $value) { ?>
                    <div class="form-group">
                      <select class="form-control" name="mahasiswa_nim_topsis[]">
                        <option value="">.:: Pilih Mahasiswa ::.</option>
                        <?php
                           foreach ($hasil_ranking_aras as $k=>$keys) { 
                            if($value[1] == $keys[1]){?>
                              <option value="<?php echo $keys[1] ?>" selected><?php echo $keys[4] ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $keys[1] ?>"><?php echo $keys[4]?></option>
                      <?php
                          }
                        } ?>
                      </select>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="tombol" value="aras">Tambah ARAS</button>
                <button class="btn btn-primary" type="submit" name="tombol" value="topsis">Tambah TOPSIS</button>
                <?php echo form_close(); ?>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

              </div>
            </div>
          </div>
        </div>
      <?php
      } ?>
    </div>
    <div class="row">
      <div class="col-xs-2" style="width: 50%">
        <div class="card-body">
          <div class="table-responsive">
            <table data-page-length='25' class="table table-bordered" width="100%" cellspacing="0">
              <?php
              if ($hasil_ranking_aras) {
              ?>
                <p>Keterangan Waktu Proses Metode ARAS <?php echo $waktu_perhitungan_aras ?> </p>
              <?PHP } ?>
              <thead>
                <tr>
                  <th style="width: 5%;">No</th>
                  <th>Nama Mahasiswa</th>
                  <th>Bobot Mahsiswa</th>
                </tr>
              </thead>

              <tbody>

                <?php $no = 1;
                if ($hasil_ranking_aras) {
                  foreach ($hasil_ranking_aras as $key => $value_aras) {
                ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <?php foreach ($mahasiswa as $keys) {
                        if ($keys->mahasiswa_nim == $value_aras[1]) { ?>
                          <td><?php echo $keys->mahasiswa_nama ?></td>
                      <?php }
                      } ?>
                      <td><?php echo $value_aras[0] ?></td>
                    </tr>
                  <?php
                    $no++;
                  }
                  ?>
                <?php
                }
                ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
      <div class="col-xs-2" style="width: 50%">
        <div class="card-body">
          <div class="table-responsive">
            <table data-page-length='50' class="table table-bordered" width="100%" cellspacing="0">
              <?php
              if ($hasil_ranking_topsis) {
              ?>
                <p>Keterangan Waktu Proses Metode TOPSIS <?php echo $waktu_perhitungan_topsis ?> </p>
              <?PHP } ?>
              <thead>
                <tr>
                  <th style="width: 5%;">No</th>
                  <th>Nama Mahasiswa</th>
                  <th>Bobot Mahasiswa</th>
                </tr>
              </thead>

              <tbody>

                <?php $no = 1;
                if ($hasil_ranking_topsis) {
                  foreach ($hasil_ranking_topsis as $key => $value_topsis) {
                ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <?php foreach ($mahasiswa as $keys) {
                        if ($keys->mahasiswa_nim == $value_topsis[1]) { ?>
                          <td><?php echo $keys->mahasiswa_nama ?></td>
                      <?php }
                      } ?>
                      <td><?php echo round($value_topsis[0], 3) ?></td>

                    </tr>
                  <?php
                    $no++;
                  }
                  ?>
                <?php
                }
                ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>

    </div>

  </div>

</div>
<!-- /.container-fluid -->