<div class="container-fluid">
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah laporan';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update laporan';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete laporan';
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
  <h1 class="h3 mb-2 text-gray-800">Data laporan</h1>
  <p class="mb-4">Data berikut merupakan kumpulan laporan Dosen Pembimbing & Penguji <b>Teknik Informatika</b> - Universitas Halu Oleo</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <?php if ($this->session->userdata('group_id') == 1 || $this->session->userdata('group_id') == 2) { ?>
        <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#laporanModal">
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
          <span class="text">Tambah Data</span>
        </a>
      <?php } ?>

      <!-- laporan Modal-->
      <div class="modal fade" id="laporanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah laporan Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open("laporan/input") ?>
            <div class="modal-body">

              <div class="form-group">
                <label for=""><b>Nim Mahasiswa</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nim Mahasiswa..." name="nim_mahasiswa" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Nama Mahasiswa</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Mahasiswa..." name="nama_mahasiswa" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Judul Skripsi</b></label>
                <input type="text" class="form-control" placeholder="Masukkan Judul Skripsi..." name="judul_skripsi" required="required">
              </div>
              <div class="form-group">
                <label for=""><b>Dosen Pembimbing 1</b></label>
                <select class="form-control" name="dosen_pembimbing1">
                  <option value="">.:: Pilih Dosen ::.</option>
                  <?php foreach ($dosen as $keys) { ?>
                    <option value="<?php echo $keys->dosen_id ?>"><?php echo $keys->dosen_nama ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for=""><b>Dosen Pembimbing 2</b></label>
                <select class="form-control" name="dosen_pembimbing2">
                  <option value="">.:: Pilih Dosen ::.</option>
                  <?php foreach ($dosen as $keys) { ?>
                    <option value="<?php echo $keys->dosen_id ?>"><?php echo $keys->dosen_nama ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for=""><b>Dosen Penguji 1</b></label>
                <select class="form-control" name="dosen_penguji1">
                  <option value="">.:: Pilih Dosen ::.</option>
                  <?php foreach ($dosen as $keys) { ?>
                    <option value="<?php echo $keys->dosen_id ?>"><?php echo $keys->dosen_nama ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for=""><b>Dosen Penguji 2</b></label>
                <select class="form-control" name="dosen_penguji2">
                  <option value="">.:: Pilih Dosen ::.</option>
                  <?php foreach ($dosen as $keys) { ?>
                    <option value="<?php echo $keys->dosen_id ?>"><?php echo $keys->dosen_nama ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for=""><b>Dosen Penguji 3</b></label>
                <select class="form-control" name="dosen_penguji3">
                  <option value="">.:: Pilih Dosen ::.</option>
                  <?php foreach ($dosen as $keys) { ?>
                    <option value="<?php echo $keys->dosen_id ?>"><?php echo $keys->dosen_nama ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for=""><b>status_laporan</b></label>
                <select class="form-control" name="status_laporan">
                  <option value="">.:: Pilih status_laporan ::.</option>
                  <option value="0">Dalam Proses</option>
                  <option value="1">Lulus</option>
                  <option value="2">Batal</option>
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


      <a href="<?php echo site_url('laporan') ?>" class="btn btn-success btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fa fa-refresh"></i>
        </span>
        <span class="text">Refresh Halaman</span>
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table data-page-length='25' class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%;">No</th>
              <th style="width: 7%;">#</th>
              <th>Nim Mahasiswa</th>
              <th>Nama Mahasiswa</th>
              <th>Judul Skripsi</th>
              <th>Dosen Pembimbing 1</th>
              <th>Dosen Pembimbing 2</th>
              <th>Dosen Penguji 1</th>
              <th>Dosen Penguji 2</th>
              <th>Dosen Penguji 3</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>

            <?php $no = 1;
            if ($laporan) {
              foreach ($laporan as $key) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td>
                    <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#laporanEditModal<?php echo $key->laporan_id ?>">
                      <span class="text">
                        <i class="fa fa-edit"></i>
                      </span>
                    </a>
                    <?php if ($this->session->userdata('group_id') == 1 || $this->session->userdata('group_id') == 2) { ?>

                      <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#laporanRemoveModal<?php echo $key->laporan_id ?>">
                        <span class="text">
                          <i class="fa fa-trash"></i>
                        </span>
                      </a>
                    <?php } else if ($this->session->userdata('group_id') == 3) { ?>
                      <a href="<?php echo site_url('laporan/pdf/' . $key->laporan_id) ?>" class="btn btn-primary btn-icon-split btn-sm" title="Export Laporan">
                        <span class="text">
                          <i class="fa fa-print"></i>
                        </span>
                      </a>
                    <?php } ?>
                  </td>
                  <td><?php echo $key->nim_mahasiswa ?></td>
                  <td><?php echo $key->nama_mahasiswa ?></td>
                  <td><?php echo substr($key->judul_skripsi, 0, 50) . " ..." ?></td>
                  <?php
                  foreach ($dosen as $keys) {
                    if ($key->dosen_pembimbing1 == $keys->dosen_id) { ?>
                      <td><?php echo $keys->dosen_nama ?></td>
                  <?php }
                  } ?>
                  <?php
                  foreach ($dosen as $keys) {
                    if ($key->dosen_pembimbing2 == $keys->dosen_id) { ?>
                      <td><?php echo $keys->dosen_nama ?></td>
                  <?php }
                  }
                  ?>

                  <?php
                  foreach ($dosen as $keys) {
                    if ($key->dosen_penguji1 == $keys->dosen_id) { ?>
                      <td><?php echo $keys->dosen_nama ?></td>

                  <?php }
                  } ?>
                  <?php
                  foreach ($dosen as $keys) {
                    if ($key->dosen_penguji2 == $keys->dosen_id) { ?>
                      <td><?php echo $keys->dosen_nama ?></td>
                  <?php }
                  } ?>
                  <?php
                  foreach ($dosen as $keys) {
                    if ($key->dosen_penguji3 == $keys->dosen_id) { ?>
                      <td><?php echo $keys->dosen_nama ?></td>
                  <?php  }
                  } ?>

                  <td>
                    <?php
                    if ($key->status_laporan == 0) {
                      echo "<span class='badge badge-warning'>Dalam Proses</span>";
                    } else if ($key->status_laporan == 1) {
                      echo "<span class='badge badge-success'>Lulus</span>";
                    } else {
                      echo "<span class='badge badge-danger'>Batal</span>";
                    }
                    ?>

                  </td>
                </tr>

                <!-- Looping Modal Area -->

                <!-- laporan Modal Edit-->
                <div class="modal fade" id="laporanEditModal<?php echo $key->laporan_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit laporan</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <?php echo form_open("laporan/edit") ?>
                      <div class="modal-body">
                        <?php if ($this->session->userdata('group_id') == 1 || $this->session->userdata('group_id') == 2) { ?>
                          <div class="form-group">
                            <label for=""><b>Nim Mahasiswa</b></label>
                            <input type="text" class="form-control" name="nim_mahasiswa" required="required" value="<?php echo $key->nim_mahasiswa ?>">
                            <input type="hidden" class="form-control" name="laporan_id" required="required" value="<?php echo $key->laporan_id ?>">
                          </div>
                          <div class="form-group">
                            <label for=""><b>Nama Mahasiswa</b></label>
                            <input type="text" class="form-control" name="nama_mahasiswa" required="required" value="<?php echo $key->nama_mahasiswa ?>">
                          </div>
                          <div class="form-group">
                            <label for=""><b>Judul Skripsi</b></label>
                            <input type="text" class="form-control" name="judul_skripsi" required="required" value="<?php echo $key->judul_skripsi ?>">
                          </div>
                          <div class="form-group">
                            <label for=""><b>Dosen Pembimbing 1</b></label>
                            <select class="form-control" name="dosen_pembimbing1">
                              <option value="">.:: Pilih Dosen ::.</option>
                              <?php foreach ($dosen as $keys) {
                                if ($key->dosen_pembimbing1 == $keys->dosen_id) {
                              ?>
                                  <option value="<?php echo $keys->dosen_id ?>" selected><?php echo $keys->dosen_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->dosen_id ?>"><?php echo $keys->dosen_nama ?></option>
                              <?php }
                              } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for=""><b>Dosen Pembimbing 2</b></label>
                            <select class="form-control" name="dosen_pembimbing2">
                              <option value="">.:: Pilih Dosen ::.</option>
                              <?php foreach ($dosen as $keys) {
                                if ($key->dosen_pembimbing2 == $keys->dosen_id) {
                              ?>
                                  <option value="<?php echo $keys->dosen_id ?>" selected><?php echo $keys->dosen_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->dosen_id ?>"><?php echo $keys->dosen_nama ?></option>
                              <?php }
                              } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for=""><b>Dosen Penguji 1</b></label>
                            <select class="form-control" name="dosen_penguji1">
                              <option value="">.:: Pilih Dosen ::.</option>
                              <?php foreach ($dosen as $keys) {
                                if ($key->dosen_penguji1 == $keys->dosen_id) {
                              ?>
                                  <option value="<?php echo $keys->dosen_id ?>" selected><?php echo $keys->dosen_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->dosen_id ?>"><?php echo $keys->dosen_nama ?></option>
                              <?php }
                              } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for=""><b>Dosen Penguji 2</b></label>
                            <select class="form-control" name="dosen_penguji2">
                              <option value="">.:: Pilih Dosen ::.</option>
                              <?php foreach ($dosen as $keys) {
                                if ($key->dosen_penguji2 == $keys->dosen_id) {
                              ?>
                                  <option value="<?php echo $keys->dosen_id ?>" selected><?php echo $keys->dosen_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->dosen_id ?>"><?php echo $keys->dosen_nama ?></option>
                              <?php }
                              } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for=""><b>Dosen Penguji 3</b></label>
                            <select class="form-control" name="dosen_penguji3">
                              <option value="">.:: Pilih Dosen ::.</option>
                              <?php foreach ($dosen as $keys) {
                                if ($key->dosen_penguji3 == $keys->dosen_id) {
                              ?>
                                  <option value="<?php echo $keys->dosen_id ?>" selected><?php echo $keys->dosen_nama ?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $keys->dosen_id ?>"><?php echo $keys->dosen_nama ?></option>
                              <?php }
                              } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for=""><b>status laporan</b></label>
                            <select class="form-control" name="status_laporan">
                              <option value="">.:: Pilih status laporan ::.</option>
                              <?php
                              if ($key->status_laporan == 0) {
                              ?>
                                <option value="0" selected>Dalam Proses</option>
                                <option value="1">Lulus</option>
                                <option value="2">Batal</option>
                              <?php } else if ($key->status_laporan == 1) { ?>
                                <option value="0">Dalam Proses</option>
                                <option value="1" selected>Lulus</option>
                                <option value="2">Batal</option>
                              <?php
                              } else if ($key->status_laporan == 2) { ?>
                                <option value="0">Dalam Proses</option>
                                <option value="1">Lulus</option>
                                <option value="2" selected>Batal</option>
                              <?php
                              } ?>

                            </select>
                          </div>
                        <?php } else if ($this->session->userdata('group_id') == 3) {
                        ?>
                          <div class="form-group">
                            <label for=""><b>Nim Mahasiswa</b></label>
                            <input type="text" disabled class="form-control" name="nim_mahasiswa" required="required" value="<?php echo $key->nim_mahasiswa ?>">
                            <input type="hidden" class="form-control" name="laporan_id" required="required" value="<?php echo $key->laporan_id ?>">
                            <input type="hidden" class="form-control" name="nim_mahasiswa" required="required" value="<?php echo $key->nim_mahasiswa ?>">
                            <input type="hidden" class="form-control" name="nama_mahasiswa" required="required" value="<?php echo $key->nama_mahasiswa ?>">
                            <input type="hidden" class="form-control" name="judul_skripsi" required="required" value="<?php echo $key->judul_skripsi ?>">
                            <input type="hidden" class="form-control" name="dosen_pembimbing1" required="required" value="<?php echo $key->dosen_pembimbing1 ?>">
                            <input type="hidden" class="form-control" name="dosen_pembimbing2" required="required" value="<?php echo $key->dosen_pembimbing2 ?>">
                            <input type="hidden" class="form-control" name="dosen_penguji1" required="required" value="<?php echo $key->dosen_penguji1 ?>">
                            <input type="hidden" class="form-control" name="dosen_penguji2" required="required" value="<?php echo $key->dosen_penguji2 ?>">
                            <input type="hidden" class="form-control" name="dosen_penguji3" required="required" value="<?php echo $key->dosen_penguji3 ?>">
                            <input type="hidden" class="form-control" name="status_laporan" required="required" value="<?php echo $key->status_laporan ?>">
                          </div>
                          <div class="form-group">
                            <label for=""><b>Nama Mahasiswa</b></label>
                            <input type="text" disabled class="form-control" name="nama_mahasiswa" required="required" value="<?php echo $key->nama_mahasiswa ?>">
                          </div>
                          <div class="form-group">
                            <label for=""><b>Judul Skripsi</b></label>
                            <input type="text" disabled class="form-control" name="judul_skripsi" required="required" value="<?php echo $key->judul_skripsi ?>">
                          </div>
                          <div class="form-group">
                            <label for=""><b>Nomor Surat</b></label>
                            <input type="text" class="form-control" name="nomor_surat" required="required" value="<?php echo $key->nomor_surat ?>">
                          </div>
                          <div class="form-group">
                            <label for=""><b>Hari & Tanggal Ujian</b></label>
                            <input type="text" class="form-control" name="hari" required="required" value="<?php echo $key->hari ?>">
                          </div>
                          <div class="form-group">
                            <label for=""><b>Jam</b></label>
                            <input type="text" class="form-control" name="jam" required="required" value="<?php echo $key->jam ?>">
                          </div>
                          <div class="form-group">
                            <label for=""><b>Tempat</b></label>
                            <input type="text" class="form-control" name="tempat" required="required" value="<?php echo $key->tempat ?>">
                          </div>
                          <div class="form-group">
                            <label for=""><b>Keterangan Laporan</b></label>
                            <select class="form-control" name="ket">
                              <option value="">.:: Pilih Keterangan laporan ::.</option>
                              <?php
                              if ($key->ket == "Seminar Proposal") {
                              ?>
                                <option value="Seminar Proposal" selected>Seminar Proposal</option>
                                <option value="Seminar Hasil">Seminar Hasil</option>
                                <option value="Seminar Skripsi">Seminar Skripsi</option>
                              <?php } else if ($key->ket == "Seminar Hasil") { ?>
                                <option value="Seminar Proposal">Seminar Proposal</option>
                                <option value="Seminar Hasil" selected>Seminar Hasil</option>
                                <option value="Seminar Skripsi">Seminar Skripsi</option>
                              <?php
                              } else if ($key->ket == "Seminar Skripsi") { ?>
                                <option value="Seminar Proposal">Seminar Proposal</option>
                                <option value="Seminar Hasil">Seminar Hasil</option>
                                <option value="Seminar Skripsi" selected>Seminar Skripsi</option>
                              <?php
                              } else { ?>
                                <option value="Seminar Proposal">Seminar Proposal</option>
                                <option value="Seminar Hasil">Seminar Hasil</option>
                                <option value="Seminar Skripsi">Seminar Skripsi</option>
                              <?php
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

                <!-- laporan Modal Remove-->
                <div class="modal fade" id="laporanRemoveModal<?php echo $key->laporan_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Laporan</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <?php echo form_open("laporan/delete") ?>
                      <div class="modal-body">
                        Apakah anda yakin akan menghapus data laporan <b><?php echo $key->nama_mahasiswa ?></b> ?
                        <input type="hidden" class="form-control" name="laporan_id" value="<?php echo $key->laporan_id ?>">
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