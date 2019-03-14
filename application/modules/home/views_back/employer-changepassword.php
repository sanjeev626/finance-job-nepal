<?php $this->load->view('includes/header');?>

<!-- body start -->

<section class="seekerlogin clearfix">
        <div class="col-md-6">
            <div class="container">
                <div class="row">
                    <div class="seekerlogin-left">
                        <div class="col-md-offset-2 col-md-8">
                            <div class="seekerlogin-wrap">
                                <?php $this->load->view('admin/common/flash_message'); ?>
                                <h3>Log in</h3>
                                <div class="forms">
                                    <?php
                                      $action =base_url().'Employer/resetEmployerPassword';
                                      $attributes = array('name'=>'employerlogin',);
                                      echo form_open_multipart($action, $attributes);
                                    ?>
                                    <form action="" method="get" name="register">
                                        <div class="form-group email">
                                            <input type="password" required class="form-control" id="password" placeholder="New Password" name="password">
                                            <input type="hidden" value="<?php echo $token;?>" name="token">
                                        </div>
                                        <div class="form-group email">
                                            <input type="password" required class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
                                        </div>
                                        <button type="submit" class="btn btn-info">Sign in</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="em-login-right">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="query">
                                    <h4>For Query:</h4>
                                    <ul>
                                        <li>
                                            <strong>Suman sharma</strong>
                                            <p>Marketing Executive</p>
                                            <div class="ph-link">
                                                <p>Mobile:</p>
                                                <a class="phone" href="callto:+977 9818101010">+977 9818101010</a>
                                            </div>
                                            <div class="ph-link">
                                                <p>Email:</p>
                                                <a class="email" href="emailto:info@company.com.np">info@company.com.np</a>
                                            </div>
                                        </li>
                                        <li>
                                            <strong>Ujwal dhakal</strong>
                                            <p>Marketing Executive</p>
                                            <div class="ph-link">
                                                <p>Mobile:</p>
                                                <a class="phone" href="callto:+977 9818101010">+977 9818101010</a>
                                            </div>
                                            <div class="ph-link">
                                                <p>Email:</p>
                                                <a class="email" href="emailto:info@company.com.np">info@company.com.np</a>
                                            </div>
                                        </li>
                                        <li>
                                            <strong>Global jobs.com</strong>
                                            <p>kathmandu Plaza, Kamaladi </p>
                                            <div class="ph-link">
                                                <p>Mobile:</p>
                                                <a class="phone" href="callto:+977 9818101010">+977 9818101010</a>
                                            </div>
                                            <div class="ph-link">
                                                <p>Email:</p>
                                                <a class="email" href="emailto:info@company.com.np">info@company.com.np</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="leave-message">
                                    <h4>Leave Us a Message</h4>
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label>Contact Person</label>
                                            <input type="text" name="Perason" class="form-control" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" name="Company Name" class="form-control" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="Email" class="form-control" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Phon</label>
                                            <input type="text" name="Company Name" class="form-control" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="form-control" rows="3" placeholder="" required=""></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-default" role="button" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<div id="myModalPassword" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title green">Employer Forget Password</h4>
        </div>
        <div class="modal-body center">
           <span>Please provide us your Email Address and we will send your user authentication.</span>
          <br><br>

            <?php
            $action = base_url() . 'Employer/forgetPassword/';
            $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
            echo form_open($action, $attributes);
            ?>
            <div class="form-group">
            <label class="col-sm-3 control-label">Email :<span class="asterisk">*</span></label>
                <div class="col-sm-7">
                    <input type="text" required name="email" id='email' class="form-control" value='' />
                </div>
            </div>
            <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <button class="btn btn-success btn-flat" type="submit">
                       Submit
                    </button>&nbsp;
                </div>
            </div>
        </div><!-- panel-footer -->
        <?php echo form_close(); ?>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

<!-- right-aside start -->


<!-- body end -->

<?php $this->load->view('includes/footer');?>
