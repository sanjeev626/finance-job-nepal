<section class="fjn-job-tab-area section_15">
    <div class="container">

        <div class="row">
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="site-heading">
                                    <h2>Our <span>Clients</span></h2>
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
                                    foreach($client_list as $cl){
                                        echo '<li><a href="'.$cl->url.'" target="_blank"> <img src="'.base_url().'uploads/clients/'.$cl->image.'" alt="'.$cl->clientname.'"> </a>          </li>';
                                    }
                                ?>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">

                <div class="row">
                    <div class="col-md-12">
                        <div class="site-heading">
                            <h2>Companies & <span>job offers</span></h2>
                            <p>It's easy. Simply post a job you need completed and receive competitive bids from freelancers within minutes</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class=" job-tab">
                            <ul class="nav nav-pills job-tab-switch" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-companies-tab" data-toggle="pill" href="#pills-recent" role="tab" aria-controls="pills-companies" aria-selected="true">Recent Jobs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-newspaper-tab" data-toggle="pill" href="#pills-newspaper" role="tab" aria-controls="pills-newspaper" aria-selected="false">News PaperJobs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-fjn-tab" data-toggle="pill" href="#pills-fjn" role="tab" aria-controls="pills-fjn" aria-selected="false">Hot Jobs</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-recent" role="tabpanel" aria-labelledby="pills-companies-tab">
                                <div class="top-company-tab">
                                    <div class="row">

                                        <?php
                                        if($recent_job) {
                                            foreach ($recent_job as $rj) {
                                                $eid = $rj->eid;
                                                $empInfo = $this->general_model->getById('employer', 'id', $eid, '*');
                                                $orgcode = $empInfo->organization_code;
                                                $orgname = $empInfo->orgname;

                                                ?>
                                                <div class="col-md-6 col-sm-12 padding-left-right-5">
                                                    <div class="job-content">
                                                        <div class="company-name">
                                                            <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $rj->slug; ?>/<?php echo $rj->id; ?>">
                                                                <?php echo $rj->jobtitle ?>
                                                            </a>
                                                        </div>
                                                        <div class="top-company-list">
                                                            <div class="company-list-logo">
                                                                <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $rj->slug; ?>/<?php echo $rj->id; ?>">
                                                                    <?php
                                                                    if (!empty($empInfo->organization_logo)) {
                                                                        $img = 'uploads/employer/' . $empInfo->organization_logo;
                                                                    } else {
                                                                        $img = 'content_home/img/company-logo-4.png';
                                                                    }
                                                                    ?>
                                                                    <img src="<?php echo base_url() . $img; ?>" alt="<?php echo $rj->jobtitle ?>">
                                                                </a>
                                                            </div>
                                                            <div class="company-list-details">
                                                                <h4 >
                                                                    <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $rj->slug; ?>/<?php echo $rj->id; ?>">
                                                                        <?php echo $rj->jobtitle ?>
                                                                    </a>
                                                                </h4>

                                                                <p class="job-title">
                                                                    <i class="fa fa-map-marker"></i> <?php echo $empInfo->organization_address; ?>
                                                                </p>

                                                                <p class="job-title"><i class="fa fa-calendar"></i>Apply Before
                                                                    : <?php echo date("M d, Y", strtotime($rj->applybefore)) ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php }
                                        }
                                        else{?>


                                            <div class="col-md-12 col-sm-12 padding-left-right-5">
                                                <div class="job-content">
                                                    <div class="company-name">
                                                        No Jobs Available.
                                                    </div>
                                                </div>
                                            </div>




                                        <?php }
                                        ?>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-newspaper" role="tabpanel" aria-labelledby="pills-newspaper-tab">
                                <div class="top-company-tab">
                                    <div>
                                        <?php
                                        if($newspaper_job) {
                                            foreach ($newspaper_job as $npj) {
                                                $eid = $npj->eid;
                                                $empInfo = $this->general_model->getById('employer', 'id', $eid, '*');
                                                $orgcode = $empInfo->organization_code;
                                                if (empty($npj->displayname))
                                                    $orgname = $empInfo->orgname;
                                                else
                                                    $orgname = $npj->displayname;
                                                ?>
                                                <li>
                                                    <div class="top-company-list">
                                                        <div class="company-list-logo">
                                                            <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $npj->slug; ?>/<?php echo $npj->id; ?>">
                                                                <?php
                                                                if (!empty($empInfo->organization_logo)) {
                                                                    $img = 'uploads/employer/' . $empInfo->organization_logo;
                                                                } else {
                                                                    $img = 'content_home/img/company-logo-4.png';
                                                                }
                                                                ?>
                                                                <img src="<?php echo base_url() . $img; ?>"
                                                                     alt="<?php echo $rj->jobtitle ?>"/>
                                                            </a>
                                                        </div>
                                                        <div class="company-list-details">
                                                            <h3>
                                                                <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $npj->slug; ?>/<?php echo $npj->id; ?>"><?php echo $npj->jobtitle ?></a>
                                                            </h3>

                                                            <p class="company-state"><i
                                                                    class="fa fa-map-marker"></i> <?php echo $empInfo->organization_address; ?>
                                                            </p>
                                                            <!--<p class="open-icon"><i class="fa fa-clock-o"></i>2 minutes ago</p>-->
                                                            <p class="open-icon"><i class="fa fa-calendar"></i>Apply Before
                                                                : <?php echo date("M d, Y", strtotime($npj->applybefore)) ?></p>

                                                            <p class="open-icon"><i
                                                                    class="fa fa-briefcase"></i><?php echo $npj->requiredno; ?>
                                                                open position</p>
                                                            <!-- <p class="varify"><i class="fa fa-check"></i>Salary :
                                                    <?php
                                                            $salary = $this->general_model->getById('dropdown', 'id', $npj->salaryrange);
                                                            if ($salary) {
                                                                echo $salary->dropvalue;
                                                            } else {
                                                                echo 'Negotiable';
                                                            }
                                                            ?>
                                                </p> -->

                                                        </div>
                                                        <div class="company-list-btn">
                                                            <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $npj->slug; ?>/<?php echo $npj->id; ?>"
                                                               class="fjn-btn">view Details</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php }
                                        }
                                        else{?>
                                            <div class="col-md-12 col-sm-12 padding-left-right-5">
                                                <div class="job-content">
                                                    <div class="company-name">
                                                        No Jobs Available.
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-fjn" role="tabpanel" aria-labelledby="pills-fjn-tab">
                                <div class="top-company-tab">
                                    <div>
                                        <?php
                                        if($fjn_job) {
                                            foreach ($fjn_job as $fjnj) {
                                                $eid = $fjnj->eid;
                                                $empInfo = $this->general_model->getById('employer', 'id', $eid, '*');
                                                $orgcode = $empInfo->organization_code;
                                                if (empty($npj->displayname))
                                                    $orgname = $empInfo->orgname;
                                                else
                                                    $orgname = $npj->displayname;
                                                ?>
                                                <li>
                                                    <div class="top-company-list">
                                                        <div class="company-list-logo">
                                                            <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $fjnj->slug; ?>/<?php echo $fjnj->id; ?>">
                                                                <?php
                                                                if (!empty($empInfo->organization_logo)) {
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
                                                            <h3>
                                                                <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $fjnj->slug; ?>/<?php echo $fjnj->id; ?>"><?php echo $fjnj->jobtitle ?></a>
                                                            </h3>

                                                            <p class="company-state"><i
                                                                    class="fa fa-map-marker"></i> <?php echo $empInfo->organization_address; ?>
                                                            </p>
                                                            <!--<p class="open-icon"><i class="fa fa-clock-o"></i>2 minutes ago</p>-->
                                                            <p class="open-icon"><i class="fa fa-calendar"></i>Apply Before
                                                                : <?php echo date("M d, Y", strtotime($fjnj->applybefore)) ?>
                                                            </p>

                                                            <p class="open-icon"><i
                                                                    class="fa fa-briefcase"></i><?php echo $fjnj->requiredno; ?>
                                                                open position</p>
                                                            <!-- <p class="varify"><i class="fa fa-check"></i>Salary :
                                                    <?php
                                                            $salary = $this->general_model->getById('dropdown', 'id', $fjnj->salaryrange);
                                                            if ($salary) {
                                                                echo $salary->dropvalue;
                                                            } else {
                                                                echo 'Negotiable';
                                                            }
                                                            ?> -->
                                                            </p>

                                                        </div>
                                                        <div class="company-list-btn">
                                                            <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $fjnj->slug; ?>/<?php echo $fjnj->id; ?>"
                                                               class="fjn-btn">view Details</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php }
                                        }
                                        else{?>
                                            <div class="col-md-12 col-sm-12 padding-left-right-5">
                                                <div class="job-content">
                                                    <div class="company-name">
                                                        No Jobs Available.
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

            <div class="col-md-3">
                <div class="advertisement-content">
                    <div class="tab-pane fade show active">
                        <ul>
                            <?php
                                foreach($advetisements as $adv){
                                    echo '<li><a href="'.$adv->website.'" target="_blank"> <img src="'.base_url().'uploads/advertisement/'.$adv->image.'" alt="'.$adv->addtitle.'"> </a>          </li>';
                                }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>




    </div>
</section>