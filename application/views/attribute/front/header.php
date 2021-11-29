<!DOCTYPE html>

<html lang="en">

  <head>

    <title>Website DLHK- Kota Kendari</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/settinglogo11.png">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/css/open-iconic-bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/css/animate.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/css/owl.carousel.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/css/jquery.timepicker.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/css/flaticon.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/css/icomoon.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/css/style.css">

  </head>

  <body>

     <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">

      <div class="container-fluid px-md-4   ">

        <a class="navbar-brand" href="<?php echo site_url('front')?>">DLHK Kota Kendari</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">

        <span class="oi oi-menu"></span> Menu

        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">

          <ul class="navbar-nav ml-auto">

            <li class="nav-item"><a href="<?php echo base_url()?>" class="nav-link">Beranda</a></li>

            <li class="nav-item dropdown">

                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profil</a>

                <div class="dropdown-menu">

                    <a href="<?php echo site_url('front/visi_misi')?>" class="dropdown-item">Visi Misi</a>

                    <a href="<?php echo site_url('front/struktur_organisasi')?>" class="dropdown-item">Struktur Organisasi</a>

                    <div class="dropdown-divider"></div>

                    <a href="<?php echo site_url('front/profil_pejabat')?>"class="dropdown-item">Profile Pejabat</a>

                </div>

            </li>

            <li class="nav-item"><a href="<?php echo site_url('front/alur')?>" class="nav-link">Alur</a></li>

            <li class="nav-item"><a href="<?php echo site_url('front/regulasi')?>" class="nav-link">Regulasi</a></li>

            <li class="nav-item"><a href="<?php echo site_url('front/berita')?>" class="nav-link">Berita</a></li>

            <li class="nav-item dropdown">

                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pengaduan</a>

                <div class="dropdown-menu">

                    <a href="<?php echo site_url('front/create_pengaduan')?>" class="dropdown-item">Buat Pengaduan</a>

                    <a href="<?php echo site_url('front/list_pengaduan')?>" class="dropdown-item">List Pengaduan</a>

                </div>

            </li>

            <li class="nav-item"><a href="<?php echo site_url('front/peta')?>" class="nav-link">Peta</a></li>

            <li class="nav-item dropdown">

                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Seniman Proper</a>

                <div class="dropdown-menu">

                    <a href="<?php echo site_url('front/create_proper')?>" class="dropdown-item">Daftar</a>

                    <a href="<?php echo site_url('front/list_proper')?>" class="dropdown-item">List Seniman Proper</a>

                </div>

            </li>

            

            <li class="nav-item cta cta-colored"><a href="<?php echo site_url('home')?>" class="nav-link">Login</a></li>

          </ul>

        </div>

      </div>

    </nav>

    <div class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url()?>assets/front/images/bg2.jpg');" data-stellar-background-ratio="0.5">

      <div class="overlay"></div>

      <div class="container">

        <div class="row no-gutters slider-text align-items-end justify-content-start">

          <div class="col-md-12 ftco-animate text-center mb-5">

            <?php if($this->uri->segment(2)=="visi_misi"){?>

            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Profil  </span> </p>

            <h1 class="mb-3 bread">Visi Misi</h1>

            <?php }elseif($this->uri->segment(2)=="struktur_organisasi"){?>

            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Profil  </span> </p>

            <h1 class="mb-3 bread">Struktur Organisasi</h1>

            <?php }elseif($this->uri->segment(2)=="profil_pejabat"){?>

            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Profil  </span> </p>

            <h1 class="mb-3 bread">Profil Pejabat</h1>

            <?php }elseif($this->uri->segment(2)=="alur"){?>

            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Alur  </span> </p>

            <h1 class="mb-3 bread">Data Alur</h1>

            <?php }elseif($this->uri->segment(2)=="regulasi"){?>

            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Regulasi  </span> </p>

            <h1 class="mb-3 bread">Regulasi</h1>

            <?php }elseif($this->uri->segment(2)=="regulasi_detail"){?>

            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Regulasi  </span> </p>

            <h1 class="mb-3 bread">Detail Regulasi</h1>

            <?php }elseif($this->uri->segment(2)=="berita"){?>

            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Berita  </span> </p>

            <h1 class="mb-3 bread">Berita</h1>

            <?php }elseif($this->uri->segment(2)=="berita_detail"){?>

            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Berita  </span> </p>

            <h1 class="mb-3 bread">Detail Berita</h1>

            <?php }elseif($this->uri->segment(2)=="create_pengaduan"){?>

            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Pengaduan  </span> </p>

            <h1 class="mb-3 bread">Buat Pengaduan</h1>

            <?php }elseif($this->uri->segment(2)=="list_pengaduan"){?>

            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Pengaduan  </span> </p>

            <h1 class="mb-3 bread">List Pengaduan</h1>

            <?php }elseif($this->uri->segment(2)=="detail_pengaduan"){?>

            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Pengaduan  </span> </p>

            <h1 class="mb-3 bread">Detail Pengaduan</h1>

            <?php }elseif($this->uri->segment(2)=="create_proper"){?>

            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Seniman Proper  </span> </p>

            <h1 class="mb-3 bread">Daftar Akun</h1>

            <?php }elseif($this->uri->segment(2)=="list_proper"){?>

            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Seniman Proper  </span> </p>

            <h1 class="mb-3 bread">List Data Proper</h1>

            <?php }elseif($this->uri->segment(2)=="peta"){?>

            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Peta  </span> </p>

            <h1 class="mb-3 bread">Peta Usaha Seniman Proper</h1>

            <?php }?>

          </div>

        </div>

      </div>

    </div>