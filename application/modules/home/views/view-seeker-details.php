<?php
    $jobseekerInfo= $this->general_model->getById('seeker','id',$sid);
    $seekerEmployment = $this->general_model->getAll('seeker_experience',array('sid' => $sid));
    $seekerEducation = $this->general_model->getAll('seeker_education',array('sid' => $sid));
    $seekerTraining = $this->general_model->getAll('seeker_training',array('sid' => $sid));
    $seekerReference = $this->general_model->getAll('seeker_reference',array('sid' => $sid));
?>
<div class="col-md-9 login-contains">
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="My-Profile">
            <div class="personal-detail">
                <ul class="profile-width">
                    <li><strong>Name :</strong><?php echo $jobseekerInfo->fname.' '.$jobseekerInfo->mname.' '.$jobseekerInfo->lname;?></li>
                    <li><strong>Address :</strong><?php echo $jobseekerInfo->permanentadd;?></li>
                    <li><strong>Contact No. :</strong><?php if(!empty($jobseekerInfo->phonecell)){ echo $jobseekerInfo->phonecell; ?>(Mob),<?php } if(!empty($jobseekerInfo->phoneres)){ echo $jobseekerInfo->phoneres; ?>(Res)
                  <?php } ?></li>
                    <li><strong>Email :</strong><?php echo $jobseekerInfo->email;?></li>
                </ul>
            </div><!--  personal-detail -->
            <div class="career-objective">
                <h3>Career objectives</h3>
                <p class="body-font"><?php echo nl2br(stripslashes($jobseekerInfo->summary)); ?></p>
            </div>


            <div class="employment-detail emp-detail">
                                <h3>Employment Details</h3>
                <?php if(!empty($seekerEmployment)){
                        foreach($seekerEmployment as $key => $sekVal): $key = $key+1;
                            $current_work = $sekVal->currently_working;
                        ?>
                            <h2>Employment #<?php echo $key++ ?></h2>
                                  <table class="table table-condensed">
                                      <tr>
                                        <th>Company Name</th>
                                        <td><?php echo $sekVal->company;?></td>
                                      </tr>
                                      <tr>
                                        <th>Location</th>
                                        <td><?php echo $sekVal->empoyername;?></td>
                                      </tr>
                                      <tr>
                                        <th>Desination</th>
                                        <td><?php echo $sekVal->designation;?></td>
                                      </tr>
                                      <tr>
                                        <th>Duration</th>
                                        <td>From <?php echo date('M',strtotime($sekVal->frommonth)).' '.$sekVal->fromyear; ?> to
                                            <?php
                                        if($current_work == 0){
                                            echo date('M',strtotime($sekVal->tomonth)).' '.$sekVal->toyear;
                                        }else{
                                            echo 'Present';
                                        }
                                            ?>
                                    </td>
                                      </tr>
                                      <tr>
                                        <th class="vtop">Duties and Responsibilities</th>
                                        <td>
                                            <?php echo nl2br(stripslashes($sekVal->duties));?>
                                        </td>
                                      </tr>
                                 </table>

                    <?php endforeach; }else{?>
                            <tr><td colspan="5">No Information has been added</td></tr>
                        <?php } ?>
            </div>

            <div class="educational-detail">
                <h3>Educational Details</h3>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Degree</th>
                            <th>Name of Degree</th>
                            <th>Graduation Year</th>
                            <th>College/School</th>
                            <th>Board/University</th>
                            <th>Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php if(!empty($seekerEducation)){
                        foreach($seekerEducation as $key => $seEdVal):
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
                            <tr><td colspan="6">No Information has been added</td></tr>
                        <?php } ?>
                    </tbody>
                </table>
                <table class="table table-condensed">
                        <tr>
                            <th>Latest Education :</th>
                            <td><?php echo $jobseekerInfo->faculty;?></td>
                        </tr>
                        <tr>
                            <th>Academic Documents :</th>
                            <td>
                                <?php if(!empty($jobseekerInfo->slc_docs)){?><a href="<?php echo base_url()."uploads/documents/".$jobseekerInfo->slc_docs; ?>" target="_blank">Download SLC documents</a><?php } ?>
                                <?php if(!empty($jobseekerInfo->docs_11_12)){?><br><a href="<?php echo base_url()."uploads/documents/".$jobseekerInfo->docs_11_12; ?>" target="_blank">Download 11/12 transcript</a><?php } ?>
                                <?php if(!empty($jobseekerInfo->bachelor_docs)){?><br><a href="<?php echo base_url()."uploads/documents/".$jobseekerInfo->bachelor_docs; ?>" target="_blank">Download Bachelors transcript</a><?php } ?>
                                <?php if(!empty($jobseekerInfo->masters_docs)){?><br><a href="<?php echo base_url()."uploads/documents/".$jobseekerInfo->masters_docs; ?>" target="_blank">Download Masters transcript</a><?php } ?>
                                <?php if(!empty($jobseekerInfo->other_docs)){?><br><a href="<?php echo base_url()."uploads/documents/".$jobseekerInfo->other_docs; ?>" target="_blank">Download other documents</a><?php } ?>
                                      
                            </td>
                        </tr>
                </table>
                 
            </div>

            <div class="educational-detail">
                <h3>Trainings/Workshops</h3>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Company / Institute Name</th>
                            <th>Training Course</th>
                            <th>From</th>
                            <th>To</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php if(!empty($seekerTraining)){
                        foreach($seekerTraining as $key => $seTraVal):
                        ?>
                        <tr>
                            <td><?php echo $seTraVal->institution;?></td>
                            <td><?php echo $seTraVal->course;?></td>
                            <td><?php echo date('M',strtotime($seTraVal->frommonth)).' '.$seTraVal->fromyear; ?></td>
                            <td><?php echo date('M',strtotime($seTraVal->tomonth)).' '.$seTraVal->toyear; ?></td>
                        </tr>
                        <?php endforeach; }else{?>
                            <tr><td colspan="4">No Information has been added</td></tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="personal-detail">
                <h3>Personal Detail</h3>
                <ul class="profile-width">
                    <?php
                    $nationality =$this->general_model->getById('dropdown','id',$jobseekerInfo->nationality)->dropvalue;
                    ?>
                    <li><strong>Date of Birth :</strong><?php echo $jobseekerInfo->dd.' '.date('M',strtotime($jobseekerInfo->mm)).' '.$jobseekerInfo->yy;?></li>
                    <li><strong>Nationality :</strong><?php echo $nationality;?></li>
                    <li><strong>Gender :</strong><?php echo $jobseekerInfo->gender;?></li>
                    <li><strong>Phone (off) :</strong><?php echo $jobseekerInfo->phoneoff;?></li>
                    <li><strong>Marital Status :</strong><?php echo $jobseekerInfo->maritalstatus;?></li>
                    <li><strong>Permanent Address :</strong><?php echo $jobseekerInfo->permanentadd;?></li>
                </ul>
            </div><!--  personal-detail -->

            <div class="personal-detail">
                <h3>Experience Details</h3>
                <ul class="profile-width">
                    <?php
                    $exp_salary =$this->general_model->getById('dropdown','id',$jobseekerInfo->expsal);
                    if($exp_salary){
                        $exp_salary = $exp_salary->dropvalue;
                    }
                    if($jobseekerInfo->job_region > 0){
                        $region =$this->general_model->getById('dropdown','id',$jobseekerInfo->job_region)->dropvalue;
                    }
                    if(is_numeric($jobseekerInfo->joblocation) && $jobseekerInfo->joblocation != '0'){
                        $joblocation1 = $this->general_model->getById('dropdown','id',$jobseekerInfo->joblocation);
                        $joblocation1 = ($joblocation1) ? $joblocation1->dropvalue :'';
                    }else{
                        $joblocation1 = ($jobseekerInfo->joblocation !== '0') ? $jobseekerInfo->joblocation : '';
                    }
                    if(($jobseekerInfo->joblocation2 > 0) || ($jobseekerInfo->joblocation2 != '')){
                        $joblocation2 =$this->general_model->getById('dropdown','id',$jobseekerInfo->joblocation2);
                        $joblocation2 = ($joblocation2 != '') ? $joblocation2->dropvalue : '';
                    }else{
                        $joblocation2 = '';
                    }
                    ?>
                    <li><strong>Have work experience :</strong><?php echo $jobseekerInfo->workexp;  ?></li>
                    <li><strong>Current Job posiiton :</strong><?php echo $jobseekerInfo->cjobposiiton;  ?></li>
                    <li><strong>Key skills :</strong><?php echo $jobseekerInfo->keyskills;  ?></li>
                    <li><strong>Present Salary :</strong><?php echo $jobseekerInfo->presal;  ?></li>
                    <li><strong>Expected Salary :</strong><?php echo $exp_salary; ?></li>
                    <li><strong>Job Region :</strong><?php echo ($jobseekerInfo->job_region > 0) ?  $this->general_model->getById('dropdown','id',$jobseekerInfo->job_region)->dropvalue : ''; ?></li>
                    <li><strong>Preferred Job location :</strong><?php echo $joblocation1.','.$joblocation2; ?></li>
                </ul>
            </div><!--  personal-detail -->

            <div class="educational-detail">
                <h3>References</h3>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Location</th>
                            <th>Phone</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php if(!empty($seekerReference)){
                        foreach($seekerReference as $key => $seRefVal):
                        ?>
                        <tr>
                            <td><?php echo $seRefVal->fname.' '.$seRefVal->mname.' '.$seRefVal->lname;?></td>
                            <td>
                                <?php if(!empty($seRefVal->block)) echo $seRefVal->block."<br />";
			                          if(!empty($seRefVal->street)) echo $seRefVal->street.", <br /> ";
                        			  if(!empty($seRefVal->city)) echo $seRefVal->city.", <br /> ";
                                ?>
                            </td>
                            <td><?php echo $seRefVal->cname.', '.$seRefVal->clocation; ?></td>
                            <td>
                                <?php
                                    if(!empty($seRefVal->cell))echo $seRefVal->cell."(Mob), ";
                                    if(!empty($seRefVal->home))echo $seRefVal->home."(Res), ";
                                    if(!empty($seRefVal->fax))echo $seRefVal->fax."(Fax), ";
                                ?>
                            </td>
                            <td><?php echo $seRefVal->email;?></td>
                        </tr>
                        <?php endforeach; }else{?>
                            <tr><td colspan="5">No Information has been added</td></tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php
            if(!empty($jobseekerInfo->resume))
            {
            $resumepath = base_url()."uploads/resume/".$jobseekerInfo->resume;
            ?>
            <a target="_blank" class="btn btn-success" href="<?php echo $resumepath; ?>">Download Resume </a>
            <?php
            }
            ?>
        </div><!-- My-Profile -->
    </div>
</div><!-- login-contains -->

<style>
    .profile-width li strong {
        width: 40% !important;
    }

    .emp-detail h2 {
        font-size: 15px;
    }
</style>
