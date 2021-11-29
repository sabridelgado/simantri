<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Website DLHK- Kota Kendari</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/settinglogo11.png">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
    <div class="hero-wrap img" style="background-image: url(<?php echo base_url()?>assets/front/images/bg2.jpg);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-10 d-flex align-items-center ftco-animate">
            <div class="text text-center pt-5 mt-md-5">
              
              <h1 class="mb-5">Website Resmi <br>Dinas Lingkungan Hidup dan Kehutanan Kota Kendari</h1>
              <div class="ftco-counter ftco-no-pt ftco-no-pb">
              
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="category-wrap">
              <div class="row no-gutters">
                
                <div class="col-md-3">
                  <div class="top-category text-center">
                    <h3><a href="<?php echo base_url()?>assets/front/#">Pengaduan</a></h3>
                    <span class="icon fa fa-bullhorn"></span><br><br>
                    <p><span class="number"><?php echo $total_aduan?></span> </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="top-category text-center">
                    <h3><a href="<?php echo base_url()?>assets/front/#">Alur</a></h3>
                    <span class="icon fa fa-sitemap"></span><br><br>
                    <p><span class="number"><?php echo $total_alur?></span> </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="top-category text-center">
                    <h3><a href="<?php echo base_url()?>assets/front/#">Regulasi</a></h3>
                    <span class="icon fa fa-file-alt"></span><br><br>
                    <p><span class="number"><?php echo $total_rules?></span> </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="top-category text-center">
                    <h3><a href="<?php echo base_url()?>assets/front/#">Perusahaan</a></h3>
                    <span class="icon fa fa-map-marker-alt"></span><br><br>
                    <p><span class="number"><?php echo $total_proper?></span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 pr-lg-5">
            <div class="row justify-content-center pb-3">
              <div class="col-md-12 heading-section ftco-animate">
                <span class="subheading">Regulasi</span>
                <h2 class="mb-4">Daftar Regulasi</h2>
              </div>
            </div>
            <div class="row">
              <?php foreach($rules as $rl){?>
              <div class="col-md-12 ftco-animate">
                <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                  <div class="one-third mb-4 mb-md-0">
                    <div class="job-post-item-header align-items-center">
                      <span class="subadge">Kategori : <?php echo $rl->rules_category_name?></span>
                      <h2 class="mr-3 text-black"><a href="#"><?php echo $rl->rules_name?></a></h2>
                    </div>
                    
                  </div>
                  <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                    
                    <a href="<?php echo base_url()?>upload/rules/<?php echo $rl->rules_file?>" target="_blank" class="btn btn-primary py-2">Download</a>
                  </div>
                </div>
              </div>
              <?php } ?>
              
              <div class="col-md-12">
                <a href="<?php echo site_url('front/regulasi')?>" class="btn btn-danger py-2">Tampilkan Lebih Banyak</a>
              </div>
              
              
              
            </div>
          </div>
          
        </div>
      </div>
    </section>
    
    <section class="ftco-section ftco-candidates bg-primary">
      <div class="container">
        <div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section heading-section-white text-center ftco-animate">
            <span class="subheading">Pegawai</span>
            <h2 class="mb-4">Profile Pegawai DLHK Kota Kendari</h2>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="carousel-candidates owl-carousel">
              <?php foreach($employee as $emp){?>
              <div class="item">
                <a href="" class="team text-center">
                  <?php if($emp->employee_picture==""){?>
                  <div class="img" style="background-image: url(<?php echo base_url()?>upload/user/default_image.png"></div>
                  <?php }else{ ?>
                  <div class="img" style="background-image: url(<?php echo base_url()?>upload/employee/<?php echo $emp->employee_picture?>);"></div>
                  <?php } ?>
                  <h2><?php echo $emp->employee_name?></h2>
                  
                </a>
              </div>
            <?php } ?>
              
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Berita</span>
            <h2><span>Berita</span> Terbaru</h2>
          </div>
        </div>
        <div class="row d-flex">
          <?php foreach($news as $nw){?>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url()?>upload/news/<?php echo $nw->news_picture?>');">
              </a>
              <div class="text mt-3">
                <div class="meta mb-2">
                  <div><a href="#"><?php echo $nw->news_date?></a></div>
                  
                </div>
                <h3 class="heading"><a href="<?php echo site_url('front/berita_detail/'.$nw->news_id)?>"><?php echo $nw->news_title?></a></h3>
              </div>
            </div>
          </div>
          <?php } ?>
          <div class="col-md-12">
            <a href="<?php echo site_url('front/berita')?>" class="btn btn-danger py-2">Tampilkan Lebih Banyak</a>
          </div>
          
        </div>
      </div>
    </section>
    <section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Masukkan Email Untuk Berita DLHK</h2>
              <p>Masukkan email anda untuk selalu update tentang berita-berita atau info menarik dari website DLHK Kota Kendari</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-12">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">DLHK Kota Kendari</h2>
              <p>Website Dinas Lingkungan Hidup dan Kehutanan ini bertujuan untuk memberikan informasi seputar pengaduan, seniman proper, regulasi dan berita-berita mengenai DLHK kota kendari.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="<?php echo base_url()?>assets/front/#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="<?php echo base_url()?>assets/front/#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="<?php echo base_url()?>assets/front/#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Kontak Kami</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">Jl. Balai Kota III No.52B
                  Pondambea, Kadia, Kota Kendari
                  Sulawesi Tenggara 93115, Indonesia</span></li>
                  <li><a href="<?php echo base_url()?>assets/front/#"><span class="icon icon-phone"></span><span class="text">0811 4053 044</span></a></li>
                  <li><a href="<?php echo base_url()?>assets/front/#"><span class="icon icon-envelope"></span><span class="text"><span class="__cf_email__" data-cfemail="3e575058517e47514b4c5a51535f5750105d5153">dlhk.kdi@gmail.com</span></span></a></li>
                </ul>
              </div>
            </div>
          </div>

          <!-- <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Navigasi</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><a href="<?php echo site_url('front/create_pengaduan')?>">Buat Pengaduan</a></li>
                  <li><a href="<?php echo site_url('front/list_pengaduan')?>">List Pengaduan</a></li>
                  <hr>
                  <li><a href="<?php echo site_url('front/create_proper')?>">Buat Akun Seniman Proper</a></li>
                  <li><a href="<?php echo site_url('front/list_proper')?>">List Seniman Proper</a></li>
                </ul>
              </div>
            </div>
          </div> -->

          <div class="col-md">
						<div class="ftco-footer-widget mb-4 ml-md-4">
							<h2 class="ftco-heading-2">Navigasi</h2>
							<ul class="list-unstyled">
								<b>#Pengaduan</b>
								<li><a class="pb-1 d-block" href="<?php echo site_url('front/create_pengaduan')?>">Buat Pengaduan</a></li>
								<li><a class="pb-1 d-block" href="<?php echo site_url('front/list_pengaduan')?>">List Pengaduan</a></li>
								<hr>
								<b>#Seniman Proper</b>
								<li><a class="pb-1 d-block" href="<?php echo site_url('front/create_proper')?>">Buat Akun Seniman Proper</a></li>
                <li><a class="pb-1 d-block" href="<?php echo site_url('front/list_proper')?>">List Seniman Proper</a></li>
                <hr>
								<b>#Profil</b>
								<li><a class="pb-1 d-block" href="<?php echo site_url('front/visi_misi')?>">Visi Misi</a></li>
                <li><a class="pb-1 d-block" href="<?php echo site_url('front/struktur_organisasi')?>">Struktur Organisasi</a></li>
                <li><a class="pb-1 d-block" href="<?php echo site_url('front/profil_pejabat')?>">Profil Pejabat</a></li>
								
							</ul>
						</div>
					</div>


        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p>
              Copyright &copy;
              <!-- <script data-cfasync="false" src="<?php echo base_url()?>assets/front//cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
              <script type="6dc0c0326a0f8fb556bf60d5-text/javascript">
                document.write(new Date().getFullYear());
              </script> All rights reserved| Create By <i class="icon-heart text-danger" aria-hidden="true"></i> - <a href="" target="_blank">DLHK Kota Kendari</a>
            </p>
          </div>
        </div>
      </div>
    </footer>
    <div id="ftco-loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
      </svg>
    </div>
    <script src="<?php echo base_url()?>assets/front/js/jquery.min.js" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/front/js/jquery-migrate-3.0.1.min.js" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/front/js/popper.min.js" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/front/js/bootstrap.min.js" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/front/js/jquery.easing.1.3.js" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/front/js/jquery.waypoints.min.js" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/front/js/jquery.stellar.min.js" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/front/js/owl.carousel.min.js" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/front/js/jquery.magnific-popup.min.js" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/front/js/aos.js" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/front/js/jquery.animateNumber.min.js" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/front/js/scrollax.min.js" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script>
   <!--  <script src="<?php echo base_url()?>assets/front/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script> -->
    <!-- <script src="<?php echo base_url()?>assets/front/js/google-map.js" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script> -->
    <script src="<?php echo base_url()?>assets/front/js/main.js" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script>
    <!-- <script async src="<?php echo base_url()?>assets/front/https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="6dc0c0326a0f8fb556bf60d5-text/javascript"></script> -->
    
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="6dc0c0326a0f8fb556bf60d5-|49" defer=""></script>
  </body>
</html>