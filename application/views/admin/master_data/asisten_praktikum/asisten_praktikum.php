<div class="container-fluid">
<script>
    $(document).ready(function() {
      $('#import_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
          url: "<?php echo base_url() ?>api/asisten_praktikum_import",
          method: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            $('#file').val('');
            // alert(data);
            $("#importasisten_praktikumModal").modal('hide');
            window.location = "<?php echo site_url('asisten_praktikum'); ?>";
          }
        })
      });

    });
  </script>
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah asisten_praktikum';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update asisten_praktikum';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete asisten_praktikum';
  }else if ($this->session->flashdata('import')) {
    $message = $this->session->flashdata('import');
    $heading = '#import asisten_praktikum';
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
  <h1 class="h3 mb-2 text-gray-800">Data Asisten Praktikum</h1>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?php echo site_url('asisten_praktikum') ?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Refresh Halaman</span>
      </a>

    <?php  echo form_open_multipart("asisten_praktikum/permatakuliah") ?>
      <div class="form-group col-4 pt-3">
        <div class="row">
        <select class="form-control" name="matakuliah_id">
          <option value="">.:: Pilih Matakuliah ::.</option>
          <?php 
            foreach ($matakuliah as $keys) {
            if ($keys->matakuliah_id == $key->matakuliah_id){
          ?>
            <option value="<?php echo $keys->matakuliah_id ?>" selected><?php echo $keys->matakuliah_nama ?></option>
          <?php 
          } else { ?>
          <option value="<?php echo $keys->matakuliah_id ?>"><?php echo $keys->matakuliah_nama ?></option>
            <?php
          } }?>
        </select>

        <br><br>

          <select class="form-control" name="tahun_ajaran_id">
            <option value="">.:: Pilih Tahun Ajaran ::.</option>
            <?php 
              foreach ($tahun_ajaran as $keys) {
              if ($keys->tahun_ajaran_id == $key->tahun_ajaran_id){
            ?>
              <option value="<?php echo $keys->tahun_ajaran_id ?>" selected><?php echo $keys->tahun_ajaran_nama ?></option>
            <?php 
            } else { ?>
            <option value="<?php echo $keys->tahun_ajaran_id ?>"><?php echo $keys->tahun_ajaran_nama ?></option>
              <?php
            } }?>
          </select>
        </div>
      </div>
      <button class="btn btn-primary col-4" type="submit">Tampil</button>
      
    <?php echo form_close(); ?>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%;">No</th>
              <?php if ($this->session->userdata('group_id') == 1 || $this->session->userdata('group_id') == 2) { ?>
              <th style="width: 12%;">#</th>
              <?php } ?>
              <th>Nim Mahasiswa</th>
              <th>Nama Mahasiswa</th>
              <th>Matakuliah</th>
              <th>Tahun Ajaran</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1;
            foreach ($asisten_praktikum as $key) { ?>
              <tr>
                <td><?php echo $no; ?></td>
                <?php if ($this->session->userdata('group_id') == 1 || $this->session->userdata('group_id') == 2) { ?>
                <td>
                  <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#asisten_praktikumEditModal<?php echo $key->asisten_praktikum_id ?>">
                    <span class="text">
                      <i class="fa fa-edit"></i>
                    </span>
                  </a>
                  <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#asisten_praktikumRemoveModal<?php echo $key->asisten_praktikum_id ?>">
                    <span class="text">
                      <i class="fa fa-trash"></i>
                    </span>
                  </a>
                </td>
                <?php } ?>
                <?php 
                  foreach ($mahasiswa as $keys) {
                    if ($key->mahasiswa_nim == $keys->mahasiswa_nim) { ?>
                      <td><?php echo $keys->mahasiswa_nim ?></td>
                  <?php }
                  } ?>
                  <?php
                  foreach ($mahasiswa as $keys) {
                    if ($key->mahasiswa_nim == $keys->mahasiswa_nim) { ?>
                      <td><?php echo $keys->mahasiswa_nama ?></td>
                  <?php }
                  } ?>
                  <?php
                  foreach ($matakuliah as $keys) {
                    if ($key->matakuliah_id == $keys->matakuliah_id) { ?>
                      <td><?php echo $keys->matakuliah_nama ?></td>
                  <?php }
                  }
                  ?>
                  <?php
                  foreach ($tahun_ajaran as $keys) {
                    if ($key->tahun_ajaran_id == $keys->tahun_ajaran_id) { ?>
                      <td><?php echo $keys->tahun_ajaran_nama ?></td>
                  <?php }
                  }
                  ?>
                
              </tr>

              <!-- Looping Modal Area -->



              <div class="modal fade" id="asisten_praktikumEditModal<?php echo $key->asisten_praktikum_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit asisten_praktikum</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open_multipart("asisten_praktikum/edit") ?>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for=""><b>Mahasiswa</b></label>
                        <select class="form-control" name="mahasiswa_nim">
                          <option value="">.:: Pilih Mahasiswa ::.</option>
                          <?php foreach ($mahasiswa as $keys) { 
                            if($key->mahasiswa_nim == $keys->mahasiswa_nim){?>
                              <option value="<?php echo $keys->mahasiswa_nim ?>" selected><?php echo $keys->mahasiswa_nama ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $keys->mahasiswa_nim ?>"><?php echo $keys->mahasiswa_nama ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><b>Matakuliah</b></label>
                        <select class="form-control" name="matakuliah_id">
                          <option value="">.:: Pilih Matakuliah ::.</option>
                          <?php foreach ($matakuliah as $keys) { 
                            if($key->matakuliah_id == $keys->matakuliah_id){?>
                              <option value="<?php echo $keys->matakuliah_id ?>" selected><?php echo $keys->matakuliah_nama ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $keys->matakuliah_id ?>"><?php echo $keys->matakuliah_nama ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="asisten_praktikum_id" value="<?php echo $key->asisten_praktikum_id ?>">
                        <label for=""><b>Tahun Ajaran</b></label>
                        <select class="form-control" name="tahun_ajaran_id">
                          <option value="">.:: Pilih Tahun ajaran ::.</option>
                          <?php foreach ($tahun_ajaran as $keys) { 
                            if($key->tahun_ajaran_id == $keys->tahun_ajaran_id){?>
                              <option value="<?php echo $keys->tahun_ajaran_id ?>" selected><?php echo $keys->tahun_ajaran_nama ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $keys->tahun_ajaran_id ?>"><?php echo $keys->tahun_ajaran_nama ?></option>
                          <?php } } ?>
                        </select>
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
              <!-- asisten_praktikum Modal Remove-->
              <div class="modal fade" id="asisten_praktikumRemoveModal<?php echo $key->asisten_praktikum_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus asisten_praktikum</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open("asisten_praktikum/delete") ?>
                    <div class="modal-body">
                      Apakah anda yakin akan menghapus data asisten_praktikum <b><?php echo $key->asisten_praktikum_nama ?></b> ?
                      <input type="hidden" class="form-control" name="asisten_praktikum_id" value="<?php echo $key->asisten_praktikum_id ?>">
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