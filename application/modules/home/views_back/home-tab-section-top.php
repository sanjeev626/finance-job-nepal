

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-tabs" style="border-bottom: none;">
      <?php
      $cnt=0;
      foreach ($job_display_in as $key => $value) 
      {
        ++$cnt;        
        $display = $this->home_model->get_job_by_display_in($value->id,2);
      ?>
        <li class="active2 clearfix">
          <a href="javascript:void(0);"><?php echo $value->dropvalue; ?></a>          
          <?php
          foreach ($display as $key => $rjval) {
          $applyBefore = $rjval->applybefore;
          $d = new DateTime($applyBefore);
          $day_left =  $d->diff(new DateTime())->format('%a');
          //print_r($rjval);
          /*if(!empty($rjval->displayname))
            $displayname = substr($rjval->displayname,0,23);
          else if($rjval->eid>0)
            $displayname = $this->general_model->getById('employer','id',$rjval->eid)->orgname;
          else
            $displayname = '';*/
          if(!empty($rjval->displayname))
            $displayname = $rjval->displayname;
          else if($rjval->eid>0)
            $displayname = $this->general_model->getById('employer','id',$rjval->eid)->orgname;
          else
            $displayname = '';
          ?>
          <div class=" p-space <?php if($key < 6){echo 'divider'; } ?>" <?php if($key < 3){ echo 'style="padding-left: 15px;"'; } ?>>
            <div class="menu1-item">
              <a target="_blank" href="<?php echo base_url();?>job/<?php echo $rjval->slug; ?>/<?php echo $rjval->id; ?>"> <strong><?php echo substr($rjval->jobtitle,0,23);?></strong></a>
              <?php if(!empty($displayname)){?>
              <p class="companyname"><?php echo $displayname;?></p>
              <?php } ?>
              <p><?php echo $day_left; ?> days left <a class="apply" href="<?php echo base_url();?>applyJob/<?php echo $rjval->id;?>">[ apply ]</a></p>
              
              <hr>
            </div>
          </div>
          <?php
          }
          ?>
          <a target="_blank" class="view-all pull-right" href="<?php echo base_url().'viewjobs/'.str_replace(' ','_',strtolower($value->dropvalue)).'/'.$value->id;?>"> view all ...</a>

        </li>
      <?php
      }
      ?>
    </ul>
  
  <!-- <div class="col-md-3 adsec">
    <div class="row">
      <?php if($middle_banner):
        foreach($middle_banner as $key => $mbval): ?>
      <div class="item col-xs-6 col-sm-6 col-md-12">
        <div class="ads"> <a target="_blank" href="<?php echo $mbval->link;?>"><img src="<?php echo base_url();?>uploads/slider/<?php echo $mbval->sliderimage; ?>" alt="<?php echo $mbval->title;?>"></a> </div>
      </div>
      <?php endforeach; endif; ?>
    </div> -->
  </div>
</div>
<!-- ROW -->