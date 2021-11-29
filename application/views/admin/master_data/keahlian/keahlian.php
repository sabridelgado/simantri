<div class="container-fluid">
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah keahlian';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update keahlian';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete keahlian';
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
  <h1 class="h3 mb-2 text-gray-800">Data keahlian</h1>
  <p class="mb-4">Data berikut merupakan kumpulan keahlian Dosen yang terdaftar di <b>Teknik Informatika</b> - Universitas Halu Oleo</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#keahlianModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- keahlian Modal-->
      <div class="modal fade" id="keahlianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah keahlian Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("keahlian/input") ?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Id keahlian</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Id keahlian..." name="keahlian_id" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Nama Keahlian</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Keahlian..." name="keahlian_nama" required="required">
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


      <a href="<?php echo site_url('keahlian') ?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th>Id keahlian</th>
              <th>Nama Keahlian</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1;
            foreach ($keahlian as $key) { ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td>
                  <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#keahlianEditModal<?php echo $key->keahlian_id ?>">
                    <span class="text">
                      <i class="fa fa-edit"></i>
                    </span>
                  </a>
                  <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#keahlianRemoveModal<?php echo $key->keahlian_id ?>">
                    <span class="text">
                      <i class="fa fa-trash"></i>
                    </span>
                  </a>

                </td>
                <td><?php echo $key->keahlian_id ?></td>
                <td><?php echo $key->keahlian_nama ?></td>
              </tr>

              <!-- Looping Modal Area -->



              <div class="modal fade" id="keahlianEditModal<?php echo $key->keahlian_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit keahlian</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open_multipart("keahlian/edit") ?>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for=""><b>Id Keahlian</b></label>
                        <!-- <input type="hidden" class="form-control" name="keahlian_id" required="required" value="<?php echo $key->keahlian_id ?>"> -->
                        <input type="text" class="form-control" placeholder="Masukkan Id keahlian..." name="keahlian_id" required="required" value="<?php echo $key->keahlian_id ?>">
                      </div>
                      <div class="form-group">
                        <label for=""><b>Nama Keahlian</b></label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Keahlian..." name="keahlian_nama" required="required" value="<?php echo $key->keahlian_nama ?>">
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
              <!-- keahlian Modal Remove-->
              <div class="modal fade" id="keahlianRemoveModal<?php echo $key->keahlian_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus keahlian</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open("keahlian/delete") ?>
                    <div class="modal-body">
                      Apakah anda yakin akan menghapus data keahlian <b><?php echo $key->keahlian_nama ?></b> ?
                      <input type="hidden" class="form-control" name="keahlian_id" value="<?php echo $key->keahlian_id ?>">
                      <input type="hidden" class="form-control" name="keahlian_nama" value="<?php echo $key->keahlian_nama ?>">
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