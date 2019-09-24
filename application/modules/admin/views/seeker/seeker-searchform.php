<style>
    .left{float:left}
    .right{float:right}
    .clear{clear: both}
</style>

<?php
$action = base_url() . 'admin/seeker/search';

$attributes = array('class' => 'form-horizontal form-bordered searchform', 'id' => 'form1');
echo form_open_multipart($action, $attributes);
?>
    <div class="form-group">
        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">First Name:</label>
                <div class="col-sm-12">
                    <input type="text" name="fname" placeholder="First Name" id='fname' class="form-control below_space" value='<?php echo isset($fname)?$fname:'';?>'/>
                </div>

            </div>

        </div>
        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Middle Name:</label>
                <div class="col-sm-12">
                    <input type="text" name="mname" placeholder="Middle Name" class="form-control below_space" value="<?php echo isset($mname)?$mname:'';?>">
                </div>

            </div>

        </div>
        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Last Name:</label>
                <div class="col-sm-12">
                    <input type="text" name="lname" placeholder="Last Name" id='lname' class="form-control below_space" value='<?php echo isset($lname)?$lname:'';?>'/>
                </div>

            </div>


        </div>
        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Date of birth(From):</label>
                <div class="col-sm-12">
                    <input type="text" name="dobfrom" placeholder="Date of birth(From)" class="form-control pull-right below_space" id="dobfrom" value="<?php echo isset($dobfrom)?$dobfrom:'';?>">
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Date of birth(To):</label>
                <div class="col-sm-12">
                    <input type="text" name="dobto" placeholder="Date of birth(To)" class="form-control pull-right below_space" id="dobto" value="<?php echo isset($dobto)?$dobto:'';?>">
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Address:</label>
                <div class="col-sm-12">
                    <input type="text" name="address" id='address' placeholder="Address" class="form-control below_space" value='<?php echo isset($address)?$address:'';?>'/>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Contact Number:</label>
                <div class="col-sm-12">
                    <input type="text" name="phone" id='phone' placeholder="Contact Number" class="form-control below_space" value='<?php echo isset($phone)?$phone:'';?>'/>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Email:</label>
                <div class="col-sm-12">
                   <input type="text" name="email" id='email' placeholder="Email" class="form-control below_space" value='<?php echo isset($email)?$email:'';?>'/>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Gender:</label>
                <div class="col-sm-12">
                    <select name="gender" id="" class="form-control below_space">
                        <option value="">--Gender--</option>
                        <option value="Male" <?php echo (isset($gender)&&$gender =='Male')?'selected':'';?>>Male</option>
                        <option value="Female" <?php echo (isset($gender)&&$gender =='Female')?'selected':'';?>>Female</option>
                        <option value="Other" <?php echo (isset($gender)&&$gender =='Other')?'selected':'';?>>other</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">key Skills:</label>
                <div class="col-sm-12">
                    <input type="text" name="keyskills" id='keyskills' placeholder="key Skills" class="form-control below_space" value='<?php echo isset($keyskills)?$keyskills:'';?>'/>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Latest Education:</label>
                <div class="col-sm-12">
                    <input type="text" name="qualification" id='qualification' placeholder="Latest Education" class="form-control below_space"  value='<?php echo isset($qualification)?$qualification:'';?>'/>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Years of Experience:</label>
                <div class="col-sm-12">
                    <input type="text" name="experience_years" placeholder="Years of Experience" class="form-control below_space" value="<?php echo isset($expyrs)?$expyrs:'';?>" >
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Expected Salary:</label>
                <div class="col-sm-12">
                    <select class="form-control below_space chosen-select" name='expsal'
                            data-placeholder="Choose a Excepted Salary">
                        <option value="0">-- Select Expected Salary --</option>
                        <?php foreach ($salary_range as $key => $value) { ?>
                            <option value='<?php echo $value->id; ?>' <?php echo (isset($expsal) && $expsal==$value->id)?'selected':'';?>><?php echo $value->dropvalue; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Organisation Name:</label>
                <div class="col-sm-12">
                    <select class="form-control chosen-select" name='apporg'
                            data-placeholder="Choose a Organisation Name">
                        <option value="0">-- Select Applied Organization --</option>
                        <?php foreach ($applied_organisation as $key => $value) { ?>
                            <option value='<?php echo $value->id; ?>' <?php echo (isset($apporg) && $apporg==$value->id)?'selected':'';?>><?php echo $value->orgname; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Job Title:</label>
                <div class="col-sm-12">
                    <select class="form-control chosen-select" name='jid' data-placeholder="Choose a Job Title">
                        <option value="0">-- Select Job Title --</option>
                        <?php foreach ($job_title as $key => $value) {
                            $empId = $value->eid;
                            $org_name = $this->general_model->getById('employer', 'id', $empId, 'orgname');
                            if ($value->displayname) {
                                $jobTitleOrg = substr($value->displayname, 0, 35);
                            } else {
                                $jobTitleOrg = $org_name->orgname;
                            }
                            ?>
                            <option
                                value='<?php echo $value->id; ?>' <?php echo (isset($jid) && $jid==$value->id)?'selected':'';?>><?php echo substr($value->jobtitle, 0, 20); ?>-- <?php echo $jobTitleOrg; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Registered Date(From):</label>
                <div class="col-sm-12">
                    <input type="text" name="registeredfrom" id="registeredfrom" placeholder="Registered Date(From)" class="form-control below_space" value="<?php echo isset($registeredfrom)?$registeredfrom:'';?>">
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row">
                <label class="col-sm-12 control-label pull-left">Registered Date(To):</label>
                <div class="col-sm-12">
                    <input type="text" name="registeredto" id="registeredto" placeholder="Registered Date(To)" class="form-control below_space" value="<?php echo isset($registeredto)?$registeredto:'';?>">
                </div>
            </div>
        </div>

    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="left">
                <input type="submit" class="btn btn-success btn-flat" name="search" value="Search Job Seeker">
                <!--<button class="btn btn-success btn-flat" type="submit">Search Employer</button>-->
            </div>

            <div class="right">
                <input type="submit" class="btn btn-success btn-flat" name="excel" value="Export Excel">
            </div>
            <div class="clear"></div>
        </div>
    </div>
</form>
