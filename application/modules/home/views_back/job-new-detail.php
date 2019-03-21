<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="">
<title>
<?php echo $ogtitle; ?>
</title>

<!--custom sctoll -->
<link type="text/css" href="<?php echo base_url();?>content_home/css/jquery.custom-scrollbar.css" rel="stylesheet" />
<link href="<?php echo base_url();?>content_home/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>content_home/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>content_home/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>content_home/css/responsive.css" rel="stylesheet" media="screen">
  <link rel="shortcut icon" href="<?php echo base_url();?>content_home/images/fav-icon.png">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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
</head>
<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
<body class="jobdetail-page">
<?php
$jobDetail = $job_detail[0];
//print_r($employer_info);
if(!empty($employer_info)){
  $logo = $employer_info->logo;
  //$logo = '';
  $banner_image_location = base_url()."uploads/employer/".$employer_info->banner_image;
  $description = $employer_info->orgdesc;
  $url = base_url().'job/'.$employer_info->orgcode.'/'.$jobDetail->slug.'/'.$jobDetail->id;
}else{
  $logo ='';
  $banner_image_location="";
  $description = '';
  $url = base_url().'job/'.$jobDetail->slug.'/'.$jobDetail->id;
}
if(!empty($banner_image_location)){
?>
<header class="jobdetails-hed" style="background:url(<?php echo base_url(); ?>uploads/employer/<?php echo $employer_info->banner_image; ?>) no-repeat top center;" >&nbsp;</header>
<?php } ?>
<!-- body start -->
<div class="container">
  <div class="row">
    <?php $this->load->view('admin/common/flash_message'); ?>
    <div class="col-md-9 clearfix" style="padding-right: 0px;">
      <div class="jobdetail-leftaside">
        <?php if(!empty($description)){?>
        <div class="details-info">
          <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-3">
              <figure> <img src="<?php echo the_employer_logo($logo,$jobDetail->complogo);?>" alt="Logo" style="width: 100%;"> </figure>
            </div>
            <div class="col-md-10 col-sm-9 col-xs-9">
              <p><?php
              if(!empty($jobDetail->displayname)) echo $jobDetail->displayname; 
              else if(!empty($description)) echo stripslashes($description);
              else echo "&nbsp;";
              }
              ?></p>
            </div>
          </div>
        </div>       
        <?php
        $data2['banner_image_location'] = $banner_image_location;
        $data2['url'] = $url;
        $data2['jobDetail'] = $jobDetail;
        $this->load->view('job-detail-section',$data2);
        ?>        
        <?php if($related_job && empty($jobDetail->displayname)){?>
        <div class="current-vacancies clearfix">
          <h2>Current vacancies</h2>
          <ul>
            <?php
            foreach($related_job as $key => $value):?>
            <li><a href="<?php echo base_url().'job/'. $value->slug.'/'.$value->id; ?>"><?php echo $value->jobtitle; ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php } ?>
        <div class="criteria-procedure">
          <div class="criteria">
            <h2>For the above positions:</h2>
            <ul class="stop">
              <li>Candidates are requested to mention and include their age, percentage/CGPA from SLC and above level. Failure to provide the information will lead to disqualification.</li>
              <li>Candidates must specifically mention the preferred ‘Location’ feasible for them.</li>
              <li>The eligible candidates meeting the above qualification and criteria shall be shortlisted and will be informed for further selection process. Only short listed candidates meeting the above criteria will be contacted for selection process.</li>
            </ul>
          </div>
          <div class="procedure">
            <h2>Applying procedure:</h2>
            <ul class="stop">
              <li>For Accountholders: Log in to globaljob.com.np and access your account.</li>
              <li>For new user, Create New Account</li>
              <li>Click ‘Apply Online’ button in this page.</li>
              <li>For further confirmation, click on “Jobs I have applied to” option on your profile page after you log in. Once successfully applied, the job title and the organization name will be displayed in the list along with the applied date.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- right-aside start -->
    <div class="col-md-3">
      <div class="right-aside">
        <section class="about-company">
          <h3>About company</h3>
          <?php if(!empty($employer_info)){?>
          <p><strong>Company:</strong> <?php if(!empty($jobDetail->displayname)) echo $jobDetail->displayname; else echo $employer_info->orgname; ?></p>
          <?php if(isset($employer_info->natureoforg) && $employer_info->natureoforg>0){?>
          <p><strong>Industry:</strong> <?php echo $this->general_model->getById('dropdown','id',$employer_info->natureoforg)->dropvalue; ?></p>
          <?php } ?>          
          <p><strong>Location:</strong> <?php echo $employer_info->address; ?></p>
          <?php }else{ ?>
          <p><strong>Company:</strong> <?php echo $jobDetail->displayname; ?></p>
          <?php }?>
        </section>
        <!-- <section class="share">
          <div class="para">
            <p><strong>Views:</strong> 2020</p>
            <p><strong>Post Date:</strong> Jan 25, 2017</p>
            <p><strong>Expired Date:</strong> Feb 25, 2017</p>
          </div>
          <button type="submit" class="btn btn-defult">Apply Now</button>
          <div class="sharing-link">
            <h3>Share this job</h3>
            <ul>
              <li><a class="btn-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="btn-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="btn-google" href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a class="btn-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </section> -->
        <section class="left-brandlogo">
          <figure> <a href="<?php echo base_url();?>"><img class="img-responsive" src="<?php echo base_url();?>content_home/images/logo.png" alt="Global Job Pvt. Ltd."></a> </figure>
        </section>
      </div>
      <?php $this->load->view('includes/advance-search-sidebar');?>
    </div>
  </div>
</div>
<!-- right-aside start --> 
<!-- body end -->
</body>
</html>