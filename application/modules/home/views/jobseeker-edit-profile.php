<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->

<!-- Candidate Dashboard Area Start -->

<section class="candidate-dashboard-area section_15">
    <div class="container">
        <div class="row">

                <?php include('includes/jobseeker-dashboard-sidebar.php');?>

            <div class="col-md-12 col-lg-8 dashboard-left-border">
                <div class="dashboard-right">
                    <div class="candidate-single-profile-info earnings-page-box manage-jobs">
                        <?php
                        $action =base_url().'jobseeker/updateInformation/'.$basicInfo->id;
                        $attributes = array('class' => 'form-horizontal user-logIn','name'=>'updateInformation',);
                        echo form_open_multipart($action, $attributes);
                        ?>
                            <div class="resume-box text-left">
                                <div class="single-resume-feild">
                                    <div class="single-input">
                                        <h4>Basic Information :</h4>
                                    </div>
                                    <?php if($this->session->flashdata('success')){ ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                            <?php echo $this->session->flashdata('success');?> </div>
                                    <?php } ?>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <input type="text" name="fname" value="<?php echo $basicInfo->fname; ?>" required class="form-control" placeholder="First Name*" >
                                    </div>
                                    <div class="single-input">
                                        <input type="text" name="mname" value="<?php echo $basicInfo->mname; ?>" class="form-control" placeholder="Middle Name">
                                    </div>
                                    <div class="single-input">
                                        <input type="text" name="lname" value="<?php echo $basicInfo->lname; ?>" required class="form-control" placeholder="Last Name*" >
                                    </div>
                                </div>
                                <div class="single-resume-feild ">
                                    <div class="single-input">
                                        <input type="text" name="currentadd" value="<?php echo $basicInfo->address_current?>" required class="form-control" placeholder="Address *" >

                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <input type="email" name="email" id="email" value="<?php echo $basicInfo->email?>" class="form-control" placeholder="Email " readonly  >

                                    </div>
                                    <div class="single-input">
                                        <input type="text" name="phonecell" value="<?php echo $basicInfo->phone_cell?>" required class="form-control" placeholder="Mobile No">

                                    </div>
                                </div>
                                <div class="date-post-job">
                                    <div class="single-input">
                                        <label>Gender:</label>
                                    </div>
                                    <div class="form-group form-radio">
                                        <input id="male" name="gender" type="radio" value="Male" <?php echo ($basicInfo->gender=='Male')?'checked':''?>>
                                        <label for="male" class="inline control-label">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input id="female" name="gender" type="radio" value="Female" <?php echo ($basicInfo->gender=='Female')?'checked':''?>>
                                        <label for="female" class="inline control-label"> Female</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input id="other" name="gender" type="radio" value="Other" <?php echo ($basicInfo->gender=='Other')?'checked':''?>>
                                        <label for="other" class="inline control-label"> Other</label>
                                    </div>
                                </div>
                            </div>
                            <div class="resume-box text-left">
                                <div class="single-resume-feild">
                                    <div class="single-input">
                                        <h4>Career Information</h4>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <select id="highest_qualification" name="highest_qualification">
                                            <option>Select Highest Qualification</option>

                                            <option value="Not Required" <?php if($basicInfo->highest_qualification == 'Not Required'){ echo "selected='selected'"; } ?>>Not Required</option>
                                            <option value="intermediate" <?php if($basicInfo->highest_qualification == 'intermediate'){ echo "selected='selected'"; } ?>>Intermediate</option>
                                            <option value="bachelor" <?php if($basicInfo->highest_qualification == 'bachelor'){ echo "selected='selected'"; } ?>>Bachelor</option>
                                            <option value="master" <?php if($basicInfo->highest_qualification == 'master'){ echo "selected='selected'"; } ?>>Master</option>
                                            <option value="phd" <?php if($basicInfo->highest_qualification == 'phd'){ echo "selected='selected'"; } ?>>PHD</option>
                                            <option value="other" <?php if($basicInfo->highest_qualification == 'other'){ echo "selected='selected'"; } ?>>Other</option>

                                        </select>
                                    </div>
                                    <div class="single-input">
                                        <select class="form-control" name="expyrs">
                                            <option>Select Experience in years</option>
                                            <?php for($y=0;$y<=5;$y++){?>
                                                <option value="<?php echo $y;?>" <?php echo ($basicInfo->experience_years==$y)?'selected':''?> ><?php echo $y;?> Years</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <input type="text" value="<?php echo $basicInfo->past_employer?>" id="past_employer" name="past_employer" placeholder="Past Employer">
                                    </div>
                                    <div class="single-input">
                                        <input type="text" value="<?php echo $basicInfo->current_employer?>" id="current_employer" name="current_employer" placeholder="Current Employer">
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <input type="text" value="<?php echo $basicInfo->cjobposiiton?>" id="" name="cjobposiiton" placeholder="Position">
                                    </div>
                                    <div class="single-input">
                                        <select class="form-control" name="expsal">
                                            <option>Select Expected Salary</option>
                                            <?php foreach ($salary_range as $key => $value) {?>
                                                <option  value='<?php echo $value->id; ?>' <?php echo ($basicInfo->desired_expected_salary==$value->id)?'selected':''?>><?php echo $value->dropvalue; ?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="resume-box text-left">
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="w_screen">Passport size profile picture</label>
                                        <div class="product-upload">
                                            <p class="text-left"> <i class="fa fa-upload"></i> Max file size is 1MB<br>
                                                Suitable files are .jpg &amp; .png </p>
                                            <input type="file" name="picture" id='picture' class="form-control" value='' />
                                        </div>
                                        <?php if(!empty($basicInfo->profile_picture)){?>
                                            <div class="product-upload">
                                                <img src="<?php echo base_url().'uploads/jobseeker/'.$basicInfo->profile_picture;?>" alt="">

                                            </div>
                                        <?php }?>
                                    </div>
                                    <div class="single-input">
                                        <label for="w_screen">Updated CV / Resume</label>
                                        <div class="product-upload">
                                            <p class="text-left"> <i class="fa fa-upload"></i> Max file size is 3MB<br>
                                                Suitable files are .doc, .docx &amp; .pdf </p>
                                            <input type="file" name="resume" id='resume' class="form-control" value='' />
                                        </div>
                                        <?php if(!empty($basicInfo->resume)){?>
                                        <div class="product-upload">
                                            <a href="<?php echo base_url().'uploads/resume/'.$basicInfo->resume;?>" target="_blank">
                                                <?php echo $basicInfo->resume;?>
                                            </a>

                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <div class="resume-box text-left">
                                <div class="single-resume-feild">
                                    <div class="single-input">
                                        <h4>social link</h4>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="twitter"> <i class="fa fa-facebook facebook"></i> facebook </label>
                                        <input type="text" value="<?php echo $basicInfo->facebook?>" id="facebook" name="facebook" placeholder="Facebook">
                                    </div>
                                    <div class="single-input">
                                        <label for="linkedin"> <i class="fa fa-linkedin linkedin"></i> linkedin </label>
                                        <input type="text" value="<?php echo $basicInfo->linkedin?>" id="linkedin" name="linkedin" placeholder="Linkedin">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-resume">
                                <button type="submit">Update</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Candidate Dashboard Area End -->