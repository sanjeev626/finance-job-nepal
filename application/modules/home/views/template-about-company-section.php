<section class="about-company">
  <h3>About company</h3>
  <p><strong>Company:</strong> <?php echo $employer_info->orgname; ?></p>
  <?php if(isset($employer_info->natureoforg) && $employer_info->natureoforg>0){?>
  <p><strong>Industry:</strong> <?php echo $this->general_model->getById('dropdown','id',$employer_info->natureoforg)->dropvalue; ?></p>
  <?php } ?>          
  <p><strong>Location:</strong> <?php echo $employer_info->address; ?></p>
  <div class="social social-roll">             
    <!--- for share this btn -->             
    <span class='st_facebook_hcount' displayText='Facebook'></span>             
    <!-- share this end -->             
  </div>
</section>