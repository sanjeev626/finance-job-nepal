<?php
$jobseekerInfo= $this->general_model->getById('seeker','id',$sid);
$seekerEmployment = $this->general_model->getAll('seeker_experience',array('sid' => $sid));
$seekerEducation = $this->general_model->getAll('seeker_education',array('sid' => $sid));
$seekerTraining = $this->general_model->getAll('seeker_training',array('sid' => $sid));
$seekerReference = $this->general_model->getAll('seeker_reference',array('sid' => $sid));
$personal =  $this->general_model->countCheck('seeker',array('id' => $sid));
$education =  $this->general_model->countCheck('seeker_education',array('sid' => $sid));
$experience =  $this->general_model->countCheck('seeker_experience',array('sid' => $sid));
$training =  $this->general_model->countCheck('seeker_training',array('sid' => $sid));
$language =  $this->general_model->countCheck('seeker_language',array('sid' => $sid));
$reference =  $this->general_model->countCheck('seeker_reference',array('sid' => $sid));
$total = $personal + $education + $experience + $training + $language + $reference;
$percent = ($total / 6) * 100;
if($percent<100)
    $progressbar_class = 'progress-bar-danger';
else
    $progressbar_class = 'progress-bar-success';
?>
<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->

<!-- Candidate Dashboard Area Start -->

