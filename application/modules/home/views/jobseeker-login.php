<?php $this->load->view('includes/header');?>

<!-- body start -->
<div class="container">
    <div class="row">
        <section class="seekerlogin clearfix">
        <div class="col-md-6">
            <div class="container">
                <div class="row se-gradient" style="background: #F7F8FA url('../content_home/images/jobseeker-login.jpg') no-repeat center !important;">
                   <!-- <div class="seeker-social">
                       <ul>
                           <li><a href="https://www.facebook.com/Global-Job-Complete-HR-Solution-109480202434134/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="https://www.linkedin.com/in/global-job-private-limited-ab126195/"><i class="fa fa-linkedin" target="_blank"></i></a></li>
                       </ul>
                   </div> -->
                    <div class="seekerlogin-left">
                        <div class="seeker-l-form">
                            <div class="seekerlogin-wrap">
                                <?php $this->load->view('admin/common/flash_message'); ?>
                                <h3>JobSeeker Log in</h3>
                                <div class="forms">                                    
                                    <?php
                                    $action =base_url().'Jobseeker/seekerloginCheck';
                                    $attributes = array('name'=>'jobseekerlogin',);
                                    echo form_open_multipart($action, $attributes);
                                    ?>
                                    <?php if(!empty($job_detail) && !empty($job_id)){ ?>
                                        <div class="form-group">
                                            <strong>Position Applied : <?php echo $job_detail[0]->jobtitle;?></strong>
                                            <input type="hidden" name="jobId" value="<?php echo $job_id; ?>" />
                                        </div>
                                    <?php } ?>
                                        <div class="form-group name">
                                            <input type="text" required class="form-control" id="username" placeholder="Username or Email Address" name="username">
                                        </div>
                                        <div class="form-group email">
                                            <input type="password" required class="form-control" id="email" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <a class="forget" href="#"  data-toggle="modal" data-target="#myModalPassword">Forgot Password?</a>
                                        </div>
                                        <button type="submit" class="btn btn-info">Sign in</button>
                                    <?php echo form_close(); ?>
                                </div>
                                <div class="login-social">
                                    <ul>
                                        <li><a class="facebook" href="https://www.facebook.com/Global-Job-Complete-HR-Solution-109480202434134/" target="_blank"><i class="fa fa-facebook"></i> </a></li>
                                        <li><a class="linkedin" href="https://www.linkedin.com/in/global-job-private-limited-ab126195/" target="_blank"><i class="fa fa-linkedin"></i> </a></li>
                                        <!-- <li><a class="google" href="#"><i class="fa fa-google-plus-square"></i> </a></li> -->
                                    </ul>
                                </div>

                                <a class="create-acc" href="<?php echo base_url();?>Jobseeker/signup">Create My Account</a>
                                <!-- <a class="create-acc" href="<?php echo $this->home_model->get_content_url('15');?>">Express Your PERCEPTION</a> -->
                                <a class="create-acc" href="<?php echo base_url();?>jobseeker_feedbacks">Give Your FEEDBACKS</a>
                            </div>
                        </div>
                        <?php /*
                        <div class="seeker-quote">
                            <!-- <ul class="aside"> -->
                              <ul>
                                <li style="margin-left:30px;"><a href="<?php echo base_url();?>upload_your_video_cv" title="Impress Hiring Manager with Video CV"><img src="<?php echo base_url();?>/content_home/images/video_cv_resume.png" style="position: absolute;     height: 160px; bottom: 0;"></a></li>
<!--                                 <li><a href="<?php echo base_url();?>express_your_perception">Express Your PERCEPTION</a></li>
                                <li><a href="<?php echo base_url();?>jobseeker_feedbacks">Give Your FEEDBACKS</a></li>
 -->                          </ul>
                        </div>
                        */ ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Carousel -->
            <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                 <?php if(!empty($seeker_right_banner)): ?>
                    <?php foreach($seeker_right_banner as $key => $sval): ?>
                    <li data-target="#myCarousel3" data-slide-to="<?php echo $key;?>" class="<?php if($key == '0'){ echo 'active'; } ?>"></li>
                    <?php endforeach;?>
                 <?php endif; ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php foreach($seeker_right_banner as $key => $sval):
                    $link = ($sval->link) ? $sval->link : 'javascript:void(0)';
                    ?>
                    <div class="item <?php if($key == '0'){ echo 'active'; } ?>">
                   <a target="_blank" href="<?php echo $link; ?>">
                    <img class="first-slide" src="<?php echo base_url();?>uploads/jobseeker_banner/<?php echo $sval->image; ?>" alt="<?php echo $sval->title;?>" style="height: 543px; width: auto;">
                        </a>
                    </div>
                   <?php endforeach; ?>
                </div>


            </div>
            <!-- /.carousel -->
        </div>
        </section>
    </div>
</div>


<div id="myModalPassword" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title green">JobSeeker Forget Password</h4>
        </div>
        <div class="modal-body center">
           <span>Please provide us your Email Address and we will send your user authentication.</span>
          <br><br>

            <?php
            $action = base_url() . 'Jobseeker/forgetPassword/';
            $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
            echo form_open($action, $attributes);
            ?>
            <div class="form-group">
            <label class="col-sm-3 control-label">Email :<span class="asterisk">*</span></label>
                <div class="col-sm-7">
                    <input type="text" required name="email" id='email' class="form-control" value='' />
                </div>
            </div>
            <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <button class="btn btn-success btn-flat" type="submit">
                       Submit
                    </button>&nbsp;
                </div>
            </div>
        </div><!-- panel-footer -->
        <?php echo form_close(); ?>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


<!-- right-aside start -->


<!-- body end -->

<?php $this->load->view('includes/footer');?>
