<?php 
    $jobseekerInfo= $this->general_model->getById('seeker','id',$sid);
?> 
<div class="col-md-3 login-sidebar">
    <!-- <div class="home-logOut">
      <div>
            <a href="<?php echo base_url();?>Jobseeker/dashboard" class="btn btn-success btn-md logOut">
              Job Seeker's Home</a>
          </div>

          <div>
            <a href="<?php echo base_url();?>Jobseeker/logout" class="btn btn-success btn-md logOut">
              <span class="glyphicon glyphicon-log-out"></span> Log out </a>
          </div>

        </div>
    <h3>Welcome <?php echo $jobseekerInfo->fname.' '.$jobseekerInfo->lname ;?>, </h3> -->
    <div class="upload">
        <div class="img-upload">
            <img src="<?php echo the_jobseeker_logo($jobseekerInfo->picture);?>" alt="<?php echo $jobseekerInfo->fname.' '.$jobseekerInfo->lname ;?>" class="img-responsive center-block">
        </div>  
        <button type="button" class="btn btn-success btn-sm center-block"  data-toggle="modal" data-target="#myModalUpload"><i class="fa fa-upload tooltips" data-original-title="Upload Pic"></i> Upload Pic</button>
        <span>upload your Profile image</span>
    </div> <!-- upload -->
                  
    <div class="profileEdit">              
        <h3>Profile Manager</h3>
                    <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" <?php if($select=='profile'){echo 'class="active"'; }?>><a href="<?php echo base_url();?>Jobseeker/dashboard" aria-controls="profile"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a></li>
            <li role="presentation" <?php if($select=='editprofile'){echo 'class="active"'; }?>><a href="<?php echo base_url();?>Jobseeker/editProfile" aria-controls="Edit-Profile"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit Profile</a></li>
            <li role="presentation">
                <a href="#" class="center-block"  data-toggle="modal" data-target="#myModalPassword"><i class="fa fa-unlock-alt tooltips" data-original-title="Change Password"></i> Change Password</a>
            </li>
            <li role="presentation" <?php if($select=='jobapplied'){echo 'class="active"'; }?>><a href="<?php echo base_url();?>Jobseeker/jobApplied" aria-controls="Jobs-applied"><i class="fa fa-check-square-o" aria-hidden="true"></i>Jobs I have applied to</a></li>
        </ul>              
    </div> <!-- profileEdit -->  
    <div class="resume-status">            
        <h3>Resume Status</h3>
        <?php
            $personal_detail =  $this->general_model->countTotal('seeker',array('id' => $sid));
            $education_detail =  $this->general_model->countTotal('seeker_education',array('sid' => $sid));
            $work_detail =  $this->general_model->countTotal('seeker_experience',array('sid' => $sid));
            $training_detail =  $this->general_model->countTotal('seeker_training',array('sid' => $sid));
            $language_detail =  $this->general_model->countTotal('seeker_language',array('sid' => $sid));
            $reference_detail =  $this->general_model->countTotal('seeker_reference',array('sid' => $sid));
        ?>
        <ul>
            <li><a target="_blank" href="<?php echo base_url();?>Jobseeker/editProfile#personal">Personal Detail</a> :<i class="fa <?php if($personal_detail > 0){ echo 'fa-check'; }else{ echo 'fa-times'; }?>" aria-hidden="true"></i></li>
            <li>Job Preference :<i class="fa fa-check" aria-hidden="true"></i></li>
            <li><a target="_blank" href="<?php echo base_url();?>Jobseeker/editProfile#education">Education Background</a> :<i class="fa <?php if($education_detail > 0){ echo 'fa-check'; }else{ echo 'fa-times'; }?>" aria-hidden="true"></i></li>
            <li><a target="_blank" href="<?php echo base_url();?>Jobseeker/editProfile#workexperience">Work Experience</a> :<i class="fa <?php if($work_detail > 0){ echo 'fa-check'; }else{ echo 'fa-times'; }?>" aria-hidden="true"></i></li>
            <li><a target="_blank" href="<?php echo base_url();?>Jobseeker/editProfile#training">Training History</a> : <i class="fa <?php if($training_detail > 0){ echo 'fa-check'; }else{ echo 'fa-times'; }?>" aria-hidden="true"></i></li>
            <li><a href="<?php echo base_url();?>Jobseeker/editProfile#language">Language proficiency</a> :<i class="fa <?php if($language_detail > 0){ echo 'fa-check'; }else{ echo 'fa-times'; }?>" aria-hidden="true"></i></li>
            <li><a target="_blank" href="<?php echo base_url();?>Jobseeker/editProfile#reference">Reference</a> :<i class="fa <?php if($reference_detail > 0){ echo 'fa-check'; }else{ echo 'fa-times'; }?>" aria-hidden="true"></i></li>
        </ul>
    </div>
</div> <!-- login-sidebar -->

 <!-- Uploding Image Modal -->
  <div id="myModalUpload" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title green">Upload Profile Picture</h4>
        </div>
        <div class="modal-body center">

            <?php
                  $action =base_url().'Jobseeker/updateProfilePic';
                  $attributes = array('class' => 'form-horizontal user-logIn','name'=>'employersignup',);
                 echo form_open_multipart($action, $attributes);
            ?>

            <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Logo Image :</label>
                    <div class="col-sm-9">
                       <div class="row">
                          <div class="col-md-12">
                            <input type="file" id="picture" name="picture[]" placeholder="Logo" class="form-control" autofocus>
                              <span class="green">(Max file size 500 kb)</span>
                          </div>
                       </div>

                    </div>
                </div>
            <div class="form-group">
                    <div class="col-sm-9">
                       <div class="row">
                           <div class="col-md-4"></div>
                          <div class="col-md-6">
                            <input type="submit" class="btn btn-warning" id="submitprofile" value="Update Profile" name="submitprofile" autofocus>
                          </div>
                           <div class="col-md-3"></div>
                       </div>

                    </div>
                </div>

            <?php echo form_close(); ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

<!-- Change Password Modal -->
  <div id="myModalPassword" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title news_title">Change Password</h4>
          <input type="hidden" value="" class="news_id" name="">
        </div>
        <div class="modal-body center">

           <div class="panel-body panel-body-nopadding">
            <?php
             $action = base_url() . 'Jobseeker/changeJobSeekerPassword';
       		 $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        	 echo form_open($action, $attributes);
        	?>
               <div class="form-group">
		            <label class="col-sm-4 control-label">Old Password:<span class="asterisk">*</span></label>
		            <div class="col-sm-7">
		                <input type="password" required name="oldpassword" id='oldpassword' class="form-control" value='' />
		            </div>
		        </div>

		        <div class="form-group">
		            <label class="col-sm-4 control-label">New Password:<span class="asterisk">*</span></label>
		            <div class="col-sm-7">
		                <input type="password" required name="password" id='password' class="form-control" value='' />
		            </div>
		        </div>

		        <div class="panel-footer">
		            <div class="row">
		                <div class="col-sm-6 col-sm-offset-5">
		                    <button class="btn btn-success btn-flat" type="submit">
		                        Update Password
		                    </button>&nbsp;
		                </div>
		            </div>
		        </div><!-- panel-footer -->
		        <?php echo form_close(); ?>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
