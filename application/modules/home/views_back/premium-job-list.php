<div class="col-md-9 clearfix">
    <div class="joboverview">
        <div class="title">
            <h1>PREMUIM JOBS</h1>
        </div>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <?php
                    if(!empty($premium_job_all)){
                    foreach($premium_job_all as $key => $value):
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

                    /*-------------------------------------------------------------
                                Get number of days remaining until a date
                    --------------------------------------------------------------*/
                    $applyBefore = $value->applybefore;
                    $d = new DateTime($applyBefore);
                    $applydays =  $d->diff(new DateTime())->format('%a');
                    ?>
                    <tr class="<?php if($key % 2 ==0){ echo 'odd'; } ?>">
                        <td>
                            <figure>
                                <img width='60px' height='30px' src="<?php echo the_employer_logo($logo, $value->complogo);?>" alt="Logo">
                            </figure>
                        </td>
                        <td><p><?php echo $value->displayname;?></p><p><i class="fa  fa-map-marker"></i><?php echo $address;?></p></td>
                        <td>
                            <figcaption>
                                <?php if(!empty($employer_detail)){?>
                                    <a href="<?php echo base_url();?>job/<?php echo $employer_detail->orgcode; ?>/<?php echo $value->slug; ?>/<?php echo $value->id; ?>"><?php echo $value->jobtitle; ?> </a>
                                <?php }else{?>
                                    <a href="<?php echo base_url();?>job/<?php echo $value->slug; ?>/<?php echo $value->id; ?>"><?php echo $value->jobtitle; ?></a>
                                <?php  } ?>

                                
                            </figcaption><span><?php echo $jobType;?></span></td>
                        <td><p><i class="fa fa-clock-o"></i><?php echo $applydays;?> Days remaining</p><a href="<?php echo base_url();?>applyJob/<?php echo $value->id;?>" class="btn btn-success">Apply Now</a></td>
                    </tr>

                    <?php endforeach;
                        }else{?>
                    <tr>
                        <td colspan="4">No Job Vacancy Found !!!</td>
                    </tr>
                        <?php }?>

                </tbody>
            </table>
        </div>
              <?php //echo $this->pagination->create_links();?>
    </div>
</div>