<section class="candidate-dashboard-area section_50">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="job-grid-right">
                    <div class="browse-job-head-option">
                        <div class="col-md-12 col-lg-3 text-center">
                            <h3><?php echo number_format($percent,2);?>%</h3>
                            <div style="border: 1px solid;">
                                <?php
                                $percentage_complete = 20;
                                if($percent<30)
                                    $background_color="red";
                                elseif($percent>30 or $percent<60)
                                    $background_color="lightgreen";
                                else
                                    $percent="green";
                                ?>
                                <div style="background-color:<?php echo $background_color;?>; height: 15px;width: <?php echo number_format($percent);?>%;"></div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-7">
                            <h3>Profile Completeness</h3>
                            <p>Complete your profile to 100% to increase the chance of getting shortlisted for the job!</p>
                        </div>
                        <div class="col-md-12 col-lg-2">
                            <div class="submit-resume">
                                <button type="submit">Update your Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <?php include('includes/jobseeker-left-menu-dashboard.php');?>

            <div class="col-md-12 col-lg-8">
                <div class="job-grid-right">
                    <div class="browse-job-head-option">
                        <div class="job-browse-search">
                            <form>
                                <input type="search" placeholder="Search Jobs Here...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- end job head -->
                    <div class="job-sidebar-list-single margin-top-0">
                        <div class="sidebar-list-single">
                            <h3>Jobs matching your profile.</h3>
                            <p>This list is shown based on your Job Preference</p>
                        </div>
                        <div class="sidebar-list-single">
                            <div class="top-company-list">
                                <div class="company-list-logo"> <a href="#"> <img src="<?php echo base_url()?>content_home/img/company-logo-1.png" alt="company list 1"> </a> </div>
                                <div class="company-list-details">
                                    <h3><a href="#">Regional Sales Manager</a></h3>
                  <span>
                     <a href="#"><i class="fa fa-building"></i> Company Name </a>
                  </span><br>
                                    <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                                    <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                                    <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p>
                                </div>
                                <div class="company-list-btn"> <a href="#" class="fjn-link">View Details</a> </div>
                            </div>
                        </div>
                        <!-- end sidebar single list -->
                        <div class="sidebar-list-single">
                            <div class="top-company-list">
                                <div class="company-list-logo"> <a href="#"> <img src="<?php echo base_url()?>content_home/img/company-logo-4.png" alt="company list 1"> </a> </div>
                                <div class="company-list-details">
                                    <h3><a href="#">C Developer (Senior) C .Net</a></h3>
                                    <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                                    <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                                    <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                                    <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p>
                                </div>
                                <div class="company-list-btn"> <a href="#" class="fjn-link">View Details</a> </div>
                            </div>
                        </div>
                        <!-- end sidebar single list -->
                        <div class="sidebar-list-single">
                            <div class="top-company-list">
                                <div class="company-list-logo"> <a href="#"> <img src="<?php echo base_url()?>content_home/img/company-logo-2.png" alt="company list 1"> </a> </div>
                                <div class="company-list-details">
                                    <h3><a href="#">Regional Sales Manager</a></h3>
                                    <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                                    <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                                    <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                                    <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p>
                                </div>
                                <div class="company-list-btn"> <a href="#" class="fjn-link">View Details</a> </div>
                            </div>
                        </div>
                        <!-- end sidebar single list -->
                        <div class="sidebar-list-single">
                            <div class="top-company-list">
                                <div class="company-list-logo">

                                    <img src="<?php echo base_url()?>content_home/img/company-logo-3.png" alt="company list 1"> </a> </div>
                                <div class="company-list-details">
                                    <h3><a href="#">Asst. Teacher</a></h3>
                                    <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                                    <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                                    <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                                    <p class="varify"><i class="fa fa-check"></i>Accounting / Finance</p>
                                </div>
                                <div class="company-list-btn"> <a href="#" class="fjn-link">View Details</a> </div>
                            </div>
                        </div>
                        <!-- end sidebar single list -->
                        <div class="sidebar-list-single">
                            <div class="top-company-list">
                                <div class="company-list-logo"> <a href="#"> <img src="<?php echo base_url()?>content_home/img/company-logo-2.png" alt="company list 1"> </a> </div>
                                <div class="company-list-details">
                                    <h3><a href="#">civil engineer</a></h3>
                                    <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                                    <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                                    <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                                    <p class="varify"><i class="fa fa-check"></i>Accounting / Finance</p>
                                </div>
                                <div class="company-list-btn"> <a href="#" class="fjn-link">View Details</a> </div>
                            </div>
                        </div>
                        <!-- end sidebar single list -->
                        <div class="sidebar-list-single">
                            <div class="top-company-list">
                                <div class="company-list-logo"> <a href="#"> <img src="<?php echo base_url()?>content_home/img/company-logo-3.png" alt="company list 1"> </a> </div>
                                <div class="company-list-details">
                                    <h3><a href="#">Asst. Teacher</a></h3>
                                    <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                                    <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                                    <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                                    <p class="varify"><i class="fa fa-check"></i>Accounting / Finance</p>
                                </div>
                                <div class="company-list-btn"> <a href="#" class="fjn-link">View Details</a> </div>
                            </div>
                        </div>
                        <!-- end sidebar single list -->
                        <div class="sidebar-list-single">
                            <div class="top-company-list">
                                <div class="company-list-logo"> <a href="#"> <img src="<?php echo base_url()?>content_home/img/company-logo-1.png" alt="company list 1"> </a> </div>
                                <div class="company-list-details">
                                    <h3><a href="#">Regional Sales Manager</a></h3>
                                    <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                                    <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                                    <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                                    <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p>
                                </div>
                                <div class="company-list-btn"> <a href="#" class="fjn-link">View Details</a> </div>
                            </div>
                        </div>
                        <!-- end sidebar single list -->
                        <div class="sidebar-list-single">
                            <div class="top-company-list">
                                <div class="company-list-logo"> <a href="#"> <img src="<?php echo base_url()?>content_home/img/company-logo-4.png" alt="company list 1"> </a> </div>
                                <div class="company-list-details">
                                    <h3><a href="#">C Developer (Senior) C .Net</a></h3>
                                    <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                                    <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                                    <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                                    <p class="varify"><i class="fa fa-check"></i>Accounting / Finance</p>
                                </div>
                                <div class="company-list-btn"> <a href="#" class="fjn-link">View Details</a> </div>
                            </div>
                        </div>
                        <!-- end sidebar single list -->
                        <div class="sidebar-list-single">
                            <div class="top-company-list">
                                <div class="company-list-logo"> <a href="#"> <img src="<?php echo base_url()?>content_home/img/company-logo-3.png" alt="company list 1"> </a> </div>
                                <div class="company-list-details">
                                    <h3><a href="#">Asst. Teacher</a></h3>
                                    <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                                    <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                                    <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                                    <p class="varify"><i class="fa fa-check"></i>Accounting / Finance</p>
                                </div>
                                <div class="company-list-btn"> <a href="#" class="fjn-link">View Details</a> </div>
                            </div>
                        </div>
                        <!-- end sidebar single list -->
                        <div class="sidebar-list-single">
                            <div class="top-company-list">
                                <div class="company-list-logo"> <a href="#"> <img src="<?php echo base_url()?>content_home/img/company-logo-2.png" alt="company list 1"> </a> </div>
                                <div class="company-list-details">
                                    <h3><a href="#">civil engineer</a></h3>
                                    <span><a href="#"><i class="fa fa-building"></i> Company Name</a></span><br>
                                    <p class="company-state"><i class="fa fa-map-marker"></i> Baluwatar, Kathmandu</p>
                                    <p class="open-icon"><i class="fa fa-clock-o"></i>3rd May 2019</p>
                                    <p class="varify"><i class="fa fa-check"></i>Accounting / Finance</p>
                                </div>
                                <div class="company-list-btn"> <a href="#" class="fjn-link">View Details</a> </div>
                            </div>
                        </div>
                        <!-- end sidebar single list -->
                    </div>
                    <!-- end job sidebar list -->
                    <div class="pagination-box-row">
                        <p>Page 1 of 6</p>
                        <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li>...</li>
                            <li><a href="#">6</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- end pagination -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Candidate Dashboard Area End -->

