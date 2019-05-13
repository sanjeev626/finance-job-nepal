<div class="col-md-12 col-lg-3 dashboard-left-border">
    <div class="dashboard-left">
        <ul class="dashboard-menu">

            <li class="<?php if ($menu == 'dashboard') echo 'active' ?>">
                <a href="<?php echo base_url() . 'employer/dashboard' ?>">
                    <i class="fa fa-tachometer"></i>
                    Dashboard
                </a>
            </li>
            <li class="<?php if($menu=='companyprofile')echo'active'?>">
                <a href="<?php echo base_url() . 'employer/editprofile' ?>"><i class="fa fa-users"></i>Company
                    Profile</a></li>
            <!--<li><a href="message.html"><i class="fa fa-envelope-open"></i>messages</a></li>-->
            <li class="<?php if($menu=='postJob')echo'active'?>">
                <a href="<?php echo base_url() . 'employer/postjob' ?>"><i class="fa fa-envelope-open"></i>post a
                    job</a>
            </li>
            <li class="<?php if($menu=='jobList')echo'active'?>">
                <a href="<?php echo base_url() . 'employer/employerjoblist' ?>"><i class="fa fa-list"></i>List/Edit Jobs</a>
            </li>
            <!--<li><a href="manage-candidates.html"><i class="fa fa-briefcase"></i>manage candidates</a></li>
            <li><a href="transaction.html"><i class="fa fa-rocket"></i>transaction</a></li>-->
            <li class="<?php if($menu=='editPassword')echo'active'?>">
                <a href="<?php echo base_url() . 'employer/editpassword' ?>"><i class="fa fa-lock"></i>change password</a></li>
            <!--<li><a href="#"><i class="fa fa-power-off"></i>LogOut</a></li>-->
        </ul>
    </div>
</div>