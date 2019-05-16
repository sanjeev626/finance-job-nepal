<?php
//print_r($data2);
//echo $application_id;
if($status=="rejected")
    $color="red";
else
    $color = "black";

$jobseekerInfo= $this->general_model->getById('seeker','id',$sid);
$seekerEmployment = $this->general_model->getAll('seeker_experience',array('sid' => $sid));
$seekerEducation = $this->general_model->getAll('seeker_education',array('sid' => $sid));
$seekerTraining = $this->general_model->getAll('seeker_training',array('sid' => $sid));
$seekerReference = $this->general_model->getAll('seeker_reference',array('sid' => $sid));
?>

<form name="frmSR" method="post">
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="My-Profile">
            <div class="personal-detail">
                <a name="<?php echo $application_id;?>"></a>
                <ul class="profile-width">
                    <li><strong>Candidate's Name :</strong><?php echo $jobseekerInfo->fname.' '.$jobseekerInfo->mname.' '.$jobseekerInfo->lname;?></li>
                    <li><strong>Address :</strong><?php echo $jobseekerInfo->address_current;?></li>
                    <li><strong>Contact No. :</strong>
                        <?php if(!empty($jobseekerInfo->phone_cell)){ echo $jobseekerInfo->phone_cell; ?>
                            (Mob),
                        <?php } if(!empty($jobseekerInfo->phone_resisdance)){ echo $jobseekerInfo->phone_resisdance; ?>
                            (Res)
                        <?php } ?>
                    </li>
                    <li><strong>Email :</strong><?php echo $jobseekerInfo->email;?></li>
                    <li><strong>Status :</strong><span style="color:<?php echo $color;?>"><?php if($status=='0') echo "NONE"; else echo strtoupper($status);?></span></li>
                    <li><strong>Position :</strong><?php echo strtoupper($position);?></li>
                    <li><strong>Apply Date :</strong><?php echo strtoupper($appdate);?></li>
                </ul>
            </div>
            <!--  personal-detail -->
            <?php if(!empty($jobseekerInfo->summary)){?>
                <div class="career-objective">
                    <h3>Career objectives</h3>
                    <p class="body-font"><?php echo nl2br(stripslashes($jobseekerInfo->summary)); ?></p>
                </div>
            <?php } if(!empty($jobseekerInfo->keyskills)){?>
                <div class="career-objective">
                    <h3>Key Skills</h3>
                    <p class="body-font"><?php echo nl2br(stripslashes($jobseekerInfo->keyskills)); ?></p>
                </div>
            <?php } ?>
            <div class="personal-detail">
                <h3>Employment Details</h3>
                <ul class="profile-width">
                    <?php if(!empty($seekerEmployment)){
                        foreach($seekerEmployment as $key => $sekVal):
                            $key = $key+1;
                            $current_work = $sekVal->currently_working;
                            ?>
                            <li><h2>Employment #<?php echo $key++ ?></h2></li>
                            <li><strong>Company Name</strong><?php echo $sekVal->company;?></li>
                            <li><strong>Location</strong><?php echo $sekVal->empoyername;?></li>
                            <li><strong>Desination</strong><?php echo $sekVal->designation;?></li>
                            <li><strong>Duration</strong>From <?php echo date('M',mktime(0, 0, 0, $sekVal->frommonth, 10)).' '.$sekVal->fromyear; ?> to
                                <?php
                                if($current_work == 0){
                                    echo date('M',mktime(0, 0, 0, $sekVal->tomonth, 10)).' '.$sekVal->toyear;
                                }else{
                                    echo 'Present';
                                }
                                ?>
                            </li>
                            <li><strong>Duties and Responsibilities :</strong></li>
                            <li><?php echo nl2br(stripslashes($sekVal->duties));?></li>
                        <?php endforeach; }else{?>
                        <li>No employment Information has been added</li>
                    <?php }?>
                </ul>
            </div>
            <div class="educational-detail">
                <h3>Educational Details</h3>
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <!--<th>Degree</th>-->
                        <th>Name of Degree</th>
                        <th>Graduation Year</th>
                        <th>College/School</th>
                        <th>Board/University</th>
                        <th>Percentage/CGPA</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($seekerEducation)){

                        foreach($seekerEducation as $key => $seEdVal):
                            /*echo '<pre>';
                            print_r($seEdVal);
                            echo '</pre>';*/
                            //$degree =$this->general_model->getById('dropdown','id',$seEdVal->degree)->dropvalue;

                            ?>
                            <tr>
                                <!--<td><?php /*echo $degree;*/?></td>-->
                                <td><?php echo $seEdVal->education_program;?></td>
                                <td><?php echo $seEdVal->graduationyear;?></td>
                                <td><?php echo $seEdVal->instution;?></td>
                                <td><?php echo $seEdVal->board;?></td>
                                <td><?php echo $seEdVal->marks_secured;?></td>
                            </tr>
                        <?php endforeach; }else{?>
                        <tr>
                            <td colspan="6">No Educational Information has been added</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="personal-detail">
                    <ul class="profile-width">
                        <!-- <li><strong>Latest Education :</strong><?php echo $jobseekerInfo->faculty;?></li> -->
                        <?php if(!empty($jobseekerInfo->slc_docs) || !empty($jobseekerInfo->docs_11_12) || !empty($jobseekerInfo->bachelor_docs) || !empty($jobseekerInfo->masters_docs) || !empty($jobseekerInfo->other_docs)){?>
                            <li><strong>Academic Documents :</strong></li>
                            <li>
                                <?php if(!empty($jobseekerInfo->slc_docs)){?>
                                    <a href="<?php echo base_url()."uploads/documents/".$jobseekerInfo->slc_docs; ?>" target="_blank">Download SLC documents</a>
                                <?php } ?>
                                <?php if(!empty($jobseekerInfo->docs_11_12)){?>
                                    <br>
                                    <a href="<?php echo base_url()."uploads/documents/".$jobseekerInfo->docs_11_12; ?>" target="_blank">Download 11/12 transcript</a>
                                <?php } ?>
                                <?php if(!empty($jobseekerInfo->bachelor_docs)){?>
                                    <br>
                                    <a href="<?php echo base_url()."uploads/documents/".$jobseekerInfo->bachelor_docs; ?>" target="_blank">Download Bachelors transcript</a>
                                <?php } ?>
                                <?php if(!empty($jobseekerInfo->masters_docs)){?>
                                    <br>
                                    <a href="<?php echo base_url()."uploads/documents/".$jobseekerInfo->masters_docs; ?>" target="_blank">Download Masters transcript</a>
                                <?php } ?>
                                <?php if(!empty($jobseekerInfo->other_docs)){?>
                                    <br>
                                    <a href="<?php echo base_url()."uploads/documents/".$jobseekerInfo->other_docs; ?>" target="_blank">Download other documents</a>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
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
                                <td><?php echo date('M',mktime(0, 0, 0, $seTraVal->frommonth, 10)).' '.$seTraVal->fromyear; ?></td>
                                <td><?php echo date('M',mktime(0, 0, 0, $seTraVal->tomonth, 10)).' '.$seTraVal->toyear; ?></td>
                            </tr>
                        <?php endforeach; }else{?>
                        <tr>
                            <td colspan="4">No Trainings/Workshops Information has been added</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="personal-detail">
                <h3>Personal Detail</h3>
                <ul class="profile-width">
                    <?php
                    //$nationality =$this->general_model->getById('dropdown','id',$jobseekerInfo->nationality)->dropvalue;
                    ?>
                    <li><strong>Date of Birth :</strong><?php echo $jobseekerInfo->dob;?></li>
                    <li><strong>Nationality :</strong><?php //echo $nationality;?></li>
                    <li><strong>Gender :</strong><?php echo $jobseekerInfo->gender;?></li>
                    <li><strong>Phone (off) :</strong><?php echo $jobseekerInfo->phone_cell;?></li>
                    <li><strong>Marital Status :</strong><?php echo $jobseekerInfo->marital_status;?></li>
                    <li><strong>Permanent Address :</strong><?php echo $jobseekerInfo->address_current;?></li>
                </ul>
            </div>
            <?php if(!empty($seekerReference)){
                ?>
                <div class="personal-detail">
                    <h3>References</h3>
                    <?php
                    foreach($seekerReference as $key => $seRefVal):
                        ?>
                        <ul class="profile-width">
                            <li><strong>Name :</strong><?php echo $seRefVal->fname.' '.$seRefVal->mname.' '.$seRefVal->lname;?></li>
                            <li><strong>Address :</strong><?php echo $seRefVal->block.', '.$seRefVal->street.', '.$seRefVal->city;?></li>
                            <li><strong>Phone :</strong><?php echo $seRefVal->office; if(!empty($seRefVal->cell)) echo $seRefVal->cell;?></li>
                            <li><strong>Email :</strong><?php echo $seRefVal->email;?></li>
                            <li><strong>Company :</strong><?php echo $seRefVal->cname;?></li>
                            <li><strong>Designation :</strong><?php echo $seRefVal->designation;?></li>
                            <li><strong>Relationship :</strong><?php echo $seRefVal->relationship;?></li>
                        </ul>
                    <?php endforeach; ?>
                </div>
                <?php
            }
            ?>
            <div class="personal-detail">
                <h3>Remarks</h3>
                <textarea name="remarks" style="width:100%; border-radius: 5px; border: 1px solid #ddd; height:150px; resize:none;"><?php echo $remarks;?></textarea>
            </div>
            <!--  personal-detail -->
            <!-- <a href="<?php echo base_url();?>Employer/viewSeekerDetail/<?php echo $sid; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-list tooltips" data-original-title="View Resume" title="View Resume"></i> View Resume</a> |  -->
            <?php
            if(!empty($jobseekerInfo->resume))
            {
                $resumepath = base_url()."uploads/resume/".$jobseekerInfo->resume;
                ?>
                <a target="_blank" class="btn btn-success btnApplicants" href="<?php echo $resumepath; ?>"><i class="fa fa-download tooltips" data-original-title="View Detail" title="Shortlist"></i> Open/Download Resume </a> |
                <?php
            }
            ?>
            <input type="hidden" id="application_id" value="<?php echo $application_id;?>" name="application_id">
            <button type="submit" class="btn btn-warning btn-sm btnApplicants" id="btnShortlist" name="btnShortlist">
                <i class="fa fa-list-ul" aria-hidden="true"></i> Shortlist
            </button> |
            <button type="submit" class="btn btn-danger btn-sm btnApplicants" id="btnReject" name="btnReject">
                <i class="fa fa-ban" aria-hidden="true"></i> Reject
            </button>

            <!-- <input type="submit" class="btn btn-warning btn-sm btnApplicants" id="btnShortlist" value="Shortlist" name="btnShortlist"> |
            <input type="submit" class="btn btn-danger btn-sm btnApplicants" id="btnReject" value="Reject" name="btnReject"> -->
        </div>
        <!-- My-Profile -->

    </div>
</form>
<style>
    .profile-width li strong {
        width: 25% !important;
    }

    h2{
        margin-bottom: 2px;
    }

    .emp-detail h2 {
        font-size: 15px;
    }
    .login-contains #My-Profile .personal-detail li {
        line-height: 25px;
        font-size: 13px;
        color: #000000;
    }

    #login-detail .tab-content {
        padding: 20px;
        margin-bottom: 20px;
    }
    .login-contains #My-Profile .personal-detail li>strong{
        font-size: 13px;
    }
    .login-contains #My-Profile table tbody td, #Edit-profile table tbody td{
        padding: 3px;
    }
    #login-detail .tab-content h3{
        margin-bottom: 5px;
    }
    .login-contains #My-Profile table, #Edit-profile table{
        margin-bottom: 0px;
    }
    .login-contains #My-Profile .personal-detail, .login-contains #My-Profile .career-objective, .login-contains #My-Profile .employment-detail, .login-contains #My-Profile .educational-detail, .login-contains #My-Profile .Trainings-Workshop{
        padding-bottom:5px;
        margin-bottom:10px;
    }
    .emp-detail h2{
        margin-bottom: 5px;
        margin-top: 5px;
    }
    .btnApplicants{
        width: 245px;
        font-size: 14px;
        font-family: 'Raleway', sans-serif;
    }
</style>