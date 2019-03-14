<h2>Job by Industry</h2>
<div class="row">
  <div class="col-md-12">
    <div class="cj-item">
        <div class="col-md-4 item-info" style="padding-left:10px;">
          <strong><a href="" style="color: #636363;">Information Technology</a></strong>
          <ul>
            <li> <a href="">Job Title 1</a></li>
            <li> <a href="">Job Title 2</a></li>
            <li> <a href="">Job Title 3</a></li>
            <li> <a href="">Job Title 4</a></li>
            <li> <a href="">Job Title 5</a></li>
          </ul>
          <a class="more" href=""> more>></a>
        </div>
        <div class="col-md-4 item-info" style="padding-left:10px;">
          <strong><a href="" style="color: #636363;">Service</a></strong>
          <ul>
            <li> <a href="">Job Title 1</a></li>
            <li> <a href="">Job Title 2</a></li>
            <li> <a href="">Job Title 3</a></li>
            <li> <a href="">Job Title 4</a></li>
            <li> <a href="">Job Title 5</a></li>
          </ul>
          <a class="more" href=""> more>></a>
        </div>
        <div class="col-md-4 item-info" style="padding-left:10px;">
          <strong><a href="" style="color: #636363;">Manufacturing</a></strong>
          <ul>
            <li> <a href="">Job Title 1</a></li>
            <li> <a href="">Job Title 2</a></li>
            <li> <a href="">Job Title 3</a></li>
            <li> <a href="">Job Title 4</a></li>
            <li> <a href="">Job Title 5</a></li>
          </ul>
          <a class="more" href=""> more>></a>
        </div>
        <div class="col-md-4 item-info" style="padding-left:10px;">
          <strong><a href="" style="color: #636363;">Banking, Finance & Insurance</a></strong>
          <ul>
            <li> <a href="">Job Title 1</a></li>
            <li> <a href="">Job Title 2</a></li>
            <li> <a href="">Job Title 3</a></li>
            <li> <a href="">Job Title 4</a></li>
            <li> <a href="">Job Title 5</a></li>
          </ul>
          <a class="more" href=""> more>></a>
        </div>
        <div class="col-md-4 item-info" style="padding-left:10px;">
          <strong><a href="" style="color: #636363;">Fresher Jobs</a></strong>
          <ul>
            <li> <a href="">Job Title 1</a></li>
            <li> <a href="">Job Title 2</a></li>
            <li> <a href="">Job Title 3</a></li>
            <li> <a href="">Job Title 4</a></li>
            <li> <a href="">Job Title 5</a></li>
          </ul>
          <a class="more" href=""> more>></a>
        </div>
        <div class="col-md-4 item-info" style="padding-left:10px;">
          <strong><a href="" style="color: #636363;">Walk-in Jobs</a></strong>
          <ul>
            <li> <a href="">Job Title 1</a></li>
            <li> <a href="">Job Title 2</a></li>
            <li> <a href="">Job Title 3</a></li>
            <li> <a href="">Job Title 4</a></li>
            <li> <a href="">Job Title 5</a></li>
          </ul>
          <a class="more" href=""> more>></a>
        </div>
        <hr>
    </div>
    <?php /* ?>
    <ul class="nav nav-tabs">
      <li style="width: 170px;"><a data-toggle="tab" href="#menu1">Featured Jobs</a></li>
      <li style="width: 185px;" class="active"><a data-toggle="tab" href="#menu3">Recent Jobs</a></li>
      <li style="width: 185px;"><a data-toggle="tab" href="#menu2">Key Positions</a></li>
    </ul>
    <div class="tab-content clearfix">
      <div id="menu1" class="tab-pane fade in">
        <?php if(!empty($featured_job)){ ?>
        <div class="row" style="column-count:3">
          <?php
            foreach ($featured_job as $key => $rjval) {
            $applyBefore = $rjval->applybefore;
            $d = new DateTime($applyBefore);
            $day_left =  $d->diff(new DateTime())->format('%a');
          ?>
          <div class="p-space <?php if($key < 6){echo 'divider'; } ?>" <?php if($key < 3){ echo 'style="padding-left: 15px;"'; } ?>>
            <div class="menu1-item">
              <a target="_blank" href="<?php echo base_url();?>job/<?php echo $rjval->slug; ?>/<?php echo $rjval->id; ?>"> <strong><?php echo substr($rjval->jobtitle,0,23);?></strong></a>
              <p><?php echo substr($rjval->displayname,0,23);?></p>
              <p><?php echo $day_left; ?> days left <a class="apply" href="<?php echo base_url();?>applyJob/<?php echo $rjval->id;?>">[ apply ]</a></p>
              <hr>
            </div>
          </div>
          <?php }?>
        </div>
        <a target="_blank" class="view-all pull-right" href="<?php echo base_url();?>viewJobsType/FJob"> view all ...</a>
        <?php }else{?>
        <span>No Featured Job Found !!! </span>
        <?php } ?>
      </div>
      <!-- TAB 1 -->
      
      <div id="menu2" class="tab-pane fade">
        <?php if(!empty($keyposition_job)){ ?>
        <div class="row" style="column-count:3">
          <?php
          foreach ($keyposition_job as $key => $rjval) {
            $applyBefore = $rjval->applybefore;
            $d = new DateTime($applyBefore);
            $day_left =  $d->diff(new DateTime())->format('%a');
          ?>
          <div class=" p-space <?php if($key < 6){echo 'divider'; } ?>" <?php if($key < 3){ echo 'style="padding-left: 15px;"'; } ?>>
            <div class="menu1-item">
              <a target="_blank" href="<?php echo base_url();?>job/<?php echo $rjval->slug; ?>/<?php echo $rjval->id; ?>"> <strong><?php echo substr($rjval->jobtitle,0,23);?></strong></a>
              <p><?php echo substr($rjval->displayname,0,23);?></p>
              <p><?php echo $day_left; ?> days left <a class="apply" href="<?php echo base_url();?>applyJob/<?php echo $rjval->id;?>">[ apply ]</a></p>
              <hr>
            </div>
          </div>
          <?php }?>
        </div>
        <a target="_blank" class="view-all pull-right" href="<?php echo base_url();?>viewJobsType/NJob"> view all ...</a>
        <?php }else{?>
        <span>No Newspaper Job Found !!! </span>
        <?php } ?>
      </div>
      <!-- TAB 2 -->
      
      <div id="menu3" class="tab-pane fade in active">
        <?php if(!empty($recent_job)){ ?>
        <div class="row" style="column-count:3">
        <?php
  		  foreach ($recent_job as $key => $rjval) {
  		  $applyBefore = $rjval->applybefore;
  		  $d = new DateTime($applyBefore);
  		  $day_left =  $d->diff(new DateTime())->format('%a');
  		  ?>
          <div class=" p-space <?php if($key < 6){echo 'divider'; } ?>" <?php if($key < 3){ echo 'style="padding-left: 15px;"'; } ?>>
            <div class="menu1-item">
              <a target="_blank" href="<?php echo base_url();?>job/<?php echo $rjval->slug; ?>/<?php echo $rjval->id; ?>"> <strong><?php echo substr($rjval->jobtitle,0,23);?></strong></a>
              <p><?php echo substr($rjval->displayname,0,23);?></p>
              <p><?php echo $day_left; ?> days left <a class="apply" href="<?php echo base_url();?>applyJob/<?php echo $rjval->id;?>">[ apply ]</a></p>
              <hr>
            </div>
          </div>
          <?php }?>
        </div>
        <a target="_blank" class="view-all pull-right" href="<?php echo base_url();?>viewJobsType/RJob"> view all ...</a>
        <?php }else{?>
        <span>No Recent Job Found !!! </span>
        <?php } ?>
      </div>
      <!-- TAB 3 -->       
    </div>
    <!-- TAB-CONTENT --> 
<?php */?>  
  </div>
<?php /*?>
  <!-- COL-MD-8 -->
  
  <!-- <div class="col-md-3 adsec">
    <div class="row">
      <?php if($middle_banner):
        foreach($middle_banner as $key => $mbval): ?>
      <div class="item col-xs-6 col-sm-6 col-md-12">
        <div class="ads"> <a target="_blank" href="<?php echo $mbval->link;?>"><img src="<?php echo base_url();?>uploads/slider/<?php echo $mbval->sliderimage; ?>" alt="<?php echo $mbval->title;?>"></a> </div>
      </div>
      <?php endforeach; endif; ?>
    </div>
  </div> -->
  <?php */?>  
</div>
<!-- ROW -->