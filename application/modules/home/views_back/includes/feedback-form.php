  <div class="jobseeker-left-aside">
        <div class="personal-details clearfix" style="text-align: center;">
            <strong>Post Requirement</strong>
            <?php
                $action = base_url() . 'service/submitExperties';
                $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
                echo form_open($action, $attributes);
            ?>
            <div class="row">
                <div class="col-md-2 col-sm-2">
                </div>
                <div class="col-md-8 col-sm-8">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">You Name :<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                            <input type="text" required name="name" id='name' class="form-control" value='' />
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2">
                </div>
                <div class="col-md-8 col-sm-8">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Company Name :<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                            <input type="text" required name="company_name" id='company_name' class="form-control" value='' />
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2">
                </div>
                <div class="col-md-8 col-sm-8">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Designation :</label>
                            <div class="col-sm-8">
                            <input type="text" name="designation" id='designation' class="form-control" value='' />
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2">
                </div>
                <div class="col-md-8 col-sm-8">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Email :<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                            <input type="email" required name="email" id='email' class="form-control" value='' />
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2">
                </div>
                <div class="col-md-8 col-sm-8">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Address :</label>
                            <div class="col-sm-8">
                            <input type="text" name="address" id='address' class="form-control" value='' />
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2">
                </div>
                <div class="col-md-8 col-sm-8">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Phone :<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                            <input type="text" required name="phone" id='phone' class="form-control" value='' />
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2">
                </div>
                <div class="col-md-8 col-sm-8">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Your Requirement :<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <textarea name="requirement" required cols="45" rows="6" class="form-control" id="requirement"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2">
                </div>
                <div class="col-md-8 col-sm-8">
                     <button class="btn btn-success btn-flat" name="btnsubmit" type="submit">
                       Submit
                    </button>
                </div>
                <div class="col-md-2 col-sm-2">
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
