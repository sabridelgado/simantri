<div class="container-fluid">
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah dosen';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update dosen';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete dosen';
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
  <h1 class="h3 mb-2 text-gray-800">Data dosen</h1>
  <!--<p class="mb-4">Data berikut merupakan kumpulan Dosen yang terdaftar di <b>Teknik Informatika</b> - Universitas Halu Oleo</p>-->
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#dosenModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- dosen Modal-->
      <div class="modal fade" id="dosenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah dosen Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("dosen/input") ?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Id dosen</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Id dosen..." name="nip" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Nama dosen</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama dosen..." name="dosen_nama" required="required">
              </div>
              <hr>
            </div>

            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Tambah</button>
              <?php echo form_close(); ?>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

            </div>
          </div>
        </div>
      </div>


      <a href="<?php echo site_url('dosen') ?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Refresh Halaman</span>
      </a>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table data-page-length='25' class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%;">No</th>
              <th style="width: 8%;">#</th>
              <th>Id dosen</th>
              <th>Nama dosen</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1;
            if($dosen){
            foreach ($dosen as $key) { ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td>
                  <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#dosenEditModal<?php echo $key->nip ?>">
                    <span class="text">
                      <i class="fa fa-edit"></i>
                    </span>
                  </a>
                  <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#dosenRemoveModal<?php echo $key->nip ?>">
                    <span class="text">
                      <i class="fa fa-trash"></i>
                    </span>
                  </a>

                </td>
                <td><?php echo $key->nip ?></td>
                <td><?php echo $key->dosen_nama ?></td>

              </tr>

              <!-- Looping Modal Area -->



              <div class="modal fade" id="dosenEditModal<?php echo $key->nip ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit dosen</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open_multipart("dosen/edit") ?>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for=""><b>Id dosen</b></label>
                        <input type="text" class="form-control" placeholder="Masukkan Id dosen..." name="nip" required="required" value="<?php echo $key->nip ?>">
                        <input type="hidden" class="form-control" placeholder="Masukkan Id dosen..." name="dosen_id" required="required" value="<?php echo $key->dosen_id ?>">
                      </div>
                      <div class="form-group">
                        <label for=""><b>Nama dosen</b></label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama dosen..." name="dosen_nama" required="required" value="<?php echo $key->dosen_nama ?>">
                      </div>
                      <hr>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-warning" type="submit">Edit</button>
                      <?php echo form_close(); ?>
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

                    </div>
                  </div>
                </div>
              </div>
              <!-- dosen Modal Remove-->
              <div class="modal fade" id="dosenRemoveModal<?php echo $key->nip ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus dosen</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open("dosen/delete") ?>
                    <div class="modal-body">
                      Apakah anda yakin akan menghapus data dosen <b><?php echo $key->dosen_nama ?></b> ?
                      <input type="hidden" class="form-control" name="nip" value="<?php echo $key->nip ?>">
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
            } }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->