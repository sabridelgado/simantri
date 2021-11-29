<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah Slider';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update Slider';
    }else if($this->session->flashdata('delete')){
      $message = $this->session->flashdata('delete');
      $heading = '#Delete Slider';  
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
  <h1 class="h3 mb-2 text-gray-800">Data Slider</h1>
  <p class="mb-4">Data berikut merupakan kumpulan Slider yang berlaku di <b>Dinas Lingkungan Hidup dan Kehutanan</b> - Kota Kendari</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#sliderModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- slider Modal-->
      <div class="modal fade" id="sliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Slider Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open_multipart("slider/input")?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Judul Slider</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Judul Slider..." name="slider_big_title" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Text Slider</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Slider..." name="slider_text" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Gambar Slider</b></label>
                <input type="file" class="form-control" name="userfile">
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


      <a href="<?php echo site_url('slider')?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th style="width: 19%;">#</th>
              <th>Judul Slider</th>
              <th>Text Slider</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no=1; foreach($slider as $key){?>
            <tr>
              <td><?php echo $no;?></td>
              <td>
                <a href="<?php echo base_url()?>upload/slider/<?php echo $key->slider_picture?>" class="btn btn-info btn-icon-split btn-sm" target="_blank">
                  <span class="text">
                    <i class="fa fa-eye"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#sliderEditModal<?php echo $key->slider_id?>">
                  <span class="text">
                    <i class="fa fa-edit"></i>
                  </span>
                </a>
                <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#sliderRemoveModal<?php echo $key->slider_id?>">
                  <span class="text">
                    <i class="fa fa-trash"></i>
                  </span>
                </a>


              </td>
              <td><?php echo $key->slider_big_title?></td>
              <td><?php echo $key->slider_text?></td>
            </tr>

            <!-- Looping Modal Area -->

            <!-- slider Modal Edit-->
            <div class="modal fade" id="sliderEditModal<?php echo $key->slider_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit slider</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open_multipart("slider/edit")?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for=""><b>Judul Slider</b></label>
                      <input type="hidden" class="form-control" name="slider_id" value="<?php echo $key->slider_id?>">
                      <input type="hidden" class="form-control" name="slider_picture" value="<?php echo $key->slider_picture?>">
                      <input type="text" class="form-control" placeholder="Masukkan Nama slider..." name="slider_big_title" value="<?php echo $key->slider_big_title?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for=""><b>Text Slider</b></label>
                     
                      <input type="text" class="form-control" placeholder="Masukkan Texts slider..." name="slider_text" value="<?php echo $key->slider_text?>" required="required">
                    </div>
                    <div class="form-group">
                      <label for=""><b>File Slider</b></label>
                      <input type="file" class="form-control" name="userfile">
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

            <!-- slider Modal Remove-->
            <div class="modal fade" id="sliderRemoveModal<?php echo $key->slider_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Slider</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php echo form_open("slider/delete")?>
                  <div class="modal-body">
                    Apakah anda yakin akan menghapus data Slider <b><?php echo $key->slider_big_title ?></b> ?
                    <input type="hidden" class="form-control" name="slider_id" value="<?php echo $key->slider_id?>">
                    <input type="hidden" class="form-control" name="slider_big_title" value="<?php echo $key->slider_big_title?>">
                    <input type="hidden" class="form-control" name="slider_picture" value="<?php echo $key->slider_picture?>">
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