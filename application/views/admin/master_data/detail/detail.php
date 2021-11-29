<div class="container-fluid">
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah detail';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update detail';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete detail';
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
  <h1 class="h3 mb-2 text-gray-800">Detail Monitoring</h1>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?php echo site_url('monitoring') ?>" class="btn btn-warning btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-arrow-left"></i>
        </span>
        <span class="text">Kembali</span>
      </a>

      <!-- <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a> -->

      <!-- detail Modal-->
      <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah detail Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("detail/input") ?>

            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Nama detail</b></label>
                <?php
                foreach ($kriteria as $keyy) { ?>
                  <input type="hidden" class="form-control" name="kriteria_id" required="required" value="<?php echo $keyy->kriteria_id ?>">
                <?php
                } ?>

                <input type="text" class="form-control" placeholder="Masukkan Nama detail..." name="detail_nama" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Bobot detail</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Bobot detail..." name="detail_bobot" required="required">
              </div>

            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Tambah</button>
              <?php echo form_close(); ?>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

            </div>
          </div>
        </div>
      </div>

      <?php
      foreach ($monitoring as $keyy) { ?>
        <a href="<?php echo site_url('detail/id/' . $keyy->id_sungai) ?>" class="btn btn-success btn-icon-split btn-sm">
          <span class="icon text-white-50">
            <i class="fa fa-refresh"></i>
          </span>
          <span class="text">Refresh Halaman</span>
        </a>
      <?php } ?>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%;">No</th>
              <!-- <th style="width: 12%;">#</th> -->
              <th>Nama Sungai</th>
              <th>Rain Level</th>
              <th>Rentan Waktu</th>
              <th>Water Level</th>
              <th>Ketinggian sungai Sebenarnya</th>
              <th>Rentan Waktu</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1;
            foreach ($monitoring as $key) { ?>
              <tr>
                <td><?php echo $no; ?></td>
                <!-- <td>
                  <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#detailEditModal<?php echo $key->detail_id ?>">
                    <span class="text">
                      <i class="fa fa-edit"></i>
                    </span>
                  </a>
                  <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#detailRemoveModal<?php echo $key->detail_id ?>">
                    <span class="text">
                      <i class="fa fa-trash"></i>
                    </span>
                  </a>

                </td> -->
                <td><?php echo $key->id_sungai ?></td>
                <td><?php echo $key->nama_sungai ?></td>
                <td><?php echo $key->intensitas_hujan ?></td>
                <td><?php echo $key->waktu_hujan ?></td>
                <td><?php echo $key->ketinggian_sungai ?></td>
                <td><?php echo $key->ketinggian_sungai_sebenarnya ?></td>
                <td><?php echo $key->waktu_sungai ?></td>
              </tr>

              <!-- Looping Modal Area -->



              <div class="modal fade" id="detailEditModal<?php echo $key->detail_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit detail</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open_multipart("detail/edit") ?>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for=""><b>Nama detail</b></label>
                        <?php
                        foreach ($kriteria as $keyy) { ?>
                          <input type="hidden" class="form-control" name="kriteria_id" required="required" value="<?php echo $keyy->kriteria_id ?>">
                        <?php
                        } ?>
                        <input type="hidden" class="form-control" name="detail_id" required="required" value="<?php echo $key->detail_id ?>">
                        <input type="text" class="form-control" placeholder="Masukkan Nama detail..." name="detail_nama" required="required" value="<?php echo $key->detail_nama ?>">
                      </div>
                      <div class="form-group">
                        <label for=""><b>Bobot detail</b></label>
                        <input type="text" class="form-control" placeholder="Masukkan Bobot detail..." name="detail_bobot" required="required" value="<?php echo $key->detail_bobot ?>">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-warning" type="submit">Edit</button>
                      <?php echo form_close(); ?>
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

                    </div>
                  </div>
                </div>
              </div>
              <!-- detail Modal Remove-->
              <div class="modal fade" id="detailRemoveModal<?php echo $key->detail_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus detail</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open("detail/delete") ?>
                    <div class="modal-body">
                      Apakah anda yakin akan menghapus data detail <b><?php echo $key->detail_nama ?></b> ?
                      <?php
                      foreach ($kriteria as $keyy) { ?>
                        <input type="hidden" class="form-control" name="kriteria_id" required="required" value="<?php echo $keyy->kriteria_id ?>">
                      <?php
                      } ?>
                      <input type="hidden" class="form-control" name="detail_id" value="<?php echo $key->detail_id ?>">
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-danger" type="submit">Hapus</button>
                      <?php echo form_close(); ?>
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

                    </div>
                  </div>
                </div>
              </div>

              <!-- End Looping -->


            <?php $no++;
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->