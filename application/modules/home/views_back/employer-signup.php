<!-- body start -->
<div>
  <div class="col-md-offset-1 col-md-7 clearfix">
    <?php    
    $action =base_url().'Employer/employerRegistration';    
    $attributes = array('id' => 'employersignup_demo','name'=>'employersignup',);    
    echo form_open_multipart($action, $attributes);    
    ?>
    <div class="jobseeker-left-aside">
      <div class="title">
        <h1>Employer Registration Form</h1>
        <p>The recruiting companies can post their requirement in this section for various vacant posts in their organization. Submit your various requirements for the post you are offering to the candidates so that they can reach the target quickly. To Start your online recruitment process, you have to fill in the minimum mandatory details in the form below to proceed.</p>
      </div>
      <?php if($message){ ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $message;?> </div>
      <?php } ?>
      <div class="personal-details clearfix"> <strong>Employer Details</strong>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Organization Name<span class="asterisk">*</span></label>
              <input type="text" required name="orgname" value="<?php echo set_value('orgname'); ?>" class="form-control" placeholder="" >
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>No of Employees </label>
              <div class="styled-select">
                <select class="form-control" name="no_of_employees" >
                  <option value="0-10">0-10</option>
                  <option value="11-50">11-50</option>
                  <option value="51-100">51-100</option>
                  <option value="101-250">101-250</option>
                  <option value="251-1000">251-1000</option>
                  <option value="1000+">1000 or more</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Nature of Organisation</label>              
              <div class="styled-select">
                <select class="form-control" name="orgtype" >
                  <?php foreach ($nature_of_organisation as $key => $value) {?>
                  <option <?php echo set_select('natureoforg', $value->id); ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                  <?php  } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Organization Type<span class="asterisk">*</span></label>
              <div class="styled-select">
                <select class="form-control" name="orgtype" >
                  <?php foreach ($org_type as $key => $value) {?>
                  <option <?php echo set_select('orgtype', $value->id); ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                  <?php  } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Ownership<span class="asterisk">*</span></label>
              <div class="styled-select">
                <select class="form-control" name="ownership">
                  <?php foreach ($ownship as $key => $value) {?>
                  <option <?php echo  set_select('ownership', $value->id); ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                  <?php  } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group upload clearfix">
              <label class="control-label">Company Profile</label>
              <textarea name="orgdesc" class="form-control" cols="4"><?php echo set_value('orgdesc'); ?></textarea>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group upload clearfix">
              <label class="control-label">Company Logo <span class="asterisk">*</span></label>
              <input type="file" name="logo[]" id='logo[]' class="form-control" value='' />
              <p style="color:green" class="help-block">(Max file size:500KB)</p>
            </div>
          </div>
          <div class="col-md-12"><label>Organization Head's Details</label><span class="asterisk">*</span>
            <div class="row">
              <div class="clearfix">
                <div class="col-md-2 col-sm-2">
                  <div class="form-group clearfix">
                    <div class="styled-select">
                      <select class="form-control" name="salutation">
                        <?php foreach ($salutation as $key => $value) {?>
                        <option <?php echo  set_select('salutation',$value->id); ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-10 col-sm-10">
                  <div class="row">
                    <div class="col-md-4 col-sm-4">
                      <div class="form-group clearfix">
                        <input type="text" required name="fname" class="form-control" placeholder="First Name" value="<?php echo set_value('fname'); ?>">
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                      <div class="form-group clearfix">
                        <input type="text" name="mname" class="form-control" placeholder="Mid Name" value="<?php echo set_value('mname'); ?>">
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                      <div class="form-group clearfix">
                        <input type="text" required  name="lname" class="form-control" placeholder="Last Name" value="<?php echo set_value('lname'); ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="form-group clearfix">
                    <input type="text" name="designation" class="form-control" placeholder="Designation" value="<?php echo set_value('designation'); ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="personal-details clearfix"> <strong>Contact Details</strong>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Address<span class="asterisk">*</span></label>
              <input type="text" required name="address" value="<?php echo set_value('address'); ?>" class="form-control" placeholder="" >
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Phone<span class="asterisk">*</span></label>
              <input type="text" required name="phone" value="<?php echo set_value('phone'); ?>" class="form-control" placeholder="" >
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Fax</label>
              <input type="text" name="fax" value="<?php echo set_value('fax'); ?>" class="form-control" placeholder="" >
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>P.O.Box No.</label>
              <input type="text" name="pobox" value="<?php echo set_value('pobox'); ?>" class="form-control" placeholder="" >
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Email<span class="asterisk">*</span></label>
              <input type="email" required name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="">
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Contact Person<span class="asterisk">*</span></label>
              <input type="text" required name="contactperson" value="<?php echo set_value('contactperson'); ?>" class="form-control" placeholder="">
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Secondary Email</label>
              <input type="text" name="email2" value="<?php echo set_value('email2'); ?>" class="form-control" placeholder="" >
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Website</label>
              <input type="text" name="website" value="<?php echo set_value('website'); ?>" class="form-control" placeholder="">
            </div>
          </div>
          <!-- <div class="col-md-12"> <span>Organization Head's<span class="asterisk">*</span></span>
            <div class="row">
              <div class="head-detail clearfix">
                <div class="col-md-2 col-sm-2">
                  <div class="form-group clearfix">
                    <div class="styled-select">
                      <select class="form-control" name="consalutation">
                        <?php foreach ($salutation as $key => $value) {?>
                        <option <?php echo  set_select('consalutation',$value->id); ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-10 col-sm-10">
                  <div class="row">
                    <div class="col-md-4 col-sm-4">
                      <div class="form-group clearfix">
                        <input type="text" value="<?php echo set_value('confname'); ?>" name="confname" class="form-control" placeholder="First Name" required>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                      <div class="form-group clearfix">
                        <input type="text" value="<?php echo set_value('conmname'); ?>" name="conmname" class="form-control" placeholder="Mid Name">
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                      <div class="form-group clearfix">
                        <input type="text" value="<?php echo set_value('conlname'); ?>"  name="conlname" class="form-control" placeholder="Last Name" required>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <div class="creat-id clearfix"> <strong>Create ID</strong>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Username<span class="asterisk">*</span></label>
              <input type="text" required value="<?php echo set_value('username'); ?>" class="form-control" name="username" placeholder="">
              <p style="color:green"><b>Note :</b> Minimum Username length must be 5</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Password<span class="asterisk">*</span></label>
              <input type="password" required class="form-control" name="password" placeholder="">
              <p style="color:green"><b>Note :</b> Minimum Password length must be 8</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group clearfix">
              <label>Confirm Password<span class="asterisk">*</span></label>
              <input type="password" required class="form-control" name="confirm_password" placeholder="">
            </div>
            <div class="g-recaptcha" data-sitekey="6Le5HzAUAAAAAPVUFNbZRiswKRSpLP8043ABZpe9"></div>
          </div>
          <div class="col-md-12">
            <p class="term">By clicking on 'Create My Account' below you are agreeing to the<br>
              <a target="_blank" href="<?php echo base_url();?>content/terms-and-condition"> Terms & Conditions</a> and <a target="_blank" href="<?php echo base_url();?>content/privacy-and-policy">Privacy Policy</a> .</p>
            <div class="form-group clearfix">
              <button type="submit" name="submit" class="btn btn-default">Create My Account</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?> </div>
  <div class="col-md-1"> </div>
</div>
<!-- body end -->