<style type="text/css">
    .homejoblist .job-content h3{height: 14px;
    overflow: hidden;}
</style>
<?php 
	foreach ($chunkarray as $key => $joblists) {
            echo '<div class="row homejoblist">';
                foreach ($joblists as $key => $jl) {
                    //job detail start
                        $eid = $jl->eid;
                        $empInfo = $this->general_model->getById('employer', 'id', $eid, '*');
                        $orgname = $empInfo->orgname;
                        $orgcode = $empInfo->organization_code;
                        if (empty($jl->displayname)) {
                            $orgname = $empInfo->orgname;
                            $url = base_url() . 'job/' . $orgcode . '/' . $jl->slug . '/' . $jl->id;
                        } else {
                            $orgname = $jl->displayname;
                            $url = base_url() . 'job/' . $jl->slug . '/' . $jl->id;
                        }
                        ?>
                            <div class="col-md-4 col-sm-12 padding-left-right-0">
                                <div class="job-content">
                                    <div class="top-company-list">
                                        <!-- <h3>
                                            <a href="<?php echo $url ?>" data-toggle="tooltip"
                                                   title="<?php echo $jl->jobtitle  ?>">
                                                <?php echo substr($jl->jobtitle, 0, 25) . '' ?>
                                            </a>
                                        </h3> -->
                                        <div class="company-list-logo">
                                            <a href="<?php echo $url ?>">
                                                <?php
                                                if (!empty($jl->complogo)) {
                                                    $img = 'uploads/employer/' . $jl->complogo;
                                                } elseif (!empty($empInfo->organization_logo)) {
                                                    $img = 'uploads/employer/' . $empInfo->organization_logo;
                                                } else {
                                                    $img = 'content_home/img/company-logo-4.png';
                                                }
                                                ?>
                                                <img src="<?php echo base_url() . $img; ?>"
                                                     alt="<?php echo $jl->jobtitle ?>">
                                            </a>
                                        </div>
                                        <div class="company-list-details">
                                            <h3>
                                            <a href="<?php echo $url ?>" data-toggle="tooltip"
                                                   title="<?php echo $jl->jobtitle  ?>">
                                                <?php echo substr($jl->jobtitle, 0, 25) . '' ?>
                                            </a>
                                        </h3>
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
                                                ?>
                                                <a href="javascript:void(0)"
                                                   data-toggle="tooltip"
                                                   title="<?php echo $location  ?>">
                                                    <?php echo substr($location , 0, 20) . '' ?>
                                                </a>
                                            </p>
                                            <p class="open-icon"><i
                                                    class="fa fa-clock-o"></i><?php echo date("M d, Y", strtotime($jl->applybefore)) ?>
                                            </p>
                                            <!-- <p class="varify"><i class="fa fa-check"></i>IT &amp; Telecommunication</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                    //job detail end                    
                }
            echo '</div>';
        }
?>