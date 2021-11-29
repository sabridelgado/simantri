<div class="container-fluid">
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah tahun_ajaran';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update tahun_ajaran';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete tahun_ajaran';
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
  <h1 class="h3 mb-2 text-gray-800">Data Tahun Ajaran</h1>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#tahun_ajaranModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- tahun_ajaran Modal-->
      <div class="modal fade" id="tahun_ajaranModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah tahun_ajaran Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("tahun_ajaran/input") ?>

            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Nama tahun_ajaran</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama tahun_ajaran..." name="tahun_ajaran_nama" required="required">
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

    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%;">No</th>
              <th style="width: 12%;">#</th>
              <th>Tahun Ajaran</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1;
            foreach ($tahun_ajaran as $key) { ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td>
                  <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#tahun_ajaranEditModal<?php echo $key->tahun_ajaran_id ?>">
                    <span class="text">
                      <i class="fa fa-edit"></i>
                    </span>
                  </a>
                  <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#tahun_ajaranRemoveModal<?php echo $key->tahun_ajaran_id ?>">
                    <span class="text">
                      <i class="fa fa-trash"></i>
                    </span>
                  </a>

                </td>
                <td><?php echo $key->tahun_ajaran_nama ?></td>
              </tr>

              <!-- Looping Modal Area -->



              <div class="modal fade" id="tahun_ajaranEditModal<?php echo $key->tahun_ajaran_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit tahun_ajaran</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open_multipart("tahun_ajaran/edit") ?>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for=""><b>Nama tahun_ajaran</b></label>
                        <input type="hidden" class="form-control" name="tahun_ajaran_id" required="required" value="<?php echo $key->tahun_ajaran_id ?>">
                        <input type="text" class="form-control" placeholder="Masukkan Nama tahun_ajaran..." name="tahun_ajaran_nama" required="required" value="<?php echo $key->tahun_ajaran_nama ?>">
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
              <!-- tahun_ajaran Modal Remove-->
              <div class="modal fade" id="tahun_ajaranRemoveModal<?php echo $key->tahun_ajaran_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus tahun_ajaran</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open("tahun_ajaran/delete") ?>
                    <div class="modal-body">
                      Apakah anda yakin akan menghapus data tahun_ajaran <b><?php echo $key->tahun_ajaran_nama ?></b> ?
                      <?php
                      foreach ($kriteria as $keyy) { ?>
                        <input type="hidden" class="form-control" name="kriteria_id" required="required" value="<?php echo $keyy->kriteria_id ?>">
                      <?php
                      } ?>
                      <input type="hidden" class="form-control" name="tahun_ajaran_id" value="<?php echo $key->tahun_ajaran_id ?>">
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