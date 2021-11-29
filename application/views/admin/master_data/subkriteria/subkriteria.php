<div class="container-fluid">
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah subkriteria';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update subkriteria';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete subkriteria';
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
  <h1 class="h3 mb-2 text-gray-800">Data subkriteria</h1>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?php echo site_url('kriteria') ?>" class="btn btn-warning btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-arrow-left"></i>
        </span>
        <span class="text">Kembali</span>
      </a>

      <!-- <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#subkriteriaModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a> -->

      <!-- subkriteria Modal-->
      <div class="modal fade" id="subkriteriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah subkriteria Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("subkriteria/input") ?>

            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Nama Subkriteria</b></label>
                <?php
                foreach ($kriteria as $keyy) { ?>
                  <input type="hidden" class="form-control" name="kriteria_id" required="required" value="<?php echo $keyy->kriteria_id ?>">
                <?php
                } ?>

                <input type="text" class="form-control" placeholder="Masukkan Nama subkriteria..." name="subkriteria_nama" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Bobot Subkriteria</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Bobot subkriteria..." name="subkriteria_bobot" required="required">
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
      foreach ($kriteria as $keyy) { ?>
        <a href="<?php echo site_url('subkriteria/id/' . $keyy->kriteria_id) ?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th>Nama subkriteria</th>
              <th>Bobot subkriteria</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1;
            foreach ($subkriteria as $key) { ?>
              <tr>
                <td><?php echo $no; ?></td>
                <!-- <td>
                  <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#subkriteriaEditModal<?php echo $key->subkriteria_id ?>">
                    <span class="text">
                      <i class="fa fa-edit"></i>
                    </span>
                  </a>
                  <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#subkriteriaRemoveModal<?php echo $key->subkriteria_id ?>">
                    <span class="text">
                      <i class="fa fa-trash"></i>
                    </span>
                  </a>

                </td> -->
                <td><?php echo $key->subkriteria_nama ?></td>
                <td><?php echo $key->subkriteria_bobot ?></td>
              </tr>

              <!-- Looping Modal Area -->



              <div class="modal fade" id="subkriteriaEditModal<?php echo $key->subkriteria_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit subkriteria</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open_multipart("subkriteria/edit") ?>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for=""><b>Nama subkriteria</b></label>
                        <?php
                        foreach ($kriteria as $keyy) { ?>
                          <input type="hidden" class="form-control" name="kriteria_id" required="required" value="<?php echo $keyy->kriteria_id ?>">
                        <?php
                        } ?>
                        <input type="hidden" class="form-control" name="subkriteria_id" required="required" value="<?php echo $key->subkriteria_id ?>">
                        <input type="text" class="form-control" placeholder="Masukkan Nama subkriteria..." name="subkriteria_nama" required="required" value="<?php echo $key->subkriteria_nama ?>">
                      </div>
                      <div class="form-group">
                        <label for=""><b>Bobot subkriteria</b></label>
                        <input type="text" class="form-control" placeholder="Masukkan Bobot subkriteria..." name="subkriteria_bobot" required="required" value="<?php echo $key->subkriteria_bobot ?>">
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
              <!-- subkriteria Modal Remove-->
              <div class="modal fade" id="subkriteriaRemoveModal<?php echo $key->subkriteria_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus subkriteria</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open("subkriteria/delete") ?>
                    <div class="modal-body">
                      Apakah anda yakin akan menghapus data subkriteria <b><?php echo $key->subkriteria_nama ?></b> ?
                      <?php
                      foreach ($kriteria as $keyy) { ?>
                        <input type="hidden" class="form-control" name="kriteria_id" required="required" value="<?php echo $keyy->kriteria_id ?>">
                      <?php
                      } ?>
                      <input type="hidden" class="form-control" name="subkriteria_id" value="<?php echo $key->subkriteria_id ?>">
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