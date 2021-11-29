<div class="container-fluid">
  <?php
  if ($this->session->flashdata('add')) {
    $message = $this->session->flashdata('add');
    $heading = '#Tambah rekomendasi';
  } else if ($this->session->flashdata('update')) {
    $message = $this->session->flashdata('update');
    $heading = '#Update rekomendasi';
  } else if ($this->session->flashdata('delete')) {
    $message = $this->session->flashdata('delete');
    $heading = '#Delete rekomendasi';
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
  <h1 class="h3 mb-2 text-gray-800">Data Rekomendasi</h1>
  <p class="mb-4">Data berikut merupakan kumpulan rekomendasi Dosen Pembimbing & Penguji <b>Teknik Informatika</b> - Universitas Halu Oleo</p>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#rekomendasiModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>

      <!-- rekomendasi Modal-->
      <div class="modal fade" id="rekomendasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah rekomendasi Baru</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open("rekomendasi/input") ?>
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
                <label for=""><b>Topik Skripsi</b></label>
                <select class="form-control" name="topik_skripsi">
                  <option value="">.:: Pilih Topik ::.</option>
                  <?php foreach ($keahlian as $keys) {
                  ?>
                    <option value="<?php echo $keys->keahlian_id ?>"><?php echo $keys->keahlian_nama ?></option>
                  <?php
                  } ?>
                </select>
              </div>
              <div class="form-group">
                <label for=""><b>Judul Skripsi</b></label>
                <textarea class="form-control" name="judul_skripsi" id="editor1" rows="10" cols="80" required="required"></textarea>
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


      <a href="<?php echo site_url('rekomendasi') ?>" class="btn btn-success btn-icon-split btn-sm">
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
              <th>Nim Mahasiswa</th>
              <th>Nama Mahasiswa</th>
              <th>Judul Skripsi</th>
              <th>Topik Skripsi</th>
              <th>Dosen Pembimbing 1</th>
              <th>Dosen Pembimbing 2</th>
              <th>Dosen Penguji 1</th>
              <th>Dosen Penguji 2</th>
              <th>Dosen Penguji 3</th>
            </tr>
          </thead>

          <tbody>

            <?php $no = 1;
            if ($rekomendasi) {
              foreach ($rekomendasi as $key) { ?>
                <tr>
                  <td><?php echo $key->nim_mahasiswa ?></td>
                  <td><?php echo $key->nama_mahasiswa ?></td>
                  <td><?php echo substr($key->judul_skripsi, 0, 50) . " ..." ?></td>
                  <td><?php echo $key->topik_skripsi ?></td>
                  <td><?php echo $key->dosen_pembimbing1 ?></td>
                  <td><?php echo $key->dosen_pembimbing2 ?></td>
                  <td><?php echo $key->dosen_penguji1 ?></td>
                  <td><?php echo $key->dosen_penguji2 ?></td>
                  <td><?php echo $key->dosen_penguji3 ?></td>
                </tr>

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