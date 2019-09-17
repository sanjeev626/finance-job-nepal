<div class="single-candidate-widget">
    <h3>Similar Jobs</h3>

    <?php
    if(!empty($similar_job)){
        foreach ($similar_job as $key => $sj) {
            $comId = $sj->eid;
            $employerinfo = $this->general_model->getById('employer','id',$comId);
            
            if (empty($sj->displayname)){
                $url = base_url().'job/'.$employerinfo->organization_code.'/'.$sj->slug.'/'.$sj->id;
            }
            else{
                $url = base_url().'job/'.$sj->slug.'/'.$sj->id;
            } 


            ?>
            <div class="sidebar-list-single">
                <div class="top-company-list">
                    <div class="company-list-logo">
                        <a href="<?php echo $url;?>">
                            <?php
                            if(!empty($sj->complogo)){
                                $img = 'uploads/employer/'.$sj->complogo;
                            }
                            elseif(!empty($employerinfo->organization_logo)){
                                $img = 'uploads/employer/'.$employerinfo->organization_logo;
                            }
                            else{
                                $img = 'content_home/img/company-logo-4.png';
                            }
                            ?>
                            <img src="<?php echo base_url().$img;?>" alt="company list 1">
                        </a>
                    </div>
                    <div class="company-list-details">
                        <h3><a href="<?php echo $url;?>"><?php echo $sj->jobtitle?></a></h3>
                        <p class="company-state"><i class="fa fa-map-marker"></i> 
                            <?php
                                if(!empty($sj->joblocation)){
                                $joblocation_arr = unserialize($sj->joblocation);
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

                            <?php echo $location?></p>
                        <p class="company-state" title="Posted On"><i class="fa fa-calendar"></i> <?php echo date("M d, Y", strtotime($sj->post_date))?></p>
                        <p class="open-icon"  title="Apply Before"><i class="fa fa-calendar"></i><?php echo date("M d, Y", strtotime($sj->applybefore))?></p>

                        <?php
                        if(!empty($sj->jobtype)){
                            echo '<p class="varify"><i class="fa fa-check"></i>';

                            $sjjobtype_arr = unserialize($sj->jobtype);
                            for($i=0;$i<count($sjjobtype_arr);$i++)
                            {
                                echo $this->general_model->getById('dropdown','id',$sjjobtype_arr[$i])->dropvalue;
                                if(count($sjjobtype_arr)>0 && $i<(count($sjjobtype_arr)-1)) echo ', ';
                            }
                            echo '</p>';
                        }
                        ?>


                    </div>
                    <div class="company-list-btn">
                        <a href="<?php echo $url;?>" class="fjn-btn">View Details</a>
                    </div>
                </div>
            </div>
        <?php }
    }
    else{?>
        <div class="sidebar-list-single">
            <div class="top-company-list">
                <p>No Similar Jobs found</p>
            </div>
        </div>
    <?php }

    ?>

</div>