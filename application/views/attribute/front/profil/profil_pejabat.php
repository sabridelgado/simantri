  <section class="ftco-section bg-light">
      <div class="container">
        
          
          <?php foreach($employee as $emp){?>
            <div class="col-md-12 ftco-animate">
              <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                <div class="one-third mb-4 mb-md-0">
                  <div class="job-post-item-header align-items-center">
                    <span class="subadge">Jabatan : <?php echo $emp->employee_position?></span><br>
                    <span class="subadge">NIP : <?php echo $emp->employee_nip?></span>
                    <h2 class="mr-3 text-black"><a href="#"><?php echo $emp->employee_name?></a></h2>
                  </div>
                  
                </div>
                <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                  <?php if($emp->employee_picture=="") {?>
                  <img src="<?php echo base_url()?>upload/user/default_image.png" width="100">
                  <?php }else{ ?>
                  <img src="<?php echo base_url()?>upload/employee/<?php echo $emp->employee_picture?>" width="100">
                  <?php }?>
                </div>
              </div>
            </div>
            <?php } ?>
        
        
      </div>
    </section>