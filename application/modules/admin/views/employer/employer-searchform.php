<?php
$action = base_url() . 'admin/Employer/searchEmployer';

$attributes = array('class' => 'form-horizontal form-bordered searchform', 'id' => 'form1');
echo form_open_multipart($action, $attributes);
?>
<div class="form-group">
    <div class="col-md-2">
        <div class="row">
            <label class="col-sm-12 control-label pull-left">Company Name:</label>
            <div class="col-sm-12">
                <input type="text" name="orgname" id='orgname' class="form-control below_space" value='<?php echo isset($orgname)?$orgname:''?>' placeholder="Company Name"/>
            </div>
        </div>

    </div>
    <div class="col-md-2">
        <div class="row">
            <label class="col-sm-12 control-label pull-left">Contact Person:</label>
            <div class="col-sm-12">
                <input type="text" name="contact_name" id='contact_name' placeholder="Contact Person" class="form-control below_space " value='<?php echo isset($contact_name)?$contact_name:''?>'/>
            </div>
        </div>

    </div>
    <div class="col-md-2">
        <div class="row">
            <label class="col-sm-12 control-label pull-left">Address:</label>
            <div class="col-sm-12">
                <input type="text" name="address" id='address' placeholder="Address" class="form-control below_space" value='<?php echo isset($address)?$address:''?>'/>
            </div>
        </div>

    </div>
    <div class="col-md-2">
        <div class="row">
            <label class="col-sm-12 control-label pull-left">Email:</label>
            <div class="col-sm-12">
                <input type="text" name="email" id='email' placeholder="Email" class="form-control below_space" value='<?php echo isset($email)?$email:''?>'/>
            </div>
        </div>

    </div>
    <div class="col-md-2">
        <div class="row">
            <label class="col-sm-12 control-label pull-left">Organisation Type:</label>
            <div class="col-sm-12">
                <select class="form-control below_space chosen-select" name='orgtype'
                        data-placeholder="Choose a Organisation Type">
                    <option value="0">-- Select Organization Type --</option>
                    <?php foreach ($organisation_type as $key => $value) { ?>
                        <option value='<?php echo $value->id; ?>' <?php echo(isset($orgtype)&&($orgtype)==$value->id)?'selected':''?>><?php echo $value->dropvalue; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

    </div>

    <div class="col-md-2">
        <div class="row">
            <label class="col-sm-12 control-label pull-left">Contact Number:</label>
            <div class="col-sm-12">
                <input type="text" name="phone" id='phone' placeholder="Contact Number" class="form-control below_space" value='<?php echo isset($phone)?$phone:''?>'/>
            </div>
        </div>

    </div>
    <div class="col-md-2">
        <div class="row">
            <label class="col-sm-12 control-label pull-left">Website:</label>
            <div class="col-sm-12">
                <input type="text" name="website" id='website' placeholder="Website" class="form-control below_space" value='<?php echo isset($website)?$website:''?>'/>
            </div>
        </div>

    </div>
</div>
<div class="panel-footer">
    <div class="row">
        <div class="">
            <button class="btn btn-success btn-flat" type="submit">Search Employer</button>
        </div>
    </div>
</div>

</form>