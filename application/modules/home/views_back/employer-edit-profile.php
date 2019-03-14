<div class="col-md-9 login-contains"> 
  
  <!-- Tab panes -->
  
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="My-Profile">
      <h3>Company Detail</h3>
    <?php
    $action =base_url().'Employer/updateEmployerProfile';    
    $attributes = array('class' => 'form-horizontal user-logIn','name'=>'employersignup',);    
    echo form_open_multipart($action, $attributes);    
    ?>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Email :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="email" value="<?php if (!empty($employerInfo)) echo $employerInfo->email; ?>" name="email" placeholder="Email" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Secondary Email :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="email2" value="<?php if (!empty($employerInfo)) echo $employerInfo->email2; ?>" name="email2" placeholder="Secondary Email" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Organization Name :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="orgname" value="<?php if (!empty($employerInfo)) echo $employerInfo->orgname; ?>" name="orgname" placeholder="Organization Name" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group clearfix">
        <label class="col-sm-3 control-label">No of Employees </label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-12">
              <select class="form-control" name="no_of_employees" >
                <option value="0-10"  <?php if(!empty($employerInfo) && $employerInfo->no_of_employees == '0-10'){ echo "selected='selected'"; } ?>>0-10</option>
                <option value="11-50"  <?php if(!empty($employerInfo) && $employerInfo->no_of_employees == '11-50'){ echo "selected='selected'"; } ?>>11-50</option>
                <option value="51-100"  <?php if(!empty($employerInfo) && $employerInfo->no_of_employees == '51-100'){ echo "selected='selected'"; } ?>>51-100</option>
                <option value="101-250"  <?php if(!empty($employerInfo) && $employerInfo->no_of_employees == '101-250'){ echo "selected='selected'"; } ?>>101-250</option>
                <option value="251-1000"  <?php if(!empty($employerInfo) && $employerInfo->no_of_employees == '251-1000'){ echo "selected='selected'"; } ?>>251-1000</option>
                <option value="1000+"  <?php if(!empty($employerInfo) && $employerInfo->no_of_employees == '1000+'){ echo "selected='selected'"; } ?>>1000 or more</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="Keyskill" class="col-sm-3 control-label">Profile :</label>
        <div class="col-sm-9">
          <textarea class="form-control" rows="4" name="orgdesc" placeholder="Profile"><?php if (!empty($employerInfo)) echo $employerInfo->orgdesc; ?>
</textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Nature of Organization :</label>
        <div class="col-sm-9">          
          <div class="row">
            <div class="col-sm-12">
              <select class="form-control" name="natureoforg" >
                <?php foreach ($nature_of_organisation as $key => $value) {?>
                <option <?php if(!empty($employerInfo) && $employerInfo->natureoforg == $value->id){ echo "selected='selected'"; } ?> <?php echo set_select('natureoforg', $value->id); ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                <?php  } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3">Organization Type :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-12">
              <select class="form-control" name="orgtype" >
                <?php foreach ($org_type as $key => $value) {?>
                <option <?php if(!empty($employerInfo) && $employerInfo->orgtype == $value->id){ echo "selected='selected'"; } ?> <?php echo set_select('orgtype', $value->id); ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                <?php  } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3">Ownership :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-12">
              <select class="form-control" name="ownership">
                <?php foreach ($ownship as $key => $value) {?>
                <option <?php if(!empty($employerInfo) && $employerInfo->ownership == $value->id){ echo "selected='selected'"; } ?> <?php echo  set_select('ownership', $value->id); ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                <?php  } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Logo Image :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <?php if (!empty($employerInfo) && isset($employerInfo->logo)) { ?>
              <input type="hidden" value="<?php echo $employerInfo->logo; ?>" name="logo">
              <div style="padding-top:10px;"><img height="20%" width="20%" src="<?php echo base_url() . 'uploads/employer/' . $employerInfo->logo; ?>"></div>
              <?php } ?>
              <input type="file" id="logo" name="logo" placeholder="Logo" class="form-control" autofocus>
              <span class="green">(Max file size 500 kb)</span>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Banner Image :<!-- <span class="asterisk">*</span> --></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <?php if (!empty($employerInfo) && isset($employerInfo->banner_image)) { ?>
              <input type="hidden" value="<?php echo $employerInfo->banner_image; ?>" name="banner">
              <div style="padding-top:10px;"><img height="20%" width="20%" src="<?php echo base_url() . 'uploads/employer/' . $employerInfo->banner_image; ?>"></div>
              <?php } ?>
              <input type="file" id="banner" name="banner" placeholder="Banner Image" class="form-control" autofocus>
              <span class="green">(Image resolution for Banner must be 1350px X 260px for best view)</span>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Organization Head :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-3">
              <select id="country" class="form-control" name="salutation">
                <?php foreach ($salutation as $key => $value) {?>
                <option <?php if(!empty($employerInfo) && $employerInfo->salutation == $value->id){ echo "selected='selected'"; } ?> <?php echo  set_select('salutation',$value->id); ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                <?php  } ?>
              </select>
            </div>
            <div class="col-md-3">
              <input type="text" id="firstName" value="<?php if (!empty($employerInfo)) echo $employerInfo->fname; ?>" name="fname" placeholder="First Name" class="form-control" autofocus>
            </div>
            <div class="col-md-3">
              <input type="text" id="MiddleName" value="<?php if (!empty($employerInfo)) echo $employerInfo->mname; ?>" name="mname" placeholder="Middle Name" class="form-control" autofocus>
            </div>
            <div class="col-md-3">
              <input type="text" id="lastName" value="<?php if (!empty($employerInfo)) echo $employerInfo->lname; ?>" name="lname" placeholder="Last Name" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Designation :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="designation" value="<?php if (!empty($employerInfo)) echo $employerInfo->designation; ?>" name="designation" placeholder="Designation" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <h3>Contact Detail</h3>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Address :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="address" value="<?php if (!empty($employerInfo)) echo $employerInfo->address; ?>" name="address" placeholder="Address" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Phone :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="phone" value="<?php if (!empty($employerInfo)) echo $employerInfo->phone; ?>" name="phone" placeholder="Phone" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Fax :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="fax" value="<?php if (!empty($employerInfo)) echo $employerInfo->fax; ?>" name="fax" placeholder="Fax" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">P.O.Box :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="pobox" value="<?php if (!empty($employerInfo)) echo $employerInfo->pobox; ?>" name="pobox" placeholder="P.O.Box" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Websites :</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="website" value="<?php if (!empty($employerInfo)) echo $employerInfo->website; ?>" name="website" placeholder="Website" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">Contact Person :<span class="asterisk">*</span></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="contactperson" value="<?php if (!empty($employerInfo)) echo $employerInfo->contactperson; ?>" name="contactperson" placeholder="Contact Person" class="form-control" autofocus>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-6">
              <input type="submit" class="btn btn-info" id="submitprofile" value="Update Profile" name="submitprofile" autofocus>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
      </div>
      <?php echo form_close(); ?> <!-- /form -->       
    </div>
  </div>
</div>