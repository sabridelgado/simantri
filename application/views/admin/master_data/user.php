<div class="container-fluid">
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah User';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update User';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete User';
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
  <h1 class="h3 mb-2 text-gray-800">Data User</h1>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#userModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- user Modal-->
      <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah User Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open("user/input") ?>
            <div class="modal-body">

              <div class="form-group">
                <label for=""><b>Nama Lengkap</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap Pengguna..." name="user_fullname" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Group</b></label>
                <select class="form-control" name="group_id">
                  <option value="">.:: Pilih Group ::.</option>
                  <?php foreach ($group as $keys) { ?>
                    <option value="<?php echo $keys->group_id ?>">
                      <?php echo $keys->group_name ?></option>
                  <?php } ?>

                </select>
              </div>
              <hr>
              <div class="form-group">
                <label for=""><b>Username/Akun</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Username/Akun..." name="user_name" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Password/Kata Sandi</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Password..." name="user_password" required="required">
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


      <a href="<?php echo site_url('user') ?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th>Username</th>
              <th>Fullname</th>
              <th>Group</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1;
            foreach ($user as $key) { ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td>
                  <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#userEditModal<?php echo $key->user_id ?>">
                    <span class="text">
                      <i class="fa fa-edit"></i>
                    </span>
                  </a>
                  <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#userRemoveModal<?php echo $key->user_id ?>">
                    <span class="text">
                      <i class="fa fa-trash"></i>
                    </span>
                  </a>

                </td>
                <td><?php echo $key->user_name ?></td>
                <td><?php echo $key->user_fullname ?></td>
                <td><?php echo $key->group_name ?></td>
              </tr>

              <!-- Looping Modal Area -->

              <!-- user Modal Edit-->
              <div class="modal fade" id="userEditModal<?php echo $key->user_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open("user/edit") ?>
                    <div class="modal-body">


                      <div class="form-group">
                        <label for=""><b>Nama Lengkap</b></label>
                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $key->user_id ?>">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap Pengguna..." name="user_fullname" required="required" value="<?php echo $key->user_fullname ?>">
                      </div>
                      <div class="form-group">
                        <label for=""><b>Group</b></label>
                        <select class="form-control" name="group_id">
                          <option value="">.:: Pilih Group ::.</option>
                          <?php foreach ($group as $keys) {
                            if ($key->group_id == $keys->group_id) {
                          ?>
                              <option value="<?php echo $keys->group_id ?>" selected><?php echo $keys->group_name ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $keys->group_id ?>"><?php echo $keys->group_name ?></option>
                          <?php }
                          } ?>

                        </select>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label for=""><b>Username/Akun</b></label>
                        <input type="text" class="form-control" placeholder="Masukkan Username/Akun..." name="user_name" required="required" value="<?php echo $key->user_name ?>">
                      </div>
                      <div class="form-group">
                        <label for=""><b>Password/Kata Sandi</b></label>
                        <input type="text" class="form-control" placeholder="Masukkan Password..." name="user_password">
                        <br><span class="text-danger" style="font-size: 12px">*Isi Field password jika ingin mengganti password, jika tidak kosongkan</span>
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

              <!-- user Modal Remove-->
              <div class="modal fade" id="userRemoveModal<?php echo $key->user_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open("user/delete") ?>
                    <div class="modal-body">
                      Apakah anda yakin akan menghapus data User <b><?php echo $key->user_name ?></b> ?
                      <input type="hidden" class="form-control" name="user_id" value="<?php echo $key->user_id ?>">
                      <input type="hidden" class="form-control" name="user_name" value="<?php echo $key->user_name ?>">
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