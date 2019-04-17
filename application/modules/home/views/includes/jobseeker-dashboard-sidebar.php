<div class="col-md-12 col-lg-4 dashboard-left-border">
    <div class="dashboard-left">
        <ul class="dashboard-menu">

            <li class="<?php if ($menu == 'dashboard') echo 'active' ?>">
                <a href="<?php echo base_url() . 'Jobseeker/dashboard' ?>">
                    <i class="fa fa-tachometer"></i>
                    Dashboard
                </a>
            </li>

            <li class="<?php if($menu=='basicInformation')echo'active'?>"><a href="<?php echo base_url() . 'Jobseeker/basicInformation' ?>"><i class="fa fa-user"></i> Basic Information</a></li>
            <li class="<?php if($menu=='education')echo'active'?>"><a href="<?php echo base_url() . 'Jobseeker/education' ?>"><i class="fa fa-book"></i> Education</a></li>
            <li class="<?php if($menu=='training')echo'active'?>"><a href="<?php echo base_url() . 'Jobseeker/training' ?>"><i class="fa fa-laptop"></i> Training</a></li>
            <li class="<?php if($menu=='workExperience')echo'active'?>"><a href="<?php echo base_url() . 'Jobseeker/workExperience' ?>"><i class="fa fa-building"></i> Work Experience</a></li>
            <li class="<?php if($menu=='language')echo'active'?>"><a href="<?php echo base_url() . 'Jobseeker/language' ?>"><i class="fa fa-language"></i> Language</a></li>
            <li class="<?php if($menu=='reference')echo'active'?>"><a href="<?php echo base_url() . 'Jobseeker/reference' ?>"><i class="fa fa-address-card"></i> References</a></li>
        </ul>
    </div>
</div>