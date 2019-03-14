<?php if(!empty($corporate_job)){ //print_r($corporate_job);?>
<div class="left-aside clearfix">
<h2><a href="<?php echo base_url().'corporate_jobs';?>" style="color:#81b524;">CORPORATE JOBS</a></h2>
<?php 
//echo '<pre>'; print_r($corporate_job); die;
foreach ($corporate_job as $key => $value) {
if($key < $no_of_corporate_job){
    $eid = $value->eid;
    if($eid){
        //$related_job = $this->home_model->get_related_job_by_id($value->eid);
        $related_job = $this->home_model->get_related_corporate_job_by_id($value->eid);                        
        $empInfo = $this->general_model->getById('employer','id',$eid,'orgcode,logo,orgname');
        $orgcode = $empInfo->orgcode;
        if(empty($value->displayname))
        {
            $orgname = $empInfo->orgname;
            $orglogo = base_url().'uploads/employer/'.$empInfo->logo;
        }
        else
        {
            $orgname = $value->displayname;
        }
    }else{
        $related_job = '';
        $emplogo = '';
        $orgcode ='';
        $orgname =$value->displayname;
    }
?>
    <div class="cj-item">
        <?php 
        if($eid)
            $url = base_url().'Employer/jobList/'.$orgcode.'/'.$value->eid;
        else
            $url = 'javascript:void(0);';
        ?>
        <a target="_blank" class="co-img" href="<?php echo $url;?>">
            <img src="<?php echo the_employer_logo($empInfo->logo, $value->complogo);?>" class="img-responsive">
        </a>
        <div class="item-info">
            <strong><a target="_blank" href="<?php echo $url;?>" style="color: #636363;"><?php  echo $orgname; ?></a></strong>
            <ul>
            <?php
            if(!empty($related_job)){
                foreach ($related_job as $key => $val) {
                    $title_length = 52;
                    if($eid){
                        ?>
                        <li><a target="_blank" title="<?php echo $val->jobtitle;?>" href="<?php echo base_url();?>job/<?php echo $orgcode; ?>/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo substr($val->jobtitle,0,$title_length); if(strlen($val->jobtitle)>$title_length) echo ".."; ?> </a></li>
                    <?php }else{?>
                        <li><a target="_blank" title="<?php echo $val->jobtitle;?>" href="<?php echo base_url();?>job/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo substr($val->jobtitle,0,$title_length); if(strlen($val->jobtitle)>$title_length) echo ".."; ?> </a></li>
                    <?php 
                    } 
                }
            }
            else
            {
            ?>
              <li><a target="_blank" href="<?php echo base_url();?>job/<?php echo $value->slug; ?>/<?php echo $value->id; ?>"><?php echo ucfirst(strtolower(substr($value->jobtitle,0,$title_length))); if(strlen($value->jobtitle)>$title_length) echo ".."; ?></a></li>
            <?php 
            } 
            ?>
            </ul>
        </div>
        <hr>
    </div>
    <?php 
}
} 
?>
<a class="apply" href="<?php echo base_url().'corporate_jobs';?>" style="float:right; padding-right:15px;">View All</a>
</div>
<?php } ?>