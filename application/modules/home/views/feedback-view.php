<div class="col-md-9">
    <div class="normalwrap">
        <div class="normal-title">
            <h2><?php echo $title; ?></h2>
        </div>

   <div class="jobseeker-left-aside" style="border-top: 1px solid #81b524;">
        <div class="personal-details clearfix" style="text-align: center;">
            <strong>If you have further queries please fill up the form below</strong>
            <?php
                $action = base_url() . 'submitFeedback';
                $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
                echo form_open($action, $attributes);
            ?>
            <div class="row">
                <div class="col-md-2 col-sm-2">
                </div>
                <div class="col-md-8 col-sm-8">
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Name :<span class="asterisk">*</span></label>
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
                        <label class="col-sm-4 control-label">Comment :<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <textarea name="comments" required cols="45" rows="6" class="form-control" id="comments"></textarea>
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
                       Submit Feedback
                    </button>
                </div>
                <div class="col-md-2 col-sm-2">
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>

    </div>
</div>
