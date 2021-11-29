<div class="container-fluid">
<script>
    $(document).ready(function() {
      $('#import_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
          url: "<?php echo base_url() ?>api/monitoring_import",
          method: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            $('#file').val('');
            // alert(data);
            $("#importmonitoringModal").modal('hide');
            window.location = "<?php echo site_url('monitoring'); ?>";
          }
        })
      });

    });
  </script>
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah monitoring';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update monitoring';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete monitoring';
  }else if ($this->session->flashdata('import')) {
    $message = $this->session->flashdata('import');
    $heading = '#import monitoring';
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
  <h1 class="h3 mb-2 text-gray-800">Data monitoring</h1>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#monitoringModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- monitoring Modal-->
      <div class="modal fade" id="monitoringModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah monitoring Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("monitoring/input") ?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Id monitoring</b></label>
                <input type="text" class="form-control" placeholder="Masukkan id monitoring..." name="monitoring_id" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Nama monitoring</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama monitoring..." name="monitoring_nama" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>SKS</b></label>
                <input type="text" class="form-control" placeholder="Masukkan SKS..." name="monitoring_sks" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Semester</b></label>
                <input type="text" class="form-control" placeholder="Masukkan semester..." name="monitoring_semester" required="required">
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
      
      <!-- Import Data monitoring Modal-->
      <div class="modal fade" id="importmonitoringModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Import Data monitoring</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <form method="post" id="import_form" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <a href="<?php echo base_url("upload/excel/format_monitoring.xlsx"); ?>">Download Format</a><br>
                  <label for=""><b>Import Data</b></label>
                  <input type="file" class="form-control" name="file" id="file" required accept=".xls, .xlsx">
                </div>

              </div>
              <div class="modal-footer">
                <input type="submit" name="import" value="Import" class="btn btn-primary" />
            </form>

            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

          </div>
        </div>
      </div>
    </div>

      <a href="<?php echo site_url('monitoring') ?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th>Nama Sungai</th>
              <th>Rain Level</th>
              <th>Water Level</th>
              <th>Web Gis</th>
              <th>Detail</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1;
            foreach ($monitoring as $key) { ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td>
                  <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#monitoringEditModal<?php echo $key->['id_sungai'] ?>">
                    <span class="text">
                      <i class="fa fa-edit"></i>
                    </span>
                  </a>
                  <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#monitoringRemoveModal<?php echo $key->['id_sungai'] ?>">
                    <span class="text">
                      <i class="fa fa-trash"></i>
                    </span>
                  </a>

                </td>
                <td><?php echo $key->nama_sungai ?></td>
                <td><?php echo $key->intensitas_hujan ?></td>
                <td><?php echo $key->ketinggian_sungai ?>Cm</td>
                <td></td>
                <td></td>

                
              </tr>

              <!-- Looping Modal Area -->



              <div class="modal fade" id="monitoringEditModal<?php echo $key->monitoring_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit monitoring</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open_multipart("monitoring/edit") ?>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for=""><b>Nim monitoring</b></label>
                        <input type="text" class="form-control" name="monitoring_id" required="required" value="<?php echo $key->monitoring_id ?>">
                      </div>
                      <div class="form-group">
                        <label for=""><b>Nama monitoring</b></label>
                        <input type="text" class="form-control" name="monitoring_nama" required="required" value="<?php echo $key->monitoring_nama ?>">
                      </div>
                      <div class="form-group">
                        <label for=""><b>SKS</b></label>
                        <input type="text" class="form-control" name="monitoring_sks" required="required" value="<?php echo $key->monitoring_sks ?>">
                      </div>
                      <div class="form-group">
                        <label for=""><b>Semester</b></label>
                        <input type="text" class="form-control" name="monitoring_semester" required="required" value="<?php echo $key->monitoring_semester ?>">
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
              <!-- monitoring Modal Remove-->
              <div class="modal fade" id="monitoringRemoveModal<?php echo $key->monitoring_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus monitoring</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <?php echo form_open("monitoring/delete") ?>
                    <div class="modal-body">
                      Apakah anda yakin akan menghapus data monitoring <b><?php echo $key->monitoring_nama ?></b> ?
                      <input type="hidden" class="form-control" name="monitoring_id" value="<?php echo $key->monitoring_id ?>">
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