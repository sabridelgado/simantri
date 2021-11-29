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
              <th>Nama Pengadu</th>
              <th>Alamat Pengadu</th>
              <th>Tanggal Pengaduan</th>
              <th>Status Pengaduan</th>
              <th>#</th>


            </tr>

            <?php
                $no=1;
                foreach ($aduan as $key ) {
              ?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $key->aduan_nama;?></td>
                <td><?php echo $key->aduan_alamat;?></td>
                <td><?php echo $key->aduan_tanggal;?></td>
                <td>
                   <?php 
                    if($key->aduan_status==0){
                      echo "<span class='badge badge-warning'>Dalam Proses</span>";
                    }else{
                      echo "<span class='badge badge-success'>Selesai</span>";
                    }
                  ?>
                </td>
                <td><a href="<?php echo site_url('front/detail_pengaduan/'.$key->aduan_id)?>" class="btn btn-success">Detail Pengaduan</a></td>
              </tr>
              <?php
                  $no++;
                }
              ?>
           
          </table>

        
        
      </div>
    </section>