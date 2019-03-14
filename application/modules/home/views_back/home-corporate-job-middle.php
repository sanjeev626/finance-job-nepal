<h2><a href="<?php echo base_url().'corporate_jobs';?>" style="color:#81b524;">CORPORATE JOBS</a></h2>
<div class="row">
  <?php 
if(!empty($corporate_job))
{ 
    foreach ($corporate_job as $key => $value) 
    {
        //echo $key."<br>";
        //if($key >= 8 && $key < 11)
        if($key >= $no_of_corporate_job)
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
        }
        ?>
  <div class="col-sm-6">
    <div class="cj-item">
      <?php if(isset($eid) && $eid>0){?>
      <a target="_blank" class="co-img" href="<?php echo base_url();?>Employer/jobList/<?php echo $orgcode; ?>/<?php echo $value->eid; ?>"><img src="<?php echo the_employer_logo($empInfo->logo, $value->complogo);?>" class="img-responsive"></a>
      <?php }else{ /*?>
                <a class="co-img" href="javascript:void(0)"><img src="<?php echo the_employer_logo($empInfo->logo, $value->complogo);?>" class="img-responsive"></a>
            <?php */} ?>
      <?php if(isset($eid) && $eid>0){?>
      <div class="item-info" style="min-height: 75px;"> <strong><?php echo $orgname; if($orgname=="Care Nepal") echo " - ".$eid; ?></strong>
        <ul>
          <?php
             $related_job = $this->home_model->get_related_top_job_by_id($value->eid);
              if(!empty($related_job)){
                foreach ($related_job as $key => $val) {?>
          <?php if($eid){?>
          <li><a target="_blank" href="<?php echo base_url();?>job/<?php echo $orgcode; ?>/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo ucfirst(strtolower(substr($val->jobtitle,0,19))); if(strlen($val->jobtitle)>19) echo ".."; ?> </a></li>
          <?php }else{ /*?>
                            <li><a target="_blank" href="<?php echo base_url();?>job/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle;  if($orgname=="Care Nepal") echo "4";?> </a></li>
                       <?php */} ?>
          <?php }}else{?>
          <li><a target="_blank" href="<?php echo base_url();?>job/<?php echo $value->slug; ?>/<?php echo $value->id; ?>"><?php echo ucfirst(strtolower($value->jobtitle));?> </a></li>
          <?php } ?>
        </ul>
      </div>
      <hr>
      <?php } ?>
    </div>
    <div style="clear:both;"></div>
  </div>
  <?php 
        }
    } 
    ?>
  <div class="item-info" style="float: right; padding-right: 10px;"> <a class="apply" href="<?php echo base_url(). 'corporate_jobs';?>">View All</a> </div>
  <?php
}
?>
</div>