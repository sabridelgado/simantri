<div class="container-fluid">
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah keahlian_detail';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update keahlian_detail';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete keahlian_detail';
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
  <h1 class="h3 mb-2 text-gray-800">Data Keahlian Detail</h1>
  <p class="mb-4">Data berikut merupakan kumpulan keahlian detail Dosen <b>Teknik Informatika</b> - Universitas Halu Oleo</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#keahlian_detailModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- keahlian_detail Modal-->
      <div class="modal fade" id="keahlian_detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah keahlian_detail Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open("keahlian_detail/input") ?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Dosen</b></label>
                <select class="form-control" name="dosen_id">
                  <option value="">.:: Pilih Dosen ::.</option>
                  <?php foreach ($dosen as $keys) { ?>
                    <option value="<?php echo $keys->dosen_id ?>"><?php echo $keys->dosen_nama ?></option>
                    <!-- <input type="hidden" name="dosen_nama" value="<?php echo $keys->dosen_nama ?>" required="required"> -->
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for=""><b>Keahlian</b></label>
                <select class="form-control" name="keahlian_id">
                  <option value="">.:: Pilih Keahlian ::.</option>
                  <?php foreach ($keahlian as $keys) { ?>
                    <option value="<?php echo $keys->keahlian_id ?>"><?php echo $keys->keahlian_nama ?></option>
                    <!-- <input type="hidden" name="keahlian_nama" value="<?php echo $keys->keahlian_nama ?>" required="required"> -->
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for=""><b>Bobot Keahlian</b></label>
                <select class="form-control" name="keahlian_detail_bobot">
                  <option value="">.:: Pilih Bobot ::.</option>
                  <option value="5">Sangat Sesuai Keahlian</option>
                  <option value="4">Sesuai keahlian</option>
                  <option value="3">Cukup sesuai keahlian</option>
                  <option value="2">Kurang sesuai keahlian</option>
                </select>
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


      <a href="<?php echo site_url('keahlian_detail') ?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Refresh Halaman</span>
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%;">No</th>
              <th style="width: 12%;">#</th>
              <th>Nama Dosen</th>
              <th>Keahlian</th>
              <th>Bobot</th>
            </tr>
          </thead>

          <tbody>

            <?php $no = 1;
            // if ($keahlian_detail) {
            foreach ($keahlian_detail as $key) { ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td>
                  <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#keahlian_detailEditModal<?php echo $key->keahlian_detail_id ?>">
                    <span class="text">
                      <i class="fa fa-edit"></i>
                    </span>
                  </a>
                  <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#keahlian_detailRemoveModal<?php echo $key->keahlian_detail_id ?>">
                    <span class="text">
                      <i class="fa fa-trash"></i>
                    </span>
                  </a>

                </td>
                <td><?php echo $key->dosen_nama ?></td>
                <td><?php echo $key->keahlian_nama ?></td>
                <td><?php echo $key->keahlian_detail_bobot ?></td>
              </tr>

              <!-- Looping Modal Area -->

              <!-- keahlian_detail Modal Edit-->
              <div class="modal fade" id="keahlian_detailEditModal<?php echo $key->keahlian_detail_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit keahlian_detail</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open("keahlian_detail/edit") ?>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for=""><b>Dosen</b></label>
                        <select class="form-control" name="dosen_id">
                          <option value="">.:: Pilih Dosen ::.</option>
                          <?php foreach ($dosen as $keys) {
                            if ($key->dosen_id == $keys->dosen_id) {
                          ?>
                              <option value="<?php echo $key->dosen_id ?>" selected><?php echo $key->dosen_nama ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $keys->dosen_id ?>"><?php echo $keys->dosen_nama ?></option>
                          <?php }
                          } ?>

                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><b>Keahlian</b></label>
                        <select class="form-control" name="keahlian_id">
                          <option value="">.:: Pilih Keahlian ::.</option>
                          <?php foreach ($keahlian as $keys) {
                            if ($key->keahlian_id == $keys->keahlian_id) {
                          ?>
                              <option value="<?php echo $keys->keahlian_id ?>" selected><?php echo $keys->keahlian_nama ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $keys->keahlian_id ?>"><?php echo $keys->keahlian_nama ?></option>
                          <?php }
                          } ?>

                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><b>Bobot</b></label>
                        <input type="text" class="form-control" name="keahlian_detail_bobot" required="required" value="<?php echo $key->keahlian_detail_bobot ?>">
                        <input type="hidden" class="form-control" name="keahlian_detail_id" required="required" value="<?php echo $key->keahlian_detail_id ?>">
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-warning" type="submit">Edit</button>
                        <?php echo form_close(); ?>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- keahlian_detail Modal Remove-->
              <div class="modal fade" id="keahlian_detailRemoveModal<?php echo $key->keahlian_detail_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus keahlian_detail</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open("keahlian_detail/delete") ?>
                    <div class="modal-body">
                      Apakah anda yakin akan menghapus data keahlian detail ?
                      <input type="hidden" class="form-control" name="keahlian_detail_id" value="<?php echo $key->keahlian_detail_id ?>">
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
              // }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->