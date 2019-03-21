<?php $this->load->view('includes/header');?>



<!-- body start -->



<div class="container">

    <div class="row">

<section class="seekerlogin clearfix">

        <div class="col-md-6 se-gradient">

                    <div class="seekerlogin-left">

                        <div class="col-md-offset-2 col-md-8">

                            <div class="seekerlogin-wrap">

                                <?php $this->load->view('admin/common/flash_message'); ?>

                                <h3>Change Password</h3>

                                <div class="forms">

                                    <?php

                                      $action =base_url().'Jobseeker/resetSeekerPassword';

                                      $attributes = array('name'=>'jobseekerlogin',);

                                      echo form_open($action, $attributes);

                                    ?>

                                        <div class="form-group email">

                                            <input type="password" required class="form-control" id="password" placeholder="New Password" name="password">

                                            <input type="hidden" value="<?php echo $token;?>" name="token">

                                        </div>

                                        <div class="form-group email">

                                            <input type="password" required class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">

                                        </div>

                                        <button type="submit" class="btn btn-info">Submit</button>

                                    <?php echo form_close(); ?>

                                </div>



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



<!-- right-aside start -->





<!-- body end -->



<?php $this->load->view('includes/footer');?>

