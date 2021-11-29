    <section class="ftco-section bg-light">
      <div class="container">
        <?php
          if($this->session->flashdata('add')){
            echo "<div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i></h4>".$this->session->flashdata('add')."</div>";
          }
        ?>
        <?php echo form_open("front/input_pengaduan")?>   
          <table class="table table-bordered">
            <tr style="background-color: green;color: white">
              <td colspan="2">A. Identitas Pengadu</td>
            </tr>
            <tr>
              <td style="width: 30%">Nama</td>
              <td><input class="form-control" type="text" name="aduan_nama" placeholder="Nama Pengadu"></td>
            </tr>
            <tr>
              <td style="width: 30%">Alamat</td>
              <td><textarea class="form-control"  name="aduan_alamat" rows="5" placeholder="Alamat Pengadu"></textarea></td>
            </tr>
            <tr>
              <td style="width: 30%">No.Telpon</td>
              <td><input  class="form-control" type="text" name="aduan_nohp" placeholder="Nomor Pengadu"</td>
            </tr>
            <tr style="background-color: green;color: white">
              <td colspan="2">B. Lokasi Kejadian</td>
            </tr>
            <tr>
              <td style="width: 30%">Alamat Kejadian</td>
              <td><textarea name="aduan_alamat_kejadian" class="form-control" rows="5" placeholder="Alamat Kejadian"></textarea></td>
            </tr>
            <tr style="background-color: green;color: white">
              <td colspan="2">C. Dugaan Sumber atau Penyebab</td>
            </tr>
            <tr>
              <td style="width: 30%">Jenis Kegiatan (jika diketahui) </td>
              <td ><textarea name="aduan_jeniskegiatan" class="form-control" rows="5" placeholder="Jenis Kegiatan (jika diketahui) "></textarea></td>
            </tr>
            <tr>
              <td style="width: 30%">Nama Kegiatan dan/atau usaha (jika diketahui)  </td>
              <td><textarea name="aduan_namakegiatan" class="form-control" rows="5" placeholder="Nama Kegiatan dan/atau usaha (jika diketahui)  "></textarea></td>
            </tr>

            <tr style="background-color: green;color: white">
              <td colspan="2">D. Waktu dan Uraian Kejadian </td>
            </tr>
            <tr>
              <td style="width: 30%">Waktu diketahuinya pencemaran dan atau perusakan lingkungan dan/atau perusakan hutan  </td>
              <td><textarea name="aduan_waktudiketahui" class="form-control" rows="5" placeholder="Waktu diketahuinya pencemaran dan atau perusakan lingkungan dan/atau perusakan hutan "></textarea></td>
            </tr>
            <tr>
              <td style="width: 30%">Uraian Kejadian   </td>
              <td><textarea name="aduan_uraiankejadian" class="form-control" rows="5" placeholder="Uraian Kejadian "></textarea></td>
            </tr>
            <tr>
              <td style="width: 30%">Dampak yang dirasakan akibat pencemaran dan atau perusakan lingkungan dan/atau perusakan hutan   </td>
              <td><textarea name="aduan_dampakdirasakan" class="form-control" rows="5" placeholder="Dampak yang dirasakan akibat pencemaran dan atau perusakan lingkungan dan/atau perusakan hutan "></textarea></td>
            </tr>


            <tr style="background-color: green;color: white">
              <td colspan="2">E. Penyelesaian yang Diinginkan  </td>
            </tr>
            <tr>
              
              <td colspan="2"><textarea name="aduan_penyelesaian" class="form-control" rows="5" placeholder="Penyelesaian yang Diinginka"></textarea></td>
            </tr>
           
          </table>

          <button class="btn btn-danger" type="submit">Input Aduan Ke DLHK</button>
        <?php echo form_close(); ?>
        
        
      </div>
    </section>