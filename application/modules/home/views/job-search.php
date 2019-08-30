<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->
<!-- Top Job Area Start -->
<section class="single-candidate-bottom-area section_15">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-3">
                <?php include('includes/search-left-menu.php');?>
            </div>
            <div class="col-md-12 col-lg-9">
                <div class="job-grid-right">
                    <?php
                        if($joblists){
                            foreach($joblists as $jl){
                                $eid = $jl->eid;
                                $empInfo = $this->general_model->getById('employer', 'id', $eid, '*');
                                $orgcode = $empInfo->organization_code;
                                $orgname = $empInfo->orgname;
                                $url = base_url().'job/'.$orgcode.'/'.$jl->slug.'/'.$jl->id;
                                ?>

                                <div class="sidebar-list-single">
                                    <div class="top-company-list">
                                        <div class="company-list-logo">
                                            <a href="<?php echo $url?>">
                                                <?php
                                                if (!empty($empInfo->organization_logo)) {
                                                    $img = 'uploads/employer/' . $empInfo->organization_logo;
                                                } else {
                                                    $img = 'content_home/img/company-logo-4.png';
                                                }
                                                ?>
                                                <img src="<?php echo base_url().$img?>" alt="<?php echo $jl->jobtitle ?>">
                                            </a>
                                        </div>
                                        <div class="company-list-details">
                                            <h3><a href="<?php echo $url?>"><?php echo $jl->jobtitle ?></a></h3>
                                            <p class="company-state"><i class="fa fa-map-marker"></i> <?php echo $empInfo->organization_address; ?></p>
                                            <p class="company-state" title="Posted On"><i class="fa fa-calendar"></i> <?php echo date("M d, Y", strtotime($jl->post_date)) ?></p>
                                            <p class="open-icon"  title="Apply Before"><i class="fa fa-calendar"></i><?php echo date("M d, Y", strtotime($jl->applybefore)) ?></p>
                                            <p class="varify"><i class="fa fa-check"></i>
                                                <?php
                                                if(!empty($jl->jobtype && is_array($jl->jobtype))){
                                                    $jobtype_arr = unserialize($jl->jobtype);
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
                                        <div class="company-list-btn">
                                            <a href="<?php echo $url?>" class="fjn-btn">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            <?php }

                        }
                        else{?>
                            <div class="sidebar-list-single">
                                <div class="top-company-list">
                                    No Jobs Found.
                                </div>
                            </div>
                        <?php }
                    ?>

                </div>
                <!-- end job sidebar list -->
                <div class="pagination-box-row top_margin_15">
                    <?php echo $this->pagination->create_links();?>
                    <!--<p>Page 1 of 6</p>
                    <ul class="pagination">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li>...</li>
                        <li><a href="#">6</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                    </ul>-->
                </div>
                <!-- end pagination -->
            </div>
        </div>
    </div>
</section>
<!-- Top Job Area End -->