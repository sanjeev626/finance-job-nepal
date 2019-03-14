<?php $this->load->view('includes/header');?>

<!-- body start -->


<script type="text/javascript">
    function showContent(cnt)
    {
        //alert cnt;
        //alert(cnt);
        $( ".content" ).each(function() {
          $( this ).fadeOut(100);
        });
        $("#content"+cnt).fadeIn(3000);
    }
</script>
<div class="container">
    <div class="row">
        <section class="seekerlogin clearfix">
            <div class="container">
                <div class="row">
                    <div class="em-login-right clearfix">
                        <div class="col-md-6">
                            <ul class="nav nav-tabs">
                                <li><a data-toggle="tab" href="#home">Contact Us</a></li>
                                <li><a data-toggle="tab" href="#menu1">Top Clients</a></li>
                                <li class="active"><a data-toggle="tab" href="#services">Our Services</a></li>
                            </ul>
                            <div class="tab-content clearfix">
                                <div id="home" class="tab-pane fade">
                                    <div class="col-xs-6">
                                        <div class="query">
                                            <h4>For any queries:</h4>
                                            <ul>
                                                <!-- <li>
                                                    <strong>Priti Pradhan</strong>
                                                    <p>Marketing Executive</p>
                                                    <div class="ph-link">
                                                        <p>Mobile:</p>
                                                        <a class="phone" href="callto:+977 9818101010">+977 9818101010</a>
                                                    </div>
                                                    <div class="ph-link">
                                                        <p>Email:</p>
                                                        <a class="email" href="emailto:info@company.com.np">info@company.com.np</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <strong>Nishant Tandon</strong>
                                                    <p>Marketing Executive</p>
                                                    <div class="ph-link">
                                                        <p>Mobile:</p>
                                                        <a class="phone" href="callto:+977 9818101010">+977 9818101010</a>
                                                    </div>
                                                    <div class="ph-link">
                                                        <p>Email:</p>
                                                        <a class="email" href="emailto:info@company.com.np">info@company.com.np</a>
                                                    </div>
                                                </li> -->
                                                <li>
                                                    <strong>Global Job Pvt. Ltd.</strong>
                                                    <p>P.O.Box 8975 EPC 5273</p>
                                                    <p>4th Floor, Kathmandu Plaza-Y Block, Kamaladi, Kathmandu</p>
                                                    <div class="ph-link">
                                                        <p>Phone:</p>
                                                        <a class="phone" href="callto:+977014168657">4168657</a>, <a class="phone" href="callto:+977014168658">4168658</a>
                                                    </div>
                                                    <div class="ph-link">
                                                        <p>Email:</p>
                                                        <a class="email" href="mailto:info@globaljob.com.np">info@globaljob.com.np</a>
                                                    </div>
                                                    <div class="ph-link">
                                                        <p>Website:</p>
                                                        <a class="email" href="http://globaljob.com.np">globaljob.com.np</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="leave-message">                         
                                            <?php $this->load->view('admin/common/flash_message2'); ?>
                                            <h4>leave us a message</h4>
                                            <?php
                                            $action = base_url() . 'submitMessage';
                                            $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
                                            echo form_open($action, $attributes);
                                            ?>
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Contact Person" required>
                                            </div>
                                            <div class="form-group ">
                                                <input type="text" name="company_name" class="form-control" placeholder="Company Name" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                            </div>
                                            <div class="form-group ">
                                                <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" name="message" rows="3" placeholder="Message" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-info" role="button" type="submit">Submit</button>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <div class="employee-users">
                                    <h4>Top Clients</h4>
                                    <?php foreach($clients as $key => $clientVal): 
                                    if(!empty($clientVal->image) && file_exists('uploads/clients/'.$clientVal->image)):
                                    ?>   
                                        <div class="col-md-2 col-sm-3 col-xs-4">
                                          <figure>
                                               <img class="img-responsive" src="<?php echo the_client_logo($clientVal->image); ?>" alt="<?php echo $clientVal->clientname; ?>">
                                          </figure>                                                    
                                        </div>                                                
                                    <?php endif; endforeach; ?>                                                
                                    </div>
                                    <div class="col-xs-12 pull-right" style="text-align:right; padding-top:10px;">
                                        <a class="viewmore btn btn-info" href="<?php echo base_url();?>clients">View More</a>
                                    </div>
                                </div>
                                <div id="services" class="tab-pane fade in active">
                                    <section class="employee-services clearfix">
                                        <!-- <h3>Our Services</h3> -->
                                        <div class="carousel slide multi-item-carousel" id="theCarousel">
                                            <div class="carousel-inner">
                                                <?php if(!empty($services)): 
                                                $counter=1;
                                                foreach($services as $key => $serVal): ?>
                                                <div>
                                                    <div class="col-xs-12" style="margin-bottom:10px; background:#FFF;">
                                                        <h4 style="text-align:center;"><a href="javascript:void(0);?>" onclick="showContent('<?php echo $counter;?>');"><?php echo $serVal->title; ?></a></h4>
                                                        <div id="content<?php echo $counter;?>" style="display:none;" class="content">
                                                        <figure>
                                                            <img src="<?php echo the_service_logo($serVal->logo); ?>" alt="<?php echo $serVal->title; ?>">
                                                        </figure>
                                                        <div class="t-jobs">
                                                            <figcaption>
                                                                 <?php echo $serVal->short_description; ?>
                                                                 <a href="<?php echo base_url();?>services/<?php echo $serVal->urlcode;?>" class="view-all pull-right">View More</a>
                                                            </figcaption>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </hr>
                                                 <?php ++$counter; endforeach; endif; ?>

                                                <!--  Example item end -->
                                            </div>
                                            <!-- <ol class="carousel-indicators" style="z-index:1 !important">
                                                <li data-target="#theCarousel" data-slide-to="0" class="active"></li>
                                                <li data-target="#theCarousel" data-slide-to="1"></li>
                                                <li data-target="#theCarousel" data-slide-to="2"></li>
                                                <li data-target="#theCarousel" data-slide-to="3"></li>
                                            </ol> -->
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        
            <div class="col-md-6">
                <div class="container">
                    <div class="row se-gradient" style="background: #F7F8FA url('../content_home/images/employer-login.jpg') no-repeat center !important;">
                        <div class="seekerlogin-left">
                            <div class="seeker-l-form">
                                <div class="seekerlogin-wrap">
                                    <?php $this->load->view('admin/common/flash_message'); ?>
                                    <h3>Employer log in</h3>
                                    <div class="forms"> 
                                        <?php
                                          $action =base_url().'Employer/loginCheck';
                                          $attributes = array('name'=>'employerlogin',);
                                          echo form_open_multipart($action, $attributes);
                                        ?>
                                            <div class="form-group name">
                                                <input type="text" required name="username" class="form-control" id="username" placeholder="Username or Email Address" style="border: #EDA851 1px solid;">
                                            </div>
                                            <div class="form-group email">
                                                <input type="password" required name="password" class="form-control" id="password" placeholder="Password" style="border: #EDA851 1px solid;">
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
                                    <a class="create-acc btn" href="<?php echo base_url();?>Employer/signup">Create My Account</a>
                                    <a class="create-acc btn" href="<?php echo base_url();?>employer_feedbacks">Give Your FEEDBACKS</a>
                                </div>
                            </div>
                            <?php /*
                            <div class="seeker-quote">
                                <ul>
                                    <li><a href="<?php echo $this->home_model->get_content_url('14');?>" title="know job seeker before the interview session"><img src="<?php echo base_url();?>/content_home/images/know_interviewee_before_interview_session.png" style="position: absolute; bottom: 276px; margin-left:10px;"></a></li>
                                </ul>
                            </div>
                            */?>
                        </div>
                    </div>
                </div>
            </div>
                    </div>
                </div>
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
          <h4 class="modal-title green">Employer Forget Password</h4>
        </div>
        <div class="modal-body center">
           <span>Please provide us your Email Address and we will send your user authentication.</span>
          <br><br>

            <?php
            $action = base_url() . 'Employer/forgetPassword/';
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
                    <button class="btn btn-info btn-flat" type="submit">
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
