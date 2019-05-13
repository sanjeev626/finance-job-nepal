<div class="col-md-12 col-lg-4 dashboard-left-border">
    <div class="dashboard-left">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-3 text-center">
                    <img src="<?php echo base_url()?>content_home/img/boy.png"/>
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
                        <h5>Recently Applied Jobs</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-lg-2">
                        <p>1</p>
                    </div>
                    <div class="col-md-10 col-lg-10">
                        <a href="">Vacancy 1</a>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <p>2</p>
                    </div>
                    <div class="col-md-10 col-lg-10">
                        <a href="">Vacancy 2</a>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <p>3</p>
                    </div>
                    <div class="col-md-10 col-lg-10">
                        <a href="">Vacancy 3</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>