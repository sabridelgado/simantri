    <section class="ftco-section bg-light">
      <div class="container">
        <?php
          if($this->session->flashdata('add')){
            echo "<div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i></h4>".$this->session->flashdata('add')."</div>";
          }
        ?>
        
          <table class="table table-bordered">
            
            <tr>
              <th>No</th>
              <th>Nama Kegiatan</th>
              <th>Nama Pemrakarsa</th>
              <th>No Izin & Tanggal Izin</th>
              <th>Alamat</th>
              <th>Status</th>


            </tr>

            <?php
                $no=1;
                foreach ($proper as $key ) {
              ?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $key->proper_nama_kegiatan;?></td>
                <td><?php echo $key->proper_nama_pemrakarsa;?></td>
                <td><?php echo $key->proper_nomor_izin." / ".$key->proper_tanggal_izin;?></td>
                <td><?php echo $key->proper_alamat;?></td>
                <td>
                   <?php 
                    if($key->proper_status==0){
                      echo "<span class='badge badge-warning'>Dalam Proses</span>";
                    }elseif($key->proper_status==1){
                      echo "<span class='badge badge-danger'>Tidak Taat</span>";
                    }else{
                      echo "<span class='badge badge-success'>Taat</span>";
                    }
                  ?>
                </td>
                
              </tr>
              <?php
                  $no++;
                }
              ?>
           
          </table>

        
        
      </div>
    </section>