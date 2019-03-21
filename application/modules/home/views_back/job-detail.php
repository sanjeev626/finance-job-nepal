<?php $this->load->view('includes/header');?>
<?php $this->load->helper("view_helper"); ?>
<?php
$jobDetail = $job_detail[0];
//print_r($jobDetail);
if(!empty($employer_info)){
  $logo = $employer_info->logo;
  $description = $employer_info->orgdesc;
  $url = base_url().'job/'.$employer_info->orgcode.'/'.$jobDetail->slug.'/'.$jobDetail->id;
}else{
  $logo ='';
  $description = '';
  $url = base_url().'job/'.$jobDetail->slug.'/'.$jobDetail->id;
}
$jobType = $jobDetail->isNewspaperJob;
?>
<!-- body start -->
<script>
  $('body').addClass("jobdetail-page");
</script>
<style type="text/css">
.vacancies-details span {
  background:none; 
}
</style>

<div class="container ">
  <div class="row">
    <?php $this->load->view('admin/common/flash_message'); ?>
    <div class="col-md-9">
      <div class="jobdetail-leftaside">
        <?php if($jobType!="IJob" && $jobType!="NJob"){ ?>
        <div class="details-info">
          <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-3">
              <figure> <img src="<?php echo the_employer_logo($logo,$jobDetail->complogo);?>" alt="Logo"> </figure>
            </div>
            <div class="col-md-10 col-sm-9 col-xs-9">
              <p><?php echo stripslashes($description);?></p>
            </div>
          </div>
        </div>
        <?php } ?>
        <div id="sitemanager" class="site-manager">
          <?php
          $data2['url'] = $url;
          $data2['jobDetail'] = $jobDetail;
          $this->load->view('job-detail-section',$data2);
          ?>
          <div class="criteria-procedure">
            <div class="criteria">
              <h2>For the above positions:</h2>
              <ul class="stop">
                <li>Candidates are requested to mention and include their age, percentage/CGPA from SLC and above level. Failure to provide the information will lead to disqualification.</li>
                <li>Candidates must specifically mention the preferred ‘Location’ feasible for them.</li>
                <li>The eligible candidates meeting the above qualification and criteria shall be shortlisted and will be informed for further selection process. Only short listed candidates meeting the above criteria will be contacted for selection process.</li>
              </ul>
            </div>
            <div class="procedure">
              <h2>Applying procedure:</h2>
              <ul class="stop">
                <li>For Accountholders: Log in to globaljob.com.np and access your account.</li>
                <li>For new user, Create New Account</li>
                <li>Click ‘Apply Online’ button in this page.</li>
                <li>For further confirmation, click on “Jobs I have applied to” option on your profile page after you log in. Once successfully applied, the job title and the organization name will be displayed in the list along with the applied date.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- right-aside start -->
    
    <div class="col-md-3">
      <div class="right-aside">
        <?php if($jobType!="IJob"){ ?>
        <section class="about-company">
          <h3>About company</h3>
          <?php if(!empty($employer_info)){?>
          <p><strong>Company:</strong> <?php echo $employer_info->orgname; ?></p>
          <?php if(isset($employer_info->natureoforg) && $employer_info->natureoforg>0){?>
          <p><strong>Industry:</strong> <?php echo $this->general_model->getById('dropdown','id',$employer_info->natureoforg)->dropvalue; ?></p>
          <?php } ?>          
          <p><strong>Location:</strong> <?php echo $employer_info->address; ?></p>
          <?php }else{ ?>
          <p><strong>Company:</strong> <?php echo $jobDetail->displayname; ?></p>
          <?php }?>
          <div class="social social-roll">
            <!-- for share this btn -->            
            <span class='st_facebook_hcount' displayText='Facebook'></span>            
            <!-- share this end -->            
          </div>
        </section>
        <div class="current-vacancies clearfix">
          <h2>Current vacancies</h2>
          <ul>
            <?php if($related_job){
          foreach($related_job as $key => $value):?>
            <li><a href="<?php echo base_url().'job/'. $value->slug.'/'.$value->id; ?>"><?php echo $value->jobtitle; ?></a></li>
            <?php endforeach;
        }else{?>
            <li> No other Vacancy </li>
            <?php } ?>
          </ul>
        </div>
        <?php
  }
  ?>
      </div>
    </div>   
    <!-- right-aside start -->  
    <?php $this->load->view('includes/sidebar');?>
  </div>
</div>
<!-- body end -->
<?php $this->load->view('includes/footer');?>