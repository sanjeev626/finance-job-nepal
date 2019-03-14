<div class="row">
  <div class="col-md-12">
    <!-- For first three menu Items starts here -->
    <ul class="nav nav-tabs">      
      <?php
      $noh = 4;
      $cnt=0;
      foreach ($job_display_in as $key => $value) 
      {
        ++$cnt;        
        if($cnt<=$noh)
        {
        $display = $this->home_model->get_job_by_display_in($value->id,2);
      ?>
      <li class="col-md-3 menu <?php if($cnt==1) echo 'active';?>"><a data-toggle="tab" href="#menu<?php echo $cnt;?>" class="menu"><?php echo $value->dropvalue; ?></a></li>
      <?php
        }
      }
      ?>
    </ul>
    <div class="tab-content clearfix">            
      <?php
      $cnt=0;
      foreach ($job_display_in as $key => $value) 
      {
        ++$cnt;        
        if($cnt<=$noh)
        {
        $display = $this->home_model->get_job_by_display_in($value->id,9);
      ?>
      <div id="menu<?php echo $cnt;?>" class="tab-pane fade in <?php if($cnt==1) echo 'active';?>">
        <?php if(!empty($display)){ ?>
        <div class="row" >
          <?php
          $cnt2=0;
          $strlen = 40;
          foreach ($display as $key => $rjval) {
          ++$cnt2;
          $applyBefore = $rjval->applybefore;
          $d = new DateTime($applyBefore);
          $day_left =  $d->diff(new DateTime())->format('%a');
          //print_r($rjval);
          if(!empty($rjval->displayname))
            $displayname = substr($rjval->displayname,0,$strlen);
          else if($rjval->eid>0)
            $displayname = $this->general_model->getById('employer','id',$rjval->eid)->orgname;
          else
            $displayname = '';
          if(strlen($rjval->displayname)>$strlen)
            $displayname.='..';
          ?>
          <div class=" col-md-4 p-space <?php if($key < 6){echo 'divider'; } ?>" >
            <div class="menu1-item">
              <a target="_blank" href="<?php echo base_url();?>job/<?php echo $rjval->slug; ?>/<?php echo $rjval->id; ?>"> <strong><?php echo substr($rjval->jobtitle,0,$strlen);  if(strlen($rjval->jobtitle)>$strlen) echo "..";?></strong></a>
              <?php if(!empty($displayname)){?>
              <p class="companyname"><?php echo $displayname;?></p>
              <?php } ?>
              <p><?php echo $day_left; ?> days left <a class="apply" href="<?php echo base_url();?>applyJob/<?php echo $rjval->id;?>">[ apply ]</a></p>
              
              <hr>
            </div>
          </div>
          <?php }?>
        </div>
        <a target="_blank" class="view-all pull-right" href="<?php echo base_url().'viewjobs/'.str_replace(' ','_',strtolower($value->dropvalue)).'/'.$value->id;?>"> view all ...</a>
        <?php }else{?>
        <span>No <?php echo str_replace('Jobs','',$value->dropvalue); ?> Jobs Found !!! </span>
        <?php } ?>
      </div>
      <?php
        }
      }
      ?>    
    </div>    
    <!-- For first three menu Items ends here -->

    <!-- For second three menu Items starts here -->
    <ul class="nav nav-tabs">      
      <?php
      $cnt=0;
      foreach ($job_display_in as $key => $value) 
      {
        ++$cnt;        
        if($cnt>$noh && $cnt<=($noh+4))
        {
        $display = $this->home_model->get_job_by_display_in($value->id,2);
      ?>
      <li class="col-md-3 menu <?php if($cnt==$noh+1) echo 'active';?>"><a data-toggle="tab" href="#menu<?php echo $cnt;?>" class="menu"><?php echo $value->dropvalue; ?></a></li>
      <?php
        }
      }
      ?>
    </ul>
    <div class="tab-content clearfix" style="margin-bottom: 0px;">            
      <?php
      $cnt=0;
      foreach ($job_display_in as $key => $value) 
      {
        ++$cnt;        
        if($cnt>$noh && $cnt<=($noh+4))
        {
        $display = $this->home_model->get_job_by_display_in($value->id,9);
      ?>
      <div id="menu<?php echo $cnt;?>" class="tab-pane fade in <?php if($cnt==($noh+1)) echo 'active';?>">
        <?php if(!empty($display)){ ?>
        <div class="row">
          <?php
          $cnt2=0;
          $strlen = 40;
          foreach ($display as $key => $rjval) {
          ++$cnt2;
          $applyBefore = $rjval->applybefore;
          $d = new DateTime($applyBefore);
          $day_left =  $d->diff(new DateTime())->format('%a');
          //print_r($rjval);
          if(!empty($rjval->displayname))
            $displayname = substr($rjval->displayname,0,$strlen);
          else if($rjval->eid>0)
            $displayname = $this->general_model->getById('employer','id',$rjval->eid)->orgname;
          else
            $displayname = '';
          if(strlen($rjval->displayname)>$strlen)
            $displayname.='..';
          ?>
          <div class=" col-md-4 p-space <?php if($key < 6){echo 'divider'; } ?>">
            <div class="menu1-item">
              <a target="_blank" href="<?php echo base_url();?>job/<?php echo $rjval->slug; ?>/<?php echo $rjval->id; ?>"> <strong><?php echo substr($rjval->jobtitle,0,$strlen); if(strlen($rjval->jobtitle)>$strlen) echo "..";?></strong></a>
              <?php if(!empty($displayname)){?>
              <p><?php echo $displayname;?></p>
              <?php } ?>
              <p><?php echo $day_left; ?> days left <a class="apply" href="<?php echo base_url();?>applyJob/<?php echo $rjval->id;?>">[ apply ]</a></p>
              
              <hr>
            </div>
          </div>
          <?php }?>
        </div>
        <a target="_blank" class="view-all pull-right" href="<?php echo base_url().'viewjobs/'.str_replace(' ','_',strtolower($value->dropvalue)).'/'.$value->id;?>"> view all ...</a>
        <?php }else{?>
        <span>No <?php echo str_replace('Jobs','',$value->dropvalue); ?> Job Found !!! </span>
        <?php } ?>
      </div>
      <?php
        }
      }
      ?>    
    </div>    
    <!-- For second three menu Items ends here -->
  </div>
</div>