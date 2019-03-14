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
          <div class="headline clearfix">
            <p><?php echo stripslashes($jobDetail->jobtitle);?></p>
          </div>
          <div class="vacancies-details">
            <div class="j-overview">
              <h2>Job overview:</h2>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Job Category</strong></p>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo $this->general_model->getById('dropdown','id',$jobDetail->jobcategory)->dropvalue; ?></p>
                </div>
              </div>
              <?php if(!empty($jobDetail->preferredgender)){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Preferred Gender :</strong></p>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p> <?php echo $jobDetail->preferredgender=='Both'?'Male/Female':$jobDetail->preferredgender;?></p>
                </div>
              </div>
              <?php } if(!empty($jobDetail->joblevel)){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Job Level</strong></p>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo $jobDetail->joblevel;?></p>
                </div>
              </div>
              <?php }
              $salary =  $this->general_model->getById('dropdown','id',$jobDetail->salaryrange);
  			  if($salary){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Salary</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php if($salary) echo $salary->dropvalue; ?><p>
                </div>
              </div>
              <?php }

              if(!empty($jobDetail->noexperience)){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Experience</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo $jobDetail->noexperience; ?> year</p>
                </div>
              </div>              
              <?php } if(!empty($jobDetail->apply_by_faculty)){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Faculty</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo ($jobDetail->apply_by_faculty) ? $jobDetail->apply_by_faculty : 'Any'; ?></p>
                </div>
              </div>
              <?php } if(!empty($jobDetail->apply_by_age) && $jobDetail->apply_by_age!="0-0" && $jobDetail->apply_by_age!="-"){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Age Bar</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo ($jobDetail->apply_by_age) ? $jobDetail->apply_by_age : 0; ?> year</p>
                </div>
              </div>
              <?php } if(!empty($jobDetail->requiredno)){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>No. of vacancy</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo $jobDetail->requiredno; ?></p>
                </div>
              </div>
              <?php }
              if(!empty($jobDetail->joblocation) && $jobDetail->joblocation>0){?>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <p><strong>Job Location</strong>
                  </div>
                  <div class="col-md-2 col-sm-2 col-xs-2">
                    <p><strong>:</strong></p>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <p>
                    <?php
                    $joblocation_arr = explode(',',$jobDetail->joblocation);
                    for($i=0;$i<count($joblocation_arr);$i++)
                    {
                      echo $this->general_model->getById('dropdown','id',$joblocation_arr[$i])->dropvalue; 
                      if(count($joblocation_arr)>0 && $i<(count($joblocation_arr)-1)) echo ', ';
                    }
                    ?>
                    </p>
                  </div>
                </div>
              <?php }
              if(!empty($jobDetail->applybefore)){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Apply Before</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo date('d M Y',strtotime($jobDetail->applybefore));?></p>
                </div>
              </div>
              <?php } 
              if(!empty($jobDetail->orgemail)){
              $mailto = $jobDetail->orgemail."?subject=Application for the post of ".stripslashes($jobDetail->jobtitle);
              //$mailto = $jobDetail->orgemail;
              ?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Apply Email</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo $jobDetail->orgemail;?></p>
                </div>
              </div>
              <?php } ?>
            </div>

            <div class="elements">
              <h2>Educational Description:</h2>
              <ul class="stop">
                <li><?php echo stripslashes($jobDetail->background);?></li>
                <?php if(!empty($jobDetail->required_education)){?>
                <li><strong>Required Education : </strong><?php echo ucwords(stripslashes($jobDetail->required_education));?></li>
                <?php }
                if(!empty($jobDetail->expected_faculty)){ ?>
                  <li><strong>Expected Faculty : </strong><?php echo stripslashes($jobDetail->expected_faculty);?></li>
                <?php }
                if($jobDetail->slc_docs=="1" || $jobDetail->docs_11_12=="1"  || $jobDetail->bachelor_docs=="1"  || $jobDetail->masters_docs=="1"){?>
                <li><strong>Mandatory Documents : </strong>
                <?php
                if($jobDetail->slc_docs=="1") echo 'SLC Marksheet';
                if($jobDetail->docs_11_12=="1") echo ', 11/12 Transcript';
                if($jobDetail->bachelor_docs=="1") echo ', Bachelor Transcript';
                if($jobDetail->masters_docs=="1") echo ', Masters Transcript';
                ?>
                </li>
                <?php } ?>
              </ul>
            </div>
            <div class="elements">
              <h2>Job Specification:</h2>
              <ul class="stop">
                <li><?php echo $jobDetail->specification;?></li>
              </ul>
            </div>
            <div class="elements">
              <h2>Specific Requirement :</h2>
              <ul class="stop">
                <li><?php echo stripslashes($jobDetail->requirements);?></li>
              </ul>
            </div>
            <div class="elements">
              <h2>How to apply for this post ?</h2>
              <ul class="stop">
                <li><?php echo stripslashes($jobDetail->howtoapply);?></li>
              </ul>
            </div>
            <a href="<?php echo base_url();?>applyJob/<?php echo $jobDetail->id; ?>" class="btn btn-success">Apply Now</a> 
            
            <!-- <span class="notification">The deadline to apply for the above position is 24:00 hrs, January 30 2017.</span>-->
            <div class="fb-share-button fb-share-button-group" data-href="<?php echo $url;?>" data-layout="button" style="float:right;"></div> 
            <div class="fb-like" data-href="<?php echo $url;?>" data-layout="button" data-action="like" data-show-faces="false" data-share="false" style="float:right; margin-right:5px;"></div>
          </div>
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