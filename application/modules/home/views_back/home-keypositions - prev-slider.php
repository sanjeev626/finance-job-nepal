
            <section id="vertical-horizontal-scrollbar-demo" class="hunting-job default-skin demo">
                <h2><a href="<?php echo base_url().'key_positions';?>" style="color:#81b524;">KEY POSITIONS</a></h2>
               <?php if(!empty($international_job)){
                      foreach ($international_job as $key => $value) {
                    $eid = $value->eid;
                    if($eid){
                        $related_job = $this->home_model->get_related_international_job_by_id($value->eid);                        
                        //$related_job = $this->home_model->get_related_job_by_id($value->eid);
                        $empInfo = $this->general_model->getById('employer','id',$eid,'orgcode,logo,orgname');
                        $orgcode = $empInfo->orgcode;
                        if(!empty($value->displayname))
                          $orgname =$value->displayname;
                        else
                          $orgname =$empInfo->orgname;
                    }else{
                        $related_job = '';
                        $emplogo = '';
                        $orgcode ='';
                        $orgname =$value->displayname;
                    }
                ?>
                    <div class="cj-item">
                        <div class="item-info" style="padding-left:10px;">
                            <strong><?php  echo $orgname; //print_r($value); ?></strong>
                            <ul>
                        <?php
                          if(!empty($related_job)){
                            foreach ($related_job as $key => $val) { ?>
                              <?php if($eid){?>
                                  <li><a href="<?php echo base_url();?>job/<?php echo $orgcode; ?>/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle; ?> </a></li>
                              <?php }else{?>
                                  <li><a href="<?php echo base_url();?>job/<?php echo $val->slug; ?>/<?php echo $val->id; ?>"><?php echo $val->jobtitle; ?> </a></li>
                              <?php 
                              } 
                            }
                          } else{?>
                              <li><a href="<?php echo base_url();?>job/<?php echo $value->slug; ?>/<?php echo $value->id; ?>"><?php echo $value->jobtitle; ?> </a></li>
                          <?php } ?>
                            </ul>
                        </div>
                        <hr>
                    </div>
                    <?php }}else{?>
                        <span> No Key positions Found! </span>
                      <?php } ?>
            <a href="<?php echo base_url().'key_positions';?>" class="apply">View All</a>
            </section>