 <div class="jobseeker-left-aside">
        <div class="personal-details clearfix" style="text-align: center;">
            <strong>Advance Job Search</strong>
            <?php
                $action = base_url() . 'Search/searchResult';
                $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
                echo form_open($action, $attributes);
            ?>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Job Title:</label>
                            <div class="col-sm-8">
                            <input type="text" name="jobtitle" id='jobtitle' class="form-control" value='' />
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Job Category:</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="jobcategory" >
                                      <?php foreach ($job_category as $key => $value) {?>
                                            <option value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                                     <?php  } ?>
                                </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Job Education:</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="education" >
                                    <option value=''>--Select Job Education--</option>
                                      <?php foreach ($job_education as $key => $value) {?>
                                            <option value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                                     <?php  } ?>
                                </select>
                            </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Job Location:</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="location" >
                                    <option value=''>--Select Job Location--</option>
                                      <?php foreach ($job_location as $key => $value) {?>
                                            <option value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                                     <?php  } ?>
                                </select>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Organisation Type:</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="organizationtype" >
                                    <option value=''>--Select Organisation Type--</option>
                                      <?php foreach ($org_type as $key => $value) {?>
                                            <option value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                                     <?php  } ?>
                                </select>
                            </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Salary Expectation</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="salaryrange" >
                                    <option value=''>--Select Salary Expectation--</option>
                                      <?php foreach ($salary_range as $key => $value) {?>
                                            <option value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                                     <?php  } ?>
                                </select>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">No. of Experience:</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="noexperience" >
                                    <option value=''>--Select No of Experience--</option>
                                      <?php for($e=1;$e<=10;$e++){ ?>
                                            <option value='<?php echo $e;?>'><?php echo $e;?></option>
                                     <?php  } ?>
                                    <option value="10+">10+</option>
                                </select>
                            </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Job Level :</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="joblevel" >
                                    <option value='0'>--Select Job Level--</option>
                                    <option value='Entry Level'>Entry Level</option>
                                    <option value='Mid Level'>Mid Level</option>
                                    <option value='Senior Level'>Senior Level</option>
                                    <option value='Top Level'>Top Level</option>
                                </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Job Type:</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline formsearch-checkbox">
                                  <label class="form-check-label">
                                    <input class="form-check-input" name="jobtype1" type="checkbox" id="jobtype1" value="Full Time"> Full Time
                                  </label>
                                </div>
                                <div class="form-check form-check-inline formsearch-checkbox">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="jobtype2" id="jobtype2" value="Part Time"> Part Time
                                  </label>
                                </div>
                                <div class="form-check form-check-inline formsearch-checkbox">
                                  <label class="form-check-label">
                                    <input class="form-check-input" name="jobtype3" type="checkbox" id="jobtype3" value="Contract"> Contract
                                  </label>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-2 col-sm-2">
                </div>
                <div class="col-md-8 col-sm-8">
                     <button class="btn btn-success btn-flat" name="btnsubmit" type="submit">
                       Search Result
                    </button>
                </div>
                <div class="col-md-2 col-sm-2">
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>

<style>
   .formsearch-checkbox {
            float: left;
            padding-top: 7px;
            padding-right: 25px;
    }
</style>
