  <section class="ftco-section bg-light">
      <div class="container">
        
          
          <div class="row d-flex">
          <?php foreach($berita as $nw){?>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url()?>upload/news/<?php echo $nw->news_picture?>');">
              </a>
              <div class="text mt-3">
                <div class="meta mb-2">
                  <div><a href="#"><?php echo $nw->news_date?></a></div>
                  
                </div>
                <h3 class="heading"><a href="<?php echo site_url('front/berita_detail/'.$nw->news_id)?>"><?php echo $nw->news_title?></a></h3>
              </div>
            </div>
          </div>
          <?php } ?>

          
          
        </div>
        
        
      </div>
    </section>