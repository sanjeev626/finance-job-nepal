<div class="col-md-9">
    <div class="row">
        <div class="col-md-4">
            <?php if(!empty($premium_job)){ ?>
            <section id="vertical-horizontal-scrollbar-demo" class="hunting-job premium-hunting-job default-skin demo clearfix">
                <h2>PREMIUM JOBS</h2>
                <?php
                  foreach ($premium_job as $key => $value) {
                $eid = $value->eid;
                if($eid){
                    $related_job = $this->home_model->get_related_job_by_id($value->eid);
                    $empInfo = $this->general_model->getById('employer','id',$eid,'orgcode,logo,orgname');
                    $orgcode = $empInfo->orgcode;
                    $orgname =$empInfo->orgname;
                }else{
                    $related_job = '';
                    $emplogo = '';
                    $orgcode ='';
                    $orgname =$value->displayname;
                }
                ?>
                    <div class="cj-item">                                        
                        <div class="item-info">
                            <strong><?php  echo $orgname; ?></strong>
                            <ul>
                                <?php
                                if(!empty($related_job)){
                                foreach ($related_job as $key => $val) { ?>
                                <?php if($eid){?>
                                    <li><a href="<?php echo base_url();?>job/<?php echo $orgcode; ?>/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle; ?> </a></li>
                                <?php }else{?>
                                    <li><a href="<?php echo base_url();?>job/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle; ?> </a></li>
                                <?php } ?>
                                <?php }} else{?>
                                <li><a href="<?php echo base_url();?>job/<?php echo $value->slug; ?>/<?php echo $value->id; ?>"><?php echo $value->jobtitle; ?> </a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <hr>
                    </div>
                    <?php }?>
                </section>
               <?php } ?> 
                                

            <div class="left-aside clearfix">
                <h2>CORPORATE JOBS</h2>
                <?php if(!empty($corporate_job)){ //echo '<pre>'; print_r($corporate_job); die;
                      foreach ($corporate_job as $key => $value) {
                        if($key < 8){
                    $eid = $value->eid;
                    if($eid){
                        $related_job = $this->home_model->get_related_job_by_id($value->eid);
                        $empInfo = $this->general_model->getById('employer','id',$eid,'orgcode,logo,orgname');
                        $orgcode = $empInfo->orgcode;
                        $orgname =$empInfo->orgname;
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
                            <?php }else{?>
                            <a class="co-img" href="javascript:void(0)"><img src="<?php echo the_employer_logo($empInfo->logo, $value->complogo);?>" class="img-responsive"></a>
                        <?php } ?>
                        <div class="item-info">
                            <strong><?php  echo $orgname; ?></strong>
                            <ul>
                        <?php
                          if(!empty($related_job)){
                            foreach ($related_job as $key => $val) {
                                    if($eid){?>
                                        <li><a href="<?php echo base_url();?>job/<?php echo $orgcode; ?>/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle; ?> </a></li>
                                    <?php }else{?>
                                        <li><a href="<?php echo base_url();?>job/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle; ?> </a></li>
                                    <?php } ?>

                                    <?php }}else{?>
                              <li><a href="<?php echo base_url();?>job/<?php echo $value->slug; ?>/<?php echo $value->id; ?>"><?php echo $value->jobtitle; ?> </a></li>
                          <?php } ?>
                            </ul>
                        </div>
                        <hr>
                    </div>
                    <?php }}}else{?>
                        <span> No Corporate Job Found! </span>
                      <?php } ?>

                </div>
            </div>
          <!-- left-aside end -->

          <!-- Mid aside start -->
            <div class="col-md-8">
            <div class="contain-bar">
                <!-- Carousel ================================================== -->
                <?php if(!empty($sliders)): ?>
                <div id="myCarousel" class="home-carousel carousel slide" data-ride="carousel">

                <div class="carousel-inner" role="listbox">

                    <?php foreach($sliders as $key => $sval):
                    ?>
                    <div class="item <?php if($key == '0'){ echo 'active'; } ?>">
                    <?php
                        $link = ($sval->link) ? $sval->link : 'javascript:void(0)';
                    ?>
                    	<a target="_blank" href="<?php echo $link; ?>">
                            <img class="first-slide" src="<?php echo base_url();?>uploads/slider/<?php echo $sval->sliderimage; ?>" alt="First slide">
                        </a>
                    </div>
                   <?php endforeach; ?>
                </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        <?php endif; ?>
<!-- /.carousel -->

               <section class="mid-tab clearfix">
                    <div class="row">
                        <div class="col-md-9">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#menu1">Featured posting</a></li>
                                <li><a data-toggle="tab" href="#menu2">News Paper Jobs</a></li>
                                <li><a data-toggle="tab" href="#menu3">Recently Posted Jobs</a></li>
                            </ul>

                            <div class="tab-content clearfix">

                                <div id="menu1" class="tab-pane fade in active">
                                <?php if(!empty($featured_job)){ ?>
                                    <div class="row" style="column-count:2">
                                    <?php
                                            foreach ($featured_job as $key => $rjval) {
                                                  $applyBefore = $rjval->applybefore;
                                                  $d = new DateTime($applyBefore);
                                                  $day_left =  $d->diff(new DateTime())->format('%a');
                                    ?>

                                        <div class="p-space <?php if($key <= 2){echo 'divider'; } ?>">
                                            <div class="menu1-item">
                                                <p><?php echo $rjval->displayname;?></p>
                                                <a href="<?php echo base_url();?>job/<?php echo $rjval->slug; ?>/<?php echo $rjval->id; ?>"> <strong><?php echo $rjval->jobtitle;?></strong></a>
                                                <p><?php echo $day_left; ?> days left
                                                    <a class="apply" href="<?php echo base_url();?>applyJob/<?php echo $rjval->id;?>">[ apply ]</a></p>
                                                    <hr>
                                                </div>
                                            </div>
                                            <?php }?>
                                    </div>
                                    <a class="view-all pull-right" href="<?php echo base_url();?>viewJobsType/FJob"> view all ...</a>    
                                    <?php }else{?>
                                    <span>No Featured Job Found !!! </span>
                                    <?php } ?>
                                </div>   <!-- TAB 1 -->

                               <div id="menu2" class="tab-pane fade">
                                    <?php if(!empty($newspaper_job)){ ?>
                                    <div class="row" style="column-count:2">
                                    <?php
                                            foreach ($newspaper_job as $key => $rjval) {
                                                  $applyBefore = $rjval->applybefore;
                                                  $d = new DateTime($applyBefore);
                                                  $day_left =  $d->diff(new DateTime())->format('%a');
                                    ?>

                                        <div class=" p-space <?php if($key <= 2){echo 'divider'; } ?>">
                                            <div class="menu1-item">
                                                <p><?php echo $rjval->displayname;?></p>
                                                <a href="<?php echo base_url();?>job/<?php echo $rjval->slug; ?>/<?php echo $rjval->id; ?>"> <strong><?php echo $rjval->jobtitle;?></strong></a>
                                                <p><?php echo $day_left; ?> days left
                                                    <a class="apply" href="<?php echo base_url();?>applyJob/<?php echo $rjval->id;?>">[ apply ]</a></p>
                                                    <hr>
                                                </div>
                                            </div>
                                            <?php }?>
                                    </div>
                                    <a class="view-all pull-right" href="<?php echo base_url();?>viewJobsType/FJob"> view all ...</a>    
                                    <?php }else{?>
                                    <span>No Featured Job Found !!! </span>
                                    <?php } ?>
                                </div>   <!-- TAB 2 -->

                               <div id="menu3" class="tab-pane fade">
                                    <?php if(!empty($recent_job)){ ?>
                                    <div class="row" style="column-count:2">
                                    <?php
                                            foreach ($recent_job as $key => $rjval) {
                                                  $applyBefore = $rjval->applybefore;
                                                  $d = new DateTime($applyBefore);
                                                  $day_left =  $d->diff(new DateTime())->format('%a');
                                    ?>

                                        <div class=" p-space <?php if($key <= 2){echo 'divider'; } ?>">
                                            <div class="menu1-item">
                                                <p><?php echo $rjval->displayname;?></p>
                                                <a href="<?php echo base_url();?>job/<?php echo $rjval->slug; ?>/<?php echo $rjval->id; ?>"> <strong><?php echo $rjval->jobtitle;?></strong></a>
                                                <p><?php echo $day_left; ?> days left
                                                    <a class="apply" href="<?php echo base_url();?>applyJob/<?php echo $rjval->id;?>">[ apply ]</a></p>
                                                    <hr>
                                                </div>
                                            </div>
                                            <?php }?>
                                    </div>
                                    <a class="view-all pull-right" href="<?php echo base_url();?>viewJobsType/FJob"> view all ...</a>    
                                    <?php }else{?>
                                    <span>No Featured Job Found !!! </span>
                                    <?php } ?>
                                </div>   <!-- TAB 3 -->                                                            

                            </div>   <!-- TAB-CONTENT -->                                              
                        </div> <!-- COL-MD-8 -->

                 <div class="col-md-3 adsec">
                     <div class="row">
                     <?php if($middle_banner):
                            foreach($middle_banner as $key => $mbval): ?>
                        <div class="item col-xs-6 col-sm-6 col-md-12">
                            <div class="ads">
                        <a target="_blank" href="<?php echo $mbval->link;?>"><img src="<?php echo base_url();?>uploads/slider/<?php echo $mbval->sliderimage; ?>" alt="<?php echo $mbval->title;?>"></a> 
                             </div>
                        </div>
                     <?php endforeach; endif; ?>                                                 
                    </div>
                </div>
            </div>  <!-- ROW -->                                      
        </section>

<section class="top-jobs clearfix">
    <h2>TOP JOBS</h2>
    <div class="row">
        <?php if(!empty($corporate_job)){ ?>
                <?php foreach ($corporate_job as $key => $value) {
                    //echo $key."<br>";
                    //if($key >= 8 && $key < 11)
                    if($key >= 8)
                    {
                        $eid = $value->eid;
                            if($eid){
                                $related_job = $this->home_model->get_related_job_by_id($value->eid);
                                $empInfo = $this->general_model->getById('employer','id',$eid,'orgcode,logo,orgname');
                                $orgcode = $empInfo->orgcode;
                                $orgname =$empInfo->orgname;
                            }else{
                                $related_job = '';
                                $emplogo = '';
                                $orgcode ='';
                                $orgname =$value->displayname;
                            }?>
                    
                    <div class="col-sm-6">
                    <div class="cj-item">
                        <?php if($eid){?>
                            <a class="co-img" href="<?php echo base_url();?>Employer/jobList/<?php echo $orgcode; ?>/<?php echo $value->eid; ?>"><img src="<?php echo the_employer_logo($empInfo->logo, $value->complogo);?>" class="img-responsive"></a>
                            <?php }else{?>
                            <a class="co-img" href="javascript:void(0)"><img src="<?php echo the_employer_logo($empInfo->logo, $value->complogo);?>" class="img-responsive"></a>
                        <?php } ?>
                        <div class="item-info">
                            <strong><?php echo $orgname; ?></strong>
                            <ul>
                                <?php
                         $related_job = $this->home_model->get_related_job_by_id($value->eid);
                          if(!empty($related_job)){
                            foreach ($related_job as $key => $val) {?>

                                    <?php if($eid){?>
                                        <li><a href="<?php echo base_url();?>job/<?php echo $orgcode; ?>/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle; ?> </a></li>
                                    <?php }else{?>
                                        <li><a href="<?php echo base_url();?>job/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle; ?> </a></li>
                                    <?php } ?>

                                    <?php }}else{?>
                              <li><a href="<?php echo base_url();?>job/<?php echo $value->slug; ?>/<?php echo $value->id; ?>"><?php echo $value->jobtitle; ?> </a></li>
                          <?php } ?>
                            </ul>
                        </div>
                        <hr>
                        <div style="clear:both;"></div>
                    </div>
                    </div>
                    <?php }} ?>

            <div class="col-sm-6">
                <?php foreach ($corporate_job as $key => $value) {
                  if($key >= 11 ){
                        $eid = $value->eid;
                    if($eid){
                        $related_job = $this->home_model->get_related_job_by_id($value->eid);
                        $empInfo = $this->general_model->getById('employer','id',$eid,'orgcode,logo,orgname');
                        $orgcode = $empInfo->orgcode;
                         $orgname =$empInfo->orgname;
                    }else{
                        $related_job = '';
                        $emplogo = '';
                        $orgcode ='';
                        $orgname =$value->displayname;
                    }   ?>
                    <div class="cj-item">
                       <?php if($eid){?>
                            <a class="co-img" href="<?php echo base_url();?>Employer/jobList/<?php echo $orgcode; ?>/<?php echo $value->eid; ?>"><img src="<?php echo the_employer_logo($empInfo->logo, $value->complogo);?>" class="img-responsive"></a>
                            <?php }else{?>
                            <a class="co-img" href="javascript:void(0)"><img src="<?php echo the_employer_logo($empInfo->logo, $value->complogo);?>" class="img-responsive"></a>
                        <?php } ?>
                        <div class="item-info">
                            <strong><?php echo $orgname; ?></strong>
                            <ul>
                                <?php
                          if(!empty($related_job)){
                            foreach ($related_job as $key => $val) {?>
                            <?php if($eid){?>
                                <li><a href="<?php echo base_url();?>job/<?php echo $orgcode; ?>/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle; ?> </a></li>
                            <?php }else{?>
                                <li><a href="<?php echo base_url();?>job/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle; ?> </a></li>
                            <?php } ?>

                            <?php }}else{?>
                              <li><a href="<?php echo base_url();?>job/<?php echo $value->slug; ?>/<?php echo $value->id; ?>"><?php echo $value->jobtitle; ?> </a></li>
                          <?php } ?>
                            </ul>
                        </div>
                        <hr>
                    </div>
                    <?php }} ?>
            </div>
            <?php }else{ ?>
                <span> No Top Job Found! </span>
                <?php }?>
</section>
</div>
</div>
</div>


<!--Job list start -->
<div class="row">
    <div class="col-md-12">
        <section class="job-list">

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#menu-a">Job By Catagory</a></li>
                <li><a data-toggle="tab" href="#menu-b">Job By City</a></li>
                <li><a data-toggle="tab" href="#menu-c">Job By Type/Level</a></li>
            </ul>

            <div class="tab-content clearfix">
                <div id="menu-a" class="tab-pane fade in active">
                    <div id="scrollbox3" class="default-skin">
                    <?php foreach ($job_category as $key => $cat) {
                      $jobinhand = $this->home_model->count_job_by_category($cat->id);
                      ?>
                                <div class="col-md-4 no-padding">
                                    <div class="menu1-item">
                                       <a href="<?php echo base_url();?>category/job-category/<?php echo $cat->id; ?>"><?php echo $cat->dropvalue;?> (<?php echo $jobinhand; ?>)</a>
                                        <hr>
                                    </div>
                                </div>
                    <?php } ?>                                            
                    </div>
                </div>
                    
                <!-- Job by City -->

                <div id="menu-b" class="tab-pane fade ">
                  
                    <div id="scrollbox4" class="default-skin">
                    <?php foreach ($location as $key => $cat) {
                      $jobinhand = $this->home_model->count_job_by_city($cat->id);
                      ?>
                                <div class="col-md-4 no-padding">
                                    <div class="menu1-item">
                                       <a href="<?php echo base_url();?>category/job-location/<?php echo $cat->id; ?>"><?php echo $cat->dropvalue;?> (<?php echo $jobinhand; ?>)</a>
                                        <hr>
                                    </div>
                                </div>
                    <?php } ?>                                            
                    </div>
                    
                </div>

                <!-- End job by City -->

                <!-- Job by Type -->

                <div id="menu-c" class="tab-pane fade">
                    <div class="col-md-4 no-padding">
                        <div class="menu1-item">
                            <a href="<?php echo base_url();?>category/job-type/Full-Time">Full Time (<?php echo $this->home_model->count_job_by_type('jobtype1','Full Time'); ?>)</a>
                            <hr>
                        </div>
                        <div class="menu1-item">
                            <a href="<?php echo base_url();?>category/job-type/Part-Time">Part Time (<?php echo $this->home_model->count_job_by_type('jobtype2','Part Time'); ?>)</a>
                            <hr>
                        </div>
                        <div class="menu1-item">
                            <a href="<?php echo base_url();?>category/job-type/Contract">Contract (<?php echo $this->home_model->count_job_by_type('jobtype3','Contract'); ?>)</a>
                            <hr>
                        </div>
                        <div class="menu1-item">
                            <a href="<?php echo base_url();?>category/job-type/Others"> Any Others (<?php echo $this->home_model->count_job_by_type('jobtype4','Others'); ?>)</a>
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-4 no-padding">
                        <div class="menu1-item">
                            <a href="<?php echo base_url();?>category/job-level/Entry-Level">Entry Level (<?php echo $this->home_model->count_job_by_type('joblevel','Entry Level'); ?>)</a>
                            <hr>
                        </div>
                        <div class="menu1-item">
                            <a href="<?php echo base_url();?>category/job-level/Mid-Level">Mid Level (<?php echo $this->home_model->count_job_by_type('joblevel','Mid Level'); ?>)</a>
                            <hr>
                        </div>
                        <div class="menu1-item">
                            <a href="<?php echo base_url();?>category/job-level/Senior-Level">Senior Level (<?php echo $this->home_model->count_job_by_type('joblevel','Senior Level'); ?>)</a>
                            <hr>
                        </div>
                        <div class="menu1-item">
                            <a href="<?php echo base_url();?>category/job-level/Top-Level">Top Level (<?php echo $this->home_model->count_job_by_type('joblevel','Top Level'); ?>)</a>
                            <hr>
                        </div>

                    </div>
                    <div class="col-md-4 no-padding">

                    </div>
                </div>

                <!-- End job by Type -->
            </div>
        </section>
    </div>
</div>
</div>
<!--Job list end -->
    
    <script type="text/javascript">
    $(window).load(function () {
        //$(".demo1").customScrollbar();
      //  $(".demo101").customScrollbar();
      //  $("#vertical-horizontal-scrollbar-demo").customScrollbar();
    //    $("#vertical-horizontal-scrollbar-demo1").customScrollbar();
        
        $('#scrollbox3').enscroll({
            showOnHover: true,
            verticalTrackClass: 'track3',
            verticalHandleClass: 'handle3'
        });
        
         $('#scrollbox4').enscroll({
            showOnHover: true,
            verticalTrackClass: 'track4',
            verticalHandleClass: 'handle4'
        });
        
      
    });
    </script>
