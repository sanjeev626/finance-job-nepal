<?php
$title_length = 40;
$title_length2 = 20;
$company_length = 25;
?>
<h2>HOT JOBS</h2>
<div class="row">
<?php if(!empty($hot_job)){ ?>
    <?php foreach ($hot_job as $key => $value) {
        //echo $key."<br>";
        //if($key >= 8 && $key < 11)
        //if($key >= $no_of_hot_job)
        {
        $eid = $value->eid;
        if($eid){
            $related_job = $this->home_model->get_related_top_job_by_id($value->eid);
            $empInfo = $this->general_model->getById('employer','id',$eid,'orgcode,logo,orgname');
            $orgcode = $empInfo->orgcode;
            if(empty($value->displayname))
                $orgname = $empInfo->orgname;
            else
                $orgname = $value->displayname;
        }else{
            $related_job = '';
            $emplogo = '';
            $orgcode ='';
            $orgname =$value->displayname;
        }?>
        <div class="col-sm-6">
        <div class="cj-item cj-item-hotjob">
            <?php if(isset($eid) && $eid>0){?>
                <a target="_blank" class="co-img" href="<?php echo base_url();?>Employer/jobList/<?php echo $orgcode; ?>/<?php echo $value->eid; ?>">
                    <img src="<?php echo the_employer_logo($empInfo->logo, $value->complogo);?>" class="img-responsive">
                </a>
                <?php }else{ /*?>
                <a class="co-img" href="javascript:void(0)"><img src="<?php echo the_employer_logo($empInfo->logo, $value->complogo);?>" class="img-responsive"></a>
            <?php */} ?>
            <?php if(isset($eid) && $eid>0){
                if(strlen($orgname)>$company_length)
                {
                    $jobtitle = substr($value->jobtitle,0,$title_length2);
                    if(strlen($value->jobtitle)>$title_length2)
                        $jobtitle .= "..";
                }
                else
                {
                    $jobtitle = substr($value->jobtitle,0,$title_length);
                    if(strlen($value->jobtitle)>$title_length)
                        $jobtitle .= "..";
                }
            ?>
            <div class="item-info" style="min-height: 60px; margin-bottom: 10px;">
                <strong><a target="_blank" href="<?php echo base_url();?>Employer/jobList/<?php echo $orgcode; ?>/<?php echo $value->eid; ?>" style="color: #636363;" title="<?php echo $orgname;?>"><?php echo $orgname; ?></a></strong>
                <ul>
                    <li><a target="_blank" href="<?php echo base_url();?>job/<?php echo $value->slug; ?>/<?php echo $value->id; ?>" title="<?php echo $value->jobtitle;?>"><?php echo $jobtitle; ?></a></li>
                </ul>
            </div>
            <!-- <hr class="hr-10"> -->
            <?php } ?>
        </div>
            <div style="clear:both;"></div>
        </div>
        <?php 
        }
    } 
}
?>