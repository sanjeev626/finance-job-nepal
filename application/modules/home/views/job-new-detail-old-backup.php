




<?php/*?>
<!DOCTYPE html>

<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title><?php echo $page_title; ?></title>
    <link href="<?php echo base_url();?>content_home/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>content_home/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>content_home/css/style.css" rel="stylesheet">
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
    </head>

    <!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

    <body>
<?php
$jobDetail = $job_detail[0];
if(!empty($employer_info)){
  $logo = $employer_info->logo;
  $description = $employer_info->orgdesc;
}else{
  $logo ='';
  $description = '';
}
?>
<header class="jobdetails-hed">
  <figure class="panel-image"> 
    <img class="img-responsive" src="<?php echo base_url(); ?>uploads/employer/<?php echo $employer_info->banner_image; ?>" alt="Details Bg"> 
  </figure>
</header>

<!-- body start -->
<div class="clearfix"></div>
<div class="container jobdetail-page">
      <div class="row">
    <div class="col-md-9 clearfix">
          <div class="jobdetail-leftaside">
        <div class="details-info">
              <p><?php echo stripslashes($description);?></p>
            </div>
        <div class="current-vacancies clearfix">
              <h2>Current vacancies</h2>
              <ul>
            <?php if($related_job){
            foreach($related_job as $key => $value):?>
            <li><a href="<?php echo base_url().'job/'. $value->slug.'/'.$value->id; ?>"><?php echo $value->jobtitle; ?></a></li>
            <?php endforeach;
            }else{?>
            <li> No More Vacancy </li>
            <?php } ?>
          </ul>
            </div>
        <div class="headline">
              <p><?php echo stripslashes($jobDetail->jobtitle);?></p>
            </div>
        <div class="vacancies-details">
            <div class="j-overview">
              <h2>Job overview:</h2>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Job Category</strong></p>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo $this->general_model->getById('tbl_jobcategory','jobcategory_id',$jobDetail->jobcategory)->title; ?></p>
                </div>
              </div>
              <?php if(!empty($jobDetail->preferredgender)){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Preferred Gender :</strong></p>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p> <?php echo $jobDetail->preferredgender;?></p>
                </div>
              </div>
              <?php } if(!empty($jobDetail->joblevel)){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Job Level</strong></p>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo $jobDetail->joblevel;?></p>
                </div>
              </div>
              <?php } 
              $salary =  $this->general_model->getById('tbl_salaryranges','salaryrange_id',$jobDetail->salaryrange); 
              if(!empty($salary->title)){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Salary</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php if($salary) echo $salary->title; ?><p>
                </div>
              </div>
              <?php } if(!empty($jobDetail->noexperience)){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Experience</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo $jobDetail->noexperience; ?> year</p>
                </div>
              </div>              
              <?php } if(!empty($jobDetail->apply_by_faculty)){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Required Degree</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo ($jobDetail->apply_by_faculty) ? $jobDetail->apply_by_faculty : 'Any'; ?></p>
                </div>
              </div>
              <?php } if(!empty($jobDetail->apply_by_age) && $jobDetail->apply_by_age!="0-0"){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Age Bar</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo ($jobDetail->apply_by_age) ? $jobDetail->apply_by_age : 0; ?> year</p>
                </div>
              </div>
              <?php } if(!empty($jobDetail->requiredno)){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>No. of vacancy</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo $jobDetail->requiredno; ?></p>
                </div>
              </div>
              <?php } if(!empty($jobDetail->applybefore)){?>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <p><strong>Apply Before</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <p><strong>:</strong></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <p><?php echo date('d M Y',strtotime($jobDetail->applybefore));?></p>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="elements">
              <h2>Educational Description:</h2>
              <ul class="stop">
                <li><?php echo stripslashes($jobDetail->background);?></li>
                <?php if(!empty($jobDetail->required_education)){?>
                <li><strong>Required Education : </strong><?php echo stripslashes($jobDetail->required_education);?></li>
                <?php } if($jobDetail->slc_docs=="1" || $jobDetail->docs_11_12=="1"  || $jobDetail->bachelor_docs=="1"  || $jobDetail->masters_docs=="1"){?>
                <li><strong>Mandatory Documents : </strong>
                <?php
                if($jobDetail->slc_docs=="1") echo 'SLC Marksheet';
                if($jobDetail->docs_11_12=="1") echo ', 11/12 Transcript';
                if($jobDetail->bachelor_docs=="1") echo ', Bachelor Transcript';
                if($jobDetail->masters_docs=="1") echo ', Masters Transcript';
                ?>
                </li>
                <?php } ?>
              </ul>
            </div>
            <div class="elements">
              <h2>Job Specification:</h2>
              <ul class="stop">
                <li><?php echo $jobDetail->specification;?></li>
              </ul>
            </div>
            <div class="elements">
              <h2>Specific Requirement :</h2>
              <ul class="stop">
                <li><?php echo stripslashes($jobDetail->requirements);?></li>
              </ul>
            </div>
            <div class="elements">
              <h2>How to apply for this post ?</h2>
              <ul class="stop">
                <li><?php echo stripslashes($jobDetail->howtoapply);?></li>
              </ul>
            </div>
              <a href="<?php echo base_url();?>applyJob/<?php echo $jobDetail->id; ?>" class="btn btn-success">Apply Now</a> </div>
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
              <p><strong>Company:</strong> <?php echo $employer_info->orgname; ?></p>
              <p><strong>Industry:</strong> <?php echo $employer_info->natureoforg; ?></p>
              <p><strong>Location:</strong> <?php echo $employer_info->address; ?></p>
              <?php }else{ ?>
              <p><strong>Company:</strong> <?php echo $jobDetail->displayname; ?></p>
              <?php }?>
            </section>
        <section class="left-brandlogo">
              <figure> <a href="<?php echo base_url();?>"><img class="img-responsive" src="<?php echo base_url();?>content_home/images/logo.png" alt="Brand logo"></a> </figure>
            </section>
        <section id="vertical-horizontal-scrollbar-demo" class="hunting-job default-skin demo">
              <h2>INTERNATIONAL JOBS</h2>
              <?php 
              if(!empty($international_job)){
                foreach ($international_job as $key => $value) {
                $eid = $value->eid;
                if($eid){
                    $related_job = $this->home_model->get_related_job_by_id($value->eid);
                    $empInfo = $this->general_model->getById('employer','id',$eid,'orgcode,logo,orgname');
                    $orgcode = $empInfo->orgcode;
                    $orgname =$empInfo->orgname;
                }else{
                    $related_job = '';
                    $emplogo = '';
                    $orgcode ='';
                    $orgname =$value->displayname;
                }
                ?>
              <div class="cj-item">
            <?php if($eid){?>
            <a class="co-img" href="<?php echo base_url();?>Employer/jobList/<?php echo $orgcode; ?>/<?php echo $value->eid; ?>"><img src="<?php echo the_employer_logo($empInfo->logo, $value->complogo);?>" class="img-responsive"></a>
            <?php }else{?>
            <a class="co-img" href="javascript:void(0)"><img src="<?php echo the_employer_logo($empInfo->logo, $value->complogo);?>" class="img-responsive"></a>
            <?php } ?>
            <div class="item-info"> <strong>
              <?php  echo $orgname; ?>
              </strong>
                  <ul>
                <?php

                          if(!empty($related_job)){

                            foreach ($related_job as $key => $val) { ?>
                <?php if($eid){?>
                <li><a href="<?php echo base_url();?>job/<?php echo $orgcode; ?>/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle; ?> </a></li>
                <?php }else{?>
                <li><a href="<?php echo base_url();?>job/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle; ?> </a></li>
                <?php } ?>
                <?php }} else{?>
                <li><a href="<?php echo base_url();?>job/<?php echo $value->slug; ?>/<?php echo $value->id; ?>"><?php echo $value->jobtitle; ?> </a></li>
                <?php } ?>
              </ul>
                </div>
            <hr>
          </div>
              <?php }}else{?>
              <span> No Intenational Job Found! </span>
              <?php } ?>
            </section>
      </div>
        </div>
  </div>
    </div>

<!-- Footer en --> 

<a href="#" class="scrollToTop" title="Scroll Back to Top"><i class="fa fa-angle-up"></i></a> 

<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>-->

<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/css/bootstrapvalidator.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script> 
<script src="<?php echo base_url();?>content_home/globaljob/employer.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>content_home/js/jquery.custom-scrollbar.js"></script> 
<script src="<?php echo base_url();?>content_home/js/main.js"></script>
</body>
</html>
<?php*/?>