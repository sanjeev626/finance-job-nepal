<div class="container">
    <div class="row">
<section class="seekerlogin clearfix">
        <div class="col-md-6 se-gradient">
            <div class="seekerlogin-left">
                <div class="col-md-offset-2 col-md-8">
                    <div class="seekerlogin-wrap">
                        <?php $this->load->view('admin/common/flash_message'); ?>
                        <h3>JobSeeker Log in</h3>
                        <div class="forms">                                                                
                            <div class="quick-links">
                                <ul class="footer-social">
                                    <li class="icons"><a href="https://www.facebook.com/Global-Job-Complete-HR-Solution-109480202434134" title="Like us in Facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                    <li class="icons"><a href="http://www.twitter.com/" title="Follow us in Twitter" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                                    <li class="icons"><a href="http://www.plus.google.com/" title="Like us in Google Plus" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
                                </ul>
                            </div>
                            <?php
                              $action =base_url().'Jobseeker/loginCheck';
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

                        <a class="create-acc" href="<?php echo base_url();?>Jobseeker/signup">Create My Account</a>
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
                <?php if(!empty($seeker_right_banner)): ?>
                <div class="carousel-inner" role="listbox">
                    <?php foreach($seeker_right_banner as $key => $sval):
                    $link = ($sval->link) ? $sval->link : 'javascript:void(0)';
                    ?>
                    <div class="item <?php if($key == '0'){ echo 'active'; } ?>">
                   <a target="_blank" href="<?php echo $link; ?>">
                    <img class="first-slide" src="<?php echo base_url();?>uploads/jobseeker_banner/<?php echo $sval->image; ?>" alt="<?php echo $sval->title;?>" style="height: 461px; width: auto;">
                        </a>
                    </div>
                   <?php endforeach; ?>
                </div>
            <?php endif; ?>
            </div>
            <!-- /.carousel -->
        </div>
</section>
    </div>
</div>