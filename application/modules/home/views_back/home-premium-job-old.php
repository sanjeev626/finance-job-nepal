<h2><a href="<?php echo base_url().'premium_jobs';?>" style="color:#81b524;">PREMIUM JOBS</a></h2>
<?php
foreach ($premium_job as $key => $value) {
$eid = $value->eid;
$complogo =$value->complogo;
//$empInfo = $this->general_model->getById('employer','id',$eid,'orgcode,logo,orgname');
if($eid){
    $related_job = $this->home_model->get_related_job_by_id($value->eid);
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
}
?>
<div class="cj-item"> 
    <?php if($eid){?>
    <a class="co-img" href="<?php echo base_url();?>Employer/jobList/<?php echo $orgcode; ?>/<?php echo $value->eid; ?>"><img src="<?php echo the_employer_logo($empInfo->logo, $value->complogo);?>" class="img-responsive"></a>
    <?php }else{ ?>
    <a class="co-img" href="javascript:void(0)"><img src="<?php echo the_employer_logo('', $value->complogo);?>" class="img-responsive"></a>
    <?php } ?>                               
    <div class="item-info">
        <strong><?php  echo $orgname; ?></strong>
        <ul>
            <?php
            if(!empty($related_job)){
            foreach ($related_job as $key => $val) { ?>
            <?php if($eid){?>
            <li style="padding-left: 80px;"><a href="<?php echo base_url();?>job/<?php echo $orgcode; ?>/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle; ?> </a></li>
            <?php }else{?>
            <li style="padding-left: 80px;"><a href="<?php echo base_url();?>job/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle; ?> </a></li>
            <?php } ?>
            <?php }} else{?>
            <li style="padding-left: 80px;"><a href="<?php echo base_url();?>job/<?php echo $value->slug; ?>/<?php echo $value->id; ?>"><?php echo $value->jobtitle; ?> </a></li>
            <?php } ?>
        </ul>
    </div>
    <hr>
</div>
<?php }?>
<a class="apply" href="<?php echo base_url().'premium_jobs';?>" style="float:right; padding-right:15px;">View All</a>