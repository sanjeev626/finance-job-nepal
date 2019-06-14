<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->
<!-- Login Area Start -->
<section class="fjn-login-area section_15">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box">
                    <div class="login-title">
                        <h3>Change Password</h3>
                        <?php if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                <?php echo $this->session->flashdata('error');?> </div>
                        <?php } ?>

                        <?php if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                <?php echo $this->session->flashdata('success');?> </div>
                        <?php } ?>
                    </div>

                    <?php
                    $action =base_url().'employer/resetemployerpassword';
                    $attributes = array('name'=>'jobseekerlogin',);
                    echo form_open_multipart($action, $attributes);
                    ?>
                    <div class="single-login-field">
                        <input type="password" required class="form-control" id="password" placeholder="New Password" name="password">

                        <input type="hidden" value="<?php echo $token;?>" name="token">
                    </div>
                    <div class="single-login-field">
                        <input type="password" required class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
                    </div>

                    <div class="single-login-field">
                        <button type="submit">Submit</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Login Area End -->