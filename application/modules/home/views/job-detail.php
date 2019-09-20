<?php
$jobseeker_profile = $this->session->userdata('jobseeker_profile');
if(!empty($jobseeker_profile)){
    $sid = $jobseeker_profile->id;
    $personal =  $this->general_model->countCheck('seeker',array('id' => $sid));
    $education =  $this->general_model->countCheck('seeker_education',array('sid' => $sid));
    $experience =  $this->general_model->countCheck('seeker_experience',array('sid' => $sid));
    $training =  $this->general_model->countCheck('seeker_training',array('sid' => $sid));
    $language =  $this->general_model->countCheck('seeker_language',array('sid' => $sid));
    $reference =  $this->general_model->countCheck('seeker_reference',array('sid' => $sid));
    $total = $personal + $education + $experience + $training + $language + $reference;
    $percent = ($total / 6) * 100;
}
else{
   $percent = '';
}
$jobDetail = $job_detail[0];

?>
<section class="single-candidate-page">
    <?php if(!empty($banner_image)){?>
    <img src="<?php echo base_url().'uploads/employer/'.$banner_image;?>" width="100%">
    <?php }?>
</section>

<!-- Single Candidate End -->

<!-- Single Candidate Bottom Start -->
<section class="single-candidate-bottom-area section_15">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9">
                <div class="single-candidate-bottom-left sidebar-list-single">
                    <div class="single-candidate-widget job-section">
                        <h3><?php echo $jobDetail->jobtitle?></h3>
                        <?php if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                <?php echo $this->session->flashdata('error');?> </div>
                        <?php }
                        if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                <?php echo $this->session->flashdata('success');?> </div>
                        <?php } ?>
                        <div class="col-md-12 col-lg-6 job_overview">
                            <p class="job_overview"><i class="fa fa-calendar"></i> <strong>Apply Before :</strong> <?php echo date("M d, Y", strtotime($jobDetail->applybefore))?></p>
                        </div>
                        <div class="col-md-12 col-lg-6 job_overview">
                            <p><i class="fa fa-map-marker"></i> <strong>Location :</strong>
                            <?php
                            //echo $jobDetail->joblocation;
                            if(!empty($jobDetail->joblocation)){
                                $joblocation_arr = unserialize($jobDetail->joblocation);
                                if($joblocation_arr !=''){
                                    for($i=0;$i<count($joblocation_arr);$i++)
                                    {
                                        echo $this->general_model->getById('dropdown','id',$joblocation_arr[$i])->dropvalue;
                                        if(count($joblocation_arr)>0 && $i<(count($joblocation_arr)-1)) echo ', ';
                                    }
                                }
                            }

                            ?>
                            </p>
                        </div>
                        <div class="col-md-12 col-lg-6 job_overview">
                            <p><i class="fa fa-thumb-tack"></i> <strong>Job Type :</strong>
                                <?php
                                if(!empty($jobDetail->jobtype)){
                                    $jobtype_arr = unserialize($jobDetail->jobtype);
                                    if($jobtype_arr!=''){
                                        for($i=0;$i<count($jobtype_arr);$i++)
                                        {
                                            echo $this->general_model->getById('dropdown','id',$jobtype_arr[$i])->dropvalue;
                                            if(count($jobtype_arr)>0 && $i<(count($jobtype_arr)-1)) echo ', ';
                                        }
                                    }
                                }

                                ?>
                            </p>
                        </div>
                        <div class="col-md-12 col-lg-6 job_overview">
                            <p><i class="fa fa-intersex"></i> <strong>Preferred Gender:</strong> <?php echo $jobDetail->preferredgender;?></p>
                        </div>
                        <div class="col-md-12 col-lg-6 job_overview">
                            <p><i class="fa fa-black-tie"></i> <strong>Experience :</strong><?php echo ($jobDetail->noexperience=='Not Required'?$jobDetail->noexperience:$jobDetail->noexperience.' years');?></p>
                        </div>

                        <div class="col-md-12 col-lg-6 job_overview">
                            <p><i class="fa fa-book"></i> <strong>Education :</strong><?php echo ucwords($jobDetail->required_education);?></p>
                        </div>

                        <div class="col-md-12 col-lg-6 job_overview">
                            <p>
                                <i class="fa fa-money"></i> <strong>Salary :</strong>
                                    <?php
                                    $salary =  $this->general_model->getById('dropdown','id',$jobDetail->salaryrange);
                                    if($salary){
                                        echo $salary->dropvalue;
                                    }
                                    else{
                                        echo 'Negotiable';
                                    }
                                    ?>

                            </p>
                        </div>
                    </div>
                    <div class="single-candidate-widget">
                        <h3>job Description</h3>
                        <?php echo $jobDetail->specification?>
                    </div>
                    <div class="single-candidate-widget job-required">
                        <h3>Job Specification (Skills and Abilities)</h3>
                        <?php echo $jobDetail->requirements?>
                    </div>

                    <div class="single-candidate-widget clearfix">
                        <h3>Share This Vacancy</h3>
                        <ul class="share-job">
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php  echo $ogurl?>" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php  echo $ogurl?>','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            </li>
                            <li><a href="https://twitter.com/share?url=<?php echo $ogurl?>" target="popup"
                            onclick="window.open('https://twitter.com/share?url=<?php echo $ogurl?>','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a></li>
                            <li>
                                <a href="javascript:void(0)" onclick="window.open( 'http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $ogurl; ?>', 'sharer', 'toolbar=0, status=0, width=600, height=600');return false;" title="Linkedin">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </li>
                            <!-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
                        </ul>
                    </div>
                    <div class="single-candidate-widget-2">
                        <?php
                            if($percent == ''){?>
                                <a href="<?php echo base_url();?>jobseeker/login" class="fjn-btn-danger" style="width: 100%;text-align: center">
                                    <i class="fa fa-paper-plane-o"></i>
                                    Please Login
                                </a>
                            <?php }
                            elseif($percent<50){?>

                                <a href="<?php echo base_url();?>jobseeker/dashboard" class="fjn-btn-danger" style="width: 100%;text-align: center">
                                    <i class="fa fa-paper-plane-o"></i>
                                    Please fill your information
                                </a>
                            <?php }else{?>
                                <a href="<?php echo base_url();?>applyjob/<?php echo $jobDetail->id; ?>" class="fjn-btn-2">
                                    <i class="fa fa-paper-plane-o"></i>
                                    Apply Now
                                </a>
                            <?php }
                        ?>

                    </div>
                    <?php include('includes/detail-page-similar-job.php')?>

                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <?php include('includes/detail-page-other-vacancies.php')?>

            </div>
        </div>
    </div>
</section>
<!-- Single Candidate Bottom End