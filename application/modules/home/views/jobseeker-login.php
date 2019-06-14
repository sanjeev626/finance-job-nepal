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
                    $action =base_url().'jobseeker/seekerloginCheck';
                    $attributes = array('name'=>'jobseekerlogin',);
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
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalPassword">
                                    Forgot Password?
                                </a>
                            </p>
                        </div>
                        <div class="single-login-field">
                            <button type="submit">Sign in</button>
                        </div>
                    <?php echo form_close(); ?>
                    <div class="dont_have">
                        <a href="<?php echo base_url();?>jobseeker/signup">Don't have an account?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Login Area End -->

<!-- Modal -->

<div class="modal fade" id="myModalPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Employer Forget Password
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            $action = base_url() . 'jobseeker/forgetpassword/';
            $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
            echo form_open($action, $attributes);
            ?>
            <div class="modal-body center">
                <span>Please provide us your Email Address and we will send your user authentication.</span>
                <br><br>


                <div class="form-group">
                    <label class="control-label">Email*</label>
                    <div>
                        <input type="email" placeholder="Registered Email" required name="email" id='email' class="form-control" value='' />
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button class="btn btn-info btn-flat" type="submit">
                    Submit
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
</div>