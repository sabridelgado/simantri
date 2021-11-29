  <section class="ftco-section bg-light">
      <div class="container">
        
          
          <?php foreach($regulasi as $pl){?>
            <div class="col-md-12 ftco-animate">
              <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                <div class="one-third mb-4 mb-md-0">
                  <div class="job-post-item-header align-items-center">
                    
                    <h2 class="mr-3 text-black"><a href="#"><?php echo $pl->rules_category_name?></a></h2>
                  </div>
                  
                </div>
                <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                  
                  <a href="<?php echo site_url('front/regulasi_detail/'.$pl->rules_category_id)?>" target="_blank" class="btn btn-primary py-2">Lihat File</a>
                </div>
              </div>
            </div>
            <?php } ?>
        
        
      </div>
    </section>