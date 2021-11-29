<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah User';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update Setting';
      $icon    = 'info';
    }else if($this->session->flashdata('delete')){
      $message = $this->session->flashdata('delete');
      $heading = '#Delete User';  
    } else if($this->session->flashdata('gagal')){
      $message = $this->session->flashdata('gagal');
      $heading = '#Update User';  
      $icon    = 'error';
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
        icon: '<?php echo $icon?>',
        hideAfter: 5000
      })
    });
  </script>
  <?php } ?>
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Setting Aplikasi</h1>
  
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      

      <a href="<?php echo site_url('setting')?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Refresh Halaman</span>
      </a>
    </div>
    <div class="card-body">
      <?php echo form_open_multipart("setting/update_setting")?>
      <div style="overflow-x: auto;">
        <div class="row">
          
          <div class="col-md-12">
            <table id="example1" class="table table-bordered">
              <thead>
                <tr class="bg-blue">
                  <th colspan="2" class="text-danger">Data Informasi Sistem </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="width: 30%">Nama Aplikasi</td>
                  <td>
                      <input type="hidden" class="form-control" name="setting_id" value="<?php echo $setting[0]->setting_id;?>">
                      <input type="text" class="form-control" placeholder="Nama Aplikasi" name="setting_appname" value="<?php echo $setting[0]->setting_appname;?>">
                  </td>
                </tr>
                <tr>
                  <td style="width: 30%">Singkatan Nama Aplikasi</td>
                  <td><input type="text" class="form-control" placeholder="Singakatan Nama" name="setting_short_appname" value="<?php echo $setting[0]->setting_short_appname;?>"></td>
                </tr>
                <tr>
                  <td style="width: 30%">Nama Daerah</td>
                  <td><input type="text" class="form-control" placeholder="Nama Daerah" name="setting_origin_app" value="<?php echo $setting[0]->setting_origin_app;?>"></td>
                </tr>
                <tr>
                  <td style="width: 30%">Pemilik Aplikasi</td>
                  <td><input type="text" class="form-control" placeholder="Pemilik Aplikasi" name="setting_owner_name" value="<?php echo $setting[0]->setting_owner_name;?>"></td>
                </tr>

                <tr>
                  <td style="width: 30%">Nomor Telepon</td>
                  <td><input type="text" class="form-control" placeholder="Nomor Telepon" name="setting_phone" value="<?php echo $setting[0]->setting_phone;?>"></td>
                </tr>
                <tr>
                  <td style="width: 30%">Email</td>
                  <td><input type="text" class="form-control" placeholder="Email" name="setting_email" value="<?php echo $setting[0]->setting_email;?>"></td>
                </tr>
                <tr>
                  <td style="width: 30%">Alamat</td>
                  <td>
                    <textarea class="form-control" name="setting_address" rows="4"><?php echo $setting[0]->setting_address?></textarea>
                  </td>
                </tr>
                
               
                <tr>
                  <td style="width: 30%">Logo Aplikasi</td>
                  <td>
                    <input type="file" class="form-control" name="userfile">
                    <?php
                      if($setting[0]->setting_logo !=""){
                    ?>  
                    <br><br>  
                    <img src="<?php echo base_url()?>upload/setting/<?php echo $setting[0]->setting_logo ?>" height="200">
                    <?php  }else{ echo "<span class='text-danger'>Belum Ada Logo</span>";}
                    ?>
                  </td>
                </tr>
                
                

              </tbody>
            </table>
            <hr>
            <button type="submit" class="btn btn-success btn-flat pull-right" style="width: 100%"><i class="ti-save"></i> Update Informasi Aplikasi</button><br><br><br>
          </div>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>

</div>
<!-- /.container-fluid -->