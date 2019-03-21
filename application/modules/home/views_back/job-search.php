<div class="col-md-9 clearfix">
  <div class="joboverview">
    <?php //$this->load->view('includes/advance-search');?>
    <?php if($job_result){ ?>
    <div class="personal-details clearfix">
        <strong>Showing <?php if($total<$per_page) echo '1 - '.$total; else  echo $page.' - '.$per_page;?> job vacancies out of <?php echo $total; ?></strong>
    </div>
    <div class="table-responsive">
      <table class="table">
        <tbody>
        <?php
        foreach($job_result as $key => $value):
            $employer_detail = $this->general_model->getById('employer','id',$value->eid);
                if(!empty($employer_detail)){
                    $logo = $employer_detail->logo;
                    $address = $employer_detail->address;
                }else{
                    $logo = '';
                    $address ='Kathmandu';
                }
                $jobType = '';
                $jobType  = (!empty($value->jobtype1)) ? $value->jobtype1 : '';
                $jobType .= (!empty($value->jobtype2)) ? ' / '.$value->jobtype2 : '';
                $jobType .= (!empty($value->jobtype3)) ? ' / '.$value->jobtype3 : ' ';
                /*---------------------------------------------------------
                Get number of days remaining until a date
                ---------------------------------------------------------*/
                $applyBefore = $value->applybefore;
                $d = new DateTime($applyBefore);
                $applydays =  $d->diff(new DateTime())->format('%a');
                ?>
            <tr class="<?php if($key % 2 ==0){ echo 'odd'; } ?>">
                <td style="width:25%"><figure> <img width='120px' src="<?php echo the_employer_logo($logo, $value->complogo);?>" alt="Logo" style="max-height:120px;"> </figure>
                  
                  </td>
                <td>
                    <figcaption>
                      <?php 
                      if(!empty($employer_detail))
                        $url = base_url().'job/'.$employer_detail->orgcode.'/'.$value->slug.'/'.$value->id;
                      else
                        $url = base_url().'job/'.$value->slug.'/'.$value->id;
                      ?>
                    <a href="<?php echo $url; ?>"><?php echo $value->jobtitle; ?> </a>
                    <p><?php echo $value->displayname;?></p>
                    </figcaption>
                    <p><i class="fa fa-map-marker"></i><?php echo $address;?></p>
                </td>
                <td style="width:20%">
                    <p><i class="fa fa-clock-o"></i><?php echo $applydays;?> Days left</p>
                    <a href="<?php echo base_url();?>applyJob/<?php echo $value->id;?>" class="btn btn-info">Apply Now</a><span><?php echo $jobType;?></span>
                    <div class="fb-like" data-href="<?php echo $url;?>" data-layout="button" data-action="like" data-show-faces="false" data-share="false" style="overflow:hidden;"></div>
                    <div class="fb-share-button fb-share-button-group" data-href="<?php echo $url;?>" data-layout="button" style="overflow:hidden;"></div>
                    <!-- <div class="countNum"><span id="img-19">68</span> </div> -->
                    <div id="fb-root" style="display:none;"></div>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php echo $this->pagination->create_links();?>
    <?php }else{?>
    <div class="title">
      <h1><span>No Result Found !!!</span></h1>
    </div>
    <?php  }?>
  </div>
</div>