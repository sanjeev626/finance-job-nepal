<?php
if (!empty($jobpost_detail)) {
    $action = base_url() . 'employer/editjob/' . $jobpost_detail->id;
    $post_date = $jobpost_detail->post_date;
    $applybefore = $jobpost_detail->applybefore;
} else {
    $action = base_url() . 'employer/addjob';
    $post_date = date('Y-m-d');
    $applybefore = date('Y-m-d', strtotime("+30 days"));
}
?>

<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->

<!-- Candidate Dashboard Area Start -->
<section class="candidate-dashboard-area section_15">
    <div class="container">
        <div class="row">
            <?php $this->load->view('includes/employer-dashboard-sidebar');?>

            <div class="col-md-12 col-lg-9">
                <div class="dashboard-right">
                    <div class="earnings-page-box manage-jobs">
                        <div class="manage-jobs-heading">
                            <h3>Post A new job</h3>
                            <?php if($this->session->flashdata('success')){ ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                    <?php echo $this->session->flashdata('success');?> </div>
                            <?php } ?>
                        </div>
                        <div class="new-job-submission">
                            <?php
                            $attributes = array('class' => 'form-horizontal user-logIn','name'=>'employersignup',);
                            echo form_open_multipart($action, $attributes);
                            ?>
                                <div class="resume-box">
                                    <div class="single-resume-feild feild-flex-2">
                                        <div class="single-input">
                                            <label for="j_title">Job Title:</label>
                                            <input type="text" id="jobtitle" required value="<?php if (!empty($jobpost_detail)) echo $jobpost_detail->jobtitle; ?>" name="jobtitle" placeholder="Job Title" class="form-control" autofocus>
                                        </div>
                                        <div class="single-input">
                                            <label for="Location">Job Category:</label>
                                            <select name="jobcategory" class="form-control">
                                                <option value="">Select One</option>
                                                <?php foreach ($jobcategory as $key => $value) {?>
                                                    <option <?php if(!empty($jobpost_detail) && $jobpost_detail->jobcategory == $value->id){ echo "selected='selected'"; } ?>  value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-resume-feild feild-flex-2">
                                        <div class="single-input">
                                            <label for="Location">Location:</label>
                                            <?php
                                            if (!empty($jobpost_detail->joblocation))
                                                $joblocation_arr = unserialize($jobpost_detail->joblocation);
                                            else
                                                $joblocation_arr = array();
                                            ?>
                                            <select multiple="" class="form-control" name="joblocation[]">
                                                <?php foreach ($joblocation as $key => $value) {?>
                                                    <option <?php if(!empty($jobpost_detail) && in_array($value->id, $joblocation_arr)){ echo "selected='selected'"; } ?>  value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>

                                        <div class="single-input">
                                            <label for="j_type">Job Type:</label>
                                            <?php

                                            if (!empty($jobpost_detail->jobtype))
                                                $jobtype_arr = unserialize($jobpost_detail->jobtype);
                                            else
                                                $jobtype_arr = array();

                                            ?>
                                            <select id="j_type" multiple="" name="jobtype[]" class="form-control">
                                                <?php foreach ($jobtype as $key => $value) {?>
                                                    <option <?php if(!empty($jobpost_detail) && in_array($value->id, $jobtype_arr)){ echo "selected='selected'"; } ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-resume-feild feild-flex-2">
                                        <div class="single-input">
                                            <label for="External">Preferred Gender</label>
                                            <select id="j_type" name="preferredgender" class="form-control">
                                                <option value=''>Select One</option>
                                                <option value="Male" <?php if(!empty($jobpost_detail) && $jobpost_detail->preferredgender == 'Male'){ echo "selected='selected'"; } ?>>Male</option>
                                                <option value="Female" <?php if(!empty($jobpost_detail) && $jobpost_detail->preferredgender == 'Female'){ echo "selected='selected'"; } ?>>Female</option>
                                                <option value="Male/Female" <?php if(!empty($jobpost_detail) && $jobpost_detail->preferredgender == 'Male/Female'){ echo "selected='selected'"; } ?>>Male/Female</option>
                                            </select>
                                        </div>
                                        <div class="single-input">
                                            <label for="j_category">Required Number:</label>
                                            <input type="text" id="j_title" name="requiredno" class="form-control" value="<?php if (!empty($jobpost_detail)) echo $jobpost_detail->requiredno; ?>">
                                        </div>
                                    </div>
                                    <div class="single-resume-feild feild-flex-2">
                                        <div class="single-input">
                                            <label for="Location">Job Level:</label>
                                            <select name="joblevel" class="form-control">
                                                <?php foreach ($joblevel as $key => $value) {?>
                                                    <option <?php if(!empty($jobpost_detail) && $jobpost_detail->joblevel == $value->id){ echo "selected='selected'"; } ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <div class="single-input">
                                            <label for="j_type">Salary Range:</label>
                                            <select class="form-control" name="salaryrange" >
                                                <?php foreach ($salary_range as $key => $value) {?>
                                                    <option <?php if(!empty($jobpost_detail) && $jobpost_detail->salaryrange == $value->id){ echo "selected='selected'"; } ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-resume-feild feild-flex-2">
                                        <div class="single-input">
                                            <label for="Location">Preferred Education:</label>

                                                <select class="form-control" name="required_education" id="required_education">
                                                    <option value="">Select One</option>
                                                    <option value="Not Required" <?php if(!empty($jobpost_detail) && $jobpost_detail->required_education == 'Not Required'){ echo "selected='selected'"; } ?>>Not Required</option>
                                                    <option value="intermediate" <?php if(!empty($jobpost_detail) && $jobpost_detail->required_education == 'intermediate'){ echo "selected='selected'"; } ?>>Intermediate</option>
                                                    <option value="bachelor" <?php if(!empty($jobpost_detail) && $jobpost_detail->required_education == 'bachelor'){ echo "selected='selected'"; } ?>>Bachelor</option>
                                                    <option value="master" <?php if(!empty($jobpost_detail) && $jobpost_detail->required_education == 'master'){ echo "selected='selected'"; } ?>>Master</option>
                                                    <option value="phd" <?php if(!empty($jobpost_detail) && $jobpost_detail->required_education == 'phd'){ echo "selected='selected'"; } ?>>PHD</option>
                                                    <option value="other" <?php if(!empty($jobpost_detail) && $jobpost_detail->required_education == 'other'){ echo "selected='selected'"; } ?>>Other</option>
                                                </select>
                                        </div>
                                        <div class="single-input">
                                            <label for="j_title">Expected Faculty :</label>
                                            <input type="text" id="j_title" name="expected_faculty" class="form-control">
                                        </div>
                                    </div>
                                    <div class="single-resume-feild feild-flex-2">
                                        <div class="single-input">
                                            <label for="Location">Is Experience Required:</label>
                                            <select name="exprequire">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="single-input">
                                            <label for="j_type">Experience (In Years):</label>
                                            <select id="j_type" class="form-control" name="noexperience">
                                                <option value=''>Select One</option>
                                                <?php for($e=1;$e<=10;$e++){?>
                                                    <option value="<?php echo $e;?>" <?php if(!empty($jobpost_detail) && $jobpost_detail->noexperience == $e){ echo "selected='selected'"; } ?>><?php echo $e;?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="single-resume-feild feild-flex-2">
                                        <div class="single-input">
                                            <label class="">Job Post Date :<span class="asterisk">*</span></label>
                                            <input type="text" required readonly name="post_date" id='post_date' class="form-control" value='<?php if (!empty($jobpost_detail)) echo $jobpost_detail->post_date; else echo date('Y-m-d'); ?>' title="Click to change post date" />
                                        </div>
                                        <div class="single-input">
                                            <label class="">Apply Before :<span class="asterisk">*</span></label>
                                            <input type="text" required readonly name="applybefore" id='applybefore' class="form-control" value='<?php if (!empty($jobpost_detail)) echo $jobpost_detail->applybefore; ?>' title="Click to change apply before date" />
                                        </div>
                                    </div>



                                    <div class="single-resume-feild">
                                        <div class="single-input">
                                            <label for="j_desc">Job Specification:</label>
                                            <textarea class="textarea" id="j_desc" name="specification"><?php if (!empty($jobpost_detail)) echo $jobpost_detail->specification; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="single-resume-feild">
                                        <div class="single-input">
                                            <label for="j_desc">Job Description:</label>
                                            <textarea class="textarea" id="j_desc" name="requirements"><?php if (!empty($jobpost_detail)) echo $jobpost_detail->requirements; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-resume-feild feild-flex-2">

                                    <div class="single-input">
                                        <label for="Location">Post Status :</label>

                                        <?php
                                        if ($jobpost_detail->post_status == 'disapproved') {
                                            echo 'Admin Disapproved';
                                            echo '<input type="hidden" name="post_status" value="disapproved">';
                                        } else {
                                            ?>
                                            <select class="form-control" name="post_status">
                                                <option
                                                    value="private" <?php if (!empty($jobpost_detail) && $jobpost_detail->post_status == 'private') {
                                                    echo "selected='selected'";
                                                } ?>>Private
                                                </option>
                                                <option
                                                    value="public" <?php if (!empty($jobpost_detail) && $jobpost_detail->post_status == 'public') {
                                                    echo "selected='selected'";
                                                } ?>>Public
                                                </option>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="single-input submit-resume">
                                    <button type="submit">Post Job</button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Candidate Dashboard Area End -->

<script>
    $( function() {

        $( "#applybefore" ).datepicker();
        $( "#applybefore" ).datepicker("option","changeMonth","true");
        $( "#applybefore" ).datepicker("option","changeYear","true");
        $( "#applybefore" ).datepicker( "option", "showAnim", 'clip' );
        $( "#applybefore" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
        $( "#applybefore" ).datepicker("setDate", "<?php echo $applybefore;?>");
        $( "#post_date" ).datepicker();
        $( "#post_date" ).datepicker("option","changeMonth","true");
        $( "#post_date" ).datepicker("option","changeYear","true");
        $( "#post_date" ).datepicker( "option", "showAnim", 'clip' );
        $( "#post_date" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
        $( "#post_date" ).datepicker("setDate", "<?php echo $post_date;?>");
    } );
</script>