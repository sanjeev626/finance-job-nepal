<div class="headline  clearfix">
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
    <?php } if(!empty($jobDetail->noexperience)){?>
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4">
          <p><strong>Experience</strong>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2">
          <p><strong>:</strong></p>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <p><?php echo $jobDetail->noexperience; if($jobDetail->noexperience!="Not Required" && $jobDetail->noexperience!="None" && $jobDetail->noexperience!="Please check vacancy details"){ echo " year"; if(is_int($jobDetail->noexperience) && $jobDetail->noexperience>1) echo "s"; }?></p>
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
    <?php } if(!empty($jobDetail->requiredno) && is_int($jobDetail->requiredno) && $jobDetail->requiredno>0){?>
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
    if(!empty($jobDetail->joblocation)){?>
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
    <?php } ?>
  </div>

  <div class="elements">
      <h2>Educational Descriptions:</h2>
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
    <div class="elementss">
      <h2>Job Specification:</h2>
      <!-- <ul class="stop">
        <li><?php echo $jobDetail->specification;?></li>
      </ul> -->
      <?php echo $jobDetail->specification;?>
    </div>
    <div class="elementss">
      <h2>Specific Requirement :</h2>
      <!-- <ul class="stop">
        <li></li>
      </ul> -->
      <?php echo stripslashes($jobDetail->requirements);?>
    </div>
    <div class="elementss">
      <h2>How to apply for this post ?</h2>
      <!-- <ul class="stop">
        <li></li>
      </ul> -->
      <?php echo stripslashes($jobDetail->howtoapply);?>
    </div>
  <button type="button" class="btn btn-defult" onclick="window.location='<?php echo base_url();?>applyJob/<?php echo $jobDetail->id; ?>'">Apply Now</button>
  <span class="notification deadline">The deadline to apply for the above position is <?php echo date('F d Y',strtotime($jobDetail->applybefore));?>.</span> 

  <div class="fb-share-button fb-share-button-group" data-href="<?php echo $url;?>" data-layout="button" style="float:right;"></div> 
  <div class="fb-like" data-href="<?php echo $url;?>" data-layout="button" data-action="like" data-show-faces="false" data-share="false" style="float:right; margin-right:5px;"></div>
</div>