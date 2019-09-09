<?php
if (!empty($job_detail)) {
    $action = base_url() . 'admin/vacancy/editvacancy/' . $job_detail->id;
    $post_date = $job_detail->post_date;
    $applybefore = $job_detail->applybefore;
} else {
    $action = base_url() . 'admin/vacancy/addvacancy';
    $post_date = date('Y-m-d');
    $applybefore = date('Y-m-d', strtotime("+30 days"));
}
?>


<script>
    $(function () {
        $("#applybefore").datepicker();
        $("#applybefore").datepicker("option", "showAnim", 'clip');
        $("#applybefore").datepicker("option", "dateFormat", "yy-mm-dd");
        $("#applybefore").datepicker("setDate", "<?php echo $applybefore;?>");


        $("#post_date").datepicker();
        $("#post_date").datepicker("option", "showAnim", 'clip');
        $("#post_date").datepicker("option", "dateFormat", 'yy-mm-dd');
        $("#post_date").datepicker("setDate", "<?php echo $post_date;?>");

    });
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="box box-info">
    <div class="box-header with-border">
        <section class="content-header">
            <h1>
                <?php if (!empty($job_detail)) {
                    echo "Edit Job";
                } else {
                    echo "Add Job";
                } ?>
            </h1>
        </section>
    </div>
    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open_multipart($action, $attributes);
        ?>

        <!--Display in-->
        <div class="form-group">
            <label class="col-sm-3 control-label">Display In :</label>

            <div class="col-sm-7">
                <div class="radio">

                    <?php
                    if (!empty($job_detail->isNewspaperJob))
                        $isNewspaperJob_arr = unserialize($job_detail->isNewspaperJob);
                    else
                        $isNewspaperJob_arr = array();
                    ?>

                    <label>
                        <input type="checkbox" name="isNewspaperJob[]" id="RJob"
                               value="RJob" <?php if (!empty($job_detail) && (!empty($job_detail->isNewspaperJob)) && in_array('RJob', $isNewspaperJob_arr)) {
                            echo "checked = 'checked'";
                        } elseif (empty($job_detail)) {
                            echo "checked = 'checked'";
                        } ?>>
                        Default
                    </label>
                    &nbsp;

                    <label>
                        <input type="checkbox" name="isNewspaperJob[]" id="FJNJob"
                               value="FJNJob" <?php if (!empty($job_detail) && (!empty($job_detail->isNewspaperJob)) && in_array('FJNJob', $isNewspaperJob_arr)) {
                            echo "checked = 'checked'";
                        } ?>>
                        FJN JOb
                    </label>
                    &nbsp;
                    <label>
                        <input type="checkbox" name="isNewspaperJob[]" id="NJob"
                               value="NJob" <?php if (!empty($job_detail) && (!empty($job_detail->isNewspaperJob)) && in_array('NJob', $isNewspaperJob_arr)) {
                            echo "checked = 'checked'";
                        } ?>>
                        Newspaper Job
                    </label>
            </div>
            </div>
        </div>

        <!--Employer-->
        <div class="form-group">
            <label class="col-sm-3 control-label">Employer: <span class="asterisk">*</span></label>

            <div class="col-sm-7">
                <select class="form-control chosen-select" name='eid' id='eid' data-placeholder="Choose a Employer..."
                        required>
                    <option value=''>Select Employer</option>
                    <?php foreach ($employer as $key => $value) { ?>
                        <option
                            value='<?php echo $value->id; ?>' <?php if (!empty($job_detail) && $job_detail->eid == $value->id) {
                            echo "selected";
                        } ?>><?php echo $value->orgname; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <!--Employer Name-->
        <div class="form-group">
            <label class="col-sm-3 control-label">Employer Name :</label>

            <div class="col-sm-7">
                <input type="text" required name="displayname" id='displayname' class="form-control"
                       value='<?php if (!empty($job_detail)) echo $job_detail->displayname; ?>'/>
            </div>
        </div>

        <!--Company Logo-->
        <div class="form-group">
            <label class="col-sm-3 control-label">Company Logo :</label>

            <div class="col-sm-7">
                <input type="file" name="complogo" id='complogo' class="form-control"
                       value='<?php if (!empty($job_detail)) echo $job_detail->complogo; ?>'/>


                <?php if (!empty($job_detail) && isset($job_detail->complogo) && !empty($job_detail->complogo) && file_exists(FCPATH . 'uploads/employer/' . $job_detail->complogo)) { ?>
                    <input type="hidden" value="<?php echo $job_detail->complogo; ?>" name="complogo">
                    <div style="padding-top:10px;"><img height="20%" width="20%"
                                                        src="<?php echo base_url() . 'uploads/employer/' . $job_detail->complogo; ?>">
                    </div>
                <?php } ?>

            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-bullhorn"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><h3>Job Details</h3></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>

        <!-- job title -->
        <div class="form-group">
            <label class="col-sm-3 control-label">Job Title :<span class="asterisk">*</span></label>

            <div class="col-sm-7">
                <input type="text" required name="jobtitle" id='jobtitle' class="form-control"
                       value='<?php if (!empty($job_detail)) echo $job_detail->jobtitle; ?>'/>
            </div>
        </div>

        <!-- job category -->
        <div class="form-group">
            <label class="col-sm-3 control-label">Job Category :<span class="asterisk">*</span></label>

            <div class="col-sm-7">
                <select class="form-control chosen-select" name='jobcategory'
                        data-placeholder="Choose a Job Category..." required>
                    <option value=''>Select Job Category</option>
                    <?php foreach ($jobcategory as $key => $value) { ?>
                        <option
                            value='<?php echo $value->id; ?>' <?php if (!empty($job_detail) && $job_detail->jobcategory == $value->id) {
                            echo "selected='selected'";
                        } ?>><?php echo $value->dropvalue; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <!-- job location -->
        <div class="form-group">
            <label class="col-sm-3 control-label">Job Location :<span class="asterisk">*</span></label>

            <div class="col-sm-4">
                <?php

                    if (!empty($job_detail->joblocation))
                        $joblocation_arr = unserialize($job_detail->joblocation);
                    else
                        $joblocation_arr = array();

                ?>
                <select class="form-control chosen-select" name='joblocation[]' multiple
                        data-placeholder="Choose a Job Location">
                    <?php foreach ($job_location as $key => $value) {
                        if(!empty($job_detail)){
                            if(!empty($joblocation_arr)&& in_array($value->id, $joblocation_arr)){
                                $checked = "selected='selected";
                            }
                            else{
                                $checked ='';
                            }
                        }
                        else{
                            $checked = '';
                        }

                        ?>
                        <option
                            value='<?php echo $value->id; ?>' <?php echo $checked; ?>><?php echo $value->dropvalue; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <!--Job Type-->
        <div class="form-group">
            <label class="col-sm-3 control-label">Job Type :<span class="asterisk">*</span></label>

            <div class="col-sm-7">
                <div class="checkbox">

                    <?php

                    if (!empty($job_detail->jobtype))
                        $jobtype_arr = unserialize($job_detail->jobtype);
                    else
                        $jobtype_arr = array();

                    ?>
                    <?php foreach ($jobtype as $key => $value) {
                        if(!empty($job_detail)){
                            if(!empty($jobtype_arr)&& in_array($value->id, $jobtype_arr)){
                                $checked = "checked = 'checked'";
                            }
                            else{
                                $checked ='';
                            }
                        }
                        else{
                            $checked = '';
                        }

                        ?>
                        <label>
                            <input type="checkbox" name="jobtype[]" id="jobtype"
                                   value="<?php echo $value->id ?>" <?php echo $checked ?> >
                            <?php echo $value->dropvalue; ?>
                        </label>

                    <?php } ?>


                    <!-- <label>
              <input type="checkbox" name="jobtype1" id="jobtype1" value="Full Time" checked="checked">
              Full Time
            </label>
            &nbsp;&nbsp;
            <label>
              <input type="checkbox" name="jobtype2" id="jobtype2" value="Part Time" <?php /*if(!empty($job_detail) && $job_detail->jobtype2 == 'Part Time'){ echo "checked='checked'"; } */ ?>>
             Part Time
            </label>
            &nbsp;&nbsp;
            <label>
              <input type="checkbox" name="jobtype3" id="jobtype3" value="Contract" <?php /*if(!empty($job_detail) && $job_detail->jobtype3 == 'Contract'){ echo "checked='checked'"; } */ ?>>
              Contract
            </label>
            &nbsp;&nbsp;
            <label>
              <input type="checkbox" name="jobtype4" id="jobtype4" value="Others" <?php /*if(!empty($job_detail) && $job_detail->jobtype4 == 'Others'){ echo "checked='checked'"; } */ ?>>
              Any Others
            </label>-->
                </div>
            </div>
        </div>

        <!-- preferred gender -->
        <div class="form-group">
            <label class="col-sm-3 control-label">Preferred Gender :<span class="asterisk">*</span></label>

            <div class="col-sm-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="preferredgender" id="preferredgender" value="Male" checked="checked">
                        Male
                    </label>
                    &nbsp;&nbsp;
                    <label>
                        <input type="radio" name="preferredgender" id="preferredgender"
                               value="Female" <?php if (!empty($job_detail) && $job_detail->preferredgender == 'Female') {
                            echo "checked='checked'";
                        } ?>>
                        Female
                    </label>
                    &nbsp;&nbsp;
                    <label>
                        <input type="radio" name="preferredgender" id="preferredgender"
                               value="Male/Female" <?php if (!empty($job_detail) && $job_detail->preferredgender == 'Male/Female') {
                            echo "checked='checked'";
                        } ?>>
                        Male/Female
                    </label>
                </div>
            </div>
        </div>

        <!-- required no -->
        <div class="form-group">
            <label class="col-sm-3 control-label">Required No. :<span class="asterisk">*</span></label>

            <div class="col-sm-7">
                <input type="text" required name="requiredno" id='requiredno' class="form-control"
                       value='<?php if (!empty($job_detail)) echo $job_detail->requiredno; ?>'/>
            </div>
        </div>

        <!--Job Level-->
        <div class="form-group">
            <label class="col-sm-3 control-label">Job Level :<span class="asterisk">*</span></label>

            <div class="col-sm-7">
                <div class="radio">

                    <?php foreach ($joblevel as $key => $value) { ?>
                        <label>
                            <input type="radio" name="joblevel" id="joblevel"
                                   value="<?php echo $value->id ?>" <?php if (!empty($job_detail) && $job_detail->joblevel == $value->id) {
                                echo "checked='checked'";
                            } ?>>
                            <?php echo $value->dropvalue; ?>
                        </label>

                    <?php } ?>


                </div>
            </div>
        </div>

        <!--Salary Range-->
        <div class="form-group">
            <label class="col-sm-3 control-label">Salary Range :<span class="asterisk">*</span></label>

            <div class="col-sm-2">
                <select class="form-control chosen-select" name='salaryrange' data-placeholder="Choose a Salary Range">
                    <?php foreach ($salary_range as $key => $value) { ?>
                        <option
                            value='<?php echo $value->id; ?>' <?php if (!empty($job_detail) && $job_detail->salaryrange == $value->id) {
                            echo "selected='selected'";
                        } ?>><?php echo $value->dropvalue; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <!--Job post date-->
        <div class="form-group">
            <label class="col-sm-3 control-label">Job Post Date :<span class="asterisk">*</span></label>

            <div class="col-sm-3">
                <input type="text" required readonly name="post_date" id='post_date' class="form-control"
                       value='<?php if (!empty($job_detail)) echo $job_detail->post_date; else echo date('Y-m-d'); ?>'
                       title="Click to change post date"/>
            </div>
        </div>

        <!--Apply before-->
        <div class="form-group">
            <label class="col-sm-3 control-label">Apply Before :<span class="asterisk">*</span></label>

            <div class="col-sm-3">
                <input type="text" required readonly name="applybefore" id='applybefore' class="form-control"
                       value='<?php if (!empty($job_detail)) echo $job_detail->applybefore; ?>'
                       title="Click to change apply before date"/>
            </div>
        </div>



        <!--No of experience-->
        <div class="form-group">
            <label class="col-sm-3 control-label">No. of Experience :<span class="asterisk">*</span></label>

            <div class="col-sm-2">
                <select class="form-control chosen-select" name='noexperience'
                        data-placeholder="Choose a No of Experience">
                    <option value='Not Required'>Not Required</option>
                    <?php for ($exp = 1; $exp <= 10; $exp++) { ?>
                        <option
                            value='<?php echo $exp; ?>' <?php if (!empty($job_detail) && $job_detail->noexperience == $exp) {
                            echo "selected='selected'";
                        } ?>><?php echo $exp; ?></option>
                    <?php } ?>
                    <option value='10+'>10+</option>
                </select>
            </div>
        </div>






        <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-file-text-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><h3>Education Qualification</h3></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>

        <!--Required Education-->
        <div class="form-group">
            <label class="control-label col-sm-3">Required Education :<span class="asterisk">*</span></label>

            <div class="col-sm-7">
                <div class="row">
                    <div class="col-sm-12">
                        <select class="form-control" name="required_education" id="required_education">
                            <option value="">Select One</option>
                            <option
                                value="Not Required" <?php if (!empty($job_detail) && $job_detail->required_education == 'Not Required') {
                                echo "selected='selected'";
                            } ?>>Not Required
                            </option>
                            <option
                                value="intermediate" <?php if (!empty($job_detail) && $job_detail->required_education == 'intermediate') {
                                echo "selected='selected'";
                            } ?>>Intermediate
                            </option>
                            <option
                                value="bachelor" <?php if (!empty($job_detail) && $job_detail->required_education == 'bachelor') {
                                echo "selected='selected'";
                            } ?>>Bachelor
                            </option>
                            <option
                                value="master" <?php if (!empty($job_detail) && $job_detail->required_education == 'master') {
                                echo "selected='selected'";
                            } ?>>Master
                            </option>
                            <option
                                value="other" <?php if (!empty($job_detail) && $job_detail->required_education == 'other') {
                                echo "selected='selected'";
                            } ?>>Other
                            </option>
                        </select>

                        <div
                            id="other_faculty_section" <?php if (!empty($job_detail) && $job_detail->required_education == 'other') { /* do nothing */
                        } else  echo 'style="display:none;"'; ?>>
                            <br>
                            <input type="text" id="other_faculty" name="other_faculty"
                                   value="<?php if (!empty($job_detail)) echo $job_detail->other_faculty; ?>"
                                   class="form-control" placeholder="Other Faculty">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Expeted Faculty-->
        <div class="form-group">
            <label class="col-sm-3 control-label">Expected Faculty :</label>

            <div class="col-sm-7">
                <input type="text" name="expected_faculty" id='expected_faculty' class="form-control"
                       value='<?php if (!empty($job_detail)) echo $job_detail->expected_faculty; ?>'/>
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-file-text-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><h3>Job Requirement</h3></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>

        <!--Job specification-->
        <div class="form-group">
            <label class="col-sm-3 control-label">Job Specification:</label>
            <div class="col-sm-7">
                <textarea rows="5" name="specification" class="form-control" id="specification"><?php
                    if (!empty($job_detail)) {
                        echo $job_detail->specification;
                    }
                    ?></textarea>
            </div>
        </div>

        <!--Job Description-->
        <div class="form-group">
            <label class="col-sm-3 control-label">Job Description:</label>

            <div class="col-sm-7">
                <textarea rows="5" name="requirements" class="form-control" id="requirements"><?php
                    if (!empty($job_detail)) {
                        echo $job_detail->requirements;
                    }
                    ?></textarea>
            </div>
        </div>

        <!--Post Status-->
        <div class="form-group">
            <label class="control-label col-sm-3">Post Status :</label>

            <div class="col-sm-7">
                <div class="row">
                    <div class="col-sm-12">
                        <select class="form-control" name="post_status">
                            <option
                                value="private" <?php if (!empty($job_detail) && $job_detail->post_status == 'private') {
                                echo "selected='selected'";
                            } ?>>Private
                            </option>
                            <option
                                value="public" <?php if (!empty($job_detail) && $job_detail->post_status == 'public') {
                                echo "selected='selected'";
                            } ?>>Public
                            </option>
                            <option
                                value="disapproved" <?php if (!empty($job_detail) && $job_detail->post_status == 'disapproved') {
                                echo "selected='selected'";
                            } ?>>Admin Disapproved
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-3">&nbsp;</label>

            <div class="col-sm-7">
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-success btn-flat" type="submit">
                            <?php
                            if (!empty($job_detail)) {
                                echo 'Update Job';
                            } else {
                                echo 'Add Job';
                            }
                            ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!-- panel-footer -->
        <input type="hidden" name="postedin" id='postedin' value=''/>

        <?php echo form_close(); ?>
    </div>
    <!-- panel-body -->
</div><!-- panel -->


<script type="text/javascript">
    function checkpobox(value) {
        if (value == 'Yes') {
            document.getElementById('postbox').style.display = 'block';
        }
        if (value == 'No') {
            document.getElementById('postbox').style.display = 'none';
            $('#pobox').val('');
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {

        $("#required_education").change(function () {
            var faculty = $("#required_education").val();

            if (faculty == "other") {
                $("#other_faculty").val("");
                $('#other_faculty_section').show();
            }
            else {
                $("#other_faculty").val("");
                $('#other_faculty_section').hide();
            }

        });

    });
</script>
<script src="https://globaljob.com.np/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="application/javascript">
    $('document').ready(function () {
        tinymce.init({
            selector: ".simple", theme: "modern", height: 200
        });
    });
</script>