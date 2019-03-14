<div class="col-md-9 login-contains">
    <div class="tab-content" style="border:0px; padding-top: 0px;">
        <div role="tabpanel" class="tab-pane active" id="My-Profile">
            <div class="educational-detail">
                <h3><?php if(isset($title)) echo $title; else echo 'List of Job Applicants';?></h3>
                <?php
                if(!empty($applicants)){                    
                foreach($applicants as $key => $val):
                    $data2='';
                    $data2['status'] = $val->status;
                    $data2['position'] = $val->jobtitle;
                    $data2['appdate'] = $val->appdate;
                    $data2['application_id'] = $val->application_id;
                    $data2['remarks'] = $val->remarks;
                    $data2['sid'] = $val->sid;
                    $this->load->view('view-seeker-outline',$data2);
                endforeach;
                }
                /*
                $action =base_url().'Employer/showApplicantsUpdate/'.$this->uri->segment(3);
                $attributes = array('class' => 'form-horizontal user-logIn','name'=>'applicantsupdate',);
                echo form_open_multipart($action, $attributes);
                ?>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th style='width:11%'>Status</th>
                            <th style='width:12%'>Apply Date</th>
                            <th style='width:23%;'>Name</th>
                            <th style='width:20%;'>Work Experience</th>
                            <th style='width:14%;'>Expected Salary</th>
                            <th style='width:8%;'>Marital Status</th>
                            <th style='width:12%;'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(!empty($applicants)){
                        foreach($applicants as $key => $val):
                        $key += 1;
                        $resume ='';
                        $resumepath ='';
                        $seekerInfo = $this->general_model->getById('seeker','id',$val->sid);
                        //print_r($seekerInfo);
                        $exp_salary =$this->general_model->getById('dropdown','id',$seekerInfo->expsal);
                        $resume = $seekerInfo->resume;
                        $resumepath_absolute = "../../uploads/resume/".$resume;
                        $resumepath = base_url()."uploads/resume/".$resume;

                        $status = $val->status;
                        //echo $status;
                        ?>
                        <tr>
                            <td style="padding-left:3px;">
                                <select name="status[]" id="status">
                                    <option value="0">None</option>
                                    <option value="shortlisted" <?php if($status=="shortlisted") echo 'selected="selected"';?>>Short list</option>
                                    <option value="rejected" <?php if($status=="rejected") echo 'selected="selected"';?>>Reject</option>
                                </select>                                
                                <input type="hidden" name="application_id[]" value="<?php echo $val->application_id;?>"></td>
                            <td><?php echo $val->appdate;?> </td>
                            <td><?php echo $seekerInfo->fname.' '.$seekerInfo->mname.' '.$seekerInfo->lname;?></td>
                            <td><?php echo $seekerInfo->workexp;?> (<?php echo $seekerInfo->expyrs.' years '.$seekerInfo->expmths.' months';?>)</td>
                            <td><?php echo ($exp_salary) ? $exp_salary->dropvalue : $seekerInfo->expsal;?></td>
                            <td><?php echo $seekerInfo->maritalstatus;?></td>
                            <td style="text-align: center;">
                            <?php if(!empty($resume) && file_exists($resumepath_absolute)){ ?>
                            <a href="<?php echo $resumepath;?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-download tooltips" data-original-title="Download Resume" title="Download Resume"></i></a>
                            |
                            <?php } else echo "No Resume" ?>
                                <a href="<?php echo base_url();?>Employer/viewSeekerDetail/<?php echo $seekerInfo->id; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-list tooltips" data-original-title="View Detail" title="View Detail"></i></a>
                            </td>
                        </tr>
                        <?php endforeach;
                        } else{ ?>
                        <?php } ?>

                        <tr>
                            <td colspan="7">
                                <input type="submit" name="btnUpdate" class="btn btn-success btn-sm" value="Save" /></td>
                        </tr>
                    </tbody>
                </table>
                <?php echo form_close(); */?>
                <?php echo $this->pagination->create_links();?>
            </div>
        </div>
    </div>
</div>