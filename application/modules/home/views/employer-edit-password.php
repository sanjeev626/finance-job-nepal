<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->

<!-- Candidate Dashboard Area Start -->
<section class="candidate-dashboard-area section_70">
    <div class="container">
        <div class="row">
            <?php $this->load->view('includes/employer-dashboard-sidebar');?>


            <div class="col-lg-9 col-md-12">
                <div class="dashboard-right">
                    <div class="change-pass manage-jobs">
                        <div class="manage-jobs-heading">
                            <h3>Change Password</h3>
                        </div>
                        <?php

                        $action = base_url() . 'employer/changeemployerpassword';

                        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');

                        echo form_open($action, $attributes);

                        ?>
                            <p>
                                <label for="old_pass">Old Password</label>
                                <input type="password" required name="oldpassword" id='oldpassword' placeholder="Old Password" class="form-control" value='' />
                            </p>
                            <p>
                                <label for="new_pass">New Password</label>
                                <input type="password" required name="password" id='password' placeholder="New Password" class="form-control" value='' />
                            </p>
                            <p>
                                <label for="confirm_pass">Confirm Password</label>
                                <input type="password" required placeholder="Confirm Password" id="confirm_pass" name="confirm_pass" class="form-control" value="">
                            </p>
                            <p>
                                <button type="submit">Update</button>
                            </p>
                        <?php echo form_close(); ?> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Candidate Dashboard Area End -->