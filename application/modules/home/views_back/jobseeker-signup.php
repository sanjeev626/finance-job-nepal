<!-- body start -->
<div>
  <div class="col-md-offset-1 col-md-7 clearfix">
    <?php
    $action =base_url().'Jobseeker/jobseekerRegistration';  
    $attributes = array('id' => 'jobseekersignup_demo','name'=>'jobseekersignup',);
    echo form_open_multipart($action, $attributes);    
    ?>
    <div class="jobseeker-left-aside">
      <div class="title">
        <h1>Jobseeker Registration Form</h1>
        <p>Post your latest resume with complete details of your name, postal address, qualifications, work experience, job applied for and expected salary. You will be informed in the due course for the next course of action very soon. To Start your online recruitment process, you have to fill in the minimum mandatory details in the form below to proceed.</p>
      </div>
      <?php if($message){ ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $message;?> </div>
      <?php } ?>
      <div class="personal-details clearfix"> <strong>Personal Details</strong>
        <div class="row">
          <div class="col-md-2 col-sm-2">
            <div class="form-group clearfix">
              <label>Honorific</label>
              <div class="styled-select">
                <select class="form-control" name="salutation">
                  <?php foreach ($salutation as $key => $value) {?>
                  <option <?php echo  set_select('salutation',$value->id); ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                  <?php  } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-10 col-sm-10">
            <div class="row">
              <div class="col-md-4 col-sm-4">
                <div class="form-group clearfix">
                  <label>First Name:<span class="asterisk">*</span></label>
                  <input type="text" name="fname" value="<?php echo set_value('fname'); ?>" required class="form-control" placeholder="" >
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group clearfix">
                  <label>Middle Name</label>
                  <input type="text" name="mname" value="<?php echo set_value('mname'); ?>" class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group clearfix">
                  <label>Last Name:<span class="asterisk">*</span></label>
                  <input type="text" name="lname" value="<?php echo set_value('lname'); ?>" required class="form-control" placeholder="" >
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-sm-2">
            <div class="form-group clearfix">
              <label class="margin">DOB:<span class="asterisk">*</span></label>
            </div>
          </div>
          <div class="col-md-10 col-sm-10">
            <div class="row">
              <div class="col-md-4 col-sm-4">
                <div class="form-group clearfix">
                  <div class="styled-select">
                    <select class="form-control" name="mm" required>
                      <option value="">Month</option>
                      <?php for($m=1;$m<=12;$m++){?>
                      <option value="<?php echo $m;?>" <?php echo  set_select('mm',$m); ?>><?php echo $m;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group clearfix">
                  <div class="styled-select">
                    <select class="form-control" name="dd" required>
                      <option value="">Day</option>
                      <?php for($d=1;$d<=32;$d++){?>
                      <option value="<?php echo $d;?>" <?php echo  set_select('dd',$d); ?>><?php echo $d;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group clearfix">
                  <div class="styled-select">
                    <select class="form-control" name="yy" required>
                      <option value="">Year</option>
                      <?php
                      $cyear = date('Y');
                      $pyear = $cyear-100;
                      for($y=$pyear;$y<$cyear;$y++){?>
                      <option value="<?php echo $y;?>" <?php echo  set_select('yy',$y); ?>><?php echo $y;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Phone(Res):<span class="asterisk">*</span></label>
              <input type="text" name="phoneres" value="<?php echo set_value('phoneres'); ?>" required class="form-control" placeholder="" >
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Phone(off)</label>
              <input type="text" name="phoneoff" value="<?php echo set_value('phoneoff'); ?>" class="form-control" placeholder="">
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Mobile No: <span class="asterisk">*</span></label>
              <input type="text" name="phonecell" value="<?php echo set_value('phonecell'); ?>" required class="form-control" placeholder="">
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Mobile No 2: </label>
              <input type="text" name="phonecell2" value="<?php echo set_value('phonecell2'); ?>"  class="form-control" placeholder="">
            </div>
          </div>
          <div class="col-md-12 col-sm-12">
            <div class="form-group clearfix">
              <label>Nationality</label>
              <select class="form-control" name="nationality">
                <?php foreach ($nationality as $key => $value) {?>
                <option  value='<?php echo $value->id; ?>' <?php echo  set_select('nationality',$value->id); ?> ><?php echo $value->dropvalue; ?></option>
                <?php  } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group">              
              <div class="col-md-12 col-sm-12" style="padding-left: 0px;">
                <label>Gender:<span class="asterisk">*</span></label>
              </div>
              <div class="col-md-6 col-sm-6" style="padding-left: 0px;">
                <div class="radio">
                  <label>
                    <input type="radio" name="gender" <?php echo set_radio('gender', 'Male', TRUE); ?> id="Male" value="Male" checked="">
                    Male </label>
                </div>
              </div>
              <div class="col-md-6 col-sm-6" style="padding-left: 0px;">
                <div class="radio">
                  <label>
                    <input type="radio" name="gender" <?php echo set_radio('gender', 'Female'); ?> id="Female" value="Female">
                    Female </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <div class="col-md-12 col-sm-12" style="padding-left: 0px;">
                <label>Marital Status:<span class="asterisk">*</span></label>
              </div>
              <div class="col-md-6 col-sm-6" style="padding-left: 0px;">
                <div class="radio">
                  <label>
                    <input type="radio" name="maritalstatus" <?php echo set_radio('maritalstatus', 'Single', TRUE); ?> id="Single" value="Single" checked="">
                    Single </label>
                </div>
              </div>
              <div class="col-md-6 col-sm-6" style="padding-left: 0px;">
                <div class="radio">
                  <label>
                    <input type="radio" name="maritalstatus" <?php echo set_radio('maritalstatus', 'Married'); ?> id="Married" value="Married">
                    Married </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Email<span class="asterisk">*</span></label>
              <input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="" required  onkeyup="document.getElementById('username_id').value=this.value">
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Alternate Email</label>
              <input type="text" name="email2" value="<?php echo set_value('email2'); ?>" class="form-control" placeholder="">
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Current Address:<span class="asterisk">*</span></label>
              <input type="text" name="currentadd" value="<?php echo set_value('currentadd'); ?>" required class="form-control" placeholder="" >
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Select Country</label>
              <div class="styled-select">
                <select class="form-control" name="currentcon">
                  <option value="0">-- Select Country --</option>
                  <?php foreach ($country as $key => $value) {?>
                  <option value='<?php echo $value->country_code; ?>' <?php echo  set_select('currentcon',$value->country_code); ?> ><?php echo $value->country_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Permanent Address:<span class="asterisk">*</span></label>
              <input type="text" name="permanentadd" value="<?php echo set_value('permanentadd'); ?>" required class="form-control" placeholder="">
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Select Country</label>
              <div class="styled-select">
                <select class="form-control" name="permanentcon">
                  <option value="0">-- Select Country --</option>
                  <?php foreach ($country as $key => $value) {?>
                  <option value='<?php echo $value->country_code; ?>' <?php echo  set_select('permanentcon',$value->country_code); ?> ><?php echo $value->country_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12">
            <div class="form-group upload clearfix">
              <label class="control-label">Upload Your Photo</label>
              <input type="file" name="picture[]" id='picture' class="form-control" value='' />
              <span style="color:green"><b>Note :</b>Max File Size is 500kb and  Allowed image extensions are jpg, jpeg, gif, png, bmp</span> </div>
          </div>
        </div>
      </div>
      <div class="other-info clearfix"> <strong>Education Details</strong>
        <div class="col-md-12">
          <div class="form-group">
            <label class="control-label col-sm-4">Latest Education :<span class="asterisk">*</span></label>
            <div class="col-sm-8">
              <div class="row">
                <div class="col-sm-12">
                  <select class="form-control" name="faculty" id="faculty">
                    <option value="None">None</option>
                    <option value="intermediate" <?php echo  set_select('faculty','intermediate'); ?>>Intermediate</option>
                    <option value="bachelor" <?php echo  set_select('faculty',$d); ?>>Bachelor</option>
                    <option value="master" <?php echo  set_select('faculty','bachelor'); ?>>Master</option>
                    <option value="other" <?php echo  set_select('faculty','other'); ?>>Other</option>
                  </select>
                  <br>
                  <input type="text" id="other_faculty" name="other_faculty" value="<?php echo set_value('other_faculty'); ?>" class="form-control" placeholder="Other Faculty" <?php if(isset($_POST['faculty']) && $_POST['faculty']=="other") echo ''; else echo 'style="display:none;"';?>>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group clearfix">
          <label><strong>Academic Documents</strong></label>
          <br>
          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-12">
                <ul>
                  <li>SLC Marksheet
                    <input type="file" name="slc_docs" id='slc_docs' class="form-control" value='' />
                  </li>
                  <li>11/12 Transcript
                    <input type="file" name="docs_11_12" id='docs_11_12' class="form-control" value='' />
                  </li>
                  <li>Bachelor Transcript
                    <input type="file" name="bachelor_docs" id='bachelor_docs' class="form-control" value='' />
                  </li>
                  <li>Masters Transcript
                    <input type="file" name="masters_docs" id='masters_docs' class="form-control" value='' />
                  </li>
                  <li>Other Related Documents
                    <input type="file" name="other_docs" id='other_docs' class="form-control" value='' />
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carrer-application clearfix"> <strong>Career and Experience Information</strong>
        <div class="row">
          <!-- <div class="extra-space">
            <div class="col-md-6 col-sm-6">
              <div class="form-group clearfix" style="padding-bottom: 40px;"> </div>
            </div>
          </div> -->
          <div class="col-md-12">
            <div class="form-group clearfix">
              <label>Key Skills</label>
              <textarea class="form-control" value="<?php echo set_value('keyskills'); ?>" name="keyskills" rows="2" placeholder="Use comma to seperate your key skills"></textarea>
            </div>
          </div>
        </div>
        <div class="row">  
          <div class="col-md-6 col-sm-6">
            <div class="form-group form-radial clearfix">
              <label>Have Work Experience ?<span class="asterisk">*</span></label>
              <ul>
                <li>
                  <input name="workexp" class="workexp" <?php echo set_radio('workexp', 'No', TRUE); ?> value="No" checked="" type="radio">
                  No </li>
                <li>
                  <input name="workexp" class="workexp" <?php echo set_radio('workexp', 'Yes'); ?> value="Yes"  type="radio">
                  Yes </li>
              </ul>
            </div>
          </div>
          <div class="work_experience_show" style="display:none;">
            <div class="col-md-3 col-sm-3">
              <div class="form-group clearfix">
                <div class="styled-select">
                  <select class="form-control" name="expyrs">
                    <?php for($y=0;$y<=20;$y++){?>
                    <option value="<?php echo $y;?>" <?php echo  set_select('expyrs',$y); ?> ><?php echo $y;?> Years</option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-3">
              <div class="form-group clearfix">
                <div class="styled-select">
                  <select class="form-control" name="expmths">
                    <?php for($m=0;$m<12;$m++){?>
                    <option value="<?php echo $m;?>" <?php echo  set_select('expmths',$m); ?> ><?php echo $m;?> Months</option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Current Position</label>
              <input type="text" name="cjobposiiton" value="<?php echo set_value('cjobposiiton'); ?>" class="form-control" placeholder="">
            </div>
          </div>
          <div class="col-md-3 col-sm-3">
            <div class="form-group clearfix">
              <label>Present Salary:</label>              
              <div class="styled-select">
                <select class="form-control" name="preunit">
                  <option value="NRs">NRs</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-3">
            <div class="form-group clearfix">
            <label>&nbsp;</label> 
              <div class="styled-select">
                <input type="text" name="presal" value="<?php echo set_value('presal'); ?>" class="form-control" placeholder="">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <div class="form-group clearfix">
              <label class="margin">Expected salary:</label>
            </div>
          </div>
          <div class="col-md-2 col-sm-2">
            <div class="form-group clearfix">
              <div class="styled-select">
                <select class="form-control" name="expunit">
                  <option value="NRs">NRs</option>
                  <option value="USD">USD</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-sm-2">
            <div class="form-group clearfix">
              <div class="styled-select">
                <select class="form-control" name="exptype">
                  <option value="Equals" <?php echo  set_select('exptype','Equals'); ?>>Equals</option>
                  <option value="Above" <?php echo  set_select('exptype','Above'); ?> >Above</option>
                  <option value="Below" <?php echo  set_select('exptype','Below'); ?>>Below</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="form-group clearfix">
              <div class="styled-select">
                <select class="form-control" name="expsal">
                  <?php foreach ($salary_range as $key => $value) {?>
                  <option  value='<?php echo $value->id; ?>' <?php echo  set_select('expsal',$value->id); ?> ><?php echo $value->dropvalue; ?></option>
                  <?php  } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Preferred Job Region:<span class="asterisk">*</span></label>
              <div class="styled-select">
                <select class="form-control" name="job_region">
                  <?php foreach ($job_region as $key => $value) {?>
                  <option value='<?php echo $value->id; ?>' <?php echo  set_select('job_region',$value->id); ?> ><?php echo $value->dropvalue; ?></option>
                  <?php  } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group clearfix">
              <label>Preferred Job Location:<span class="asterisk">*</span></label>
              <input type="text" name="joblocation" value="<?php echo set_value('joblocation'); ?>" required class="form-control" placeholder="kathmandu, pokhara">
            </div>
          </div>
        </div>
      </div>
      <div class="functional-area clearfix"> <strong>Preferred Functional Area</strong>
        <p>Preferred Job Category represents your desired sector(s) to work.</p>
        <div class="first-job-preference">
          <h5>Your First Job Preference:</h5>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="form-group clearfix">
                <label>Funtional Area:<span class="asterisk">*</span></label>
                <div class="styled-select">
                  <select class="form-control" name="funcarea1">
                    <?php foreach ($functional_area as $key => $value) {?>
                    <option  value='<?php echo $value->id; ?>' <?php echo  set_select('funcarea1',$value->id); ?> ><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group nature-organization clearfix">
                <label>Nature of Organization:</label>
                <ul>
                  <?php foreach ($functional_area as $key => $value) {?>
                  <li>
                    <input name="natureoforg1[]" value="<?php echo $value->dropvalue; ?>" type="checkbox">
                    <?php echo $value->dropvalue; ?> </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="first-job-preference second-job-preference">
          <h5>Your Second Job Preference:</h5>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="form-group clearfix">
                <label>Funtional Area</label>
                <div class="styled-select">
                  <select class="form-control" name="funcarea2">
                    <?php foreach ($functional_area as $key => $value) {?>
                    <option  value='<?php echo $value->id; ?>' <?php echo  set_select('funcarea2',$value->id); ?> ><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group nature-organization clearfix">
                <label>Nature of Organization:</label>
                <ul>
                  <?php foreach ($functional_area as $key => $value) {?>
                  <li>
                    <input name="natureoforg2[]" value="<?php echo $value->dropvalue; ?>" type="checkbox">
                    <?php echo $value->dropvalue; ?> </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-sm-12">
          <div class="form-group upload clearfix">
            <label class="control-label">Attach Resume<span class="asterisk">*</span></label>
            <input type="file" required name="resume" id='resume' class="form-control" value='' />
            <p style="color:green"><b>Note :</b> Allowed resume extensions are pdf, doc, docx, txt, rtf</p>
          </div>
        </div>
        <?php /* ?>
        <div class="col-md-12 col-sm-12">
          <div class="form-group upload clearfix">
            <label class="control-label">Attach Video  Resume</label>
            <input type="file" name="video_resume[]" id='resume' class="form-control" value='' />
            <p style="color:green"><b>Note :</b> Allowed video resume extensions are mp4, mpeg, flv, avi, mkv</p>
          </div>
        </div>
        <?php */ ?>
      </div>
      <div class="creat-id clearfix"> <strong>Create ID</strong>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Username / Email ID:<span class="asterisk">*</span></label>
              <input type="text" class="form-control" value="<?php echo set_value('username'); ?>" name="username" id="username_id" placeholder="" readonly required>
              <input name="activation_code" type="hidden" value="<?php echo rand(1111111111,9999999999);?>" />
              <p style="color:green"><b>Note :</b>Your Email will be your username.</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Password:<span class="asterisk">*</span></label>
              <input type="password" class="form-control" name="password" placeholder="" required>
              <p style="color:green"><b>Note :</b> Minimum Password length must be 8</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Confirm Password:<span class="asterisk">*</span></label>
              <input type="password" class="form-control" name="confirm_password" placeholder="" required>
            </div>
            <div class="g-recaptcha" data-sitekey="6Le5HzAUAAAAAPVUFNbZRiswKRSpLP8043ABZpe9"></div>
          </div>
          <div class="col-md-12">
            <p class="term">By clicking on 'Create My Account' below you are agreeing to the<br>
              <a target="_blank" href="<?php echo base_url();?>content/terms-and-condition"> Terms & Conditions</a> and <a target="_blank" href="<?php echo base_url();?>content/privacy-and-policy">Privacy Policy</a> .</p>
            <div class="form-group clearfix">
              <button type="submit" name="submit" class="btn btn-default">Create Account</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?> </div>
  <div class="col-md-1"> </div>
</div>

<!-- body end --> 

<script type="text/javascript">
  $(document).ready(function(){
    $('.workexp').on('click',function(){
    var exp_val = $("input:radio[name='workexp']:checked").val();
    if(exp_val == 'Yes'){
        $('.work_experience_show').show();
        $('.extra-space').hide();
    }else{
        $('.work_experience_show').hide();
        $('.extra-space').show();
    }
    });

    $( "#faculty" ).change(function() {
      var faculty = $( "#faculty" ).val();
      if(faculty=="other")
      {
        $("#other_faculty").val("");
        $('#other_faculty').attr('required');            
        $('#other_faculty').show();
      }
      else
      {
        $("#other_faculty").val("");
        $("#other_faculty").removeAttr('required')            
        $('#other_faculty').hide();
      }
    });
  });
</script> 