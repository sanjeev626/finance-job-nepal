<section class="fjn-job-tab-area section_15">
    <div class="container">

        <div class="row">

            <div class="col-md-2">
                <?php if($client_list){?>
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
                                foreach ($client_list as $cl) {
                                    echo '<li><a href="' . $cl->url . '" target="_blank"> <img src="' . base_url() . 'uploads/clients/' . $cl->image . '" alt="' . $cl->clientname . '"> </a>          </li>';
                                }
                                ?>


                            </ul>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>


            <div class="col-md-7">

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="site-heading">
                                    <h2>Companies & <span>job offers</span></h2>

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
                                    <div class="tab-pane fade show active" id="pills-recent" role="tabpanel"
                                         aria-labelledby="pills-companies-tab">
                                        <div class="row">
                                                                                        <?php
                                            if($recent_job) {
                                                foreach ($recent_job as $rj) {
                                                    $eid = $rj->eid;
                                                    $empInfo = $this->general_model->getById('employer', 'id', $eid, '*');
                                                    $orgname = $empInfo->orgname;
                                                    $orgcode = $empInfo->organization_code;
                                                    if (empty($rj->displayname))
                                                        $orgname = $empInfo->orgname;
                                                    else
                                                        $orgname = $npj->displayname;

                                                    ?>
                                                    <div class="col-md-6 col-sm-12 padding-left-right-5">
                                                        <div class="job-content">
                                                            <div class="top-company-list">
                                                                <h3>
                                                                    <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $rj->slug; ?>/<?php echo $rj->id; ?>">
                                                                        <?php echo $rj->jobtitle ?>
                                                                    </a>
                                                                </h3>

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
                                                                    <p>
                                                                        <i class="fa fa-building"></i>
                                                                        <a href="javascript:void(0)" data-toggle="tooltip" title="<?php echo $orgname?>">
                                                                            <?php echo substr($orgname, 0, 20).'...'?>
                                                                        </a>

                                                                    </p>

                                                                    <p class="company-state">
                                                                        <i class="fa fa-map-marker"></i>
                                                                        <a href="javascript:void(0)" data-toggle="tooltip" title="<?php echo $empInfo->organization_address?>">
                                                                            <?php echo substr($empInfo->organization_address, 0, 20).'...'?>
                                                                        </a>

                                                                    </p>

                                                                    <p class="open-icon"><i class="fa fa-clock-o"></i><?php echo date("M d, Y", strtotime($rj->applybefore)) ?></p>
                                                                    <!-- <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p> -->
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
                                                    <div class="col-md-6 col-sm-12 padding-left-right-5">
                                                        <div class="job-content">
                                                            <div class="top-company-list">
                                                                <div class="job-title">
                                                                    <h3>
                                                                        <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $npj->slug; ?>/<?php echo $npj->id; ?>"><?php echo $rj->jobtitle ?></a>
                                                                    </h3>
                                                                </div>
                                                                <div class="company-list-logo">
                                                                    <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $npj->slug; ?>/<?php echo $npj->id; ?>">
                                                                        <?php
                                                                        if (!empty($empInfo->organization_logo)) {
                                                                            $img = 'uploads/employer/' . $empInfo->organization_logo;
                                                                        } else {
                                                                            $img = 'content_home/img/company-logo-4.png';
                                                                        }
                                                                        ?>
                                                                        <img src="<?php echo base_url() . $img; ?>" alt="<?php echo $rj->jobtitle ?>"/>
                                                                    </a>
                                                                </div>
                                                                <div class="company-list-details">

                                                                    <p>
                                                                        <i class="fa fa-building"></i>
                                                                        <a href="javascript:void(0)" data-toggle="tooltip" title="<?php echo $orgname?>">
                                                                            <?php echo substr($orgname, 0, 20).'...'?>
                                                                        </a>

                                                                    </p>

                                                                    <p class="company-state">
                                                                        <i class="fa fa-map-marker"></i>
                                                                        <a href="javascript:void(0)" data-toggle="tooltip" title="<?php echo $empInfo->organization_address?>">
                                                                            <?php echo substr($empInfo->organization_address, 0, 20).'...'?>
                                                                        </a>

                                                                    </p>

                                                                    <p class="open-icon"><i class="fa fa-clock-o"></i><?php echo date("M d, Y", strtotime($npj->applybefore)) ?></p>
                                                                    <!-- <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p> -->
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
                                                    <div class="col-md-6 col-sm-12 padding-left-right-5">
                                                        <div class="job-content">
                                                            <div class="top-company-list">
                                                                <div class="job-title">
                                                                    <h3>
                                                                        <a href="<?php echo base_url(); ?>job/<?php echo $orgcode; ?>/<?php echo $fjnj->slug; ?>/<?php echo $fjnj->id; ?>"><?php echo $fjnj->jobtitle ?></a>
                                                                    </h3>
                                                                </div>
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

                                                                    <p>
                                                                        <i class="fa fa-building"></i>
                                                                        <a href="javascript:void(0)" data-toggle="tooltip" title="<?php echo $orgname?>">
                                                                            <?php echo substr($orgname, 0, 20).'...'?>
                                                                        </a>

                                                                    </p>

                                                                    <p class="company-state">
                                                                        <i class="fa fa-map-marker"></i>
                                                                        <a href="javascript:void(0)" data-toggle="tooltip" title="<?php echo $empInfo->organization_address?>">
                                                                            <?php echo substr($empInfo->organization_address, 0, 20).'...'?>
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
                                            }
                                            else{?>
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
                <?php if($advetisements){?>
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
                <?php }?>
            </div>
        </div>


    </div>
</section>