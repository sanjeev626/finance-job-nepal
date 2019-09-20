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
                                    <!-- <p>It's easy. Simply post a job you need completed and receive competitive bids from
                                        freelancers within minutes</p> -->
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
                                         <?php 
                                            if ($recent_job) {
                                                $chunkarray = array_chunk($recent_job, 3);
                                                    include('home-job-list.php');


                                                echo ' <div class="row">
                                                        <div class="col-sm-12" style="text-align:center; margin-top: 9px;">
                                                           <a href="'.base_url().'recentjob'.'" class="btn btn-success">View More +</a> 
                                                        </div>
                                                       </div> ';
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
                                    <div class="tab-pane fade" id="pills-newspaper" role="tabpanel"
                                         aria-labelledby="pills-newspaper-tab">
                                         <?php 
                                            if ($newspaper_job) {
                                                $chunkarray = array_chunk($newspaper_job, 3);
                                                    include('home-job-list.php');


                                                echo ' <div class="row">
                                                        <div class="col-sm-12" style="text-align:center; margin-top: 9px;">
                                                           <a href="'.base_url().'newspaperjob'.'" class="btn btn-success">View More +</a> 
                                                        </div>
                                                       </div> ';
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
                                    <div class="tab-pane fade" id="pills-fjn" role="tabpanel"
                                         aria-labelledby="pills-fjn-tab">

                                         <?php 
                                            if ($fjn_job) {
                                                $chunkarray = array_chunk($fjn_job, 3);
                                                    include('home-job-list.php');


                                                echo ' <div class="row">
                                                        <div class="col-sm-12" style="text-align:center; margin-top: 9px;">
                                                           <a href="'.base_url().'hotjob'.'" class="btn btn-success">View More +</a> 
                                                        </div>
                                                       </div> ';
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

            <div class="col-md-3">
                <?php $this->load->view('includes/right-sidebar');?>
                
                <!-- <?php if ($advetisements) { ?>
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
                <?php } ?> -->
            </div>
        </div>


    </div>
</section>

