<div class="container-fluid">
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah relasi_dosen_mk';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update relasi_dosen_mk';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete relasi_dosen_mk';
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
  <h1 class="h3 mb-2 text-gray-800">Data Relasi Dosen & Matakuliah</h1>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    <?php if ($this->session->userdata('group_id') != 4) { ?>
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#relasi_dosen_mkModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>
    <?php }?>

      <!-- relasi_dosen_mk Modal-->
      <div class="modal fade" id="relasi_dosen_mkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Relasi Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("relasi_dosen_mk/input") ?>
            <div class="modal-body">
            <div class="form-group">
                <label for=""><b>Dosen</b></label>
                <select class="form-control" name="dosen_id">
                  <option value="">.:: Pilih Dosen ::.</option>
                  <?php foreach ($dosen as $keys) {
                  ?>
                      
                  <?php 
                  } ?>
                </select>
              </div>
              <div class="form-group">
                <label for=""><b>Matakuliah</b></label>
                <select class="form-control" name="matakuliah_id">
                  <option value="">.:: Pilih Matakuliah ::.</option>
                  <?php foreach ($matakuliah as $keys) {
                  ?>
                      <option value="<?php echo $keys->matakuliah_id ?>"><?php echo $keys->matakuliah_nama ?></option>
                  <?php 
                  } ?>
                </select>
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


      <a href="<?php echo site_url('relasi_dosen_mk') ?>" class="btn btn-success btn-icon-split btn-sm">
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
              <?php if ($this->session->userdata('group_id') != 4) { ?>
              <th style="width: 10%;">#</th>
              <?php } ?>
              <th>Nama Dosen</th>
              <th>Matakuliah</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1;
            if($relasi_dosen_mk){
            foreach ($relasi_dosen_mk as $key) { ?>
              <tr>
                <td><?php echo $no; ?></td>
                <?php if ($this->session->userdata('group_id') != 4) { ?>
                <td>
                  <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#relasi_dosen_mkEditModal<?php echo $key->relasi_dosen_mk_id ?>">
                    <span class="text">
                      <i class="fa fa-edit"></i>
                    </span>
                  </a>
                  <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#relasi_dosen_mkRemoveModal<?php echo $key->relasi_dosen_mk_id ?>">
                    <span class="text">
                      <i class="fa fa-trash"></i>
                    </span>
                  </a>

                </td>
                
                <?php }
                foreach ($dosen as $keys) {
                  if ($key->dosen_id == $keys->dosen_id) { ?>
                    <td><?php echo $keys->dosen_nama ?></td>
                <?php 
                } }?>
                <?php
                foreach ($matakuliah as $keys) {
                  if ($key->matakuliah_id == $keys->matakuliah_id) { ?>
                    <td><?php echo $keys->matakuliah_nama ?></td>
                <?php 
                } }?>

              </tr>

              <!-- Looping Modal Area -->



              <div class="modal fade" id="relasi_dosen_mkEditModal<?php echo $key->relasi_dosen_mk_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit relasi_dosen_mk</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open_multipart("relasi_dosen_mk/edit") ?>
                    <div class="modal-body">
                      <div class="form-group">
                          <input type="hidden" class="form-control" placeholder="Masukkan Id relasi_dosen_mk..." name="relasi_dosen_mk_id" required="required" value="<?php echo $key->relasi_dosen_mk_id ?>">
                        <label for=""><b>Dosen</b></label>
                        <select class="form-control" name="dosen_id">
                          <option value="">.:: Pilih Dosen ::.</option>
                          <?php foreach ($dosen as $keys) {
                              if($key->dosen_id == $keys->dosen_id){
                          ?>
                              <option value="<?php echo $keys->dosen_id ?>" selected><?php echo $keys->dosen_nama ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $keys->dosen_id ?>"><?php echo $keys->dosen_nama ?></option>
                          <?php 
                          }} ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><b>Matakuliah</b></label>
                        <select class="form-control" name="matakuliah_id">
                          <option value="">.:: Pilih Matakuliah ::.</option>
                          <?php foreach ($matakuliah as $keys) {
                              if($key->matakuliah_id == $keys->matakuliah_id){
                          ?>
                              <option selected value="<?php echo $keys->matakuliah_id ?>"><?php echo $keys->matakuliah_nama ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $keys->matakuliah_id ?>"><?php echo $keys->matakuliah_nama ?></option>
                          <?php 
                          } }?>
                        </select>
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
              <!-- relasi_dosen_mk Modal Remove-->
              <div class="modal fade" id="relasi_dosen_mkRemoveModal<?php echo $key->relasi_dosen_mk_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus relasi_dosen_mk</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open("relasi_dosen_mk/delete") ?>
                    <div class="modal-body">
                      Apakah anda yakin akan menghapus data relasi_dosen_mk <b><?php echo $key->relasi_dosen_mk_nama ?></b> ?
                      <input type="hidden" class="form-control" name="relasi_dosen_mk_id" value="<?php echo $key->relasi_dosen_mk_id ?>">
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