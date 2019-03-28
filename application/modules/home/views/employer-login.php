<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->
<!-- Login Area Start -->
<section class="fjn-login-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box">
                    <div class="login-title">
                        <h3>Sign in</h3>

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
                    $action =base_url().'Employer/loginCheck';
                    $attributes = array('name'=>'employerlogin',);
                    echo form_open_multipart($action, $attributes);
                    ?>
                        <div class="single-login-field">
                            <input type="text" required name="username" class="form-control" id="username" placeholder="Email Address" style="border: #EDA851 1px solid;">
                        </div>
                        <div class="single-login-field">
                            <input type="password" required name="password" class="form-control" id="password" placeholder="Password" style="border: #EDA851 1px solid;">
                        </div>
                        <div class="remember-row single-login-field clearfix">
                            <p class="checkbox remember">
                                <input class="checkbox-spin" type="checkbox" id="Freelance">
                                <label for="Freelance"><span></span>Keep Me Signed In</label>
                            </p>
                            <p class="lost-pass">
                                <a href="#">forgot password?</a>
                            </p>
                        </div>
                        <div class="single-login-field">
                            <button type="submit">Sign in</button>
                        </div>
                    <?php echo form_close(); ?>
                    <div class="dont_have">
                        <a href="<?php echo base_url();?>Employer/signup">Don't have an account?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Login Area End -->