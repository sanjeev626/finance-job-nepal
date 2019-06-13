<section class="fjn-job-tab-area section_70">
    <div class="container">
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
                            <a class="nav-link" id="pills-fjn-tab" data-toggle="pill" href="#pills-fjn" role="tab" aria-controls="pills-fjn" aria-selected="false">FJN Jobs</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-recent" role="tabpanel" aria-labelledby="pills-companies-tab">
                        <div class="top-company-tab">
                            <ul>

                                <?php
                                    if($recent_job) {
                                        foreach ($recent_job as $rj) {
                                            $eid = $rj->eid;
                                            $empInfo = $this->general_model->getById('employer', 'id', $eid, '*');
                                            $orgcode = $empInfo->organization_code;
                                            $orgname = $empInfo->orgname;

                                            ?>
                                            <li>
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
                                                            <img src="<?php echo base_url() . $img; ?>"
                                                                 alt="<?php echo $rj->jobtitle ?>"/>
                                                        </a>
                                                    </div>
                                                    <div class="company-list-details">
                                                        <h3>
                                                            <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $rj->slug; ?>/<?php echo $rj->id; ?>"><?php echo $rj->jobtitle ?></a>
                                                        </h3>

                                                        <p class="company-state"><i
                                                                class="fa fa-map-marker"></i> <?php echo $empInfo->organization_address; ?>
                                                        </p>

                                                        <p class="open-icon"><i class="fa fa-calendar"></i>Apply Before
                                                            : <?php echo date("M d, Y", strtotime($rj->applybefore)) ?>
                                                        </p>

                                                        <p class="open-icon"><i
                                                                class="fa fa-briefcase"></i><?php echo $rj->requiredno; ?>
                                                            open position</p>

                                                    </div>
                                                    <div class="company-list-btn">
                                                        <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $rj->slug; ?>/<?php echo $rj->id; ?>"
                                                           class="fjn-btn">view Details</a>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php }
                                    }
                                    else{?>
                                        <li>
                                            <div class="top-company-list">
                                                <div class="company-list-details">
                                                    <h3>
                                                        No Jobs Available.
                                                    </h3>
                                                </div>
                                            </div>
                                        </li>
                                    <?php }
                                ?>

                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-newspaper" role="tabpanel" aria-labelledby="pills-newspaper-tab">
                        <div class="top-company-tab">
                            <ul>
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
                                    <li>
                                        <div class="top-company-list">
                                            <div class="company-list-details">
                                                <h3>
                                                    No Jobs Available.
                                                </h3>
                                            </div>
                                        </div>
                                    </li>
                                <?php }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-fjn" role="tabpanel" aria-labelledby="pills-fjn-tab">
                        <div class="top-company-tab">
                            <ul>
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
                                <li>
                                    <div class="top-company-list">
                                        <div class="company-list-details">
                                            <h3>
                                                No Jobs Available.
                                            </h3>
                                        </div>
                                    </div>
                                </li>
                                <?php }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row">
            <div class="col-md-12">
                <div class="load-more">
                    <a href="#" class="fjn-btn">browse more listing</a>
                </div>
            </div>
        </div>-->
    </div>
</section>