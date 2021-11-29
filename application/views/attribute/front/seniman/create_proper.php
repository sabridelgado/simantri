    <section class="ftco-section bg-light">
      <div class="container">
        <?php
          if($this->session->flashdata('add')){
            echo "<div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i></h4>".$this->session->flashdata('add')."</div>";
          }
        ?>
     
        <?php echo form_open("front/input_proper")?>   
          <table class="table table-bordered">
            <tr style="background-color: green;color: white">
              <td colspan="2">Formulir Pendaftaran Akun Seniman Proper</td>
            </tr>
            <tr>
              <td style="width: 30%">Nama Kegiatan/Usaha *</td>
              <td><input class="form-control" type="text" name="proper_nama_kegiatan" placeholder="Nama Kegiatan" required="required"></td>
            </tr>
            <tr>
              <td style="width: 30%">Nama Pemrakarsa *</td>
              <td><input class="form-control" type="text" name="proper_nama_pemrakarsa" placeholder="Nama Pemrakarsa" required="required"></td>
            </tr>
            <!-- <tr>
              <td style="width: 30%">No. Izin</td>
              <td><input  class="form-control" type="number" name="proper_nomor_izin" placeholder="No. Izin"</td>
            </tr>
            <tr>
              <td style="width: 30%">Tanggal Izin</td>
              <td><input class="form-control" type="date" name="proper_tanggal_izin" placeholder="Tanggal Izin"></td>
            </tr> -->
            <tr>
              <td style="width: 30%">Alamat Kegiatan/Usaha *</td>
              <td><textarea class="form-control"  name="proper_alamat" rows="5" placeholder="Alamat Kegiatan/Usaha" required="required"></textarea></td>
            </tr>
            <tr>
              <td style="width: 30%">Sektor Kegiatan/Usaha *</td>
              <td><input class="form-control" type="text" name="proper_sektor" placeholder="Sektor Kegiatan/Usaha" required="required"></td>
            </tr>
            <!-- <tr>
              <td style="width: 30%">Jenis Dokumen Lingkungan</td>
              <td><input class="form-control" type="text" name="proper_jenis_dokling" placeholder="Jenis Dokumen Lingkungan"></td>
            </tr> -->
            <tr style="background-color: green;color: white">
              <td colspan="2">Akun</td>
            </tr>

            <tr>
              <td style="width: 30%">Username *</td>
              <td><input class="form-control" type="text" name="username" placeholder="Username" required="required"></td>
            </tr>
            <tr>
              <td style="width: 30%">Password *</td>
              <td><input class="form-control" type="password" name="password" placeholder="Password" required="required"></td>
            </tr>
           
          </table>

          <button class="btn btn-danger" type="submit" style="width: 100%">Daftar Akun </button>
        <?php echo form_close(); ?>
        
        
      </div>
    </section>