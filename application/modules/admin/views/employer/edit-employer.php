<?php
$action = base_url() . 'admin/Employer/editEmployer/' . $employer_detail->id;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <section class="content-header">
            <h1>
                Edit Employer
            </h1>
        </section>
    </div>


    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open_multipart($action, $attributes);
        ?>

        <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-list-alt"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><h3>Company Details</h3></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Organization Name :<span class="asterisk">*</span></label>

            <div class="col-sm-7">
                <input type="text" required name="orgname" id='orgname' class="form-control"
                       value='<?php if (!empty($employer_detail->orgname)) echo $employer_detail->orgname;else echo set_value('orgname') ?>'/>
                <?php echo form_error('orgname'); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Email :</label>

            <div class="col-sm-7">
                <input type="email" readonly name="email" id='email' class="form-control"
                       value='<?php if (!empty($employer_detail->email)) echo $employer_detail->email;else echo set_value('email') ?>'/>
            </div>
        </div>

        <!--<div class="form-group">
        <label class="col-sm-3 control-label">Secondary Email :</label>
        <div class="col-sm-7">
            <input type="text" name="email2" id='email2' class="form-control" value='<?php /*if (!empty($employer_detail)) echo $employer_detail->email2; */ ?>' />
        </div>
    </div>-->

        <div class="form-group">
            <label class="col-sm-3 control-label">Phone :<span class="asterisk">*</span></label>

            <div class="col-sm-7">
                <input type="text"  name="phone" id='phone' class="form-control"
                       value='<?php if (!empty($employer_detail->organization_phone)) echo $employer_detail->organization_phone;else echo set_value('phone') ?>'/>
                <?php echo form_error('phone'); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Address : <span class="asterisk">*</span></label>

            <div class="col-sm-7">
                <input type="text"  name="address" id='address' class="form-control"
                       value='<?php if (!empty($employer_detail->organization_address)) echo $employer_detail->organization_address; else echo set_value('address') ?>'/>
                <?php echo form_error('address'); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Description :<span class="asterisk">*</span></label>

            <div class="col-sm-7">
            <textarea required rows="5" name="orgdesc" class="form-control" id="orgdesc">
            <?php
            if (!empty($employer_detail->organization_description)) {
                echo $employer_detail->organization_description;
            }
            else{
             echo set_value('orgdesc');
            }
            ?></textarea>
                <?php echo form_error('orgdesc'); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Organization Fax :</label>

            <div class="col-sm-7">
                <input type="text" name="fax" id='fax' class="form-control"
                       value='<?php if (!empty($employer_detail->organization_fax)) echo $employer_detail->organization_fax;else echo set_value('fax') ?>'/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Organization P.O.Box :</label>

            <div class="col-sm-7">
                <input type="text" name="pobox" id='pobox' class="form-control"
                       value='<?php if (!empty($employer_detail->organization_pobox)) echo $employer_detail->organization_pobox;else echo set_value('pobox') ?>'/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Organization Website :</label>

            <div class="col-sm-7">
                <input type="text" name="website" id='website' class="form-control"
                       value='<?php if (!empty($employer_detail->organization_website)) echo $employer_detail->organization_website;else echo set_value('website') ?>'/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Organization Facebook :</label>

            <div class="col-sm-7">
                <input type="text" name="facebook" id='facebook' class="form-control"
                       value='<?php if (!empty($employer_detail->organization_facebook)) echo $employer_detail->organization_facebook; else echo set_value('facebook')?>'/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Organization Linkedin :</label>

            <div class="col-sm-7">
                <input type="text" name="linkedin" id='linkedin' class="form-control"
                       value='<?php if (!empty($employer_detail->organization_linkedin)) echo $employer_detail->organization_linkedin;else echo set_value('linkedin') ?>'/>
            </div>
        </div>

        <!--<div class="form-group">
        <label class="col-sm-3 control-label">Nature of Organization :</label>
        <div class="col-sm-7">
            <select class="form-control chosen-select" id="natureoforg" name='natureoforg' data-placeholder="Choose Nature of Organization">
                <option value='0'>NONE</option>
                <?php /*foreach ($nature_of_organization as $key => $value) {*/ ?>
                <option value='<?php /*echo $value->id; */ ?>' <?php /*if(!empty($employer_detail) && $employer_detail->natureoforg == $value->id){ echo "selected='selected'"; } */ ?>><?php /*echo $value->dropvalue; */ ?></option>
                <?php /* } */ ?>
            </select>
        </div>
    </div>-->

        <!--<div class="form-group">
            <label class="col-sm-3 control-label">Organization Type :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <select class="form-control chosen-select" name='orgtype' data-placeholder="Choose a Organisation Type...">
                    <?php /*foreach ($org_type as $key => $value) {*/ ?>
                    <option value='<?php /*echo $value->id; */ ?>' <?php /*if(!empty($employer_detail) && $employer_detail->orgtype == $value->id){ echo "selected='selected'"; } */ ?>><?php /*echo $value->dropvalue; */ ?></option>
                    <?php /* } */ ?>
                </select>
            </div>
    </div>-->

        <!--<div class="form-group">
            <label class="col-sm-3 control-label">Ownership :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <select class="form-control chosen-select" name='ownership' data-placeholder="Choose a Ownership">
                    <?php /*foreach ($ownship as $key => $value) {*/ ?>
                    <option value='<?php /*echo $value->id; */ ?>' <?php /*if(!empty($employer_detail) && $employer_detail->ownership == $value->id){ echo "selected='selected'"; } */ ?>><?php /*echo $value->dropvalue; */ ?></option>
                    <?php /* } */ ?>
                </select>
            </div>
    </div>-->

        <div class="form-group">
            <label class="col-sm-3 control-label">Company Logo :</label>

            <div class="col-sm-7">
                <input type="file" name="logo" id='logo' class="form-control"
                       value='<?php if (!empty($employer_detail)) echo $employer_detail->logo; ?>'/>
                <span class="green">(Max file size 50 kb)</span>

                <?php if (!empty($employer_detail) && isset($employer_detail->organization_logo)) { ?>
                    <input type="hidden" value="<?php echo $employer_detail->organization_logo; ?>" name="logo">
                    <div style="padding-top:10px;"><img height="20%" width="20%"
                                                        src="<?php echo base_url() . 'uploads/employer/' . $employer_detail->organization_logo; ?>">
                    </div>
                <?php } ?>

            </div>
        </div>


        <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-file-text-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><h3>Contact Details</h3></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Contact Person :<span class="asterisk">*</span></label>

            <div class="col-sm-7">
                <input type="text"  name="contactperson" id='contactperson' class="form-control below_space"
                       value='<?php if (!empty($employer_detail->contact_name)) echo $employer_detail->contact_name;else echo set_value('contactperson') ?>'/>
                <?php echo form_error('contactperson'); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Designation :<span class="asterisk">*</span></label>

            <div class="col-sm-7">
                <input type="text"   name="designation" id='designation' class="form-control"
                       value='<?php if (!empty($employer_detail->contact_designation)) echo $employer_detail->contact_designation;else echo set_value('designation') ?>'/>
                <?php echo form_error('designation'); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Contact Person Email :</label>

            <div class="col-sm-7">
                <input type="text" name="contact_email" id='contact_email' class="form-control"
                       value='<?php if (!empty($employer_detail->contact_email)) echo $employer_detail->contact_email;else echo set_value('contact_email') ?>'/>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-3 control-label">Contact Person Mobile :</label>

            <div class="col-sm-7">
                <input type="text" name="contact_mobile" id='contact_mobile' class="form-control"
                       value='<?php if (!empty($employer_detail->contact_mobile)) echo $employer_detail->contact_mobile;else echo set_value('contact_mobile') ?>'/>
            </div>
        </div>


        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <button class="btn btn-success btn-flat" type="submit">
                        Update Employer
                    </button>
                    &nbsp;
                </div>
            </div>
        </div>
        <!-- panel-footer -->
        <?php echo form_close(); ?>
    </div>
    <!-- panel-body -->
</div><!-- panel -->
