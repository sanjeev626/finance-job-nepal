<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="">
<title><?php if(isset($ogtitle) && !empty($ogtitle)) echo $ogtitle; else echo $page_title; ?></title>
<?php if(isset($page_description)){?>
<meta name="description" content="<?php echo $page_description;?>"/>
<?php } if(isset($page_keywords)){?>
<meta name="keywords" content="<?php echo $page_keywords;?>"/>
<?php } ?>
<?php if(isset($ogurl) && !empty($ogurl)){?>
<meta property="og:url" content="<?php echo $ogurl;?>" />
<?php } ?>
<meta property="og:type" content="website" />
<?php if(isset($ogtitle) && !empty($ogtitle)){?>
<meta property="og:title" content="<?php echo $ogtitle;?>" />
<?php } if(isset($ogdescription) && !empty($ogdescription)){?>
<meta property="og:description" content="<?php echo $ogdescription;?>" />
<?php } if(isset($ogimage) && !empty($ogimage)){?>
<meta property="og:image" content="<?php echo $ogimage;?>" />
<?php } ?>


<link href="<?php echo base_url();?>content_home/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>content_home/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>content_home/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url();?>content_home/css/style.css?ver=1.1" rel="stylesheet">
<link href="<?php echo base_url();?>content_home/css/style1.css" rel="stylesheet">
<link href="<?php echo base_url();?>content_home/css/developer.css" rel="stylesheet">
<link href="<?php echo base_url();?>content_home/css/responsive.css" rel="stylesheet" media="screen">
<link rel="shortcut icon" href="<?php echo base_url();?>content_home/images/fav-icon.png">
<!--custom sctoll -->
<link type="text/css" href="<?php echo base_url();?>content_home/css/jquery.custom-scrollbar.css" rel="stylesheet" />

<!-- jQuery -->
<script src="<?php echo base_url();?>content_home/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url();?>content_home/js/bootstrap.min.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
function site_url(url) {
return "<?php echo base_url(); ?>" + url;
}
</script>
<!-- for Facebook like and share starts here -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=119245252069925";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!-- for Facebook like and share ends here -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-51173775-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-51173775-3');
</script>
</head>
<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
<body>

<!--header start-->

