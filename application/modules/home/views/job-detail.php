<!-- Single Candidate Start -->
<?php
$jobDetail = $job_detail[0];
if(!empty($banner_image)){
?>
<section class="single-candidate-page">
    <img src="<?php echo base_url().'uploads/employer/'.$banner_image;?>" width="100%">

</section>
<?php }?>
<!-- Single Candidate End -->

<!-- Single Candidate Bottom Start -->
<section class="single-candidate-bottom-area section_15">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9">
                <div class="single-candidate-bottom-left sidebar-list-single">
                    <div class="single-candidate-widget job-section">
                        <h3><?php echo $jobDetail->jobtitle?></h3>
                        <div class="col-md-12 col-lg-6 job_overview">
                            <p class="job_overview"><i class="fa fa-calendar"></i> <strong>Apply Before :</strong> <?php echo date("M d, Y", strtotime($jobDetail->applybefore))?></p>
                        </div>
                        <div class="col-md-12 col-lg-6 job_overview">
                            <p><i class="fa fa-map-marker"></i> <strong>Location :</strong>
                            <?php
                            //echo $jobDetail->joblocation;
                            if(!empty($jobDetail->joblocation)){
                                $joblocation_arr = explode(',',$jobDetail->joblocation);
                                for($i=0;$i<count($joblocation_arr);$i++)
                                {
                                    echo $this->general_model->getById('dropdown','id',$joblocation_arr[$i])->dropvalue;
                                    if(count($joblocation_arr)>0 && $i<(count($joblocation_arr)-1)) echo ', ';
                                }
                            }

                            ?>
                            </p>
                        </div>
                        <div class="col-md-12 col-lg-6 job_overview">
                            <p><i class="fa fa-thumb-tack"></i> <strong>Job Type :</strong>
                                <?php
                                if(!empty($jobDetail->jobtype)){
                                    $jobtype_arr = explode(',',$jobDetail->jobtype);
                                    for($i=0;$i<count($jobtype_arr);$i++)
                                    {
                                        echo $this->general_model->getById('dropdown','id',$jobtype_arr[$i])->dropvalue;
                                        if(count($jobtype_arr)>0 && $i<(count($jobtype_arr)-1)) echo ', ';
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
                        <h3>Job Specification (Skills, and Abilities)</h3>
                        <?php echo $jobDetail->requirements?>
                    </div>
                    <div class="single-candidate-widget clearfix">
                        <h3>Applying Procedures</h3>
                        <?php echo $jobDetail->howtoapply?>
                    </div>
                    <div class="single-candidate-widget clearfix">
                        <h3>share this post</h3>
                        <ul class="share-job">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                    <div class="single-candidate-widget-2">
                        <a href="#" class="fjn-btn-2">
                            <i class="fa fa-paper-plane-o"></i>
                            Apply Now
                        </a>
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
<!-- Single Candidate Bottom End -->