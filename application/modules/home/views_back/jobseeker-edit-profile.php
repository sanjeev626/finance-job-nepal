<!-- EDIT PROFILE -->
<div class="col-md-9 login-contains">
  <div role="tabpanel" class="tab-pane" id="Edit-profile">
    <div class="editProfile">
      <h3>Edit My Profile</h3>
      <p class="body-font">Your Profile's Data is display below, Please Edit and Click 'Save Changes' button at the bottom of this page. <br>
        (You must update your profile in order to access your control panel or to apply for any job.) </p>
    </div>
    <!-- editProfile -->
    <!-- TAB-->
    <div id="exTab2" class="container">
      <ul class="nav nav-tabs">
        <li class="active"> <a  href="#personal" data-toggle="tab">Personal</a> </li>
        <li> <a href="#education" data-toggle="tab">Education Background</a> </li>
        <li> <a href="#workexperience" data-toggle="tab">Work Experience</a> </li>
        <li> <a href="#training" data-toggle="tab">Training History</a> </li>
        <li> <a href="#language" data-toggle="tab">Language Proficiency</a> </li>
        <li> <a href="#reference" data-toggle="tab">Reference</a> </li>
      </ul>
      <div class="tab-content tabElement">
        <div class="tab-pane active" id="personal">
          <h3>Login Details </h3>
          <?php
          $action =base_url().'Jobseeker/updatePersonalDetail/'.$personal_detail->id;
          $attributes = array('class' => 'form-horizontal user-logIn','name'=>'jobseekersupdate',);
          echo form_open_multipart($action, $attributes);
          ?>
          <!-- <h2>Registration Form</h2> -->
          <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Username :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" disabled class="form-control" value="<?php echo $personal_detail->username;?>">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Email :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-6">
                  <input type="email" required name="email" class="form-control" value="<?php if(!empty($personal_detail)){ echo $personal_detail->email; } ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Secondary Email :</label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="email2" value="<?php if(!empty($personal_detail)){ echo $personal_detail->email2; } ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="Keyskill" class="col-sm-3 control-label">Career Objective :</label>
            <div class="col-sm-9">
              <textarea class="form-control " rows="4" name="summary" placeholder="Impress hiring managers with your Objective"><?php if(!empty($personal_detail)){ echo $personal_detail->summary; } ?></textarea>
            </div>
          </div>
          <h3>Personal Details </h3>
          <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Name :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-3">
                  <select id="salutation" class="form-control" name="salutation">
                    <?php foreach ($salutation as $key => $value) {?>
                    <option value='<?php echo $value->id; ?>' <?php if(!empty($personal_detail) && $personal_detail->salutation == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <input type="text" id="fname" value="<?php if(!empty($personal_detail)){ echo $personal_detail->fname; } ?>" required name="fname" placeholder="Full Name" class="form-control" autofocus>
                </div>
                <div class="col-md-3">
                  <input type="text" id="mname" value="<?php if(!empty($personal_detail)){ echo $personal_detail->mname; } ?>" name="mname" placeholder="Middle Name" class="form-control" autofocus>
                </div>
                <div class="col-md-3">
                  <input type="text" id="lname" required value="<?php if(!empty($personal_detail)){ echo $personal_detail->lname; } ?>" name="lname" placeholder="Last Name" class="form-control" autofocus>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Gender :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-2">
                  <label class="radio-inline">
                    <input type="radio" id="gender" checked value="Male" name="gender">
                    Male </label>
                </div>
                <div class="col-sm-2">
                  <label class="radio-inline">
                    <input type="radio" id="gender" <?php if(!empty($personal_detail) && $personal_detail->gender == 'Female'){ echo "checked='checked'"; } ?> value="Female" name="gender">
                    Female </label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Date of Birth :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-3">
                  <select id="currency" class="form-control" name="mm" required>
                    <option value="">Month</option>
                    <?php for($m=1;$m<=12;$m++){?>
                    <option value="<?php echo $m;?>" <?php if(!empty($personal_detail) && $personal_detail->mm == $m){ echo "selected='selected'"; } ?>><?php echo $m;?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="col-sm-3">
                  <select id="currency" class="form-control" name="dd" required>
                    <option value="">Day</option>
                    <?php for($d=1;$d<=32;$d++){?>
                    <option value="<?php echo $d;?>" <?php if(!empty($personal_detail) && $personal_detail->dd == $d){ echo "selected='selected'"; } ?>><?php echo $d;?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="col-sm-3">
                  <select id="currency" class="form-control" name="yy" required>
                    <option value="">Year</option>
                    <?php
                    $cyear = date('Y');
                    $pyear = $cyear-100;
                    for($y=$pyear;$y<=$cyear;$y++){?>
                    <option value="<?php echo $y;?>" <?php if(!empty($personal_detail) && $personal_detail->yy == $y){ echo "selected='selected'"; } ?>><?php echo $y;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Nationality :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-12">
                  <select class="form-control" name="nationality" >
                    <?php foreach ($nationality as $key => $value) {?>
                    <option  value='<?php echo $value->id; ?>' <?php if(!empty($personal_detail) && $personal_detail->nationality == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Phone (Res) :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" required class="form-control" name="phoneres" value="<?php if(!empty($personal_detail)){ echo $personal_detail->phoneres; } ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Phone (off) :</label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="phoneoff" value="<?php if(!empty($personal_detail)){ echo $personal_detail->phoneoff; } ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Mobile No. :</label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="phonecell" value="<?php if(!empty($personal_detail)){ echo $personal_detail->phonecell; } ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Mobile No. 2 :</label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="phonecell2" value="<?php if(!empty($personal_detail)){ echo $personal_detail->phonecell2; } ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Marital Status :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-2">
                  <label class="radio-inline">
                    <input type="radio" id="maritalstatus" checked value="Single" name="maritalstatus">
                    Single </label>
                </div>
                <div class="col-sm-2">
                  <label class="radio-inline">
                    <input type="radio" id="maritalstatus" <?php if(!empty($personal_detail) && $personal_detail->maritalstatus == 'Married'){ echo "checked='checked'"; } ?> value="Married" name="maritalstatus">
                    Married </label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Current Address :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <input type="text" required name="currentadd" class="form-control" placeholder="" value="<?php if(!empty($personal_detail)){ echo $personal_detail->currentadd; } ?>">
                </div>
                <div class="col-md-6 col-sm-6">
                  <select class="form-control" name="currentcon">
                    <option value="0">-- Select Country --</option>
                    <?php foreach ($country as $key => $value) {?>
                    <option value='<?php echo $value->country_code; ?>' <?php if(!empty($personal_detail) && $personal_detail->currentcon == $value->country_code){ echo "selected='selected'"; } ?>><?php echo $value->country_name; ?></option>
                    <?php  } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Permanent Address :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <input type="text" required name="permanentadd" class="form-control" placeholder="" value="<?php if(!empty($personal_detail)){ echo $personal_detail->permanentadd; } ?>">
                </div>
                <div class="col-md-6 col-sm-6">
                  <select class="form-control" name="permanentcon">
                    <option value="0">-- Select Country --</option>
                    <?php foreach ($country as $key => $value) {?>
                    <option value='<?php echo $value->country_code; ?>' <?php if(!empty($personal_detail) && $personal_detail->permanentcon == $value->country_code){ echo "selected='selected'"; } ?>><?php echo $value->country_name; ?></option>
                    <?php  } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Upload Your Photo</label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <input type="file" name="picture" id='picture' class="form-control" value='' />
                  <span class="green"><b>Note :</b> Allowed image extensions are jpg, jpeg, gif, png, bmp</span>
                  <?php if (!empty($personal_detail) && !empty($personal_detail->picture) && isset($personal_detail->picture)) { ?>
                  <input type="hidden" value="<?php echo $personal_detail->picture; ?>" name="logo">
                  <div style="padding-top:10px;"><img height="20%" width="20%" src="<?php echo base_url() . 'uploads/jobseeker/' . $personal_detail->picture; ?>"></div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <h3>Education Details</h3>
          <div class="form-group">
            <label class="control-label col-sm-3">Latest Education :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-12">
                  <select class="form-control" name="faculty" id="faculty">
                    <option value="none">None</option>
                    <option value="intermediate" <?php if($personal_detail->faculty=="intermediate") echo "selected"; ?>>Intermediate</option>
                    <option value="bachelor" <?php if($personal_detail->faculty=="bachelor") echo "selected"; ?>>Bachelor</option>
                    <option value="master" <?php if($personal_detail->faculty=="master") echo "selected"; ?>>Master</option>
                    <option value="other" <?php if($personal_detail->faculty=="other") echo "selected"; ?>>Other</option>
                  </select>
                  <br>
                  <input type="text" id="other_faculty" name="other_faculty" value="<?php echo $personal_detail->other_faculty; ?>" class="form-control" placeholder="Other Faculty" <?php if(!empty($personal_detail) && $personal_detail->faculty != 'other'){ echo "style='display:none;'"; } ?>>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Academic Documents :</label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-12">
                  <ul>
                    <li><strong>SLC Marksheet</strong>
                      <input type="file" name="slc_docs" id='slc_docs' class="form-control" value='' />
                      <?php echo $personal_detail->slc_docs; ?></li>
                    <li><strong>11/12 Transcript</strong>
                      <input type="file" name="docs_11_12" id='docs_11_12' class="form-control" value='' />
                      <?php echo $personal_detail->docs_11_12; ?></li>
                    <li><strong>Bachelor Transcript</strong>
                      <input type="file" name="bachelor_docs" id='bachelor_docs' class="form-control" value='' />
                      <?php echo $personal_detail->bachelor_docs; ?></li>
                    <li><strong>Masters Transcript</strong>
                      <input type="file" name="masters_docs" id='masters_docs' class="form-control" value='' />
                      <?php echo $personal_detail->masters_docs; ?></li>
                    <li><strong>Other Related Documents</strong>
                      <input type="file" name="other_docs" id='other_docs' class="form-control" value='' />
                      <?php echo $personal_detail->other_docs; ?></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <h3>Experience Details</h3>
          <div class="form-group">
            <label class="control-label col-sm-3">Have work experience :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-2">
                  <label class="radio-inline">
                    <input type="radio" id="workexp" checked value="No" name="workexp">
                    No </label>
                </div>
                <div class="col-sm-2">
                  <label class="radio-inline">
                    <input type="radio" id="workexp" <?php if(!empty($personal_detail) && $personal_detail->workexp == 'Yes'){ echo "checked='checked'"; } ?> value="Yes" name="workexp">
                    Yes </label>
                </div>
                <div class="col-sm-3">
                  <select id="expyrs" class="form-control" name="expyrs">
                    <?php for($m=0;$m<=20;$m++){?>
                    <option value="<?php echo $m;?>" <?php if(!empty($personal_detail) && $personal_detail->expyrs == $m){ echo "selected='selected'"; } ?>><?php echo $m; if($m>1) echo " Years"; else echo " Year"; ?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="col-sm-3">
                  <select id="expmths" class="form-control" name="expmths">
                    <?php for($d=0;$d<=12;$d++){?>
                    <option value="<?php echo $d;?>" <?php if(!empty($personal_detail) && $personal_detail->expmths == $d){ echo "selected='selected'"; } ?>><?php echo $d; if($d>1) echo " Months"; else echo " Month"; ?></option>
                    <?php }?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Current Job posiiton :</label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="cjobposiiton" value="<?php if(!empty($personal_detail)){ echo $personal_detail->cjobposiiton; } ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="Keyskill" class="col-sm-3 control-label">Key skills :</label>
            <div class="col-sm-9">
              <textarea class="form-control " rows="4" name="keyskills" placeholder="Key Skills"><?php if (!empty($personal_detail)) echo $personal_detail->keyskills; ?></textarea>
              Note : Separate Key Skills with a Comma(,) </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Present Salary:</label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-2 col-sm-2">
                  <select class="form-control" name="preunit">
                    <option value="NRs">NRs</option>
                  </select>
                </div>
                <div class="col-md-6 col-sm-6">
                  <input type="text" name="presal"  class="form-control" placeholder="" value="<?php if(!empty($personal_detail)){ echo $personal_detail->presal; } ?>">
                </div>
                <div class="col-md-3 col-sm-3"> per month (Gross) </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Expected Salary :</label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-2 col-sm-2">
                  <select class="form-control" name="expunit">
                    <option value="NRs">NRs</option>
                    <option value="USD">USD</option>
                  </select>
                </div>
                <div class="col-md-2 col-sm-2">
                  <select class="form-control" name="exptype">
                    <option value="Equals">Equals</option>
                    <option value="Above">Above</option>
                    <option value="Below">Below</option>
                  </select>
                </div>
                <div class="col-md-6 col-sm-6">
                  <select class="form-control" name="expsal">
                    <?php foreach ($salary_range as $key => $value) {?>
                    <option  value='<?php echo $value->id; ?>' <?php if(!empty($personal_detail) && $personal_detail->expsal == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                  </select>
                </div>
                <div class="col-md-3 col-sm-3"> per month (Gross) </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Job Region :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-12">
                  <select class="form-control" name="job_region" >
                    <?php foreach ($job_region as $key => $value) {?>
                    <option value='<?php echo $value->id; ?>' <?php if(!empty($personal_detail) && $personal_detail->job_region == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Preferred Job location :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" required class="form-control" name="joblocation" value="<?php if(!empty($personal_detail)){ echo $personal_detail->joblocation; } ?>">
                </div>
              </div>
            </div>
          </div>
          <h3>Preferred Job Category</h3>
          <h5><strong>Your First Job Preference:</strong></h5>
          <div class="form-group">
            <label class="control-label col-sm-3">Funtional Area :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-12">
                  <select class="form-control" name="funcarea1" >
                    <?php foreach ($functional_area as $key => $value) {?>
                    <option  value='<?php echo $value->id; ?>' <?php if(!empty($personal_detail) && $personal_detail->funcarea1 == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Nature of Organization: </label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-12">
                  <ul class="catogory">
                    <?php foreach ($natureoforg as $key => $value) {
                    $check = $this->general_model->countTotal('checkvalue',array('sid'=>$personal_detail->id,'attid'=>'1','chkvalue'=>$value->dropvalue));
                    ?>
                    <li>
                      <input name="natureoforg1[]" <?php if($check == 1){ echo "checked='checked'"; } ?> value="<?php echo $value->dropvalue; ?>" type="checkbox">
                      <?php echo $value->dropvalue; ?> </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <h5><strong>Your Second Job Preference:</strong></h5>
          <div class="form-group">
            <label class="control-label col-sm-3">Funtional Area :</label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-12">
                  <select class="form-control" name="funcarea2" >
                    <?php foreach ($functional_area as $key => $value) {?>
                    <option  value='<?php echo $value->id; ?>' <?php if(!empty($personal_detail) && $personal_detail->funcarea2 == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Nature of Organization: </label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-12">
                  <ul class="catogory">
                    <?php foreach ($natureoforg as $key => $value) {
                    $check = $this->general_model->countTotal('checkvalue',array('sid'=>$personal_detail->id,'attid'=>'2','chkvalue'=>$value->dropvalue));
                    ?>
                    <li>
                      <input name="natureoforg2[]" <?php if($check == 1){ echo "checked='checked'"; } ?> value="<?php echo $value->dropvalue; ?>" type="checkbox">
                      <?php echo $value->dropvalue; ?> </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Attach Resume</label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <input type="file" name="resume" id='resume' class="form-control" value='' />
                  <span style="color:green"><b>Note :</b> Allowed resume extensions are doc, docx, pdf, txt, rtf</span>
                  <?php
                  $resume = ($personal_detail->resume) ? $personal_detail->resume : '';
                  $resumepath = base_url()."uploads/resume/".$personal_detail->resume;
                  if(!empty($resume)){?>
                  <input type="hidden" value="<?php echo $personal_detail->resume; ?>" name="resume">
                  <div style="padding-top:10px;"> <a target="_blank" class="btn btn-success" href="<?php echo $resumepath; ?>">Download Resume </a> </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <?php /* ?>
          <div class="form-group">
            <label class="control-label col-sm-3">Youtube code for Video Resume</label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-md-12 col-sm-12"> 
                  <!-- <input type="file" name="video_resume[]" id='video_resume' class="form-control" value='' />
                  <span style="color:green"><b>Note :</b> Allowed video resume extensions are mp4, mpeg, flv, avi, mkv</span>
                  <?php
                  $video_resume = ($personal_detail->video_resume) ? $personal_detail->video_resume : '';
                  $videoresumepath = base_url()."uploads/video_resume/".$personal_detail->video_resume;
                  if(!empty($video_resume)){?>
                  <input type="hidden" value="<?php echo $personal_detail->video_resume; ?>" name="video_resume[]">
                  <div style="padding-top:10px;">
                      <a target="_blank" class="btn btn-success" href="<?php echo $videoresumepath; ?>">Download/View Video Resume </a>
                  </div>
                  <?php } ?>
                  <br>
                  OR -->
                  <input type="text" class="form-control" name="video_resume_youtube" value="<?php if(!empty($personal_detail)){ echo $personal_detail->video_resume_youtube; } ?>" placeholder="SXGTyb4zdLM">
                  <strong>Process : </strong><br>
                  From the youtube url, just enter the code<br>
                  For example, in URL https://www.youtube.com/watch?v=SXGTyb4zdLM, just enter <strong>SXGTyb4zdLM</strong> </div>
              </div>
            </div>
          </div>
          <?php */ ?>
          <div class="form-group clearfix" style="margin-left: 0px;">
            <label class="control-label col-sm-3">&nbsp;</label>
            <button  type="submit" name="submit" class="btn btn-warning">Save Changes</button>
          </div>
          <?php echo form_close(); ?> </div>
        <!--  tab-pane  -->
        <div class="tab-pane" id="education" style="margin: -14px;">
          <?php
          $action =base_url().'Jobseeker/updateEducation/'.$sid;
          $attributes = array('class' => 'form-horizontal user-logIn','name'=>'jobseekersupdate',);
          echo form_open_multipart($action, $attributes);
          ?>
          <a href="javascript:void(0)" id="add_education" class="btn btn-success">Add Education</a> <br>
          <div class="educational-detail tab-education-detail">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Degree</th>
                  <th>Name of Degree</th>
                  <th style="width:13%">Graduation Year</th>
                  <th>Collage/ School</th>
                  <th>Board/ University</th>
                  <th style="width:14%">Percentage/<br>
                    CGPA</th>
                  <th style="width:13%">Action</th>
                </tr>
              </thead>
              <tbody class="addeducation">
                <?php
                if(!empty($education_detail)){
                foreach($education_detail as $key => $val){
                ?>
                <tr>
                  <td><select class="form-control" name="degree[]" >
                      <?php foreach ($education as $key => $value) {?>
                      <option value='<?php echo $value->id; ?>' <?php if($val->degree == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->dropvalue; ?></option>
                      <?php  } ?>
                    </select></td>
                  <td><input type="text" class="form-control" name="faculty[]" value="<?php echo $val->faculty;?>"></td>
                  <td><select id="currency" class="form-control" name="graduationyear[]">
                      <option value="0">Year</option>
                      <?php
                      $cyear = date('Y');
                      $pyear = $cyear-50;
                      for($y=$pyear;$y<=$cyear;$y++){?>
                      <option value="<?php echo $y;?>" <?php if($val->graduationyear == $y){ echo "selected='selected'"; } ?>><?php echo $y;?></option>
                      <?php } ?>
                    </select></td>
                  <td><input type="text" class="form-control" name="instution[]" value="<?php echo $val->instution;?>"></td>
                  <td><input type="text" class="form-control" name="board[]" value="<?php echo $val->board;?>"></td>
                  <td><input type="text" class="form-control" name="percentage[]" value="<?php echo $val->percentage;?>"></td>
                  <td><a href="javascript:void(0)" class="btn btn-success remove_edu_row">Remove</a></td>
                </tr>
                <?php }} ?>
              </tbody>
            </table>
            <br>
            <br>
            <div class="form-group clearfix" style="margin-left: 0px;">
              <button  type="submit" name="submit" class="btn btn-warning">Save Changes</button>
            </div>
            <?php echo form_close(); ?> </div>
        </div>
        <!--  tab-pane  -->
        <div class="tab-pane" id="workexperience">
          <div class="employment-detail emp-detail addexperience">
            <?php
            $action =base_url().'Jobseeker/updateExperience/'.$sid;
            $attributes = array('class' => 'form-horizontal user-logIn','name'=>'jobseekersupdate',);
            echo form_open_multipart($action, $attributes);
            ?>
            <?php 
            if(!empty($experience_detail)){
            foreach($experience_detail as $key => $expvalue): ?>
            <table class="table table-responsive ">
              <h3 style="color: #f39114;margin-bottom:0px;">Work Experience #</h3>
              <tr>
                <th>Company Name<span class="asterisk">*</span></th>
                <td><div class="row">
                    <div class="col-md-6">
                      <input type="text" id="company" required value="<?php echo $expvalue->company;  ?>" name="company[]" placeholder="Company Name" class="form-control" autofocus>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th>Location<span class="asterisk">*</span></th>
                <td><div class="row">
                    <div class="col-md-6">
                      <input type="text" id="empoyername" required value="<?php echo $expvalue->empoyername;  ?>" name="empoyername[]" placeholder="Location" class="form-control" autofocus>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>Designation<span class="asterisk">*</span></th>
                <td><div class="row">
                    <div class="col-md-6">
                      <input type="text" id="designation" required value="<?php echo $expvalue->designation;  ?>" name="designation[]" placeholder="Designation" class="form-control" autofocus>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>From<span class="asterisk">*</span></th>
                <td><div class="row">
                    <div class="col-md-3">
                      <select id="currency" class="form-control" name="frommonth[]">
                        <option value="0">Month</option>
                        <?php
                                                    for($m=0;$m<=12;$m++){?>
                        <option value="<?php echo $m;?>" <?php if($expvalue->frommonth == $m){ echo "selected='selected'"; } ?>><?php echo $m;?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <select id="currency" class="form-control" name="fromyear[]">
                        <option value="0">Year</option>
                        <?php
                        $cyear = date('Y');
                        $pyear = $cyear-50;
                        for($y=$pyear;$y<=$cyear;$y++){?>
                        <option value="<?php echo $y;?>" <?php if($expvalue->fromyear == $y){ echo "selected='selected'"; } ?>><?php echo $y;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>To</th>
                <td><div class="row">
                    <div class="col-md-3">
                      <select id="currency" class="form-control tomonth" name="tomonth[]">
                        <option value="0">Month</option>
                        <?php
                                                    for($m=0;$m<=12;$m++){?>
                        <option value="<?php echo $m;?>" <?php if($expvalue->tomonth == $m){ echo "selected='selected'"; } ?>><?php echo $m;?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <select id="currency" class="form-control toyear" name="toyear[]">
                        <option value="0">Year</option>
                        <?php
                        $cyear = date('Y');
                        $pyear = $cyear-50;
                        for($y=$pyear;$y<=$cyear;$y++){?>
                        <option value="<?php echo $y;?>" <?php if($expvalue->toyear == $y){ echo "selected='selected'"; } ?>><?php echo $y;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>Currently Working : </th>
                <td><div class="row">
                    <div class="col-sm-2">
                      <label>
                        <input type="checkbox" class="currently_working" <?php if(!empty($expvalue) && $expvalue->currently_working == '1'){ echo "checked='checked'"; } ?> value="1" name="currently_working[]">
                      </label>
                      <?php if(!empty($expvalue) && $expvalue->currently_working == '1'){
                      $name = 'test';
                      }else{
                      $name = 'currently_working[]';
                      }?>
                      <div class="show_currently_work">
                        <input type="hidden" value="0"  name="<?php echo $name; ?>">
                      </div>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>My Duties and Responsibilities <span class="asterisk">*</span></th>
                <td><div class="row">
                    <div class="col-md-12">
                      <textarea name="duties[]" class="form-control" rows="10"><?php echo $expvalue->duties; ?></textarea>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td colspan="2"><a href="javascript:void(0)" class="btn btn-success remove_experience_row">Remove</a></td>
              </tr>
            </table>
            <?php endforeach; } ?>
            <div class="form-group clearfix above_experience"> <a href="javascript:void(0)" id="add_experience" class="btn btn-success">Add Experince</a>
              <button  type="submit" name="submit" class="btn btn-warning">Save Changes</button>
            </div>
            <?php echo form_close(); ?> </div>
        </div>
        <!--  tab-pane  -->
        <div class="tab-pane" id="training">
          <?php
          $action =base_url().'Jobseeker/updateTraining/'.$sid;
          $attributes = array('class' => 'form-horizontal user-logIn','name'=>'jobseekersupdate',);
          echo form_open_multipart($action, $attributes);
          ?>
          <a href="javascript:void(0)" id="add_training" class="btn btn-success">Add Training</a> <br>
          <div class="educational-detail tab-education-detail">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Company / Institute Name</th>
                  <th>Training Course</th>
                  <th>From</th>
                  <th>To</th>
                  <th style="width:14%">Action</th>
                </tr>
              </thead>
              <tbody class="addtraining">
                <?php
                if(!empty($training_detail)){
                    foreach($training_detail as $key => $val){
                  ?>
                <tr>
                  <td><input type="text" class="form-control" name="institution[]" value="<?php echo $val->institution;?>"></td>
                  <td><input type="text" class="form-control" name="course[]" value="<?php echo $val->course;?>"></td>
                  <td><select id="currency" class="form-control" name="frommonth[]">
                      <option value="0">Month</option>
                      <?php
                      for($m=0;$m<=12;$m++){?>
                      <option value="<?php echo $m;?>" <?php if($val->frommonth == $m){ echo "selected='selected'"; } ?>><?php echo $m;?></option>
                      <?php } ?>
                    </select>
                    <br>
                    <select id="currency" class="form-control" name="fromyear[]">
                      <option value="0">Year</option>
                      <?php
                      $cyear = date('Y');
                      $pyear = $cyear-50;
                      for($y=$pyear;$y<=$cyear;$y++){?>
                      <option value="<?php echo $y;?>" <?php if($val->fromyear == $y){ echo "selected='selected'"; } ?>><?php echo $y;?></option>
                      <?php } ?>
                    </select></td>
                  <td><select id="currency" class="form-control" name="tomonth[]">
                      <option value="0">Month</option>
                      <?php
                      for($m=0;$m<=12;$m++){?>
                      <option value="<?php echo $m;?>" <?php if($val->tomonth == $m){ echo "selected='selected'"; } ?>><?php echo $m;?></option>
                      <?php } ?>
                    </select>
                    <br>
                    <select id="currency" class="form-control" name="toyear[]">
                      <option value="0">Year</option>
                      <?php
                      $cyear = date('Y');
                      $pyear = $cyear-50;
                      for($y=$pyear;$y<=$cyear;$y++){?>
                      <option value="<?php echo $y;?>" <?php if($val->toyear == $y){ echo "selected='selected'"; } ?>><?php echo $y;?></option>
                      <?php } ?>
                    </select></td>
                  <td><a href="javascript:void(0)" class="btn btn-success remove_training_row">Remove</a></td>
                </tr>
                <?php }} ?>
              </tbody>
            </table>
            <br>
            <br>
            <div class="form-group clearfix" style="margin-left: 0px;">
              <button  type="submit" name="submit" class="btn btn-warning">Save Changes</button>
            </div>
            <?php echo form_close(); ?> </div>
        </div>
        <!--  tab-pane  -->
        <div class="tab-pane" id="language">
          <?php
          $action =base_url().'Jobseeker/updateLanguage/'.$sid;
          $attributes = array('class' => 'form-horizontal user-logIn','name'=>'jobseekersupdate',);
          echo form_open_multipart($action, $attributes);
          ?>
          <a href="javascript:void(0)" id="add_language" class="btn btn-success">Add Language</a> <br>
          <div class="educational-detail tab-education-detail">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Language</th>
                  <th>Reading</th>
                  <th>Writing</th>
                  <th>Speaking</th>
                  <th style="width:14%">Action</th>
                </tr>
              </thead>
              <tbody class="addlanguage">
                <?php
                if(!empty($language_detail)){
                    foreach($language_detail as $key => $val){
                ?>
                <tr>
                  <td><input type="text" class="form-control" name="lang[]" value="<?php echo $val->lang;?>"></td>
                  <td><select id="currency" class="form-control" name="reading[]">
                      <option value="Yes" <?php if($val->reading == 'Yes'){ echo "selected='selected'"; } ?>>Yes</option>
                      <option value="No" <?php if($val->reading == 'No'){ echo "selected='selected'"; } ?>>No</option>
                    </select></td>
                  <td><select id="currency" class="form-control" name="writing[]">
                      <option value="Yes" <?php if($val->writing == 'Yes'){ echo "selected='selected'"; } ?>>Yes</option>
                      <option value="No" <?php if($val->writing == 'No'){ echo "selected='selected'"; } ?>>No</option>
                    </select></td>
                  <td><select id="currency" class="form-control" name="speaking[]">
                      <option value="Yes" <?php if($val->speaking == 'Yes'){ echo "selected='selected'"; } ?>>Yes</option>
                      <option value="No" <?php if($val->speaking == 'No'){ echo "selected='selected'"; } ?>>No</option>
                    </select></td>
                  <td><a href="javascript:void(0)" class="btn btn-success remove_language_row">Remove</a></td>
                </tr>
                <?php }} ?>
              </tbody>
            </table>
            <br>
            <br>
            <div class="form-group clearfix" style="margin-left: 0px;">
              <button  type="submit" name="submit" class="btn btn-warning">Save Changes</button>
            </div>
            <?php echo form_close(); ?> </div>
        </div>
        <!--  tab-pane  -->
        <div class="tab-pane" id="reference">
          <div class="employment-detail emp-detail addreference">
            <?php
            $action =base_url().'Jobseeker/updateReference/'.$sid;
            $attributes = array('class' => 'form-horizontal user-logIn','name'=>'jobseekersupdate',);
            echo form_open_multipart($action, $attributes);
            ?>
            <?php if(!empty($reference_detail)){
                                foreach($reference_detail as $key => $refvalue): ?>
            <table class="table table-responsive ">
              <h3 style="color: #f39114;margin-bottom:0px;">Reference #</h3>
              <tr>
                <th>Name<span class="asterisk">*</span></th>
                <td><div class="row">
                    <div class="col-sm-3">
                      <select id="salutation" class="form-control" name="salutation[]">
                        <?php foreach ($salutation as $key => $value) {?>
                        <option value='<?php echo $value->id; ?>' <?php if($refvalue->salutation == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->dropvalue; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <input type="text" id="fname" value="<?php echo $refvalue->fname;  ?>" required name="fname[]" placeholder="Full Name" class="form-control" autofocus>
                    </div>
                    <div class="col-md-3">
                      <input type="text" id="mname" value="<?php echo $refvalue->mname;  ?>" name="mname[]" placeholder="Middle Name" class="form-control" autofocus>
                    </div>
                    <div class="col-md-3">
                      <input type="text" id="lname" required value="<?php echo $refvalue->lname;  ?>" name="lname[]" placeholder="Last Name" class="form-control" autofocus>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>Address<span class="asterisk">*</span></th>
                <td><div class="row">
                    <div class="col-md-3">
                      <input type="text" id="block" value="<?php echo $refvalue->block;  ?>" name="block[]" placeholder="Block" class="form-control" autofocus>
                    </div>
                    <div class="col-md-3">
                      <input type="text" id="street" value="<?php echo $refvalue->street;  ?>" name="street[]" placeholder="Street Name" class="form-control" autofocus>
                    </div>
                    <div class="col-md-3">
                      <input type="text" id="city" value="<?php echo $refvalue->city;  ?>" name="city[]" placeholder="City" class="form-control" autofocus>
                    </div>
                    <div class="col-sm-3">
                      <select id="country" class="form-control" name="country[]">
                        <option value="0">-- Select Country --</option>
                        <?php foreach ($country as $key => $value) {?>
                        <option value='<?php echo $value->country_code; ?>' <?php if($refvalue->country == $value->country_code){ echo "selected='selected'"; } ?>><?php echo $value->country_name; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>Home Phone</th>
                <td><div class="row">
                    <div class="col-md-9">
                      <input type="text" id="home" value="<?php echo $refvalue->home;  ?>"  name="home[]" placeholder="Home Phone" class="form-control" autofocus>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>Office Phone</th>
                <td><div class="row">
                    <div class="col-md-9">
                      <input type="text" id="office" value="<?php echo $refvalue->office;  ?>"  name="office[]" placeholder="Office Phone" class="form-control" autofocus>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>Cell No.</th>
                <td><div class="row">
                    <div class="col-md-9">
                      <input type="text" id="cell" value="<?php echo $refvalue->cell;  ?>"  name="cell[]" placeholder="Cell No" class="form-control" autofocus>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>Fax</th>
                <td><div class="row">
                    <div class="col-md-9">
                      <input type="text" id="fax" value="<?php echo $refvalue->fax;  ?>"  name="fax[]" placeholder="Fax" class="form-control" autofocus>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>Email<span class="asterisk">*</span></th>
                <td><div class="row">
                    <div class="col-md-9">
                      <input type="email" id="email" value="<?php echo $refvalue->email;  ?>" required name="email[]" placeholder="Email" class="form-control" autofocus>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>Company Name<span class="asterisk">*</span></th>
                <td><div class="row">
                    <div class="col-md-9">
                      <input type="text" id="cname" value="<?php echo $refvalue->cname;  ?>" required name="cname[]" placeholder="Company Name" class="form-control" autofocus>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>Company Location<span class="asterisk">*</span></th>
                <td><div class="row">
                    <div class="col-md-9">
                      <input type="text" id="clocation" value="<?php echo $refvalue->clocation;  ?>" required name="clocation[]" placeholder="Location" class="form-control" autofocus>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>Designation<span class="asterisk">*</span></th>
                <td><div class="row">
                    <div class="col-md-9">
                      <input type="text" id="designation" value="<?php echo $refvalue->designation;  ?>" required name="designation[]" placeholder="Designation" class="form-control" autofocus>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <th>Relationship<span class="asterisk">*</span></th>
                <td><div class="row">
                    <div class="col-md-9">
                      <input type="text" id="relationship" value="<?php echo $refvalue->relationship;  ?>" required name="relationship[]" placeholder="Relationship" class="form-control" autofocus>
                    </div>
                  </div></td>
              </tr>
              <tr>
                <td colspan="2"><a href="javascript:void(0)" class="btn btn-success remove_reference_row">Remove</a></td>
              </tr>
            </table>
            <?php endforeach; } ?>
            <div class="form-group clearfix above_reference"> <a href="javascript:void(0)" id="add_reference" class="btn btn-success">Add Reference</a>
              <button  type="submit" name="submit" class="btn btn-warning">Save Changes</button>
            </div>
            <?php echo form_close(); ?> </div>
        </div>
        <!--  tab-pane  --> 
      </div>
      <!-- tab-content --> 
    </div>
    <!-- exTab2 --> 
  </div>
  <!--  Edit-profile --> 
</div>
<script type="text/javascript">
    $(document).ready(function(){
        /*----------------------------------------------------------------
                                    Add Education Script
        -----------------------------------------------------------------*/
        $('#add_education').on('click',function(){
            $.ajax({
             type: 'GET',
             url: site_url('Jobseeker/appendEducation'),
             success: function (data) {
              $('.addeducation').last().append(data);
            }
            });
        });

        $(document).on('click','.remove_edu_row',function(){
            $(this).parent().parent().remove();
        });

        /*----------------------------------------------------------------
                                    Add Experience Script
        -----------------------------------------------------------------*/
        $('#add_experience').on('click',function(){
            $.ajax({
             type: 'GET',
             url: site_url('Jobseeker/appendExperience'),
             success: function (data) {
                 $(data).insertBefore( ".above_experience" );
            }
            });
        });

        $(document).on('click','.remove_experience_row',function(){
            $(this).parent().parent().parent().remove();
            $(this).parent().parent().parent().remove();
        });

        /*----------------------------------------------------------------
                                    Add Training Script
        -----------------------------------------------------------------*/
        $('#add_training').on('click',function(){
            $.ajax({
             type: 'GET',
             url: site_url('Jobseeker/appendTraining'),
             success: function (data) {
              $('.addtraining').last().append(data);
            }
            });
        });

        $(document).on('click','.remove_training_row',function(){
            $(this).parent().parent().remove();
        });

         /*----------------------------------------------------------------
                                    Add Language Script
        -----------------------------------------------------------------*/
        $('#add_language').on('click',function(){
            $.ajax({
             type: 'GET',
             url: site_url('Jobseeker/appendLanguage'),
             success: function (data) {
              $('.addlanguage').last().append(data);
            }
            });
        });

        $(document).on('click','.remove_language_row',function(){
            $(this).parent().parent().remove();
        });

        /*----------------------------------------------------------------
                                    Add Reference Script
        -----------------------------------------------------------------*/
        $('#add_reference').on('click',function(){
            $.ajax({
             type: 'GET',
             url: site_url('Jobseeker/appendReference'),
             success: function (data) {
                 $(data).insertBefore( ".above_reference" );
            }
            });
        });

        $(document).on('click','.remove_reference_row',function(){
            $(this).parent().parent().parent().remove();
            $(this).parent().parent().parent().remove();
        });


        //$('.currently_working').click(function(){ alert('click');
        $(document).on('click','.currently_working',function(){
            if($(this).is(':checked')){
                $(this).parent().parent().find('div').hide();  // checked
                $(this).parent().parent().find('div').find('input').attr('name','test');
            }else{
                $(this).parent().parent().find('.show_currently_work').show();
                $(this).parent().parent().find('div').find('input').attr('name','currently_working[]');
            }
        });



        $( "#faculty" ).change(function() {
          var faculty = $( "#faculty" ).val();

          if(faculty=="other")
          {
            $("#other_faculty").val("");            
            $('#other_faculty').show();
          }
          else
          {
            $("#other_faculty").val("");            
            $('#other_faculty').hide();
          }
            

        });

    });
</script> 
<script type="text/javascript">
  $(function() {
    // Javascript to enable link to tab
    var hash = document.location.hash;
    if (hash) {
      console.log(hash);
      $('.nav-tabs a[href='+hash+']').tab('show');
    }

    // Change hash for page-reload
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
      window.location.hash = e.target.hash;
    });
    

    $('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
  });
</script> 
