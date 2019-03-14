<div class="container">
    <div class="row">
    <section class="seekerlogin clearfix">
        <div class="col-md-6 se-gradient">
            <div class="seekerlogin-left">
                <div class="col-md-offset-2 col-md-8">
                    <div class="seekerlogin-wrap">
                        <?php $this->load->view('admin/common/flash_message'); ?>
                        <h3>Employer Log in</h3>
                        <div class="forms">                                    
                            <div class="quick-links">
                                <ul class="footer-social">
                                    <li class="icons"><a href="https://www.facebook.com/Global-Job-Complete-HR-Solution-109480202434134" title="Like us in Facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                    <li class="icons"><a href="http://www.twitter.com/" title="Follow us in Twitter" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                                    <li class="icons"><a href="http://www.plus.google.com/" title="Like us in Google Plus" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
                                </ul>
                            </div>

                            <?php
                              $action =base_url().'Employer/loginCheck';
                              $attributes = array('name'=>'employerlogin',);
                              echo form_open_multipart($action, $attributes);
                            ?>
                                <div class="form-group name">
                                    <input type="text" required name="username" class="form-control" id="username" placeholder="Username or Email Address">
                                </div>
                                <div class="form-group email">
                                    <input type="password" required name="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <a class="forget" href="#"  data-toggle="modal" data-target="#myModalPassword">Forgot Password?</a>
                                </div>
                                <button type="submit" class="btn btn-info">Sign in</button>
                            <?php echo form_close(); ?>
                        </div>
                        
                        <a class="create-acc btn" href="<?php echo base_url();?>Employer/signup">Create My Account</a>
                    </div>
                </div>
            </div>
        </div>

     <div class="container">
                        <div class="row">
                            <div class="em-login-right">
                                <div class="col-md-6">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#home">Contact Us</a></li>
                                        <li><a data-toggle="tab" href="#menu1">Top Clients</a></li>
                                        <li><a data-toggle="tab" href="#services">Our Services</a></li>
                                    </ul>

                                    <div class="tab-content clearfix">
                                        <div id="home" class="tab-pane fade in active">
                                            <div class="col-xs-6">
                                                <div class="query">
                                                    <h4>For query:</h4>
                                                    <ul>
                                                        <li>
                                                            <strong>Suman sharma</strong>
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
                                                            <strong>Ujwal dhakal</strong>
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
                                                            <strong>Global jobs.com</strong>
                                                            <p>kathmandu Plaza, Kamaladi </p>
                                                            <div class="ph-link">
                                                                <p>Mobile:</p>
                                                                <a class="phone" href="callto:+977 9818101010">+977 9818101010</a>
                                                            </div>
                                                            <div class="ph-link">
                                                                <p>Email:</p>
                                                                <a class="email" href="emailto:info@company.com.np">info@company.com.np</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="leave-message">
                                                    <?php $this->load->view('admin/common/flash_message'); ?>
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
                                                            <button class="btn btn-default" role="button" type="submit">Submit</button>
                                                        </div>
                                                    <?php echo form_close(); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="menu1" class="tab-pane fade">
                                            <div class="employee-users">
                                            <?php foreach($clients as $key => $clientVal): ?>   
                                                 <div class="col-md-2 col-sm-3 col-xs-4">
                                                 <figure>
                                                       <img class="img-responsive" src="<?php echo the_client_logo($clientVal->image); ?>" alt="<?php echo $clientVal->clientname; ?>">
                                                  </figure>
                                                    
                                                   </div>
                                                
                                            <?php endforeach; ?> 
                                               
                                            </div>
                                            <a class="viewmore btn btn-default" href="<?php echo base_url();?>clients">View More</a>
                                        </div>

                                        <div id="services" class="tab-pane fade">
                                            <section class="employee-services clearfix">
                                                <h3>Our Services</h3>
                                                <div class="carousel slide multi-item-carousel" id="theCarousel">
                                                    <div class="carousel-inner">
                                                         <?php if(!empty($services)): 
                                                        foreach($services as $key => $serVal): ?>
                                                        <div class="item <?php if($key == 0){echo 'active'; } ?>">
                                                            <div class="col-xs-6">
                                                                <h4><?php echo $serVal->title; ?></h4>
                                                                <div class="t-jobs">
                                                                    <figure>
                                                                        <img src="<?php echo the_service_logo($serVal->logo); ?>" alt="<?php echo $serVal->title; ?>">
                                                                    </figure>
                                                                    <figcaption>
                                                                         <?php echo $serVal->short_description; ?>
                                                                    </figcaption>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <?php endforeach; endif; ?>

                                                        <!--  Example item end -->
                                                    </div>
                                                    <ol class="carousel-indicators" style="z-index:1 !important">
                                                        <?php
                                                         if(!empty($services)): 
                                                        foreach($services as $key => $val):
                                                        ?>
                                                        <li data-target="#theCarousel" data-slide-to="<?php echo $key;?>" class="<?php if($key==0){echo 'active'; }?>"></li>
                                                        <?php endforeach; endif; ?>
                                                       
                                                    </ol>
                                                </div>
                                            </section>
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