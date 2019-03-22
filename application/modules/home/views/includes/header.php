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
                                <li class="active has-children">
                                    <a href="<?php echo base_url();?>">home</a>
                                </li>
                                <li class=" has-children">
                                    <a href="#">for candidates</a>
                                    <ul>
                                        <li class="has-inner-child">
                                            <a href="#">browse jobs</a>
                                            <ul>
                                                <li><a href="browse-jobs.html">full page grid</a></li>
                                                <li><a href="job-grid-sidebar.html">grid sidebar</a></li>
                                                <li><a href="job-list-sidebar.html">list sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="browse-categories.html">Browse Categories</a></li>
                                        <li><a href="browse-companies.html">browse companies</a></li>
                                        <li><a href="single-candidates.html">candidates details</a></li>
                                        <li><a href="submit-resume.html">submit resume</a></li>
                                        <li class="has-inner-child">
                                            <a href="#">candidate dashboard</a>
                                            <ul>
                                                <li><a href="candidate-dashboard.html">Candidate dashboard</a></li>
                                                <li><a href="candidate-profile.html">Candidate profile</a></li>
                                                <li><a href="message.html">messages</a></li>
                                                <li><a href="manage-jobs.html">manage jobs</a></li>
                                                <li><a href="candidate-earnings.html">earnings</a></li>
                                                <li><a href="change-password.html">change password</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">for employers</a>
                                    <ul>
                                        <li><a href="browse-candidates.html">Browse Candidates</a></li>
                                        <li><a href="single-company.html">company details</a></li>
                                        <li><a href="post-job.html">Post A job</a></li>
                                        <li class="has-inner-child">
                                            <a href="#">employer dashboard</a>
                                            <ul>
                                                <li><a href="employer-dashboard.html">employer dashboard</a></li>
                                                <li><a href="company-profile.html">company profile</a></li>
                                                <li><a href="message.html">messages</a></li>
                                                <li><a href="manage-candidates.html">manage candidates</a></li>
                                                <li><a href="transaction.html">transaction</a></li>
                                                <li><a href="change-password.html">change password</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">pages</a>
                                    <ul>
                                        <li><a href="about.html">About us</a></li>
                                        <li class="has-inner-child">
                                            <a href="#">blog</a>
                                            <ul>
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="single-blog.html">single blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="job-page.html">job page</a></li>
                                        <li><a href="login.html">login</a></li>
                                        <li><a href="register.html">register</a></li>
                                        <li><a href="contact.html">contact us</a></li>
                                    </ul>
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
                            if(!empty($employer_profile)){ ?>
                                <li><a href="<?php echo base_url();?>Employer/dashboard"><i class="fa fa-tachometer"></i>Dashboard</a></li>
                                <li><a href="<?php echo base_url();?>Employer/logout"><i class="fa fa-power-off"></i>logout</a></li>
                            <?php }else{?>

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
