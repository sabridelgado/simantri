<div class="container-fluid">
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah kriteria';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update kriteria';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete kriteria';
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
  <h1 class="h3 mb-2 text-gray-800">Data kriteria</h1>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

      <a href="<?php echo site_url('kriteria') ?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th style="width: 7%;">Aksi</th>
              <th>Id kriteria</th>
              <th>Nama kriteria</th>
              <th>Bobot kriteria</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1;
            foreach ($kriteria as $key) { ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td>
                  <!-- <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#kriteriaEditModal<?php echo $key->kriteria_id ?>">
                    <span class="text">
                      <i class="fa fa-edit"></i>
                    </span>
                  </a>
                  <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#kriteriaRemoveModal<?php echo $key->kriteria_id ?>">
                    <span class="text">
                      <i class="fa fa-trash"></i>
                    </span>
                  </a> -->
                  <a href="<?php echo site_url('subkriteria/id/' . $key->kriteria_id) ?>" class="btn btn-primary btn-icon-split btn-sm" title="Lihat Sub Kriteria">
                    <span class="text">
                      <i class="fa fa-eye"></i>
                    </span>
                  </a>

                </td>
                <td><?php echo $key->kriteria_id ?></td>
                <td><?php echo $key->kriteria_nama ?></td>
                <td><?php echo $key->kriteria_bobot ?></td>
              </tr>

              <!-- Looping Modal Area -->



              <div class="modal fade" id="kriteriaEditModal<?php echo $key->kriteria_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit kriteria</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open_multipart("kriteria/edit") ?>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for=""><b>Id kriteria</b></label>
                        <input type="text" class="form-control" placeholder="Masukkan Id kriteria..." name="kriteria_id" required="required" value="<?php echo $key->kriteria_id ?>">
                      </div>
                      <div class="form-group">
                        <label for=""><b>Nama kriteria</b></label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama kriteria..." name="kriteria_nama" required="required" value="<?php echo $key->kriteria_nama ?>">
                      </div>
                      <div class="form-group">
                        <label for=""><b>Bobot kriteria</b></label>
                        <input type="text" class="form-control" placeholder="Masukkan Bobot kriteria..." name="kriteria_bobot" required="required" value="<?php echo $key->kriteria_bobot ?>">
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
              <!-- kriteria Modal Remove-->
              <div class="modal fade" id="kriteriaRemoveModal<?php echo $key->kriteria_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus kriteria</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open("kriteria/delete") ?>
                    <div class="modal-body">
                      Apakah anda yakin akan menghapus data kriteria <b><?php echo $key->kriteria_nama ?></b> ?
                      <input type="hidden" class="form-control" name="kriteria_id" value="<?php echo $key->kriteria_id ?>">
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