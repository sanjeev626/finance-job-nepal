
        <div class="col-md-12">
        <section class="employer_service hunting-job clients">
            <div id="brand-carolusel" class="owl-carousel owl-theme">
              <?php if(!empty($clients)):?>
                  <?php foreach($clients as $key => $sval): 
                  if(!empty($sval->image) && file_exists('uploads/clients/'.$sval->image))
                  {
                  ?>
                  <div class="item"><a href="#"><img src="<?php echo base_url().'uploads/clients/'.$sval->image;?>" alt="<?php echo $sval->clientname;?>" title="<?php echo $sval->clientname;?>"></a></div>                  
                  <?php 
                  }
                  endforeach;?>
              <?php endif; ?>
            </div>
        </section>
        </div>