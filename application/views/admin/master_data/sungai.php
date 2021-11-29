<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah sungai';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update sungai';
    }else if($this->session->flashdata('delete')){
      $message = $this->session->flashdata('delete');
      $heading = '#Delete sungai';  
    } 
  ?>
  <?php if(isset($message)){ ?>
  <script>
    $(document).ready(function(){
      $.toast({
        text : '<?php echo $message;?>',
        heading : '<?php echo $heading;?>',
        position : 'top-right',
        width : 'auto',
        showHideTransition : 'slide',
        icon: 'info',
        hideAfter: 5000
      })
    });
  </script>
  <?php } ?>
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data sungai</h1>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#sungaiModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- sungai Modal-->
      <div class="modal fade" id="sungaiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah sungai Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open("sungai/input")?>
            <div class="modal-body">
              <div class="form-sungai">
                <label for=""><b>Nama sungai</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama sungai..." name="nama_sungai" required="required">
              </div>
              <div class="form-sungai">
                <label for=""><b>Lokasi</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Lokasi..." name="lokasi" required="required">
              </div>
              <div class="form-sungai">
                <label for=""><b>Kelurahan</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Kelurahan..." name="kelurahan" required="required">
              </div>
              <div class="form-sungai">
                <label for=""><b>Longitude</b></label>
                <input type="text" class="form-control" placeholder="Masukkan longitude..." name="longitude" required="required">
              </div>
              <div class="form-sungai">
                <label for=""><b>Latitude</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Latitude..." name="latitude" required="required">
              </div>
              <div class="form-sungai">
                <label for=""><b>Deskripsi</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Deskripsi..." name="deskripsi" required="required">
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


      <a href="<?php echo site_url('sungai')?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th style="width: 7%;">#</th>
              <th>Nama Sungai</th>
              <th>Lokasi</th>
              <th>Kelurahan</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Deskripsi</th>
            





            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($sungai as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              <td>
                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#sungaiEditModal<?php echo $key->id_sungai?>">
                  <span class="text">
                    <i class="fa fa-edit"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#sungaiRemoveModal<?php echo $key->id_sungai?>">
                  <span class="text">
                    <i class="fa fa-trash"></i>
                  </span>
                </a>

              </td>
              <td><?php echo $key->nama_sungai?></td>
              <td><?php echo $key->lokasi?></td>
              <td><?php echo $key->kelurahan?></td>
              <td><?php echo $key->longitude?></td>
              <td><?php echo $key->latitude?></td>
              <td><?php echo $key->deskripsi?></td>
              


              

            </tr>

            <!-- Looping Modal Area -->

            <!-- sungai Modal Edit-->
            <div class="modal fade" id="sungaiEditModal<?php echo $key->id_sungai?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit sungai</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("sungai/edit")?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for=""><b>Nama sungai</b></label>
                      <input type="hidden" class="form-control" name="id_sungai" value="<?php echo $key->id_sungai?>">
                      <input type="text" class="form-control" placeholder="Masukkan Nama sungai..." name="nama_sungai" value="<?php echo $key->nama_sungai?>" required="required">
                    </div>

                    <div class="form-group">
                      <label for=""><b>lokasi</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Lokasi..." name="lokasi" value="<?php echo $key->lokasi?>" required="required">
                    </div>

                    <div class="form-group">
                      <label for=""><b>Kelurahan</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan Kelurahan..." name="kelurahan" value="<?php echo $key->kelurahan?>" required="required">
                    </div>

                    <div class="form-group">
                      <label for=""><b>longitude</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan longitude..." name="longitude" value="<?php echo $key->longitude?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for=""><b>latitude</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan latitude..." name="latitude" value="<?php echo $key->latitude?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Deskripsi</b></label>
                      <input type="text" class="form-control" placeholder="Masukkan deskripsi..." name="deskripsi" value="<?php echo $key->deskripsi?>" required="required">
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

            <!-- sungai Modal Remove-->
            <div class="modal fade" id="sungaiRemoveModal<?php echo $key->id_sungai?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus sungai</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("sungai/delete")?>
                  <div class="modal-body">
                    Apakah anda yakin akan menghapus data sungai <b><?php echo $key->nama_sungai ?></b> ?
                    <input type="hidden" class="form-control" name="id_sungai" value="<?php echo $key->id_sungai?>">
                    <input type="hidden" class="form-control" name="nama_sungai" value="<?php echo $key->nama_sungai?>">
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


            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->