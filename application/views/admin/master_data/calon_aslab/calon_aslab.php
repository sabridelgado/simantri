<div class="container-fluid">
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah calon_aslab';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update calon_aslab';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete calon_aslab';
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
  <h1 class="h3 mb-2 text-gray-800">Data Calon Aslab</h1>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <?php if ($this->session->userdata('group_id') == 1) { ?>
        <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#calon_aslabModal">
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
          <span class="text">Tambah Data</span>
        </a>
      <?php } ?>

      <!-- calon_aslab Modal-->
      <div class="modal fade" id="calon_aslabModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Calon Asdos Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open("calon_aslab/input") ?>
            <div class="modal-body">
              <div class="form-group">
                  <label for=""><b>Tahun Ajaran</b></label>
                  <select class="form-control" name="tahun_ajaran_id">
                    <option value="">.:: Pilih Tahun ajaran ::.</option>
                    <?php foreach ($tahun_ajaran as $keys) { ?>
                      <option value="<?php echo $keys->tahun_ajaran_id ?>"><?php echo $keys->tahun_ajaran_nama ?></option>
                    <?php } ?>
                  </select>
                </div>
              <div class="form-group">
                  <label for=""><b>Mahasiswa</b></label>
                  <select class="form-control" name="nim_mahasiswa">
                    <option value="">.:: Pilih Mahasiswa ::.</option>
                    <?php foreach ($mahasiswa as $keys) { ?>
                      <option value="<?php echo $keys->mahasiswa_nim ?>"><?php echo $keys->mahasiswa_nama ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for=""><b>Matakuliah</b></label>
                  <select class="form-control" name="matakuliah_id">
                    <option value="">.:: Pilih Matakuliah ::.</option>
                    <?php foreach ($matakuliah as $keys) { ?>
                      <option value="<?php echo $keys->matakuliah_id ?>"><?php echo $keys->matakuliah_nama ?></option>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for=""><b>Nilai Praktikum</b></label>
                  <select class="form-control" name="nilai_praktikum">
                    <option value="">.:: Pilih Nilai Praktikum ::.</option>
                    <?php foreach ($subkriteria as $keys) {
                      if ($keys->kriteria_id == 'C1') {
                    ?>
                        <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                    <?php }
                    } ?>
                    <!-- <option value="3">A</option>
                    <option value="2">B</option> -->
                  </select>
                </div>

                <div class="form-group">
                  <label for=""><b>Nilai Matakuliah</b></label>
                  <select class="form-control" name="nilai_mk">
                    <option value="">.:: Pilih Nilai Matakuliah ::.</option>
                    <?php foreach ($subkriteria as $keys) {
                      if ($keys->kriteria_id == 'C2') {
                    ?>
                        <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                    <?php }
                    } ?>
                    <!-- <option value="3">A</option>
                    <option value="2">B</option> -->
                  </select>
                </div>

                <div class="form-group">
                  <label for=""><b>Semester</b></label>
                  <select class="form-control" name="semester">
                    <option value="">.:: Pilih Semester ::.</option>
                    <?php foreach ($subkriteria as $keys) {
                      if ($keys->kriteria_id == 'C3') {
                    ?>
                        <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                    <?php }
                    } ?>
                    <!-- <option value="6">Semester 3</option>
                    <option value="5">Semester 4</option>
                    <option value="4">Semester 5</option>
                    <option value="3">Semester 6</option>
                    <option value="2">Semester 7</option>
                    <option value="1">Semester 8</option> -->
                  </select>
                </div>

                <div class="form-group">
                  <label for=""><b>Asisten Berpa Kali</b></label>
                  <select class="form-control" name="asisten_berapakali">
                    <option value="">.:: Pilih Jumlah ::.</option>
                    <?php foreach ($subkriteria as $keys) {
                      if ($keys->kriteria_id == 'C4') {
                    ?>
                        <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                    <?php }
                    } ?>
                    <!-- <option value="6">Lebih dari 4 kali</option>
                    <option value="5">4 kali</option>
                    <option value="4">3 kali</option>
                    <option value="3">2 kali</option>
                    <option value="2">1 kali</option>
                    <option value="1">Tidak Pernah</option> -->
                  </select>
                </div>

                <div class="form-group">
                  <label for=""><b>Rekomendasi</b></label>
                  <select class="form-control" name="rekomendasi">
                    <option value="">.:: Pilih Rekomendasi ::.</option>
                    <?php foreach ($subkriteria as $keys) {
                      if ($keys->kriteria_id == 'C5') {
                    ?>
                        <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                    <?php }
                    } ?>
                    <!-- <option value="7">Rekomendasi</option>
                    <option value="3">Tanpa Rekomendasi</option> -->
                  </select>
                </div>

                <div class="form-group">
                  <label for=""><b>IPK</b></label>
                  <select class="form-control" name="ipk">
                    <option value="">.:: Pilih IPK ::.</option>
                    <?php foreach ($subkriteria as $keys) {
                      if ($keys->kriteria_id == 'C6') {
                    ?>
                        <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                    <?php }
                    } ?>
                    <!-- <option value="6">3,81 - 4,00</option>
                    <option value="5">3,61 - 3,80</option>
                    <option value="4">3,41 - 3,60</option>
                    <option value="3">3,21 - 3,40</option>
                    <option value="2">3,01 - 3,20</option>
                    <option value="1">3</option> -->
                  </select>
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


      <a href="<?php echo site_url('calon_aslab') ?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Refresh Halaman</span>
      </a>
      
      <?php if ($this->session->userdata('group_id') == 1 || $this->session->userdata('group_id') == 2) { ?>
      <a href="#" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#algoritmaModal">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Perhitungan Algoritma</span>
      </a>

      <div class="modal fade" id="algoritmaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Perhitungan Algoritma</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open("calon_aslab/algoritma") ?>
            <div class="modal-body">
              <div class="form-group">
                <label for=""><b>Matakuliah</b></label>
                <select class="form-control" name="matakuliah_id" required>
                  <option value="">.:: Pilih Matakuliah ::.</option>
                  <?php 
                    foreach ($matakuliah as $keys) {
                    if ($keys->matakuliah_id == $key->matakuliah_id){
                  ?>
                    <option value="<?php echo $keys->matakuliah_id ?>" selected><?php echo $keys->matakuliah_nama ?></option>
                  <?php 
                  } else { ?>
                  <option value="<?php echo $keys->matakuliah_id ?>"><?php echo $keys->matakuliah_nama ?></option>
                    <?php
                  }   }?>
                </select>
              </div>

              <div class="form-group">
                <label for=""><b>Tahun Ajaran</b></label>
                <select class="form-control" name="tahun_ajaran_id">
                  <option value="">.:: Pilih Tahun Ajaran ::.</option>
                  <?php 
                    foreach ($tahun_ajaran as $keys) {
                    if ($ta[0]->tahun_ajaran_id == $keys->tahun_ajaran_id){
                  ?>
                    <option value="<?php echo $keys->tahun_ajaran_id ?>" selected><?php echo $keys->tahun_ajaran_nama ?></option>
                  <?php 
                  } else { ?>
                  <option value="<?php echo $keys->tahun_ajaran_id ?>"><?php echo $keys->tahun_ajaran_nama ?></option>
                    <?php
                  } }?>
                </select>
              </div>
              
              <hr>
            </div>
            <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Tambah</button>
              <?php echo form_close(); ?>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
              <!-- <a href="#" data-dismiss="modal" class="btn btn-secondary btn-icon-split btn-sm">
                <span class="icon text-white-50">
                </span>
                <span class="text">Batal</span>
              </a>
              <a href="<?php echo site_url('calon_aslab/algoritma?matakuliah_id=') ?>" class="btn btn-success btn-icon-split btn-sm">
                <span class="icon text-white-50">
                </span>
                <span class="text">Submit</span> -->
              </a>
              <!-- <button class="btn btn-primary" type="button" data-dismiss="modal"><a href="<?php echo site_url('calon_aslab/topsis') ?>">Submit</a></button> -->
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

      <?php echo form_open_multipart("calon_aslab/permatakuliah") ?>
        <div class="form-group col-4 pt-3">
          <div class="row">
          <select class="form-control" name="matakuliah_id">
            <option value="">.:: Pilih Matakuliah ::.</option>
            <?php 
              foreach ($matakuliah as $keys) {
              if ($keys->matakuliah_id == $key->matakuliah_id){
            ?>
              <option value="<?php echo $keys->matakuliah_id ?>" selected><?php echo $keys->matakuliah_nama ?></option>
            <?php 
            } else { ?>
            <option value="<?php echo $keys->matakuliah_id ?>"><?php echo $keys->matakuliah_nama ?></option>
              <?php
            } }?>
          </select><br><br>

          <select class="form-control" name="tahun_ajaran_id">
            <option value="">.:: Pilih Tahun Ajaran ::.</option>
            <?php 
              foreach ($tahun_ajaran as $keys) {
              if ($keys->tahun_ajaran_id == $key->tahun_ajaran_id){
            ?>
              <option value="<?php echo $keys->tahun_ajaran_id ?>" selected><?php echo $keys->tahun_ajaran_nama ?></option>
            <?php 
            } else { ?>
            <option value="<?php echo $keys->tahun_ajaran_id ?>"><?php echo $keys->tahun_ajaran_nama ?></option>
              <?php
            } }?>
          </select>
          </div>
        </div>
        <button class="btn btn-primary col-4" type="submit">Tampil</button>
        
      <?php echo form_close(); ?>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table data-page-length='25' class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%;">No</th>
              <?php if ($this->session->userdata('group_id') == 1 || $this->session->userdata('group_id') == 2) { ?>
              <th style="width: 12%;">#</th>
              <?php } ?>
              <th>Nim Mahasiswa</th>
              <th>Nama Mahasiswa</th>
              <th>Matakuliah</th>
              <th>Nilai Praktikum</th>
              <th>Nilai Matakuliah</th>
              <th>Semester</th>
              <th>Asisten Berapakali</th>
              <th>Rekomendasi</th>
              <th>IPK</th>
              <th>Tahun Ajaran</th>
            </tr>
          </thead>

          <tbody>

            <?php $no = 1;
            if ($calon_aslab) {
              foreach ($calon_aslab as $key) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                    <?php if ($this->session->userdata('group_id') == 1 ) { ?>
                  <td>

                      <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#calon_aslabRemoveModal<?php echo $key->calon_aslab_id ?>">
                        <span class="text">
                          <i class="fa fa-trash"></i>
                        </span>
                      </a>
                      <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#calon_aslabEditModal<?php echo $key->calon_aslab_id ?>">
                      <span class="text">
                        <i class="fa fa-edit"></i>
                      </span>
                    </a>
                </td>
                <?php } ?>
                <?php if ($this->session->userdata('group_id') == 2) { ?>
                  <td>
                    <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#calon_aslabLihatModal<?php echo $key->calon_aslab_id ?>">
                      <span class="text">
                        <i class="fa fa-edit"></i>
                      </span>
                    </a>
                  </td>
                  <?php } ?>
                  <?php 
                  foreach ($mahasiswa as $keys) {
                    if ($key->nim_mahasiswa == $keys->mahasiswa_nim) { ?>
                      <td><?php echo $keys->mahasiswa_nim ?></td>
                  <?php }
                  } ?>
                  <?php
                  foreach ($mahasiswa as $keys) {
                    if ($key->nim_mahasiswa == $keys->mahasiswa_nim) { ?>
                      <td><?php echo $keys->mahasiswa_nama ?></td>
                  <?php }
                  } ?>
                  <?php
                  foreach ($matakuliah as $keys) {
                    if ($key->matakuliah_id == $keys->matakuliah_id) { ?>
                      <td><?php echo $keys->matakuliah_nama ?></td>
                  <?php }
                  }
                  ?>

                  <?php
                foreach ($subkriteria as $keys) {
                  if ($key->nilai_praktikum == $keys->subkriteria_id) { ?>
                    <td><?php echo $keys->subkriteria_nama ?></td>
                  <?php }
                  if ($key->nilai_mk == $keys->subkriteria_id) { ?>
                    <td><?php echo $keys->subkriteria_nama ?></td>
                  <?php }
                  if ($key->semester == $keys->subkriteria_id) { ?>
                    <td><?php echo $keys->subkriteria_nama ?></td>
                    <?php }
                  if ($key->asisten_berapakali == $keys->subkriteria_id) { ?>
                    <td><?php echo $keys->subkriteria_nama ?></td>
                    <?php }
                  if ($key->rekomendasi == $keys->subkriteria_id) { ?>
                    <td><?php echo $keys->subkriteria_nama ?></td>
                    <?php }
                  if ($key->ipk == $keys->subkriteria_id) { ?>
                    <td><?php echo $keys->subkriteria_nama ?></td>
                <?php }
                } ?>
                  <td><?php echo $key->tahun_ajaran_nama; ?></td>
                </tr>

                <!-- Looping Modal Area -->

                <!-- calon_aslab Modal Edit-->
                <div class="modal fade" id="calon_aslabEditModal<?php echo $key->calon_aslab_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Calon Aslab</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <?php echo form_open("calon_aslab/edit") ?>
                      <div class="modal-body">
                        <?php if ($this->session->userdata('group_id') == 1 || $this->session->userdata('group_id') == 2) { ?>
                          <div class="form-group">
                          <input type="hidden" class="form-control" name="calon_aslab_id" value="<?php echo $key->calon_aslab_id ?>">
                          <label for=""><b>Tahun Ajaran</b></label>
                          <select class="form-control" name="tahun_ajaran_id">
                            <option value="">.:: Pilih Tahun ajaran ::.</option>
                            <?php foreach ($tahun_ajaran as $keys) { 
                              if($key->tahun_ajaran_id == $keys->tahun_ajaran_id){?>
                                <option value="<?php echo $keys->tahun_ajaran_id ?>" selected><?php echo $keys->tahun_ajaran_nama ?></option>
                              <?php } else { ?>
                                <option value="<?php echo $keys->tahun_ajaran_id ?>"><?php echo $keys->tahun_ajaran_nama ?></option>
                            <?php } } ?>
                          </select>
                        </div>
                      <div class="form-group">
                          <label for=""><b>Mahasiswa</b></label>
                          <select class="form-control" name="nim_mahasiswa">
                            <option value="">.:: Pilih Mahasiswa ::.</option>
                            <?php foreach ($mahasiswa as $keys) { 
                              if($key->nim_mahasiswa == $keys->mahasiswa_nim){?>
                                <option value="<?php echo $keys->mahasiswa_nim ?>" selected><?php echo $keys->mahasiswa_nama ?></option>
                              <?php } else { ?>
                                <option value="<?php echo $keys->mahasiswa_nim ?>"><?php echo $keys->mahasiswa_nama ?></option>
                            <?php } } ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><b>Matakuliah</b></label>
                          <select class="form-control" name="matakuliah_id">
                            <option value="">.:: Pilih Matakuliah ::.</option>
                            <?php foreach ($matakuliah as $keys) { 
                              if($key->matakuliah_id == $keys->matakuliah_id){?>
                                <option value="<?php echo $keys->matakuliah_id ?>" selected><?php echo $keys->matakuliah_nama ?></option>
                              <?php } else { ?>
                                <option value="<?php echo $keys->matakuliah_id ?>"><?php echo $keys->matakuliah_nama ?></option>
                            <?php } } ?>
                          </select>
                        </div>
                        
                        <div class="form-group">
                          <label for=""><b>Nilai Praktikum</b></label>
                          <select class="form-control" name="nilai_praktikum">
                            <option value="">.:: Pilih Nilai Praktikum ::.</option>
                            <?php foreach ($subkriteria as $keys) {
                              if ($keys->kriteria_id == 'C1') {
                                if ($key->nilai_praktikum == $keys->subkriteria_id) {
                            ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>" selected><?php echo $keys->subkriteria_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                            <?php }
                              }
                            } ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><b>Nilai Matakuliah</b></label>
                          <select class="form-control" name="nilai_mk">
                            <option value="">.:: Pilih Nilai Matakuliah ::.</option>
                            <?php foreach ($subkriteria as $keys) {
                              if ($keys->kriteria_id == 'C2') {
                                if ($key->nilai_mk == $keys->subkriteria_id) {
                            ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>" selected><?php echo $keys->subkriteria_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                            <?php }
                              }
                            } ?>

                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><b>Semester</b></label>
                          <select class="form-control" name="semester">
                            <option value="">.:: Pilih Semester ::.</option>
                            <?php foreach ($subkriteria as $keys) {
                              if ($keys->kriteria_id == 'C3') {
                                if ($key->semester == $keys->subkriteria_id) {
                            ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>" selected><?php echo $keys->subkriteria_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                            <?php }
                              }
                            } ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><b>Asisten Berpa Kali</b></label>
                          <select class="form-control" name="asisten_berapakali">
                            <option value="">.:: Pilih Jumlah ::.</option>
                            <?php foreach ($subkriteria as $keys) {
                              if ($keys->kriteria_id == 'C4') {
                                if ($key->asisten_berapakali == $keys->subkriteria_id) {
                            ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>" selected><?php echo $keys->subkriteria_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                            <?php }
                              }
                            } ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><b>Rekomendasi</b></label>
                          <select class="form-control" name="rekomendasi">
                            <option value="">.:: Pilih Rekomendasi ::.</option>
                            <?php foreach ($subkriteria as $keys) {
                              if ($keys->kriteria_id == 'C5') {
                                if ($key->rekomendasi == $keys->subkriteria_id) {
                            ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>" selected><?php echo $keys->subkriteria_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                            <?php }
                              }
                            } ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><b>IPK</b></label>
                          <select class="form-control" name="ipk">
                            <option value="">.:: Pilih IPK ::.</option>
                            <?php foreach ($subkriteria as $keys) {
                              if ($keys->kriteria_id == 'C6') {
                                if ($key->ipk == $keys->subkriteria_id) {
                            ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>" selected><?php echo $keys->subkriteria_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                            <?php }
                              }
                            } ?>
                          </select>
                        </div>
                          

                        <?php } ?>

                        <div class="modal-footer">
                          <button class="btn btn-warning" type="submit">Edit</button>
                          <?php echo form_close(); ?>
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
                
                
                
                <!-- calon_aslab Modal Edit Rekomendasi-->
                <div class="modal fade" id="calon_aslabLihatModal<?php echo $key->calon_aslab_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Calon Aslab</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <?php echo form_open("calon_aslab/edit_rekomendasi") ?>
                      <div class="modal-body">
                        <?php if ($this->session->userdata('group_id') == 1 || $this->session->userdata('group_id') == 2) { ?>
                        
                        <div class="form-group">
                          <label for=""><b>Rekomendasi</b></label>
                          <select class="form-control" name="rekomendasi">
                            <option value="">.:: Pilih Rekomendasi ::.</option>
                            <?php foreach ($subkriteria as $keys) {
                              if ($keys->kriteria_id == 'C5') {
                                if ($key->rekomendasi == $keys->subkriteria_id) {
                            ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>" selected><?php echo $keys->subkriteria_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                            <?php }
                              }
                            } ?>
                          </select>
                        </div>
                          <div class="form-group">
                          <input type="hidden" class="form-control" name="calon_aslab_id" value="<?php echo $key->calon_aslab_id ?>">
                          <label for=""><b>Tahun Ajaran</b></label>
                          <select disabled="true" class="form-control" name="tahun_ajaran_id">
                            <option value="">.:: Pilih Tahun ajaran ::.</option>
                            <?php foreach ($tahun_ajaran as $keys) { 
                              if($key->tahun_ajaran_id == $keys->tahun_ajaran_id){?>
                                <option value="<?php echo $keys->tahun_ajaran_id ?>" selected><?php echo $keys->tahun_ajaran_nama ?></option>
                              <?php } else { ?>
                                <option value="<?php echo $keys->tahun_ajaran_id ?>"><?php echo $keys->tahun_ajaran_nama ?></option>
                            <?php } } ?>
                          </select>
                        </div>
                      <div class="form-group">
                          <label for=""><b>Mahasiswa</b></label>
                          <select disabled="true" class="form-control" name="nim_mahasiswa">
                            <option value="">.:: Pilih Mahasiswa ::.</option>
                            <?php foreach ($mahasiswa as $keys) { 
                              if($key->nim_mahasiswa == $keys->mahasiswa_nim){?>
                                <option value="<?php echo $keys->mahasiswa_nim ?>" selected><?php echo $keys->mahasiswa_nama ?></option>
                              <?php } else { ?>
                                <option value="<?php echo $keys->mahasiswa_nim ?>"><?php echo $keys->mahasiswa_nama ?></option>
                            <?php } } ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><b>Matakuliah</b></label>
                          <select disabled="true" class="form-control" name="matakuliah_id">
                            <option value="">.:: Pilih Matakuliah ::.</option>
                            <?php foreach ($matakuliah as $keys) { 
                              if($key->matakuliah_id == $keys->matakuliah_id){?>
                                <option value="<?php echo $keys->matakuliah_id ?>" selected><?php echo $keys->matakuliah_nama ?></option>
                              <?php } else { ?>
                                <option value="<?php echo $keys->matakuliah_id ?>"><?php echo $keys->matakuliah_nama ?></option>
                            <?php } } ?>
                          </select>
                        </div>
                        
                        <div class="form-group">
                          <label for=""><b>Nilai Praktikum</b></label>
                          <select disabled="true" class="form-control" name="nilai_praktikum">
                            <option value="">.:: Pilih Nilai Praktikum ::.</option>
                            <?php foreach ($subkriteria as $keys) {
                              if ($keys->kriteria_id == 'C1') {
                                if ($key->nilai_praktikum == $keys->subkriteria_id) {
                            ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>" selected><?php echo $keys->subkriteria_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                            <?php }
                              }
                            } ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><b>Nilai Matakuliah</b></label>
                          <select disabled="true" class="form-control" name="nilai_mk">
                            <option value="">.:: Pilih Nilai Matakuliah ::.</option>
                            <?php foreach ($subkriteria as $keys) {
                              if ($keys->kriteria_id == 'C2') {
                                if ($key->nilai_mk == $keys->subkriteria_id) {
                            ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>" selected><?php echo $keys->subkriteria_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                            <?php }
                              }
                            } ?>

                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><b>Semester</b></label>
                          <select disabled="true" class="form-control" name="semester">
                            <option value="">.:: Pilih Semester ::.</option>
                            <?php foreach ($subkriteria as $keys) {
                              if ($keys->kriteria_id == 'C3') {
                                if ($key->semester == $keys->subkriteria_id) {
                            ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>" selected><?php echo $keys->subkriteria_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                            <?php }
                              }
                            } ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><b>Asisten Berpa Kali</b></label>
                          <select disabled="true" class="form-control" name="asisten_berapakali">
                            <option value="">.:: Pilih Jumlah ::.</option>
                            <?php foreach ($subkriteria as $keys) {
                              if ($keys->kriteria_id == 'C4') {
                                if ($key->asisten_berapakali == $keys->subkriteria_id) {
                            ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>" selected><?php echo $keys->subkriteria_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                            <?php }
                              }
                            } ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for=""><b>IPK</b></label>
                          <select disabled="true" class="form-control" name="ipk">
                            <option value="">.:: Pilih IPK ::.</option>
                            <?php foreach ($subkriteria as $keys) {
                              if ($keys->kriteria_id == 'C6') {
                                if ($key->ipk == $keys->subkriteria_id) {
                            ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>" selected><?php echo $keys->subkriteria_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->subkriteria_id ?>"><?php echo $keys->subkriteria_nama ?></option>
                            <?php }
                              }
                            } ?>
                          </select>
                        </div>
                          

                        <?php } ?>

                        <div class="modal-footer">
                          <button class="btn btn-warning" type="submit">Edit</button>
                          <?php echo form_close(); ?>
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>

                <!-- calon_aslab Modal Remove-->
                <div class="modal fade" id="calon_aslabRemoveModal<?php echo $key->calon_aslab_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus calon_aslab</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <?php echo form_open("calon_aslab/delete") ?>
                      <div class="modal-body">
                        Apakah anda yakin akan menghapus data calon_aslab <b></b> ?
                        <input type="hidden" class="form-control" name="calon_aslab_id" value="<?php echo $key->calon_aslab_id ?>">
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
              }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->