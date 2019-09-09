<div class="single-candidate-bottom-right">
    <div class="single-candidate-widget-2">
        <div class="job-overview single-candidate-widget margin_bottom_15">
            <h3>About company</h3>
            <div class="justify_both">
                <?php echo $employer_info->organization_description?>
            </div>
        </div>
        <div class="job-overview margin_top_15">
            <h3 class="font_size_20">Other Vacancies</h3>
        </div>
        <?php
            if($related_job !=''){
                foreach($related_job as $rj){
                    
                    if (empty($rj->displayname)){
                        $url = base_url().'job/'.$employer_info->organization_code.'/'.$rj->slug.'/'.$rj->id;
                    }
                    else{
                        $url = base_url().'job/'.$rj->slug.'/'.$rj->id;
                    } 
                    ?>
                    <div class="sigle-top-job margin_top_15">
                        <div class="top-job-company-image">
                            <h3><a href="<?php echo $url;?>"><?php echo $rj->jobtitle;?></a></h3>
                        </div>
                        <div class="top-job-company-desc">
                            <p class="company-state"><i class="fa fa-calendar"></i> <strong>Apply Before :</strong> <?php echo date("M d, Y", strtotime($rj->applybefore))?></p>
                            <p class="company-state"><i class="fa fa-money"></i> <strong>Salary :</strong>
                                <?php
                                $salary =  $this->general_model->getById('dropdown','id',$rj->salaryrange);
                                if($salary){
                                    echo $salary->dropvalue;
                                }
                                else{
                                    echo 'Negotiable';
                                }
                                ?>
                            </p>
                            <div class="top-job-company-btn margin_top_5">
                                <a href="<?php echo $url;?>" class="fjn-btn-2">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php }
            }
            else{?>
                <div class="sigle-top-job margin_top_15">
                    <div class="top-job-company-image">
                        <h3>No other vacancies by this Company</h3>
                    </div>
                </div>
            <?php }
        ?>
    </div>
</div>