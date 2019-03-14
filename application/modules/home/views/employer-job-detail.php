<?php $this->load->view('includes/header');?>
<?php $this->load->helper("view_helper"); ?>
<?php
$jobDetail = $job_detail[0];
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
?>
<!-- body start -->
<div class="container jobdetail-page">
  <div class="row">
    <div class="col-md-9">
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
        <?php 
        foreach($job_detail as $jobDetail){
          $data2['jobDetail'] = $jobDetail;
        ?>
        <?php $this->load->view('job-detail-section',$data2); ?>        
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
    <div class="col-md-3" style="padding-left: 0px;">
      <div class="right-aside">
        <?php
        $data3['employer_info'] = $employer_info;
        $data3['jobDetail'] = '';
        $this->load->view('template-about-company-section',$data3);
        ?>
      </div>
    </div>    
    <!-- right-aside start -->    
    <?php $this->load->view('includes/sidebar');?>
  </div>
</div>
<!-- body end -->
<?php $this->load->view('includes/footer');?>