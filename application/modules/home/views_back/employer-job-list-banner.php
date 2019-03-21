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

$data2['banner_image_location'] = $banner_image_location;
$data2['url'] = $url;

if(!empty($banner_image_location)){
?>
<header class="jobdetails-hed" style="background:url(<?php echo base_url(); ?>uploads/employer/<?php echo $employer_info->banner_image; ?>) no-repeat top center;" >&nbsp;</header>
<?php } ?>
<!-- body start -->
<div class="container">
  <div class="row">
    <?php $this->load->view('admin/common/flash_message'); ?>
    <div class="col-md-9 clearfix">
      <div class="jobdetail-leftaside">
      <div class="details-info">
        <div class="row">
          <div class="col-md-2 col-sm-3 col-xs-3">
            <figure> <img src="<?php echo the_employer_logo($logo,$jobDetail->complogo);?>" alt="Logo" style="width: 100%;"> </figure>
          </div>
          <div class="col-md-10 col-sm-9 col-xs-9">
            <p><?php if(!empty($description)){ echo stripslashes($description); } else echo "&nbsp;"; ?></p>
          </div>
        </div>
      </div>      
        <?php foreach($job_detail as $jobDetail){
          $data2['jobDetail'] = $jobDetail;
          $this->load->view('job-detail-section',$data2); ?>        
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
        <?php
        $data3['employer_info'] = $employer_info;
        $this->load->view('template-about-company-section',$data3);
        ?>
        <!-- <section class="about-company">
          <h3>About company</h3>
          <?php if(!empty($employer_info)){?>
          <p><strong>Company:</strong> <?php echo $employer_info->orgname; ?></p>
          <?php if(isset($employer_info->natureoforg) && $employer_info->natureoforg>0){?>
          <p><strong>Industry:</strong> <?php echo $this->general_model->getById('dropdown','id',$employer_info->natureoforg)->dropvalue; ?></p>
          <?php } ?>          
          <p><strong>Location:</strong> <?php echo $employer_info->address; ?></p>
          <?php }else{ ?>
          <p><strong>Company:</strong> <?php echo $jobDetail->displayname; ?></p>
          <?php }?>
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