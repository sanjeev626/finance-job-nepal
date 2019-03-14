<?php
//print_r($key);
$seekerEmployment = $this->general_model->getAll('seeker_experience',array('sid' => $key->id));
$seekerEducation = $this->general_model->getAll('seeker_education',array('sid' => $key->id));
$seekerTraining = $this->general_model->getAll('seeker_training',array('sid' => $key->id));
$seekerReference = $this->general_model->getAll('seeker_reference',array('sid' => $key->id));

?>

<section class="content">  
  <!-- Default box -->
  <form name="frmSR" method="post">
  <div class="box">
    <div class="box-header with-border">
      <div class="row">
        <div class="col-md-1"> </div>
        <div class="col-md-10">
          <div class="table-responsive">
            <table class="table table-striped mb30" id="table1" cellspacing="0" width="100%" frame="box" style="border: #00A65A 2px solid;">
              <tbody>
              <?php
              $salutation='';
              $nationality = '';
              $expected_salary = '';
              if(!empty($key->salutation) && $key->salutation>0)
                $salutation = $this->general_model->getById('dropdown','id',$key->salutation)->dropvalue;
              if(!empty($key->nationality) && $key->nationality>0)
                $nationality = $this->general_model->getById('dropdown','id',$key->nationality)->dropvalue;
              if(!empty($key->expsal) && $key->expsal>0)
              {
                if($this->general_model->getById('dropdown','id',$key->expsal))
                  $expected_salary = $this->general_model->getById('dropdown','id',$key->expsal)->dropvalue;
              }
              //echo $key->expsal.' --- '.$expected_salary;
              $job_type1 = '';
              $job_type2 = '';
              $job_type3 = '';
              if(!empty($key->jobtype1)) $job_type1 = $key->jobtype1 .", ";
              if(!empty($key->jobtype2)) $job_type2 = $key->jobtype2 .", ";
              if(!empty($key->jobtype3)) $job_type3 = $key->jobtype3;
              $jobType = $job_type1.''.$job_type2.''.$job_type3;

              $funcarea1='';
              if(!empty($key->funcarea1) && $key->funcarea1>0)
                $funcarea1 = $this->general_model->getById('dropdown','id',$key->funcarea1)->dropvalue;
              if(!empty($key->funcarea2) && $key->funcarea2>0)
                $funcarea2 = $this->general_model->getById('dropdown','id',$key->funcarea2)->dropvalue;
              ?>
                <tr>
                  <td colspan="3" class="green-bold"><h3><?php echo $salutation; ?> <?php echo $key->fname; ?>
                      <?php if(!empty($key->mname)) echo " ".$key->mname; ?>
                      <?php if(!empty($key->lname)) echo " ".$key->lname; ?>
                    </h3></td>
                  <td></td>
                </tr>
                <tr>
                  <td class="green-bold">Job Seeker Ref No</td>
                  <td>Globaljob <?php echo $key->id; ?></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td class="green-bold">Address</td>
                  <td><?php echo $key->currentadd; ?></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td width="20%" class="green-bold">Contact</td>
                  <td width="30%"><?php echo $key->phonecell.' / '.$key->phoneres; ?></td>
                  <td width="20%" class="green-bold">Email</td>
                  <td width="30%"><?php echo $key->email; ?></td>
                </tr>
                <?php if(!empty($key->summary)){?>
                <tr>
                  <td colspan="4"><h3 class="green-bold">Career Objective </h3>
                  <?php echo $key->summary;?>
                  </td>
                </tr>
                <?php } ?>

                <tr>
                  <td colspan="4"><h3 class="green-bold">Employment  Details </h3></td>
                </tr>
                <?php if(!empty($key->presal) && $key->presal>0){?>               
                <tr>
                  <td class="green-bold">Present Salary :</td>
                  <td colspan="2"><?php echo $key->preunit.' '.$key->presal; ?>per month (Gross)</td>
                  <td></td>
                </tr>
                <?php } 
                 if(!empty($expected_salary) && $expected_salary>0){
                ?>
                <tr>
                  <td class="green-bold">Expected Salary :</td>
                  <td colspan="2"><?php echo $key->expunit.' '.$expected_salary; ?>per month (Gross)</td>
                  <td></td>
                </tr>
                <?php } if(!empty($seekerEmployment)){
                foreach($seekerEmployment as $keyEmp => $sekVal): 
                  $keyEmp = $keyEmp+1;
                  $current_work = $sekVal->currently_working;
                ?>
                <tr>
                  <td colspan="4"><h4 class="green-bold">Employment #<?php echo $keyEmp++ ?></h4></td>
                </tr>
                <tr>
                  <td class="green-bold">Company Name :</td>
                  <td><?php echo $sekVal->company;?></td>
                  <td class="green-bold">Location : </td>
                  <td><?php echo $sekVal->empoyername;?></td>
                </tr>
                  <td class="green-bold">Designation : </td>
                  <td><?php echo $sekVal->designation;?></td>
                  <td class="green-bold">Duration : </td>
                  <td>From <?php echo date('F', mktime(0, 0, 0, $sekVal->frommonth, 10)).' '.$sekVal->fromyear; ?> to
                    <?php
                    if($current_work == 0){
                        echo date('F', mktime(0, 0, 0, $sekVal->tomonth, 10)).' '.$sekVal->toyear;
                    }else{
                        echo 'Present';
                    }
                    ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="4" class="green-bold">Duties and Responsibilities</td>
                </tr>
                <tr>
                  <td colspan="4"><?php echo nl2br(stripslashes($sekVal->duties));?></td>
                </tr>
                <?php endforeach; }else{?>
                <tr>
                  <td colspan="4">No employment Information has been added</td>
                </tr>
                  <?php } ?>
                <tr>
                  <td colspan="4"><h3 class="green-bold">Educational Details </h3></td>
                </tr>
                <tr>
                  <td colspan="4">
                    <table class="table table-condensed">
                      <thead>
                        <tr>
                          <th class="green-bold">Degree</th>
                          <th class="green-bold">Name of Degree</th>
                          <th class="green-bold">Graduation Year</th>
                          <th class="green-bold">College/School</th>
                          <th class="green-bold">Board/University</th>
                          <th class="green-bold">Percentage</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($seekerEducation)){
                        foreach($seekerEducation as $keyEdu => $seEdVal):
                        $degree =$this->general_model->getById('dropdown','id',$seEdVal->degree)->dropvalue;
                        ?>
                        <tr>
                          <td><?php echo $degree;?></td>
                          <td><?php echo $seEdVal->faculty;?></td>
                          <td><?php echo $seEdVal->graduationyear;?></td>
                          <td><?php echo $seEdVal->instution;?></td>
                          <td><?php echo $seEdVal->board;?></td>
                          <td><?php echo $seEdVal->percentage;?></td>
                        </tr>
                        <?php endforeach; }else{?>
                        <tr>
                          <td colspan="6">No Educational Information has been added</td>
                        </tr>
                        <?php } ?>
                        <tr>
                          <td colspan="6">
                            <div class="personal-detail">
                            <strong>Academic &amp; other Documents :</strong>
                            <ul class="profile-width">
                              <?php if(!empty($key->slc_docs) || !empty($key->docs_11_12) || !empty($key->bachelor_docs) || !empty($key->masters_docs) || !empty($key->other_docs)){?>                              
                                <?php if(!empty($key->slc_docs)){?>
                                  <li><a href="<?php echo base_url()."uploads/documents/".$key->slc_docs; ?>" target="_blank">Download SLC documents</a></li>
                                  <?php } if(!empty($key->docs_11_12)){?>
                                  <li><a href="<?php echo base_url()."uploads/documents/".$key->docs_11_12; ?>" target="_blank">Download 11/12 transcript</a></li>
                                  <?php } if(!empty($key->bachelor_docs)){?>
                                  <li><a href="<?php echo base_url()."uploads/documents/".$key->bachelor_docs; ?>" target="_blank">Download Bachelors transcript</a></li>
                                  <?php } if(!empty($key->masters_docs)){?>
                                  <li><a href="<?php echo base_url()."uploads/documents/".$key->masters_docs; ?>" target="_blank">Download Masters transcript</a></li>
                                  <?php } if(!empty($key->other_docs)){?>
                                  <li><a href="<?php echo base_url()."uploads/documents/".$key->other_docs; ?>" target="_blank">Download other documents</a></li>
                                <?php }
                                } ?>
                            </ul>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td colspan="4"><h3 class="green-bold">Trainings/Workshops </h3></td>
                </tr>
                <tr>
                  <td colspan="4">
                    <table class="table table-condensed">
                      <thead>
                        <tr>
                          <th class="green-bold">Company / Institute Name</th>
                          <th class="green-bold">Training Course</th>
                          <th class="green-bold">From</th>
                          <th class="green-bold">To</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($seekerTraining)){
                        foreach($seekerTraining as $keyTrain => $seTraVal):
                        ?>
                        <tr>
                          <td><?php echo $seTraVal->institution;?></td>
                          <td><?php echo $seTraVal->course;?></td>
                          <td><?php echo date('F', mktime(0, 0, 0, $seTraVal->frommonth, 10)).' '.$seTraVal->fromyear; ?></td>
                          <td><?php echo date('F', mktime(0, 0, 0, $seTraVal->tomonth, 10)).' '.$seTraVal->toyear; ?></td>
                        </tr>
                        <?php endforeach; }else{?>
                        <tr>
                          <td colspan="4">No Trainings/Workshops Information has been added</td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td colspan="4"><h3 class="green-bold">Personal Details </h3></td>
                </tr>
                <tr>
                  <td class="green-bold">Date of Birth : </td>
                  <td><?php echo $key->dd.' '.date('F', mktime(0, 0, 0, $key->mm, 10)).' '.$key->yy;?></td>
                  <td></td>
                  <td></td>
                </tr>
                <?php if(!empty($nationality)){?>
                <tr>
                  <td class="green-bold">Nationality : </td>
                  <td><?php echo $nationality; ?></td>
                  <td></td>
                  <td></td>
                </tr>
                <?php } ?>
                <tr>
                  <td class="green-bold">Phone (Res) :</td>
                  <td><?php echo $key->phoneres; ?></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td class="green-bold">Cell No. :</td>
                  <td><?php echo $key->phonecell; ?></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td class="green-bold">Marital Status :</td>
                  <td><?php echo $key->maritalstatus; ?></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td class="green-bold">Permanent Address :</td>
                  <td colspan="3"><?php echo $key->permanentadd; ?></td>
                </tr>
                <?php if(!empty($seekerReference)){?>
                <tr>
                  <td colspan="4"><h3 class="green-bold">References</h3></td>
                </tr>
                <tr>
                  <td colspan="4">
                    <table class="table table-condensed">
                      <thead>
                        <tr>
                          <th class="green-bold">Name</th>
                          <th class="green-bold">Address</th>
                          <th class="green-bold">Phone</th>
                          <th class="green-bold">Email</th>
                          <th class="green-bold">Company</th>
                          <th class="green-bold">Designation</th>
                          <th class="green-bold">Relationship</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($seekerReference)){
                        foreach($seekerReference as $refkey => $seRefVal):
                        ?>
                        <tr>
                          <td><?php echo $seRefVal->fname.' '.$seRefVal->mname.' '.$seRefVal->lname;?></td>
                          <td><?php echo $seRefVal->block.', '.$seRefVal->street.', '.$seRefVal->city;?></td>
                          <td><?php echo $seRefVal->office; if(!empty($seRefVal->cell)) echo $seRefVal->cell;?></td>
                          <td><?php echo $seRefVal->email;?></td>
                          <td><?php echo $seRefVal->cname;?></td>
                          <td><?php echo $seRefVal->designation;?></td>
                          <td><?php echo $seRefVal->relationship;?></td>
                        </tr>
                        <?php endforeach; }else{?>
                        <tr>
                          <td colspan="6">No Reference Information has been added</td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <?php } ?> 

                <tr>
                  <td colspan="4"><h3 class="green-bold">Other Information </h3></td>
                </tr>               
                <tr>
                  <td class="green-bold">Is Active :</td>
                  <td><?php if($key->isActivated=='1') echo 'Active'; else echo 'In Active'; ?></td>
                  <td class="green-bold">Applied Time(s) :</td>
                  <td><?php echo $countRecord = $this->general_model->countTotal('application',array('sid' => $key->id));?></td>
                </tr>            
                <tr>
                  <td class="green-bold">Membership Date :</td>
                  <td><?php echo $key->apdate; ?></td>
                  <td class="green-bold">Modified Date :</td>
                  <td><?php if($key->modifieddate>0) echo $key->modifieddate; ?></td>
                </tr>            
                <tr>
                  <td class="green-bold">Last Access Date :</td>
                  <td><?php if($key->lastaccess>0) echo $key->lastaccess; else echo "Haven't accessed since 2017"; ?></td>
                  <td class="green-bold"></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          <div> 
            <a class="btn btn-success btn-sm below_space" href="<?php echo base_url(); ?>admin/Seeker/moveJobToBasket/<?php echo $key->id; ?>"><i class="fa fa-shopping-cart" data-original-title="View Basket"></i> Move To Basket </a> 
            <a class="btn btn-success btn-sm below_space" href="<?php echo base_url(); ?>admin/Seeker/seeker_applied_job_list/<?php echo $key->id; ?>" target="_blank"><i class="fa fa-file-text-o" data-original-title="View Basket"></i> Applied Job List </a>
            <?php if(!empty($key->resume) && file_exists(FCPATH.'uploads/resume/'.$key->resume)){ ?>
            <a class="btn btn-success btn-sm below_space" href="<?php echo base_url().'uploads/resume/'.$key->resume;?>" class="link2" target="_blank"><i class="fa fa-edit" data-original-title="View Employer"></i> Download/Open Resume</a>
            <?php } ?>
            <?php if(!empty($key->video_resume_youtube)){ ?>
            <a href="#myModalYoutube" class="btn btn-success btn-sm below_space" data-toggle="modal">Play Video resume</a>
            <!-- Modal HTML -->
            <div id="myModalYoutube" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Video resume of <?php echo $key->fname; ?>
                      <?php if(!empty($key->mname)) echo " ".$key->mname; ?>
                      <?php if(!empty($key->lname)) echo " ".$key->lname; ?>
                    </h4>
                  </div>
                  <div class="modal-body">
                    <iframe id="cartoonVideo" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $key->video_resume_youtube;?>" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- <input type="hidden" id="application_id" value="<?php echo $application_id;?>" name="application_id">
            <button type="submit" class="btn btn-warning btn-sm btnApplicants" id="btnShortlist" name="btnShortlist">
              <i class="fa fa-list-ul" aria-hidden="true"></i> Shortlist
            </button> | 
            <button type="submit" class="btn btn-danger btn-sm btnApplicants" id="btnReject" name="btnReject">
              <i class="fa fa-ban" aria-hidden="true"></i> Reject
            </button> -->
            <button type="button" class="btn btn-success below_space btn-sm delete_seeker" link="<?php echo base_url(); ?>admin/Seeker/deleteSeeker/<?php echo $key->id; ?>" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash tooltips" data-original-title="Delete Job Seeker"></i> Delete</button>
            <?php 
            if($key->isActivated =='1')
            { 
              $btn_text = "Change to InActive State"; 
              $btn_class = "btn-success";
            } 
            else 
            { 
              $btn_text = "Change To Active State"; 
              $btn_class = "btn-danger";
            } 
            ?> 
                       
            <a class="btn <?php echo $btn_class;?> below_space btn-sm" href="<?php echo base_url(); ?>admin/Seeker/changeActivation/<?php echo $key->id; ?>/<?php echo $key->isActivated; ?>"><?php echo $btn_text;?></a>
          </div>
          </div>
          <!-- table-responsive --> 
        </div>
        <!-- col-md-6 -->
        <div class="col-md-1"> </div>
      </div>
    </div>
  </div>
  <!-- /.box --> 
  </form>
</section>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title news_title">Change Password</h4>
        <input type="hidden" value="" class="news_id" name="">
      </div>
      <div class="modal-body center">
        <div class="panel-body panel-body-nopadding">
          <?php
             $action = base_url() . 'admin/Seeker/changeSeekerPassword';
           $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
           echo form_open($action, $attributes);
          ?>
          <div class="form-group">
            <label class="col-sm-3 control-label">New Password:<span class="asterisk">*</span></label>
            <div class="col-sm-7">
              <input type="text" required name="password" id='password' class="form-control" value='' />
              <input type="hidden"  name="job_id" id='job_id' class="form-control" value='<?php echo $key->id; ?>' />
            </div>
          </div>
          <div class="panel-footer">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-5">
                <button class="btn btn-success btn-flat" type="submit"> Update Password </button>
                &nbsp; </div>
            </div>
          </div>
          <!-- panel-footer --> 
          <?php echo form_close(); ?> </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div id="myModalDelete" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title green">Are you sure to Delete a Job Seeker ?</h4>
      </div>
      <div class="modal-body center"> <a class="btn btn-success get_link" href="">Yes</a> &nbsp; | &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>