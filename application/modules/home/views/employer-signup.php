<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->

<!-- Candidate Dashboard Area Start -->
<section class="candidate-dashboard-area section_70">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-lg-8 dashboard-left-border">
                <div class="dashboard-right">
                    <div class="earnings-page-box manage-jobs">
                        <div class="manage-jobs-heading">
                            <h3>Employer Registration</h3>
                        </div>
                        <?php if($message){ ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                <?php echo $message;?> </div>
                        <?php } ?>
                        <div class="new-job-submission">
                            <?php
                            $action =base_url().'employer/registration';
                            $attributes = array('id' => 'employersignup_demo','name'=>'employersignup',);
                            echo form_open_multipart($action, $attributes);
                            ?>
                                <div class="single-login-field">
                                    <input type="text" required name="orgname" value="<?php echo set_value('orgname'); ?>" class="form-control" placeholder="Organization Name" >
                                </div>
                                <div class="single-login-field single-input">
                                    <select name="orgtype" id="orgtype">
                                        <option value="">Select Organization Industry Type</option>
                                        <?php foreach ($org_type as $key => $value) {?>
                                            <option <?php echo set_select('orgtype', $value->id); ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                                <div class="single-login-field">
                                    <input type="text" required name="phone" value="<?php echo set_value('phone'); ?>" class="form-control" placeholder="Organization Contact Number" >
                                </div>
                                <div class="single-login-field">
                                    <input type="email" required name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Organization Email">
                                </div>
                                <div class="single-login-field">
                                    <input type="password" required class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="single-login-field">
                                    <input type="password" required class="form-control" name="confirm_password" placeholder="Confirm Password">
                                </div>
                                <div class="remember-row single-login-field clearfix">
                                    <p class="checkbox remember">
                                        <!--<input class="checkbox-spin" type="checkbox" id="Freelance">-->
                                        <label for="Freelance"><span></span>By clicking on 'Create My Account' below you are agreeing to the</label>
                                    </p>
                                </div>
                                <div class="single-login-field">
                                    <button type="submit">Create an Employer Account</button>
                                </div>
                            <?php echo form_close(); ?>
                            <div class="dont_have">
                                <a href="<?php echo base_url();?>employer/login">Already have an account?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4 ">
                <div class="dashboard-left">

                    <ul class="dashboard-menu">
                        <li><a href="javscript:void(0);"><h3>Great Benifits only on financejobnepal.com</h3></a></li>
                        <li><a href="javscript:void(0);">1.Hightest Candidates flow</a></li>
                        <li><a href="javscript:void(0);">2.Save Your Time, Money and Effort, Focus more on Core Business</a></li>
                        <li><a href="javscript:void(0);">3. First & only finance & Accounts Job Portal in Nepal.</a></li>
                        <li><a href="javscript:void(0);">4. Short listing service by finance & Accounts professionals.</a></li>
                        <li><a href="javscript:void(0);">5. Quick Response</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Candidate Dashboard Area End -->