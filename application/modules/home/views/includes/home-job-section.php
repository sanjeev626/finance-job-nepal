<style type="text/css">
    .job-content {
        margin-bottom: 15px
    }

    .homejobalert {
        margin: 10px 0px;
    }

    /*.homejobalert a{padding: 10px 30px;}*/
    .resumeupload a img, .homejobalert a img {
        width: 100%
    }

    #cvModal .modal-dialog {
        top: 42px;
    }

    #cvModal .modal-dialog .form-group {
        margin-bottom: 5px
    }

    #cvModal .modal-dialog .form-group .control-label {
        margin-bottom: 0px
    }
</style>
<section class="fjn-job-tab-area section_15">
    <div class="container">

        <div class="row">

            <div class="col-md-2">
                <?php if ($client_list) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="site-heading">
                                        <h2>Top <span>Clients</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="client-content">
                            <div class="tab-pane fade show active">

                                <ul>
                                    <?php
                                    foreach ($client_list as $cl) {
                                        echo '<li><a href="' . $cl->url . '" target="_blank"> <img src="' . base_url() . 'uploads/clients/' . $cl->image . '" alt="' . $cl->clientname . '"> </a>          </li>';
                                    }
                                    ?>

                                    <li>
                                        <a href="<?php echo base_url() . 'clients' ?>">
                                            View More
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="site-heading">
                                    <h2>Browse <span>jobs</span></h2>
                                    <p>It's easy. Simply post a job you need completed and receive competitive bids from
                                        freelancers within minutes</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class=" job-tab">
                                    <ul class="nav nav-pills job-tab-switch" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-companies-tab" data-toggle="pill"
                                               href="#pills-recent" role="tab" aria-controls="pills-companies"
                                               aria-selected="true">Recent Jobs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-fjn-tab" data-toggle="pill" href="#pills-fjn"
                                               role="tab" aria-controls="pills-fjn" aria-selected="false">Hot Jobs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-newspaper-tab" data-toggle="pill"
                                               href="#pills-newspaper" role="tab" aria-controls="pills-newspaper"
                                               aria-selected="false">News PaperJobs</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-recent" role="tabpanel"
                                         aria-labelledby="pills-companies-tab">
                                        <div class="row">
                                            <?php
                                            if ($recent_job) {
                                                foreach ($recent_job as $rj) {
                                                    $eid = $rj->eid;
                                                    $empInfo = $this->general_model->getById('employer', 'id', $eid, '*');
                                                    $orgname = $empInfo->orgname;
                                                    $orgcode = $empInfo->organization_code;
                                                    if (empty($rj->displayname)) {
                                                        $orgname = $empInfo->orgname;
                                                        $url = base_url() . 'job/' . $orgcode . '/' . $rj->slug . '/' . $rj->id;
                                                    } else {
                                                        $orgname = $rj->displayname;
                                                        $url = base_url() . 'job/' . $rj->slug . '/' . $rj->id;
                                                    }
                                                    ?>
                                                    <div class="col-md-4 col-sm-12 padding-left-right-0">
                                                        <div class="job-content">
                                                            <div class="top-company-list">
                                                                <h3>
                                                                    <a href="<?php echo $url ?>" data-toggle="tooltip"
                                                                           title="<?php echo $rj->jobtitle  ?>">
                                                                        <?php echo substr($rj->jobtitle, 0, 25) . '' ?>
                                                                    </a>
                                                                </h3>
                                                                <div class="company-list-logo">
                                                                    <a href="<?php echo $url ?>">
                                                                        <?php
                                                                        if (!empty($rj->complogo)) {
                                                                            $img = 'uploads/employer/' . $rj->complogo;
                                                                        } elseif (!empty($empInfo->organization_logo)) {
                                                                            $img = 'uploads/employer/' . $empInfo->organization_logo;
                                                                        } else {
                                                                            $img = 'content_home/img/company-logo-4.png';
                                                                        }
                                                                        ?>
                                                                        <img src="<?php echo base_url() . $img; ?>"
                                                                             alt="<?php echo $rj->jobtitle ?>">
                                                                    </a>
                                                                </div>
                                                                <div class="company-list-details">
                                                                    <p>
                                                                        <i class="fa fa-building"></i>
                                                                        <a href="javascript:void(0)"
                                                                           data-toggle="tooltip"
                                                                           title="<?php echo $orgname ?>">
                                                                            <?php echo substr($orgname, 0, 20) . '' ?>
                                                                        </a>
                                                                    </p>
                                                                    <p class="company-state">
                                                                        <i class="fa fa-map-marker"></i>
                                                                        <?php
                                                                        	if(!empty($rj->joblocation)){
											                                $joblocation_arr = unserialize($rj->joblocation);
											                                $location = '';
											                                if($joblocation_arr !=''){
											                                    for($i=0;$i<count($joblocation_arr);$i++)
											                                    {
											                                        $location .= $this->general_model->getById('dropdown','id',$joblocation_arr[$i])->dropvalue;
											                                        if(count($joblocation_arr)>0 && $i<(count($joblocation_arr)-1)) $location .= ', ';
											                                    }
											                                }
											                            }                            
                                                                        ?>
                                                                        <a href="javascript:void(0)"
                                                                           data-toggle="tooltip"
                                                                           title="<?php echo $location  ?>">
                                                                            <?php echo substr($location , 0, 20) . '' ?>
                                                                        </a>
                                                                    </p>
                                                                    <p class="open-icon"><i
                                                                            class="fa fa-clock-o"></i><?php echo date("M d, Y", strtotime($rj->applybefore)) ?>
                                                                    </p>
                                                                    <!-- <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } else {
                                                ?>
                                                <div class="col-md-12 col-sm-12 padding-left-right-5">
                                                    <div class="job-content">
                                                        <div class="company-name">
                                                            <div class="top-company-list">
                                                                <div class="job-title">
                                                                    <h3>
                                                                        <a href="">No Jobs Available.</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-newspaper" role="tabpanel"
                                         aria-labelledby="pills-newspaper-tab">
                                        <div class="row">
                                            <?php
                                            if ($newspaper_job) {
                                                foreach ($newspaper_job as $npj) {
                                                    $eid = $npj->eid;
                                                    $empInfo = $this->general_model->getById('employer', 'id', $eid, '*');
                                                    $orgcode = $empInfo->organization_code;
                                                    if (empty($npj->displayname)) {
                                                        $orgname = $empInfo->orgname;
                                                        $url = base_url() . 'job/' . $orgcode . '/' . $npj->slug . '/' . $npj->id;
                                                    } else {
                                                        $orgname = $npj->displayname;
                                                        $url = base_url() . 'job/' . $npj->slug . '/' . $npj->id;
                                                    }
                                                    ?>
                                                    <div class="col-md-4 col-sm-12 padding-left-right-0">
                                                        <div class="job-content">
                                                            <div class="top-company-list">
                                                                <div class="job-title">
                                                                    <h3>
                                                                    	<a href="<?php echo $url ?>" data-toggle="tooltip" title="<?php echo $npj->jobtitle  ?>">
	                                                                        <?php echo substr($npj->jobtitle, 0, 25) . '' ?>
	                                                                    </a>
                                                                        <!-- <a href="<?php echo $url ?>"><?php echo $npj->jobtitle ?></a> -->
                                                                    </h3>
                                                                </div>
                                                                <div class="company-list-logo">
                                                                    <a href="<?php echo $url ?>">
                                                                        <?php
                                                                        if (!empty($npj->complogo)) {
                                                                            $img = 'uploads/employer/' . $npj->complogo;
                                                                        } elseif (!empty($empInfo->organization_logo)) {
                                                                            $img = 'uploads/employer/' . $empInfo->organization_logo;
                                                                        } else {
                                                                            $img = 'content_home/img/company-logo-4.png';
                                                                        }
                                                                        ?>
                                                                        <img src="<?php echo base_url() . $img; ?>"
                                                                             alt="<?php echo $npj->jobtitle ?>"/>
                                                                    </a>
                                                                </div>
                                                                <div class="company-list-details">

                                                                    <p>
                                                                        <i class="fa fa-building"></i>
                                                                        <a href="javascript:void(0)"
                                                                           data-toggle="tooltip"
                                                                           title="<?php echo $orgname ?>">
                                                                            <?php echo substr($orgname, 0, 20) . '' ?>
                                                                        </a>

                                                                    </p>

                                                                    <p class="company-state">
                                                                        <i class="fa fa-map-marker"></i>
                                                                        <?php
                                                                        	if(!empty($npj->joblocation)){
											                                $joblocation_arr = unserialize($npj->joblocation);
											                                $location = '';
											                                if($joblocation_arr !=''){
											                                    for($i=0;$i<count($joblocation_arr);$i++)
											                                    {
											                                        $location .= $this->general_model->getById('dropdown','id',$joblocation_arr[$i])->dropvalue;
											                                        if(count($joblocation_arr)>0 && $i<(count($joblocation_arr)-1)) $location .= ', ';
											                                    }
											                                }
											                            }                            
                                                                        ?>
                                                                        <a href="javascript:void(0)"
                                                                           data-toggle="tooltip"
                                                                           title="<?php echo $location ?>">
                                                                            <?php echo substr($location, 0, 20) . '' ?>
                                                                        </a>

                                                                    </p>

                                                                    <p class="open-icon"><i
                                                                            class="fa fa-clock-o"></i><?php echo date("M d, Y", strtotime($npj->applybefore)) ?>
                                                                    </p>
                                                                    <!-- <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } else {
                                                ?>
                                                <div class="col-md-12 col-sm-12 padding-left-right-5">
                                                    <div class="job-content">
                                                        <div class="company-name">
                                                            <div class="top-company-list">
                                                                <div class="job-title">
                                                                    <h3>
                                                                        <a href="">No Jobs Available.</a>
                                                                    </h3>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-fjn" role="tabpanel"
                                         aria-labelledby="pills-fjn-tab">
                                        <div class="row">
                                            <?php
                                            if ($fjn_job) {
                                                foreach ($fjn_job as $fjnj) {
                                                    $eid = $fjnj->eid;
                                                    $empInfo = $this->general_model->getById('employer', 'id', $eid, '*');
                                                    $orgcode = $empInfo->organization_code;
                                                    if (empty($fjnj->displayname)) {
                                                        $orgname = $empInfo->orgname;
                                                        $url = base_url() . 'job/' . $orgcode . '/' . $fjnj->slug . '/' . $fjnj->id;
                                                    } else {
                                                        $orgname = $fjnj->displayname;
                                                        $url = base_url() . 'job/' . $fjnj->slug . '/' . $fjnj->id;
                                                    }
                                                    ?>
                                                    <div class="col-md-4 col-sm-12 padding-left-right-0">
                                                        <div class="job-content">
                                                            <div class="top-company-list">
                                                                <div class="job-title">
                                                                    <h3>
                                                                    	<a href="<?php echo $url ?>" data-toggle="tooltip" title="<?php echo $fjnj->jobtitle  ?>">
	                                                                        <?php echo substr($fjnj->jobtitle, 0, 25) . '' ?>
	                                                                    </a>
                                                                        <!-- <a href="<?php echo $url ?>" data-toggle="tooltip"
                                                                           title="<?php echo $orgname ?>"><?php echo $fjnj->jobtitle ?></a> -->
                                                                    </h3>
                                                                </div>
                                                                <div class="company-list-logo">
                                                                    <a href="<?php echo $url ?>/<?php echo $fjnj->id; ?>">
                                                                        <?php
                                                                        if (!empty($fjnj->complogo)) {
                                                                            $img = 'uploads/employer/' . $fjnj->complogo;
                                                                        } elseif (!empty($empInfo->organization_logo)) {
                                                                            $img = 'uploads/employer/' . $empInfo->organization_logo;
                                                                        } else {
                                                                            $img = 'content_home/img/company-logo-4.png';
                                                                        }
                                                                        ?>
                                                                        <img src="<?php echo base_url() . $img; ?>"
                                                                             alt="<?php echo $fjnj->jobtitle ?>"/>
                                                                    </a>
                                                                </div>
                                                                <div class="company-list-details">

                                                                    <p>
                                                                        <i class="fa fa-building"></i>
                                                                        <a href="javascript:void(0)"
                                                                           data-toggle="tooltip"
                                                                           title="<?php echo $orgname ?>">
                                                                            <?php echo substr($orgname, 0, 20) . '' ?>
                                                                        </a>

                                                                    </p>

                                                                    <p class="company-state">
                                                                        <i class="fa fa-map-marker"></i>
                                                                        <?php
                                                                        	if(!empty($fjnj->joblocation)){
											                                $joblocation_arr = unserialize($fjnj->joblocation);
											                                $location = '';
											                                if($joblocation_arr !=''){
											                                    for($i=0;$i<count($joblocation_arr);$i++)
											                                    {
											                                        $location .= $this->general_model->getById('dropdown','id',$joblocation_arr[$i])->dropvalue;
											                                        if(count($joblocation_arr)>0 && $i<(count($joblocation_arr)-1)) $location .= ', ';
											                                    }
											                                }
											                            }                            
                                                                        ?>
                                                                        <a href="javascript:void(0)"
                                                                           data-toggle="tooltip"
                                                                           title="<?php echo $location ?>">
                                                                            <?php echo substr($location, 0, 20) . '' ?>
                                                                        </a>

                                                                    </p>

                                                                    <p class="open-icon"><i class="fa fa-clock-o"></i>
                                                                        <?php echo date("M d, Y", strtotime($fjnj->applybefore)) ?>
                                                                    </p>
                                                                    <!-- <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } else {
                                                ?>
                                                <div class="col-md-12 col-sm-12 padding-left-right-5">
                                                    <div class="job-content">
                                                        <div class="company-name">
                                                            <div class="top-company-list">
                                                                <div class="job-title">
                                                                    <h3>
                                                                        <a href="">No Jobs Available.</a>
                                                                    </h3>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-3">
                <div class="resumeupload">
                    <a href="#" data-toggle="modal" data-target="#cvModal">
                        <img src="<?php echo base_url(); ?>content_home/img/upload-your-resume.jpg">
                    </a>
                    <!-- <button class="btn" data-toggle="modal" data-target="#cvModal">Upload Your CV</button> -->
                </div>

                <div class="homejobalert">
                    <?php
                    $employer_profile = $this->session->userdata('employer_profile');
                    if (!empty($employer_profile)) {
                        $url = base_url() . 'employer/postjob';
                    } else {
                        $url = base_url() . 'employer/login';
                    }
                    ?>
                    <a href="<?php echo $url ?>">
                        <img src="<?php echo base_url(); ?>content_home/img/create-a-job-alert.jpg">
                    </a>
                </div>


                <?php if ($advetisements) { ?>
                    <div class="advertisement-content">
                        <div class="tab-pane fade show active">
                            <ul>
                                <?php
                                foreach ($advetisements as $adv) {
                                    echo '<li><a href="' . $adv->website . '" target="_blank"> <img src="' . base_url() . 'uploads/advertisement/' . $adv->image . '" alt="' . $adv->addtitle . '"> </a>          </li>';
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="cvModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Apply With Your Basic Information
                    <br>
                    <span>We will get you back soon.</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() . 'jobseeker/jobseekercv' ?>" method="post"
                  enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">First Name*</label>

                        <div>
                            <input type="text" class="form-control input-lg" name="first_name" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Last Name*</label>

                        <div>
                            <input type="text" class="form-control input-lg" name="last_name" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">E-Mail Address*</label>

                        <div>
                            <input type="email" class="form-control input-lg" name="email" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Contact Number</label>

                        <div>
                            <input type="text" class="form-control input-lg" name="contact_number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Upload your CV(Formate Doc, PDF only)*</label>

                        <div>
                            <input type="file" id="exampleInputFile" class="form-control input-lg" name="attachment"
                                   required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                    <button type="submit" name="cvsubmit" class="btn btn-primary subbtn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>