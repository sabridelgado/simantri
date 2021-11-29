
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?php echo base_url()?>upload/setting/<?php echo $settings_app[0]->setting_logo?>" >
  <title><?php echo $settings_app[0]->setting_appname?></title>
  <!-- CSS Here -->
  <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
  <style type="text/css">
    .fontPoppins{
      font-family: 'Poppins', sans-serif;
    }

    .fontFredoka{
      font-family: 'Fredoka One', cursive;
    }
  </style>

</head>

<body class="bg-gradient-info fontPoppins">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9"><br><br>
        <center>
          <!-- <img src="<?php echo base_url()?>upload/setting/<?php echo $settings_app[0]->setting_logo?>" height="80" style="padding-top: 20px;"><br> -->
          <h2 style="color: white" class="fontFredoka"><?php echo $settings_app[0]->setting_appname?></h2>
          
          <span style="color: white"><?php echo $settings_app[0]->setting_owner_name?></span>
        </center>
        <hr>
        <div class="card o-hidden border-0 shadow-lg my-5" style="margin-top: 0px">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4 fontFredoka">Selamat Datang!</h1>
                  </div>
                    <?php echo form_open("home/login", "class='user'");
                      if($this->session->flashdata('login')){
                        echo "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-ban'></i> Oopss!</h4>".$this->session->flashdata('login')."</div>";
                      }
                    ?>
                    <div class="asset">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username *" name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan Kata Sandi *" name="password">
                    </div>
                    
                    <button class="btn btn-primary btn-user btn-block">
                      Masuk
                    </button>
                    
                  <?php echo form_close(); ?>
                  <hr>
                  <center style="font-size: 12px;">Copyright @2021, <?php echo $settings_app[0]->setting_origin_app;?><br>Support By <a href="#" class="text-danger" >Gagas Aliansi Cakrawala</a></center>
                  <!-- <div class="text-center">
                    <a class="small" href="#">Lupa Password?</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript Here -->
  <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/sb-admin-2.min.js"></script>
</body>
</html>
