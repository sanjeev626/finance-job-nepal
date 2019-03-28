<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Finance Job Nepal | Job Portal">
    <meta name="keyword" content="Job, freelancer, employee, marketplace">
    <meta name="author" content="Themescare">
    <!-- Title -->
    <title><?php if(isset($ogtitle) && !empty($ogtitle)) echo $ogtitle; else echo $page_title; ?></title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>content_home/img/favicon/favicon-32x32.png">
    <!--Bootstrap css-->
    <link rel="stylesheet" href="<?php echo base_url();?>content_home/css/bootstrap.css">
    <!--Font Awesome css-->
    <link rel="stylesheet" href="<?php echo base_url();?>content_home/css/font-awesome.min.css">
    <!--Magnific css-->
    <link rel="stylesheet" href="<?php echo base_url();?>content_home/css/magnific-popup.css">
    <!--Owl-Carousel css-->
    <link rel="stylesheet" href="<?php echo base_url();?>content_home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>content_home/css/owl.theme.default.min.css">
    <!--Animate css-->
    <link rel="stylesheet" href="<?php echo base_url();?>content_home/css/animate.min.css">
    <!--Select2 css-->
    <link rel="stylesheet" href="<?php echo base_url();?>content_home/css/select2.min.css">
    <!--Slicknav css-->
    <link rel="stylesheet" href="<?php echo base_url();?>content_home/css/slicknav.min.css">
    <!--Bootstrap-Datepicker css-->
    <link rel="stylesheet" href="<?php echo base_url();?>content_home/css/bootstrap-datepicker.min.css">
    <!--Jquery UI css-->
    <link rel="stylesheet" href="<?php echo base_url();?>content_home/css/jquery-ui.min.css">
    <!--Perfect-Scrollbar css-->
    <link rel="stylesheet" href="<?php echo base_url();?>content_home/css/perfect-scrollbar.min.css">
    <!--Site Main Style css-->
    <link rel="stylesheet" href="<?php echo base_url();?>content_home/css/style.css">
    <!--Responsive css-->
    <link rel="stylesheet" href="<?php echo base_url();?>content_home/css/responsive.css">

    <!--Jquery js-->
    <script src="<?php echo base_url();?>content_home/js/jquery-3.0.0.min.js"></script>
    <style>
        .header-right-menu ul li.has-children ul{text-align: left}
    </style>
</head>
<body>



<!-- Header Area Start -->
<header class="fjn-header-area stick-top forsticky <?php echo ($menu !='home'?'page-header':'');?>">
    <div class="menu-animation">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    <div class="site-logo">
                        <a href="<?php echo base_url();?>">
                            <img src="<?php echo base_url();?>content_home/img/logo.png" alt="jobguru" class="non-stick-logo" />
                            <img src="<?php echo base_url();?>content_home/img/logo-2.png" alt="jobguru" class="stick-logo" />
                        </a>
                    </div>
                    <!-- Responsive Menu Start -->
                    <div class="fjn-responsive-menu"></div>
                    <!-- Responsive Menu Start -->
                </div>
                <div class="col-lg-6">
                    <div class="header-menu">
                        <nav id="navigation">
                            <ul id="fjn_navigation">
                                <li class="active">
                                    <a href="<?php echo base_url();?>">HOME</a>
                                </li>
                                <li class="">
                                    <a href="#">SERVICES</a>
                                </li>
                                <li class="">
                                    <a href="#">TRAINING & CONSULTING </a>
                                </li>
                                <li class="">
                                    <a href="#">ABOUT US</a>
                                </li>
                                <li class="">
                                    <a href="#">CONTACT US</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="header-right-menu header-menu">
                        <nav id="navigation">
                            <ul id="fjn_navigation">
                            <li><a href="post-job.html" class="post-jobs">Post jobs</a></li>
                            <?php
                            $employer_profile = $this->session->userdata('employer_profile');
                            $jobseeker_profile = $this->session->userdata('jobseeker_profile');
                            if(!empty($employer_profile)){ ?>
                                <li><a href="<?php echo base_url();?>Employer/dashboard"><i class="fa fa-tachometer"></i>Dashboard</a></li>
                                <li><a href="<?php echo base_url();?>Employer/logout"><i class="fa fa-power-off"></i>logout</a></li>
                            <?php }
                            elseif(!empty($jobseeker_profile)){?>
                                <li><a href="<?php echo base_url();?>Jobseeker/dashboard"><i class="fa fa-tachometer"></i>Dashboard</a></li>
                                <li><a href="<?php echo base_url();?>Jobseeker/logout"><i class="fa fa-power-off"></i>logout</a></li>
                            <?php }
                            else{?>

                                <li class="has-children">
                                    <a href="#"><i class="fa fa-user"></i>sign up</a>
                                    <ul>
                                        <li><a href="<?php echo base_url();?>Employer/signup">Employer Signup</a></li>
                                        <li><a href="<?php echo base_url();?>Jobseeker/signup">Job Seeker Signup</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#"><i class="fa fa-lock"></i>login</a>
                                    <ul>
                                        <li><a href="<?php echo base_url();?>Employer/login">Employer Login</a></li>
                                        <li><a href="<?php echo base_url();?>Jobseeker/login">Job Seeker Login</a></li>

                                    </ul>
                                </li>
                            <!--<li><a href="<?php /*echo base_url();*/?>Employer/signup"><i class="fa fa-user"></i>sign up</a></li>-->
                            <!--<li><a href="<?php /*echo base_url();*/?>Employer/login"><i class="fa fa-lock"></i>login</a></li>-->
                            <?php }?>

                        </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->
