<div class="container-fluid">
  <?php 
    if($this->session->flashdata('add')){ 
      $message = $this->session->flashdata('add');
      $heading = '#Tambah User';
    }else if($this->session->flashdata('update')){ 
      $message = $this->session->flashdata('update');
      $heading = '#Update User';
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
  <h1 class="h3 mb-2 text-gray-800">Data Profil : <?php echo $profile[0]->user_fullname?></h1>
  
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      

      <a href="<?php echo site_url('user/profile')?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Refresh Halaman</span>
      </a>
    </div>
    <div class="card-body">
      <?php echo form_open_multipart("user/update_profile")?>
      <div style="overflow-x: auto;">
        <div class="row">
          <div class="col-md-3">
            <?php if($this->session->userdata('user_photo')!=""){?>
              <center><img src="<?php echo base_url()?>upload/user/<?php echo $this->session->userdata('user_photo');?>" style="border-radius: 50%" alt="User profile picture" height="200"></center>
              <?php }else{ ?>
              <center><img src="<?php echo base_url()?>upload/user/default_image.png" style="border-radius: 50%" alt="User profile picture" height="200"></center>
              <?php } ?>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  Nama Pengguna<br> <b><?php echo $this->session->userdata('user_fullname')?></b>
                </li>
                <li class="list-group-item">
                  Group<br> <b><?php  echo "<small class='text-success'><b>".$profile[0]->group_name."</b></small>"; ?></b>
                </li>
                
              </ul>
              <br>
              <br>
          </div>
          <div class="col-md-9">
            <table id="example1" class="table table-bordered">
              <thead>
                <tr class="bg-blue">
                  <th colspan="2" class="text-danger">Data Pengguna </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="width: 30%">Username</td>
                  <td><input type="text" class="form-control" readonly placeholder="Username" name="user_name" value="<?php echo $profile[0]->user_name;?>"></td>
                </tr>
                <tr>
                  <td style="width: 30%">Nama</td>
                  <td><input type="text" class="form-control" placeholder="Nama Pengguna" name="user_fullname" value="<?php echo $profile[0]->user_fullname;?>"></td>
                </tr>
                
               
                <tr>
                  <td style="width: 30%">Foto</td>
                  <td><input type="file" class="form-control" name="userfile"></td>
                </tr>
                <tr>
                  <td style="width: 30%">Password</td>
                  <td>
                    <input type="hidden" class="form-control" name="user_id"  value="<?php echo $profile[0]->user_id?>">
                    <input type="hidden" class="form-control" name="oldpassword"  value="<?php echo $profile[0]->user_password?>">
                    <input type="password" class="form-control" name="checkoldpassword" placeholder="Password Lama" style="margin-bottom: 3px;">
                    <input type="password" class="form-control" name="password" placeholder="Password Baru" style="margin-bottom: 3px;">
                    <input type="password" class="form-control" name="matchpassword" placeholder="Konfirmasi Password Baru">
                  </td>
                </tr>
                

              </tbody>
            </table>
            <hr>
            <button type="submit" class="btn btn-success btn-flat pull-right" style="width: 100%"><i class="ti-save"></i> Update Profil</button><br><br><br>
          </div>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>

</div>
<!-- /.container-fluid -->