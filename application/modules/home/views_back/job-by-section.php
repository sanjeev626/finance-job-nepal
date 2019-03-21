<div class="col-md-12">
  <section class="job-list">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#menu-a">Job By Category</a></li>
      <li><a data-toggle="tab" href="#menu-b">Job By City</a></li>
      <li><a data-toggle="tab" href="#menu-c">Job By Type/Level</a></li>
    </ul>
    <div class="tab-content clearfix">
      <div id="menu-a" class="tab-pane fade in active">
        <div id="scrollbox3" class="default-skin">
          <?php 
		  foreach ($job_category as $key => $cat) {                      
		  $jobinhand = $this->home_model->count_job_by_category($cat->id);                      ?>
          <div class="col-md-3 no-padding">
            <div class="menu1-item"> <a href="<?php echo base_url();?>category/job-category/<?php echo $cat->id; ?>"><?php echo $cat->dropvalue;?> (<?php echo $jobinhand; ?>)</a>
              </hr>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <!-- Job by City -->
      <div id="menu-b" class="tab-pane fade ">
        <div id="scrollbox4" class="default-skin">
          <?php 
		  foreach ($location as $key => $cat) {                    
		  $jobinhand = $this->home_model->count_job_by_city($cat->id);                    
		  ?>
          <div class="col-md-3 no-padding">
            <div class="menu1-item"> <a href="<?php echo base_url();?>category/job-location/<?php echo $cat->id; ?>"><?php echo $cat->dropvalue;?> (<?php echo $jobinhand; ?>)</a>
              </hr>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <!-- End job by City --> <!-- Job by Type -->
      <div id="menu-c" class="tab-pane fade">
        <div class="col-md-3 no-padding">
          <div class="menu1-item"> <a href="<?php echo base_url();?>category/job-type/Full-Time">Full Time (<?php echo $this->home_model->count_job_by_type('jobtype1','Full Time'); ?>)</a>
            <hr>
          </div>
          <div class="menu1-item"> <a href="<?php echo base_url();?>category/job-type/Part-Time">Part Time (<?php echo $this->home_model->count_job_by_type('jobtype2','Part Time'); ?>)</a>
            <hr>
          </div>
          <div class="menu1-item"> <a href="<?php echo base_url();?>category/job-type/Contract">Contract (<?php echo $this->home_model->count_job_by_type('jobtype3','Contract'); ?>)</a>
            <hr>
          </div>
          <div class="menu1-item"> <a href="<?php echo base_url();?>category/job-type/Others"> Any Others (<?php echo $this->home_model->count_job_by_type('jobtype4','Others'); ?>)</a>
            <hr>
          </div>
        </div>
        <div class="col-md-4 no-padding">
          <div class="menu1-item"> <a href="<?php echo base_url();?>category/job-level/Entry-Level">Entry Level (<?php echo $this->home_model->count_job_by_type('joblevel','Entry Level'); ?>)</a>
            <hr>
          </div>
          <div class="menu1-item"> <a href="<?php echo base_url();?>category/job-level/Mid-Level">Mid Level (<?php echo $this->home_model->count_job_by_type('joblevel','Mid Level'); ?>)</a>
            <hr>
          </div>
          <div class="menu1-item"> <a href="<?php echo base_url();?>category/job-level/Senior-Level">Senior Level (<?php echo $this->home_model->count_job_by_type('joblevel','Senior Level'); ?>)</a>
            <hr>
          </div>
          <div class="menu1-item"> <a href="<?php echo base_url();?>category/job-level/Top-Level">Top Level (<?php echo $this->home_model->count_job_by_type('joblevel','Top Level'); ?>)</a>
            <hr>
          </div>
        </div>
        <div class="col-md-4 no-padding"> </div>
      </div>
      <!-- End job by Type --> </div>
  </section>
</div>
