<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Beranda </h1>
  <hr>
  <?php if ($this->session->userdata('group_id') == 1) { ?>
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Nasabah</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nasabah; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Loket</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $parameter[0]->p_loket ?></div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>




      <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Probabilitas</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $hitung[0]->probabilitas_teler * 100  ?> %</div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nasabah dalam Antrian</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $hitung[0]->r_nasabah_antrian ?></div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php

      function ubahwaktu($u_waktu)
      {
        $detik = $u_waktu  % 60;
        $menit = floor(($u_waktu % 3600) / 60);
        $jam = floor(($u_waktu % 86400) / 3600);


        return "$jam : $menit : $detik";
      } ?>
      <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rata -rata Waktu Pelayanan</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= ubahwaktu($hitung[0]->r_tunggu_layan * 3600)  ?></div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rata -rata Waktu Tunggu</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= ubahwaktu($hitung[0]->r_tunggu_antrian * 3600)  ?></div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>



      <?php
      $exp = "Jumlah Loket Cukup";
      $waktu = $hitung[0]->r_tunggu_antrian * 3600;
      $prob = $hitung[0]->probabilitas_teler * 100;
      $nasabah = $hitung[0]->r_nasabah_antrian;


      if ($waktu >= 300 && $nasabah >= 6) {
        $exp = "Jumlah Loket Kurang";
      } else if ($waktu <= 1) {
        $exp = "Jumlah Loket Berlebih";
      } else if ($waktu <= 0 && $nasabah <= 0) {
        $exp = "Jumlah Loket Berlebih";
      }

      ?>


      <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">total waktu pelayanan</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= ubahwaktu($hitung[0]->r_layan_total * 3600)  ?></div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Antrian Terakhir Selesai</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= ubahwaktu($selesai[0]->w_selesai_layanan)  ?></div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-4 mb-4">
      </div>
      <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <!-- <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kesimpulan</div> -->
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold " style="color: red;"><?= $exp ?></div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>
</div>