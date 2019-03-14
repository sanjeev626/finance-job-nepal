<div class="test-wrap">
  <section class="testimonials">
  <!-- Carousel ================================================== -->
  <div id="myCarousel2" class="carouse slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="item ">
      <!-- <h4>Video CV</h4> -->
        <div class="vieo">
          <div class=" video">
              <a href="<?php echo base_url();?>upload_your_video_cv"><img src="<?php echo base_url();?>uploads/video_resume/video-cv3.jpg"></a>
                 <?php //echo substr($value->feedback,0,15);?>
              <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/03vt7e9kFG8" frameborder="0" allowfullscreen></iframe> -->
          </div>
        </div>                     
      </div>
      <?php  
      if(!empty($testimonial)){        
      foreach($testimonial as $key => $value):        
      ?>            
        <div class="item <?php /*if($key == 0){ echo 'active'; }*/ ?>">
          <div class="vieo">
            <div class="tvideo">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal_<?php echo $key;?>" style="color:#000000;">
                <img src="<?php echo the_testimonial_image($value->image); ?>">
                </a>
                   <?php //echo substr($value->feedback,0,15);?>
                <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/03vt7e9kFG8" frameborder="0" allowfullscreen></iframe> -->
            </div>
            <div class="t_details">                        
                <!-- <h4>Testimonial</h4> -->
                <div style="height:76px;"><i><?php echo substr($value->feedback,0,65);?></i></div>
                <hr>
                <p style="text-align: right; padding-top:5px;"><strong><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal_<?php echo $key;?>" style="color:#000000;"><?php echo $value->name;?></a></strong></p>
                <p style="text-align: right; font-size:11px;"><?php echo $value->position;?></p>
                <p style="text-align: right; font-size:11px;"><?php echo $value->company_name;?></p>
                <p>
                <a class="test-more" href="<?php echo base_url();?>testimonial_list">View All</a></p>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div id="myModal_<?php echo $key;?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-body">
                  <div class="test-list-item">
                      <figure style="border-radius:0; !important;">
                          <img src="<?php echo the_testimonial_image($value->image); ?>" alt="<?php echo $value->name;?>" style=" float:left;">
                      </figure>
                      <figcaption>
                          <p><?php echo $value->feedback ;?></p>
                      </figcaption>
                  </div>
                </div>
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><?php echo $value->name;?>, <?php echo $value->position;?>, <?php echo $value->company_name;?></h4>
                </div>
              </div>
            </div>
        </div>
      <?php endforeach; 
      }
      ?>
      <!-- Modal -->
      <?php /*
      <div id="myModal_video_cv" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Video CV</h4>
                  </div>
                  <div class="modal-body">
                      <div class="test-list-item">
                          <figure style="border-radius:0; !important; height:380px; width:auto;">
                              <img src="uploads/resume/video-cv.jpg" alt="Video CV">
                          </figure>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
      <?php */ ?>
      <div class="item active" >
      <section class="info-num" style="background-color:#25C386;">
       <div class="num-item visitor">
         <p>Daily <br />visitors</p>
         <p>National <br />& MNC</p>
         <p>Comprehensive database</p>             
       </div>
       <div class="num-item pink">
         <p>4800</p>
         <p>8000</p>
         <p style="font-size:24px;">200000</p>
       </div>
       <!-- <div class="num-item red">
         <span>200000</span>
       </div> -->
      </section>
      </div>
    </div>
  </div>
  <!-- /.carousel -->
  </section>   
</div>