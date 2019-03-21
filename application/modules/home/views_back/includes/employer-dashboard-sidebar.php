<?php
$video_cv_info = $this->employer_model->is_video_cv_activated($employerInfo->id);
?>

<div class="col-md-3 login-sidebar"> 
  <!-- <div class="home-logOut">
      <div>
        <a href="<?php echo base_url();?>Employer/dashboard" class="btn btn-success btn-md logOut">
          Employer's Home</a>
      </div>
      <div>
        <a href="<?php echo base_url();?>Employer/logout" class="btn btn-success btn-md logOut">
          <span class="glyphicon glyphicon-log-out"></span> Log out </a>
      </div>
    </div>
  <h3>Welcome <?php echo $employerInfo->orgname;?>, </h3> -->
  <div class="upload">
    <div class="img-upload"> <img src="<?php echo the_employer_logo($employerInfo->logo, '');?>" alt="<?php echo $employerInfo->orgname;?>" class="img-responsive center-block"> </div>
  </div>
  <!-- upload -->
  
  <div class="profileEdit">
    <h3>Profile Manager</h3>
    
    <!-- Nav tabs -->
    
    <ul class="nav employer-nav-tabs" role="tablist">
      <li role="presentation" class="<?php if($select == 'profile'){echo 'active'; } ?>"><a href="<?php echo base_url();?>Employer/profile" aria-controls="profile"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></li>
      <li role="presentation" class="<?php if($select == 'editprofile'){echo 'active'; } ?>"><a href="<?php echo base_url();?>Employer/editEmployerProfile" aria-controls="Edit-Profile"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Profile</a></li>
      <li role="presentation"><a href="#" class="center-block"  data-toggle="modal" data-target="#myModalPassword"><i class="fa fa-unlock-alt tooltips" data-original-title="Change Password"></i> Change Password</a></li>
      <li role="presentation" class="<?php if($select == 'postjob'){echo 'active'; } ?>"><a href="<?php echo base_url();?>Employer/postJob" aria-controls="Jobs-applied"><i class="fa fa-file-text-o" aria-hidden="true"></i> Post Job</a></li>
      <li role="presentation" class="<?php if($select == 'listjob'){echo 'active'; } ?>"><a href="<?php echo base_url();?>Employer/employerJobList" aria-controls="Jobs-applied"><i class="fa fa-list" aria-hidden="true"></i> List Job</a></li>
      <li role="presentation" class="<?php if($select == 'shortlisted'){echo 'active'; } ?>"><a href="<?php echo base_url();?>Employer/showApplicantsShortlisted" aria-controls="Jobs-applied"><i class="fa fa-list" aria-hidden="true"></i> Shortlisted Applicants</a></li>
      <li role="presentation" class="<?php if($select == 'rejected'){echo 'active'; } ?>"><a href="<?php echo base_url();?>Employer/showApplicantsRejected" aria-controls="Jobs-applied"><i class="fa fa-list" aria-hidden="true"></i> Rejected Applicants</a></li>      
      <?php /* ?>
      <li role="presentation" class="<?php if($select == 'video_cv'){echo 'active'; } ?>"><a href="javascript:void(0);" aria-controls="Jobs-applied"><i class="fa fa-video-camera" aria-hidden="true"></i> Video CV Subscription</a>
        <p style="padding-left:40px;"><strong>Service :</strong> <?php echo $video_cv_info['service']; if(!empty($video_cv_info['expiry_date'])){?><br>
          <strong>Expiry Date : <?php echo date("dS F Y", strtotime($video_cv_info['expiry_date']));?></strong>
          <?php } if($video_cv_info['service']=="Not Activated" || $video_cv_info['service']=="Expired"){?>
          <br>
          Click here to Activate
          <?php } ?>
        </p>
      </li>
      <?php */ ?>
    </ul>
  </div>
  <!-- profileEdit --> 
  
</div>
<!-- login-sidebar --> 

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

             $action = base_url() . 'Employer/changeEmployerPassword';

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
                <button class="btn btn-success btn-flat" type="submit"> Update Password </button>
                &nbsp; </div>
            </div>
          </div>
          <!-- panel-footer --> 
          
          <?php echo form_close(); ?> </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>