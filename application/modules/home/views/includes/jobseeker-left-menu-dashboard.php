<div class="col-md-12 col-lg-4 dashboard-left-border">
    <div class="dashboard-left">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-3 text-center">
                    <?php if(!empty($jobseekerInfo->profile_picture)){?>
                            <img src="<?php echo base_url().'uploads/jobseeker/'.$jobseekerInfo->profile_picture;?>" alt="">
                    <?php }else{?>
                    <img src="<?php echo base_url()?>content_home/img/boy.png"/>
                    <?php } ?>
                </div>
                <div class="col-md-12 col-lg-9">
                    <h4><?php echo $jobseekerInfo->fname.' '.$jobseekerInfo->mname. ' '.$jobseekerInfo->lname;?></h4>
                    <p><?php echo $jobseekerInfo->address_current;?></p>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <strong><i class="fa fa-envelope-o" aria-hidden="true"></i> Email :</strong>
                </div>
                <div class="col-md-12 col-lg-8">
                    <p><?php echo $jobseekerInfo->email?></p>
                </div>
                <div class="col-md-12 col-lg-4">
                    <strong><i class="fa fa-phone" aria-hidden="true"></i> Mobile :</strong>
                </div>
                <div class="col-md-12 col-lg-8">
                    <p><?php echo $jobseekerInfo->phone_cell?></p>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <a href="#"><h5><i class="fa fa-edit"></i> Update Your Profile</h5></a>
                </div>
                <div class="col-md-12 col-lg-12">
                    <p>Fill all the required information to apply for job.</p>
                </div>
                <div class="col-md-6 col-lg-6 cv-box">
                    <a href="<?php echo base_url() . 'jobseeker/basicinformation' ?>"><i class="fa fa-user"></i> Basic Information</a>
                </div>
                <div class="col-md-6 col-lg-6 cv-box">
                    <a href="<?php echo base_url().'jobseeker/education'?>"><i class="fa fa-book"></i> Education</a>
                </div>
                <div class="col-md-6 col-lg-6 cv-box">
                    <a href="<?php echo base_url().'jobseeker/training'?>"><i class="fa fa-laptop"></i> Training</a>
                </div>
                <div class="col-md-6 col-lg-6 cv-box">
                    <a href="<?php echo base_url().'jobseeker/workexperience'?>"><i class="fa fa-building"></i> Work Experience</a>
                </div>
                <div class="col-md-6 col-lg-6 cv-box">
                    <a href="<?php echo base_url().'Jobseeker/language'?>"><i class="fa fa-language"></i> Language</a>
                </div>
                <div class="col-md-6 col-lg-6 cv-box">
                    <a href="<?php echo base_url().'jobseeker/reference'?>"><i class="fa fa-address-card"></i> References</a>
                </div>
            </div>
        </div>
    </div>
    <section class="candidate-dashboard-area section_15">
        <div class="dashboard-left">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="submit-resume">
                            <!--<a href="<?php /*echo base_url().'jobseeker/resume'*/?>">Download your cv</a>-->
                            <button type="submit" onclick="downloadcv()">Download your CV</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="candidate-dashboard-area section_15">
        <div class="dashboard-left">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h5>Recently Applied Jobs</h5>
                    </div>
                </div>
                <?php
                    //print_r($appliedjobs);
                ?>
                <div class="row">
                    <?php
                    if($appliedjobs) {
                        foreach ($appliedjobs as $key => $val):
                            $key += 1;
                            ?>
                            <div class="col-md-2 col-lg-2">
                                <p><?php echo $key ?></p>
                            </div>
                            <div class="col-md-10 col-lg-10">
                                <a href="<?php echo base_url() . 'job/' . $val->slug . '/' . $val->id; ?>"><?php echo $val->jobtitle; ?> </a>
                            </div>
                        <?php endforeach;
                    }else{
                        echo '<div class="col-md-12">No applied jobs</div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function downloadcv(){
        window.location.href = "<?php echo base_url('jobseeker/downloadresume')?>";

    }
</script>