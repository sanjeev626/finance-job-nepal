<?php
if (!empty($jobpost_detail)) {
    $action = base_url() . 'Employer/editPostJob/' . $jobpost_detail->id;
    $post_date = $jobpost_detail->post_date;
    $applybefore = $jobpost_detail->applybefore;
} else {
    $action = base_url() . 'Employer/addPostJob';
    $post_date = date('Y-m-d');
    $applybefore = date('Y-m-d', strtotime("+30 days"));
}
?>
<script>
  $( function() {
    $( "#applybefore" ).datepicker();
    $( "#applybefore" ).datepicker( "option", "showAnim", 'clip' );                 
    $( "#applybefore" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
    $( "#applybefore" ).datepicker("setDate", "<?php echo $applybefore;?>");
    $( "#post_date" ).datepicker();
    $( "#post_date" ).datepicker( "option", "showAnim", 'clip' );                 
    $( "#post_date" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
    $( "#post_date" ).datepicker("setDate", "<?php echo $post_date;?>");
  } );
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Bootstrap toggle starts Here -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.3/styles/github.min.css" rel="stylesheet" > -->
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="<?php echo base_url();?>content_home/css/bootstrap-toggle.css" rel="stylesheet">
<style>
  .slow .toggle-group { transition: left 0.7s; -webkit-transition: left 0.7s; }
</style>
<script src="<?php echo base_url();?>content_home/js/bootstrap-toggle.js"></script>
<!-- Bootstrap toggle ends Here -->

<div class="col-md-9 login-contains"> 
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="My-Profile">
      <h3>Post Job</h3>
        <?php        
        $attributes = array('class' => 'form-horizontal user-logIn','name'=>'employersignup',);        
        echo form_open_multipart($action, $attributes);        
        ?>
      <div class="form-group">
        <label class="control-label col-sm-3">Display In ?</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-4">
              <label class="radio-inline" style="font-size: 12px; padding-left:0px;">
                <!-- <input type="radio" id="CJob" <?php if(!empty($jobpost_detail) && $jobpost_detail->isNewspaperJob == 'CJob'){ echo "checked='checked'"; } ?> value="CJob" name="isNewspaperJob">
                Corporate Job  -->
                <input type="checkbox" name="isNewspaperJob" value="CJob" <?php if(!empty($jobpost_detail) && $jobpost_detail->isNewspaperJob == 'CJob'){ echo "checked='checked'"; } ?>> Corporate Job    

              </label>
            </div>
            <!-- <div class="col-sm-2">
              <label class="radio-inline">
                <input type="radio" id="PJob" <?php if(!empty($jobpost_detail) && $jobpost_detail->isNewspaperJob == 'FJob'){ echo "checked='checked'"; } ?> value="FJob" name="isNewspaperJob">
                Featured Job </label>
            </div>
            <div class="col-sm-2">
              <label class="radio-inline">
                <input type="radio" id="RJob" <?php if(!empty($jobpost_detail) && $jobpost_detail->isNewspaperJob == 'RJob'){ echo "checked='checked'"; } ?> value="RJob" name="isNewspaperJob">
                Recent Job </label>
            </div>
            <div class="col-sm-3">
              <label class="radio-inline">
                <input type="radio" id="NJob" <?php if(!empty($jobpost_detail) && $jobpost_detail->isNewspaperJob == 'NJob'){ echo "checked='checked'"; } ?> value="NJob" name="isNewspaperJob">
                Newspaper Job </label>
            </div>
            <div class="col-sm-3">
              <label class="radio-inline">
                <input type="radio" id="IJob" <?php if(!empty($jobpost_detail) && $jobpost_detail->isNewspaperJob == 'IJob'){ echo "checked='checked'"; } ?> value="IJob" name="isNewspaperJob">
                Key Positions </label>
            </div> -->
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Show this job in :</label>
        <div class="col-sm-9">
          <div class="row">
              <?php 
              if (!empty($jobpost_detail) && isset($jobpost_detail->job_display_in))
              {
                $job_display_in = $jobpost_detail->job_display_in;
                $jdi = explode(',',$job_display_in);
              }
              else
              {
                $job_display_in = '';
                $jdi = array('');
              }
                
              //print_r($jdi);
              foreach ($jobtype as $key => $value) {
              $checked='';
              if (in_array($value->id, $jdi)) {
                  $checked = 'checked="checked"';
              }
              ?>
              <div class="col-sm-4">
                <label class="radio-inline" style="font-size: 12px; padding-left:0px;">
                <input type="checkbox" name="job_display_in[]" value="<?php echo $value->id; ?>" <?php echo $checked;?>> <?php echo $value->dropvalue; ?>   
                </label>
              </div>            
              <?php  } ?>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Company Logo :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="file" <?php /*if (empty($jobpost_detail) && !isset($jobpost_detail->complogo)) { echo "required"; } */?> id="logo" name="logo" placeholder="Logo" class="form-control" autofocus>
              <span class="green">(Max file size 50 kb)</span>
              <?php if (!empty($jobpost_detail) && isset($jobpost_detail->complogo) && !empty($jobpost_detail->complogo)) { ?>
              <input type="hidden" value="<?php echo $jobpost_detail->complogo; ?>" name="logo">
              <div style="padding-top:10px;"><img height="20%" width="20%" src="<?php echo base_url() . 'uploads/employer/' . $jobpost_detail->complogo; ?>"></div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Display Name :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="displayname" value="<?php if (!empty($jobpost_detail)) echo $jobpost_detail->displayname; ?>" name="displayname" placeholder="Any text to represent your organization like 'A reputed commercial Bank' or leave it blank" class="form-control" autofocus>
              Note : This text will be displayed to job seekers as your organization name.
            </div>
          </div>
        </div>
      </div>
      <h3>Contact Detail</h3>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Job Title :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="jobtitle" required value="<?php if (!empty($jobpost_detail)) echo $jobpost_detail->jobtitle; ?>" name="jobtitle" placeholder="Job Title" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3">Job Category :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-12">
              <select class="form-control" name="jobcategory" >
                <?php foreach ($jobcategory as $key => $value) {?>
                <option <?php if(!empty($jobpost_detail) && $jobpost_detail->jobcategory == $value->id){ echo "selected='selected'"; } ?>  value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                <?php  } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3">Preferred Gender:<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-2">
              <label class="radio-inline">
                <input type="radio" required id="preferredgender" <?php if(!empty($jobpost_detail) && $jobpost_detail->preferredgender == 'Male'){ echo "checked='checked'"; } ?>  value="Male" name="preferredgender">
                Male </label>
            </div>
            <div class="col-sm-2">
              <label class="radio-inline">
                <input type="radio" required id="preferredgender" <?php if(!empty($jobpost_detail) && $jobpost_detail->preferredgender == 'Female'){ echo "checked='checked'"; } ?> value="Female" name="preferredgender">
                Female </label>
            </div>
            <div class="col-sm-2">
              <label class="radio-inline">
                <input type="radio" required id="preferredgender" <?php if(!empty($jobpost_detail) && $jobpost_detail->preferredgender == 'Both'){ echo "checked='checked'"; } ?>  value="Both" name="preferredgender">
                Male/Female </label>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Required No. :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="requiredno" value="<?php if (!empty($jobpost_detail)) echo $jobpost_detail->requiredno; ?>" name="requiredno" placeholder="Required No" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Job Post Date :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <input type="text" required readonly name="post_date" id='post_date' class="form-control" value='<?php if (!empty($jobpost_detail)) echo $jobpost_detail->post_date; else echo date('Y-m-d'); ?>' title="Click to change post date" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Apply Before :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <input type="text" required readonly name="applybefore" id='applybefore' class="form-control" value='<?php if (!empty($jobpost_detail)) echo $jobpost_detail->applybefore; ?>' title="Click to change apply before date" />
        </div>
      </div>      
      <div class="form-group">
        <label class="control-label col-sm-3">Salary Range :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-12">
              <select class="form-control" name="salaryrange" >
                <?php foreach ($salary_range as $key => $value) {?>
                <option <?php if(!empty($jobpost_detail) && $jobpost_detail->salaryrange == $value->id){ echo "selected='selected'"; } ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                <?php  } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3">No. of Experience :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-12">
              <select class="form-control" name="noexperience" >
                <option value="Not Required">Not Required</option>
                <?php for($e=1;$e<=10;$e++){?>
                <option value="<?php echo $e;?>" <?php if(!empty($jobpost_detail) && $jobpost_detail->noexperience == $e){ echo "selected='selected'"; } ?>><?php echo $e;?></option>
                <?php }?>
                <option value="10+">10+</option>
                <option value="Please check vacancy details" <?php if(!empty($jobpost_detail) && $jobpost_detail->noexperience == "Please check vacancy details"){ echo "selected='selected'"; } ?>>Please check vacancy details</option>
              </select>
            </div>
          </div>
        </div>
      </div>      
      <div class="form-group">
        <label class="control-label col-sm-3">Job Level :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-3">
              <label class="radio-inline">
                <input type="radio" checked id="joblevel" value="Entry Level" name="joblevel">
                Entry Level </label>
            </div>
            <div class="col-sm-3">
              <label class="radio-inline">
                <input type="radio" id="joblevel" <?php if(!empty($jobpost_detail) && $jobpost_detail->joblevel == 'Mid Level'){ echo "checked='checked'"; } ?> value="Mid Level" name="joblevel">
                Mid Level </label>
            </div>
            <div class="col-sm-3">
              <label class="radio-inline">
                <input type="radio" id="joblevel" <?php if(!empty($jobpost_detail) && $jobpost_detail->joblevel == 'Senior Level'){ echo "checked='checked'"; } ?> value="Senior Level" name="joblevel">
                Senior Level </label>
            </div>
            <div class="col-sm-3">
              <label class="radio-inline">
                <input type="radio" id="joblevel" <?php if(!empty($jobpost_detail) && $jobpost_detail->joblevel == 'Top Level'){ echo "checked='checked'"; } ?> value="Top Level" name="joblevel">
                Top Level </label>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3">Job Type :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-3">
              <label class="checkbox-inline">
                <input type="checkbox" checked id="jobtype1" value="Full Time" name="jobtype1">
                Full Time </label>
            </div>
            <div class="col-sm-3">
              <label class="checkbox-inline">
                <input type="checkbox" id="jobtype2" <?php if(!empty($jobpost_detail) && $jobpost_detail->jobtype2 == 'Part Time'){ echo "checked='checked'"; } ?> value="Part Time" name="jobtype2">
                Part Time </label>
            </div>
            <div class="col-sm-3">
              <label class="checkbox-inline">
                <input type="checkbox" id="jobtype3" <?php if(!empty($jobpost_detail) && $jobpost_detail->jobtype3 == 'Contract'){ echo "checked='checked'"; } ?> value="Contract" name="jobtype3">
                Contract </label>
            </div>
            <div class="col-sm-3">
              <label class="checkbox-inline">
                <input type="checkbox" id="jobtype4" <?php if(!empty($jobpost_detail) && $jobpost_detail->jobtype4 == 'Others'){ echo "checked='checked'"; } ?> value="Others" name="jobtype4">
                Any Others </label>
            </div>
            <br>
            <br>
            <div class="col-sm-4">
              <input type="text" id="otherstype" value="<?php if (!empty($jobpost_detail)) echo $jobpost_detail->otherstype; ?>" name="otherstype" placeholder="Others Type" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Job Location :<br><span style="font-size: 9px;">Press Ctrl for multiple Location selection<span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-12">
              <?php
              $joblocation_arr='';
              if(!empty($jobpost_detail))
              {
                $jobpost_detail->joblocation;
                $joblocation_arr = explode(',',$jobpost_detail->joblocation);
              }
              ?>
              <select multiple class="form-control" name="joblocation[]" >
                <?php foreach ($joblocation as $key => $value) {?>
                <option <?php if(!empty($jobpost_detail) && in_array($value->id, $joblocation_arr)){ echo "selected='selected'"; } ?>  value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                <?php  } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <h3>Education Qualification</h3>
      <div class="form-group">
        <label class="control-label col-sm-3">Required Education :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-12">
              <select class="form-control" name="required_education" id="required_education">
                <option value="Not Required" <?php if(!empty($jobpost_detail) && $jobpost_detail->required_education == 'Not Required'){ echo "selected='selected'"; } ?>>Not Required</option>
                <option value="intermediate" <?php if(!empty($jobpost_detail) && $jobpost_detail->required_education == 'intermediate'){ echo "selected='selected'"; } ?>>Intermediate</option>
                <option value="bachelor" <?php if(!empty($jobpost_detail) && $jobpost_detail->required_education == 'bachelor'){ echo "selected='selected'"; } ?>>Bachelor</option>
                <option value="master" <?php if(!empty($jobpost_detail) && $jobpost_detail->required_education == 'master'){ echo "selected='selected'"; } ?>>Master</option>
                <option value="other" <?php if(!empty($jobpost_detail) && $jobpost_detail->required_education == 'other'){ echo "selected='selected'"; } ?>>Other</option>
              </select>
              <div id="other_faculty_section" <?php if(!empty($jobpost_detail) && $jobpost_detail->required_education == 'other'){ /* do nothing */ } else  echo 'style="display:none;"';  ?>> <br>
                <input type="text" id="other_faculty" name="other_faculty" value="<?php if (!empty($jobpost_detail)) echo $jobpost_detail->other_faculty; ?>" class="form-control" placeholder="Other Faculty">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Expected Faculty :</label>
        <div class="col-sm-9">
          <input type="text"  name="expected_faculty" id='expected_faculty' class="form-control" value='<?php if (!empty($jobpost_detail)) echo $jobpost_detail->expected_faculty; ?>' />
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3">List of Mandatory Documents<br>
          (Please tick the required documents) :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-12">
              <ul>
                <li>
                  <input type="checkbox" name="slc_docs" id='slc_docs' value='1' <?php if(!empty($jobpost_detail) && $jobpost_detail->slc_docs == '1'){ echo "checked='checked'"; } ?> />
                  SLC Marksheet</li>
                <li>
                  <input type="checkbox" name="docs_11_12" id='docs_11_12' value='1' <?php if(!empty($jobpost_detail) && $jobpost_detail->docs_11_12 == '1'){ echo "checked='checked'"; } ?> />
                  11/12 Transcript</li>
                <li>
                  <input type="checkbox" name="bachelor_docs" id='bachelor_docs' value='1' <?php if(!empty($jobpost_detail) && $jobpost_detail->bachelor_docs == '1'){ echo "checked='checked'"; } ?> />
                  Bachelor Transcript</li>
                <li>
                  <input type="checkbox" name="masters_docs" id='masters_docs' value='1' <?php if(!empty($jobpost_detail) && $jobpost_detail->masters_docs == '1'){ echo "checked='checked'"; } ?> />
                  Masters Transcript</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <h3>Job Requirement</h3>      
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Job Specification : </label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <textarea class="simple" name="specification"><?php if (!empty($jobpost_detail)) echo $jobpost_detail->specification; ?>
</textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Job Description : </label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <textarea class="simple" name="requirements"><?php if (!empty($jobpost_detail)) echo $jobpost_detail->requirements; ?>
</textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Apply Instruction :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <textarea class="simple" name="howtoapply"><?php if (!empty($jobpost_detail)) echo $jobpost_detail->howtoapply; ?>
</textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Send Email To :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="orgemail" value="<?php if (!empty($jobpost_detail)) echo $jobpost_detail->orgemail; ?>" name="orgemail" placeholder="Send Email To" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3">Apply Online:</label>
        <div class="col-sm-9">
          <input type="checkbox" name="onlineap" id="onlineap" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" data-style="slow" <?php if(!empty($jobpost_detail) && $jobpost_detail->onlineap == 'Yes'){ echo "checked"; } elseif(!empty($jobpost_detail) && $jobpost_detail->onlineap == 'No'){ echo ""; } else echo "checked" ?>>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3">Apply through email:</label>
        <div class="col-sm-9">
          <input type="checkbox" name="emailap" id="emailap" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" data-style="slow" <?php if(!empty($jobpost_detail) && $jobpost_detail->emailap == 'Yes'){ echo "checked"; } elseif(!empty($jobpost_detail) && $jobpost_detail->emailap == 'No'){ echo ""; } else echo "checked" ?>>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3">Apply through Post:</label>
        <div class="col-sm-9">
          <input type="checkbox" name="postap" id="postap" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" data-style="slow" <?php if(!empty($jobpost_detail) && $jobpost_detail->postap == 'Yes'){ echo "checked"; } elseif(!empty($jobpost_detail) && $jobpost_detail->postap == 'No'){ echo ""; } else echo "" ?>>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3">Apply by Age :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-4">
              <input type="text" id="from_age" value="<?php if (!empty($jobpost_detail)) echo $jobpost_detail->from_age; ?>" name="from_age" placeholder="From Age" class="form-control col-sm-4" autofocus>
            </div>
            <div class="col-sm-1"> to </div>
            <div class="col-sm-4">
              <input type="text" id="to_age" value="<?php if (!empty($jobpost_detail)) echo $jobpost_detail->to_age; ?>" name="to_age" placeholder="To Age" class="form-control col-sm-4" autofocus>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3">Post Status :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-12">
              <select class="form-control" name="post_status" >
                <option value="private" <?php if(!empty($jobpost_detail) && $jobpost_detail->post_status == 'private'){ echo "selected='selected'"; } ?>>Private</option>
                <option value="public" <?php if(!empty($jobpost_detail) && $jobpost_detail->post_status == 'public'){ echo "selected='selected'"; } ?>>Public</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <?php if(empty($jobpost_detail)){?>
      <div class="form-group">
        <label class="control-label col-sm-3">Want video CV ?:</label>
        <div class="col-sm-9">
          <input type="checkbox" name="video_cv" id="video_cv" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" data-style="slow" <?php if(!empty($jobpost_detail) && $jobpost_detail->video_cv == 'Yes'){ echo "checked"; } elseif(!empty($jobpost_detail) && $jobpost_detail->video_cv == 'No'){ echo ""; } else echo "" ?> onchange="showThanks();">
          <div class="row"> This feature won't be available until you activate the service. To check Video CV subscription fees, "<a href="<?php echo base_url();?>subscribe_for_video_cv" target="_blank">Click Here</a>" </div>
        </div>
      </div>
      <?php } ?>
      <br>
      <div class="form-group">
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-6">
              <input type="submit" class="btn btn-info" id="submitprofile" value="<?php
                if (!empty($jobpost_detail)) {
                    echo 'Update Job';
                } else {
                    echo 'Add Job';
                }
                ?>" name="submitprofile" autofocus>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
      </div>
      <?php echo form_close(); ?> <!-- /form -->       
    </div>
  </div>
</div>
<!-- Delete Modal -->
<div id="myModalYes" class="modal fade" role="dialog">
  <div class="modal-dialog">     
    <!-- Modal content-->    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title green">Thank you for your interest in our Video CV Feature.</h4>
      </div>
      <div class="modal-body center"> This feature won't be available until you activate the service. To check Video CV subscription fees, Please "<a href="<?php echo base_url();?>subscribe_for_video_cv" target="_blank">Click Here</a>" </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $( "#required_education" ).change(function() {
          var faculty = $( "#required_education" ).val();
          if(faculty=="other")
          {
            $("#other_faculty").val("");  
            $('#other_faculty_section').show();
          }
          else
          {
            $("#other_faculty").val("");    
            $('#other_faculty_section').hide();
          }  
        });
    });
</script>

<script type="text/javascript">
function showThanks()
{
  if(document.getElementById('video_cv').checked) {    
    $('#myModalYes').modal('toggle');
  }
}
</script>