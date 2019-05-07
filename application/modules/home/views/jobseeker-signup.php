<style>
    .text{
        text-align: center;
        font-size: 22px;
        margin: 10px;
    }
    .uploadcv{
        text-align: center;
    }
    .uploadcv a{color: #6b739c;}
    .uploadcv .modal{top: 43px;}
    .uploadcv .modal .modal-header{background: #FF6A00;}
    .uploadcv .modal .modal-title {color:#fff}
    .uploadcv .modal .modal-title span{font-size: 15px;float: left;}
    .uploadcv .modal .modal-body .control-label{float:left;font-weight: bold}
    .uploadcv .modal .modal-footer .subbtn{background: #FF6A00;}
</style>
<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->

<!-- Candidate Dashboard Area Start -->
<section class="candidate-dashboard-area section_70">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-lg-8 dashboard-left-border">
                <div class="dashboard-right">
                    <div class="candidate-single-profile-info earnings-page-box manage-jobs">
                        <?php
                        $action =base_url().'Jobseeker/jobseekerRegistration';
                        $attributes = array('id' => 'jobseekersignup_demo','name'=>'jobseekersignup',);
                        echo form_open_multipart($action, $attributes);
                        ?>
                            <div class="resume-box text-left">
                                <h3>Job Seeker Registration</h3>
                                <?php if($message){ ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                        <?php echo $message;?> </div>
                                <?php } ?>
                                <?php if($this->session->flashdata('error')){ ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                        <?php echo $this->session->flashdata('error');?> </div>
                                <?php } ?>

                                <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                        <?php echo $this->session->flashdata('success');?> </div>
                                <?php } ?>
                                <div class="single-resume-feild">
                                    <div class="single-input">
                                        <h4>Personal Details :</h4>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <input type="text" name="fname" value="<?php echo set_value('fname'); ?>" required class="form-control" placeholder="First Name*" >
                                    </div>
                                    <div class="single-input">
                                        <input type="text" name="mname" value="<?php echo set_value('mname'); ?>" class="form-control" placeholder="Middle Name">
                                    </div>
                                    <div class="single-input">
                                        <input type="text" name="lname" value="<?php echo set_value('lname'); ?>" required class="form-control" placeholder="Last Name*" >
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label class="margin">DOB*:</label>
                                    </div>
                                    <div class="single-input">
                                        <select class="form-control" name="mm" required>
                                            <option value="">Month</option>
                                            <?php for($m=1;$m<=12;$m++){?>
                                                <option value="<?php echo $m;?>" <?php echo  set_select('mm',$m); ?>><?php echo $m;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="single-input">
                                        <select class="form-control" name="dd" required>
                                            <option value="">Day</option>
                                            <?php for($d=1;$d<=32;$d++){?>
                                                <option value="<?php echo $d;?>" <?php echo  set_select('dd',$d); ?>><?php echo $d;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="single-input">
                                        <select class="form-control" name="yy" required>
                                            <option value="">Year</option>
                                            <?php
                                            $cyear = date('Y');
                                            $pyear = $cyear-100;
                                            for($y=$pyear;$y<$cyear;$y++){?>
                                                <option value="<?php echo $y;?>" <?php echo  set_select('yy',$y); ?>><?php echo $y;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>

                                <!--<div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <input type="text" name="phoneres" value="<?php /*echo set_value('phoneres'); */?>" required class="form-control" placeholder="Phone(Res)*" >
                                    </div>
                                    <div class="single-input">
                                        <input type="text" name="phoneoff" value="<?php /*echo set_value('phoneoff'); */?>" class="form-control" placeholder="Phone(off)">
                                    </div>
                                </div>-->




                                <div class="single-resume-feild ">
                                    <div class="single-input">
                                        <input type="text" name="currentadd" value="<?php echo set_value('currentadd'); ?>" required class="form-control" placeholder="Address *" >
                                    </div>

                                    <!--<div class="single-input">
                                        <input type="text" name="permanentadd" value="<?php /*echo set_value('permanentadd'); */?>" required class="form-control" placeholder="Permanent Address *">
                                    </div>-->

                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email *" required  onkeyup="document.getElementById('username_id').value=this.value">
                                    </div>
                                    <div class="single-input">
                                        <input type="text" name="phonecell" value="<?php echo set_value('phonecell'); ?>" required class="form-control" placeholder="Mobile No">
                                    </div>
                                </div>
                                <div class="single-resume-feild">
                                    <div class="single-input">
                                        <select id="gender" name="gender">
                                            <option>Select Gender</option>
                                            <option value="Male" <?php echo  set_select('gender','Male'); ?>>Male</option>
                                            <option value="Female" <?php echo  set_select('gender','Female'); ?>>Female</option>
                                            <option value="Other" <?php echo  set_select('gender','Other'); ?>>Other</option>
                                        </select>
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
                                        <select class="form-control" name="faculty" id="faculty">
                                            <option value="None">None</option>
                                            <option value="intermediate" <?php echo  set_select('faculty','intermediate'); ?>>Intermediate</option>
                                            <option value="bachelor" <?php echo  set_select('faculty','bachelor'); ?>>Bachelor</option>
                                            <option value="master" <?php echo  set_select('faculty','master'); ?>>Master</option>
                                            <option value="other" <?php echo  set_select('faculty','other'); ?>>Other</option>
                                        </select>
                                    </div>
                                    <div class="single-input">
                                        <select class="form-control" name="expyrs">
                                            <option>Select Experience in years</option>
                                            <?php for($y=0;$y<=5;$y++){?>
                                                <option value="<?php echo $y;?>" <?php echo  set_select('expyrs',$y); ?> ><?php echo $y;?> Years</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <input type="text"  id="past_employer" value="<?php echo set_value('past_employer'); ?>" name="past_employer" placeholder="Past Employer">
                                    </div>
                                    <div class="single-input">
                                        <input type="text"  id="current_employer" value="<?php echo set_value('current_employer'); ?>" name="current_employer" placeholder="Current Employer">
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <input type="text" name="cjobposiiton" value="<?php echo set_value('cjobposiiton'); ?>" class="form-control" placeholder="Position">
                                    </div>
                                    <div class="single-input">
                                        <select class="form-control" name="expsal">
                                            <option>Select Expected Salary</option>
                                            <?php foreach ($salary_range as $key => $value) {?>
                                                <option  value='<?php echo $value->id; ?>' <?php echo  set_select('expsal',$value->id); ?> ><?php echo $value->dropvalue; ?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="resume-box text-left">
                                <div class="single-resume-feild">
                                    <div class="single-input">
                                        <h4>Login Information</h4>
                                    </div>
                                </div>
                                <div class="single-resume-feild">
                                    <div class="single-input">
                                        <input type="text" class="form-control" value="<?php echo set_value('username'); ?>" name="username" id="username_id" placeholder="Username / Email ID" readonly required>
                                        <input name="activation_code" type="hidden" value="<?php echo mt_rand(1000000000, mt_getrandmax());?>" />
                                        <p style="color:green"><b>Note :</b>Your Email will be your username.</p>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        <p style="color:green"><b>Note :</b> Minimum Password length must be 5</p>
                                    </div>
                                    <div class="single-input">
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="w_screen">Passport size profile picture</label>
                                        <div class="product-upload">
                                            <p class="text-left"> <i class="fa fa-upload"></i> Max file size is 1MB<br>
                                                Suitable files are .jpg &amp; .png </p>
                                            <input type="file" name="picture" id='picture' class="form-control" value='' />
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <label for="w_screen">Updated CV / Resume</label>
                                        <div class="product-upload">
                                            <p class="text-left"> <i class="fa fa-upload"></i> Max file size is 3MB<br>
                                                Suitable files are .doc, .docx &amp; .pdf </p>

                                            <input type="file" required name="resume" id='resume' class="form-control" value='' />
                                        </div>
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
                                        <input type="text" value="" id="facebook" name="facebook" placeholder="Facebook">
                                    </div>
                                    <div class="single-input">
                                        <label for="linkedin"> <i class="fa fa-linkedin linkedin"></i> linkedin </label>
                                        <input type="text" value="" id="linkedin" name="linkedin" placeholder="Linkedin">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-resume">
                                <button type="submit" name="submit">Signup</button>
                                <a href="<?php echo $authURL; ?>">Signup via Facebook |</a>
                                <!--<a href="<?php /*echo $oauthURL;*/?>">Signup via Linked In |</a>-->
                                <a href="<?php echo base_url().'Jobseeker/loginGoogle';?>">Signup via gmail |</a>
                            </div>


                        <?php echo form_close(); ?>

                        <div class="text">OR</div>
                        <div class="uploadcv">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#cvModal">
                                Just Upload your CV if you dont want to register
                            </a>


                            <!-- Modal -->
                            <div class="modal fade" id="cvModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                Apply With Your Basic Information
                                                <br>
                                                <span>We will get you back soon.</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?php echo base_url().'Jobseeker/jobseekercv'?>" method="post" enctype='multipart/form-data'>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="control-label">First Name*</label>
                                                    <div>
                                                        <input type="text" class="form-control input-lg" name="first_name" value=""required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Last Name*</label>
                                                    <div>
                                                        <input type="text" class="form-control input-lg" name="last_name" value="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">E-Mail Address*</label>
                                                    <div>
                                                        <input type="email" class="form-control input-lg" name="email" value="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Contact Number</label>
                                                    <div>
                                                        <input type="text" class="form-control input-lg" name="contact_number" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Upload your CV(Formate Doc, PDF only)*</label>
                                                    <div>
                                                        <input type="file" id="exampleInputFile"  class="form-control input-lg" name="attachment" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-dismiss="modal">Close</button>
                                                <button type="submit" name="cvsubmit" class="btn btn-primary subbtn">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 ">
                <div class="dashboard-left">
                    <div class="candidate-single-profile-info earnings-page-box manage-jobs">
                        <h3>Great Benifits only on financejobnepal.com</h3>
                        <ol class="dashboard-menu">
                            <li><a href="javscript:void(0);">1. Finance Job Nepal keep all your information confidential.</a></li>
                            <li><a href="javscript:void(0);">2. Finance Job Nepal is 100% free. It doesnot charge any fees from Candidates for recruitment service.</a></li>
                            <li><a href="javscript:void(0);">3. First & Only Finance & Accounts JobPortal in Nepal.</a></li>
                            <li><a href="javscript:void(0);">4. Immediate Response and Free Professional Assesment of Your CV.</a></li>
                            <li><a href="javscript:void(0);">5. Access to all Accounts & Finance Jobs at One Place</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Candidate Dashboard Area End -->