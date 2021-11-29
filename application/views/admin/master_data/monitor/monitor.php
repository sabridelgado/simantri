<div class="container-fluid">
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah monitor';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update monitor';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete monitor';
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
  <h1 class="h3 mb-2 text-gray-800">Data monitor</h1>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

      <a href="<?php echo site_url('monitor') ?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th>Id monitor</th>
              <th>Nama monitor</th>
              <th>Bobot monitor</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1;
            foreach ($monitor as $key) { ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td>
                  <!-- <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#monitorEditModal<?php echo $key->monitor_id ?>">
                    <span class="text">
                      <i class="fa fa-edit"></i>
                    </span>
                  </a>
                  <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#monitorRemoveModal<?php echo $key->monitor_id ?>">
                    <span class="text">
                      <i class="fa fa-trash"></i>
                    </span>
                  </a> -->
                  <a href="<?php echo site_url('detaill/id/' . $key->id_sungai) ?>" class="btn btn-primary btn-icon-split btn-sm" title="Lihat Sub monitor">
                    <span class="text">
                      <i class="fa fa-eye"></i>
                    </span>
                  </a>

                </td>
                <td><?php echo $key->id_sungai ?></td>
                <td><?php echo $key->nama_sungai ?></td>
                <td><?php echo $key->intensitas_hujan ?></td>
              </tr>

              <!-- Looping Modal Area -->



              <div class="modal fade" id="monitorEditModal<?php echo $key->monitor_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit monitor</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open_multipart("monitor/edit") ?>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for=""><b>Id monitor</b></label>
                        <input type="text" class="form-control" placeholder="Masukkan Id monitor..." name="monitor_id" required="required" value="<?php echo $key->monitor_id ?>">
                      </div>
                      <div class="form-group">
                        <label for=""><b>Nama monitor</b></label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama monitor..." name="monitor_nama" required="required" value="<?php echo $key->monitor_nama ?>">
                      </div>
                      <div class="form-group">
                        <label for=""><b>Bobot monitor</b></label>
                        <input type="text" class="form-control" placeholder="Masukkan Bobot monitor..." name="monitor_bobot" required="required" value="<?php echo $key->monitor_bobot ?>">
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
              <!-- monitor Modal Remove-->
              <div class="modal fade" id="monitorRemoveModal<?php echo $key->monitor_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus monitor</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open("monitor/delete") ?>
                    <div class="modal-body">
                      Apakah anda yakin akan menghapus data monitor <b><?php echo $key->monitor_nama ?></b> ?
                      <input type="hidden" class="form-control" name="monitor_id" value="<?php echo $key->monitor_id ?>">
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