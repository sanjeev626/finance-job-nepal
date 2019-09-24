<style type="text/css">
    .job-grid-right .sidebar-list-single{padding: 10px}
    .company-list-details>h3{font-size: 14px;    height: 21px; overflow: hidden;}
    .company-list-details>h3 a{color: #035FB7;font-weight: bold;}
</style>

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
                <div class="job-grid-right row">
                    <?php
                        if($joblists){
                            foreach($joblists as $jl){
                                $eid = $jl->eid;
                                $empInfo = $this->general_model->getById('employer', 'id', $eid, '*');
                                $orgcode = $empInfo->organization_code;
                                //$orgname = $empInfo->orgname;
                                //$url = base_url().'job/'.$orgcode.'/'.$jl->slug.'/'.$jl->id;
                                if (empty($jl->displayname)) {
                                    $orgname = $empInfo->orgname;
                                    $url = base_url() . 'job/' . $orgcode . '/' . $jl->slug . '/' . $jl->id;
                                } else {
                                    $orgname = $jl->displayname;
                                    $url = base_url() . 'job/' . $jl->slug . '/' . $jl->id;
                                }
                                ?>
                                <div class="col-md-6">
                                    <div class="sidebar-list-single ">
                                        <div class="top-company-list">
                                            <div class="company-list-logo">
                                                <a href="<?php echo $url?>">
                                                    <?php
                                                    if (!empty($jl->complogo)) {
                                                        $img = 'uploads/employer/' . $jl->complogo;
                                                    } elseif (!empty($empInfo->organization_logo)) {
                                                        $img = 'uploads/employer/' . $empInfo->organization_logo;
                                                    } else {
                                                        $img = 'content_home/img/company-logo-4.png';
                                                    }
                                                    ?>
                                                    <img src="<?php echo base_url().$img?>" alt="<?php echo $jl->jobtitle ?>">
                                                </a>
                                            </div>
                                            <div class="company-list-details">
                                                <h3>
                                                    <a href="<?php echo $url ?>" data-toggle="tooltip"
                                                       title="<?php echo $jl->jobtitle  ?>">
                                                        <?php echo substr($jl->jobtitle, 0, 25) . '' ?>
                                                    </a>
                                                </h3>

                                                <p><i class="fa fa-building"></i><?php echo $orgname?></p>
                                                <p class="company-state"><i class="fa fa-map-marker"></i>
                                                    <?php
                                                        if(!empty($jl->joblocation)){
                                                            $joblocation_arr = unserialize($jl->joblocation);
                                                            $location = '';
                                                            if($joblocation_arr !=''){
                                                                for($i=0;$i<count($joblocation_arr);$i++)
                                                                {
                                                                    $location .= $this->general_model->getById('dropdown','id',$joblocation_arr[$i])->dropvalue;
                                                                    if(count($joblocation_arr)>0 && $i<(count($joblocation_arr)-1)) $location .= ', ';
                                                                }
                                                            }
                                                        }                            
                                                        echo $location; 
                                                    ?>
                                                </p>
                                                <p class="company-state" title="Posted On"><i class="fa fa-calendar"></i> <?php echo date("M d, Y", strtotime($jl->post_date)) ?></p>
                                                <p class="open-icon"  title="Apply Before"><i class="fa fa-calendar"></i><?php echo date("M d, Y", strtotime($jl->applybefore)) ?></p>
                                                <p class="varify"><i class="fa fa-check"></i>
                                                    <?php
                                                    if(!empty($jl->jobtype)){
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
                                            <!-- <div class="company-list-btn">
                                                <a href="<?php echo $url?>" class="fjn-btn">View Details</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            <?php }

                        }
                        else{?>
                            <div class="sidebar-list-single">
                                <div class="top-company-list">
                                    No Jobs added to this category
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