<header class="header" data-spy="affix" data-offset-top="1">
  <section class="top-hed">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-xs-12">
          <div class="brand-logo"> <a class="hed-logo" href="<?php echo base_url();?>"> <img src="<?php echo base_url();?>content_home/images/logo.png" alt="Brand Logo"> </a> </div>
        </div>
        <div class="col-sm-6 col-xs-12">
          <div class="head_banner">
            <div id="globalad" class="carousel slide carousel-fade" data-ride="carousel">
              
              <div class="carousel-inner" role="listbox">
                <?php /*<div class="item active"> <a href="<?php echo base_url();?>upload_your_video_cv"><img src="<?php echo base_url();?>content_home/images/nepals_first_job_portal_to_introduce_video_cv.jpg" alt="head-banner" /></a> </div> */?>
                <?php
                $where = array('type'=>'notice','status'=>'Enabled44');
                $notice =  $this->general_model->getAll('slider',$where,'','id,slug,title,link,sliderimage');
                if($notice){
                foreach($notice as $key => $sval): 
                $link = $sval->link;
                if(!empty($sval->link))
                ?>
                <div class="item <?php echo $key==0?'active':'';?>"> <a href="<?php echo $sval->link;?>">
                  <?php if(!empty($sval->sliderimage)){?>
                  <img class="second-slide img-responsive" src="<?php echo base_url();?>uploads/slider/<?php echo $sval->sliderimage;?>" alt="<?php echo $sval->title;?>" style="max-width:540px; max-height:52px;">
                  <?php } else {?>
                  <div class="notice_banner"><?php echo $sval->title;?></div>
                  <?php } ?>
                  </a> </div>
                <?php
                endforeach;
                }
                ?>
              </div>
            </div>
          </div>
        </div>
        <?php
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $employer_profile = $this->session->userdata('employer_profile');
        if(empty($jobseeker_profile) && empty($employer_profile)){ 
        ?>
        <div class="col-xs-3 hidden-xs">
          <div class="login-btn">
            <?php
            $action =base_url().'Jobseeker/loginCheck';
            $attributes = array('name'=>'jobseekerlogin',);
            echo form_open_multipart($action, $attributes);
            ?>
            <ul>
              <li>
                <input type="text" required class="username" name="username" id="username" placeholder="User name or Email Address" tabindex="1">
              </li>
              <li>
                <input type="password" required class="password" name="password" id="password" placeholder="Password" tabindex="2">
              </li>
            </ul>
            <label class="login" style="" id="loginbutton" for="u_0_n">
              <input value="Login" tabindex="4" type="submit" id="u_0_n">
            </label>
            <?php echo form_close(); ?> </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="row">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="contact-info responsive-contact pull-right">
          <ul>
            <li><i class="fa fa-phone"></i></li>
            <li>Call us:</li>
            <li><a class="number" href="callto:4168657">4168657</a></li>
            <li><a class="number" href="callto: 4168658">4168658</a></li>
          </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="col-md-12">
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
              <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
              <?php $video_cv = $this->uri->segment(2); ?>
              <li><a <?php if(empty($video_cv) && $menu == 'home'){ echo 'class="active"'; } ?> href="<?php echo base_url();?>" >Home</a></li>
              <li><a <?php if($menu == 'about'){ echo 'class="active"'; } ?> href="<?php echo base_url();?>aboutus">About </a></li>
              <?php /*<li><a <?php if(!empty($video_cv) && $video_cv == 'benefits-of-video-cv'){ echo 'class="active"'; } ?> href="<?php echo $this->home_model->get_content_url('23');?>">Video CV <i class="fa fa-video-camera" aria-hidden="true"></i></a></li>*/?>
              <li><a <?php if($menu == 'seeker'){ echo 'class="active"'; } ?> href="<?php echo base_url();?>Jobseeker/signup"> Post Resume</a></li>
              <li><a <?php if($menu == 'employer'){ echo 'class="active"'; } ?> href="<?php echo base_url();?>Employer/signup">Post Job</a></li>
              <li><a <?php if($menu == 'contactus'){ echo 'class="active"'; } ?> href="<?php echo base_url();?>contactus">Contact Us </a></li>
              <li class="hidden-md hidden-sm visible-xs"><a href="<?php echo base_url();?>Jobseeker/login">Seeker Login</a></li>
              <li class="hidden-md hidden-sm visible-xs"><a href="<?php echo base_url();?>Employer/login">Employer Login</a></li>
            </ul>
          </div>
          <div class="contact-info pull-right">
            <ul>
              <li><i class="fa fa-phone"></i></li>
              <li>Call us:</li>
              <li><a class="number" href="callto:4168657">4168657</a></li>
              <li><a class="number" href="callto: 4168658">4168658</a></li>
            </ul>
          </div>
        </div>        
        <!-- /.navbar-collapse -->         
      </div>
    </div>
    <!-- /.container --> 
  </nav>
  <div class="head-bottom hidden-sm hidden-xs">
    <div class="container">
      <div class="row">
        <div class="col-md-4 clearfix">
          <div class="seeker-login">
            <ul style="border-left: 0px;">
              <?php
                $jobseeker_profile = $this->session->userdata('jobseeker_profile');
                
                $employer_profile = $this->session->userdata('employer_profile');
                if(!empty($employer_profile)){
                $emp_full_name = $employer_profile->orgname; 
              ?>
              <li>Welcome <?php echo $emp_full_name.' ';?></li>
              <?php }
else if(!empty($jobseeker_profile)){
$full_name = $jobseeker_profile->fname; ?>
              <li>Welcome <?php echo $full_name;?></li>
              <?php }else{?>
              <li>Job Seeker:</li>
              <li><a href="<?php echo base_url();?>Jobseeker/login">Login</a></li>
              <li><a href="<?php echo base_url();?>Jobseeker/signup">Sign up</a></li>
              <?php }?>
            </ul>
          </div>
        </div>
        <div class="col-md-5 clearfix">
          <?php
          /*
          <div class="search-box">$action =base_url().'Search/jobSearch';
            $attributes = array('name'=>'jobSearch',);
            echo form_open($action, $attributes);
            ?>
            <ul>
              <li>
                <input type="text" class="form-control" name="job_title" placeholder="Job Title">
              </li>
              <li class="styled-select">
                <select class="select small form-control" name="job_category">
                  <option value="">-- Job Category --</option>
                  <?php foreach($job_category as $key => $value){ ?>
                  <option value="<?php echo $value->id;?>"><?php echo $value->dropvalue;?></option>
                  <?php } ?>
                </select>
              </li>
              <li class="styled-select">
                <select class="select small form-control" name="location">
                  <option value="">-- Location --</option>
                  <?php foreach($location as $key => $value){ ?>
                  <option value="<?php echo $value->id;?>"><?php echo $value->dropvalue;?></option>
                  <?php } ?>
                </select>
              </li>
              <li>
                <button type="submit" name="submit_search" class="btn btn-default">Search</button>
              </li>
            </ul>
            <?php echo form_close(); 
          </div> */?>
        </div>
        <div class="col-md-3 clearfix">
          <div class="seeker-login employer-login pull-right">
            <ul>
              <?php
                $employer_profile = $this->session->userdata('employer_profile');
                $jobseeker_profile = $this->session->userdata('jobseeker_profile');
                if(!empty($jobseeker_profile)){ 
              ?>
              <li><a href="<?php echo base_url();?>Jobseeker/dashboard">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>Jobseeker/logout">Logout</a></li>
              <?php }
              else if(!empty($employer_profile)){ ?>
              <li><a href="<?php echo base_url();?>Employer/dashboard">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>Employer/logout">Logout</a></li>
              <?php }else{ ?>
              <li>Employer:</li>
              <li><a href="<?php echo base_url();?>Employer/login">Login</a></li>
              <li><a href="<?php echo base_url();?>Employer/signup">Sign up</a></li>
              <?php }?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>