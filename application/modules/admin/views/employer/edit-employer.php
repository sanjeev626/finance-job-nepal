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
            <input type="text" required name="orgname" id='orgname' class="form-control" value='<?php if (!empty($employer_detail)) echo $employer_detail->orgname; ?>' />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Email :<span class="asterisk">*</span></label>
        <div class="col-sm-7">
            <input type="email" required name="email" id='email' class="form-control" value='<?php if (!empty($employer_detail)) echo $employer_detail->email; ?>' />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Secondary Email :</label>
        <div class="col-sm-7">
            <input type="text" name="email2" id='email2' class="form-control" value='<?php if (!empty($employer_detail)) echo $employer_detail->email2; ?>' />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Profile :<span class="asterisk">*</span></label>
        <div class="col-sm-7">
            <textarea required rows="5" name="orgdesc" class="form-control" id="orgdesc" >
            <?php 
            if (!empty($employer_detail)) {
                echo $employer_detail->orgdesc;
            }
            ?></textarea>

        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Nature of Organization :</label>
        <div class="col-sm-7">
            <select class="form-control chosen-select" id="natureoforg" name='natureoforg' data-placeholder="Choose Nature of Organization">
                <option value='0'>NONE</option>
                <?php foreach ($nature_of_organization as $key => $value) {?>
                <option value='<?php echo $value->id; ?>' <?php if(!empty($employer_detail) && $employer_detail->natureoforg == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->dropvalue; ?></option>
                <?php  } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
            <label class="col-sm-3 control-label">Organization Type :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <select class="form-control chosen-select" name='orgtype' data-placeholder="Choose a Organisation Type...">
                    <?php foreach ($org_type as $key => $value) {?>
                    <option value='<?php echo $value->id; ?>' <?php if(!empty($employer_detail) && $employer_detail->orgtype == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                </select>
            </div>
    </div>

    <div class="form-group">
            <label class="col-sm-3 control-label">Ownership :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <select class="form-control chosen-select" name='ownership' data-placeholder="Choose a Ownership">
                    <?php foreach ($ownship as $key => $value) {?>
                    <option value='<?php echo $value->id; ?>' <?php if(!empty($employer_detail) && $employer_detail->ownership == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                </select>
            </div>
    </div>

    <div class="form-group">
            <label class="col-sm-3 control-label">Company Logo :</label>
            <div class="col-sm-7">
                <input type="file" name="logo" id='logo' class="form-control" value='<?php if (!empty($employer_detail)) echo $employer_detail->logo; ?>' />
                    <span class="green">(Max file size 50 kb)</span>

                <?php if (!empty($employer_detail) && isset($employer_detail->logo)) { ?>
                    <input type="hidden" value="<?php echo $employer_detail->logo; ?>" name="logo">
                    <div style="padding-top:10px;"><img height="20%" width="20%" src="<?php echo base_url() . 'uploads/employer/' . $employer_detail->logo; ?>"></div>
                <?php } ?>

            </div>
    </div>

    <div class="form-group">
            <label class="col-sm-3 control-label">Organisation Head :<span class="asterisk">*</span></label>
            <div class="col-sm-1">
                <select class="form-control chosen-select below_space" name='salutation' data-placeholder="Choose a Job Category...">
                    <?php foreach ($salutation as $key => $value) {?>
                    <option value='<?php echo $value->id; ?>' <?php if(!empty($employer_detail) && $employer_detail->salutation == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                </select>
            </div>

            <div class="col-sm-2">
               <input type="text" required name="fname" id='fname' class="form-control below_space" value='<?php if (!empty($employer_detail)) echo $employer_detail->fname; ?>' />
            </div>

            <div class="col-sm-2">
               <input type="text"  name="mname" id='mname' class="form-control below_space" value='<?php if (!empty($employer_detail)) echo $employer_detail->mname; ?>' />
            </div>

            <div class="col-sm-2">
                <input type="text" required name="lname" id='lname' class="form-control below_space" value='<?php if (!empty($employer_detail)) echo $employer_detail->lname; ?>' />
            </div>

    </div>

    <div class="form-group">
            <label class="col-sm-3 control-label">Designation :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required  name="designation" id='designation' class="form-control" value='<?php if (!empty($employer_detail)) echo $employer_detail->designation; ?>' />
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
            <label class="col-sm-3 control-label">Address :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required  name="address" id='address' class="form-control" value='<?php if (!empty($employer_detail)) echo $employer_detail->address; ?>' />
            </div>
    </div>

    <div class="form-group">
            <label class="col-sm-3 control-label">Phone :</label>
            <div class="col-sm-7">
                <input type="text" name="phone" id='phone' class="form-control" value='<?php if (!empty($employer_detail)) echo $employer_detail->phone; ?>' />
            </div>
    </div>

    <div class="form-group">
            <label class="col-sm-3 control-label">Fax :</label>
            <div class="col-sm-7">
                <input type="text"  name="fax" id='fax' class="form-control" value='<?php if (!empty($employer_detail)) echo $employer_detail->fax; ?>' />
            </div>
    </div>

    <div class="form-group">
            <label class="col-sm-3 control-label">P.O.Box :</label>
            <div class="col-sm-7">
                <input type="text" name="pobox" id='pobox' class="form-control" value='<?php if (!empty($employer_detail)) echo $employer_detail->pobox; ?>' />
            </div>
    </div>

    <div class="form-group">
            <label class="col-sm-3 control-label">Website :</label>
            <div class="col-sm-7">
                <input type="text" name="website" id='website' class="form-control" value='<?php if (!empty($employer_detail)) echo $employer_detail->website; ?>' />
            </div>
    </div>

    <div class="form-group">
            <label class="col-sm-3 control-label">Contact Person :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required  name="contactperson" id='contactperson' class="form-control" value='<?php if (!empty($employer_detail)) echo $employer_detail->contactperson; ?>' />
            </div>
    </div>

    <div class="form-group">
            <label class="col-sm-3  control-label">Organisation Head :<span class="asterisk">*</span></label>
            <div class="col-sm-1">
                <select class="form-control chosen-select below_space" name='consalutation' data-placeholder="Choose a Job Category...">
                    <?php foreach ($salutation as $key => $value) {?>
                    <option value='<?php echo $value->id; ?>' <?php if(!empty($employer_detail) && $employer_detail->consalutation == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                </select>
            </div>

            <div class="col-sm-2 below_space">
                <input type="text" required name="confname" id='confname' class="form-control" value='<?php if (!empty($employer_detail)) echo $employer_detail->confname; ?>' />
            </div>

            <div class="col-sm-2 below_space">
                <input type="text"  name="conmname" id='conmname' class="form-control" value='<?php if (!empty($employer_detail)) echo $employer_detail->conmname; ?>' />
            </div>

            <div class="col-sm-2 below_space">
                <input type="text" required name="conlname" id='conlname' class="form-control" value='<?php if (!empty($employer_detail)) echo $employer_detail->conlname; ?>' />
            </div>
    </div>

<div class="panel-footer">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            <button class="btn btn-success btn-flat" type="submit">
                Update Employer
            </button>&nbsp;
        </div>
    </div>
</div><!-- panel-footer -->
<?php echo form_close(); ?>
</div><!-- panel-body -->
</div><!-- panel -->
