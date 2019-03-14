<?php
  $page='';
  if(isset($_GET['vacancy']))
    $page = "vacancy";

  if(isset($_GET['seeker']))
    $page = "seeker";

  $identity_2 = $this->session->userdata('identity_2');
  $user_id_2 = $this->session->userdata('user_id_2');
  //echo $user_id_2.' -- '.$identity_2;
if(isset($user_id_2) && $user_id_2==4 && isset($identity_2) && !empty($identity_2))
{
  echo "You are already logged in. Please Wait...";  
  if($page=="seeker")
    redirect('admin/seeker','refresh');
  elseif($page=="vacancy")
    redirect('admin/vacancy','refresh');
  else          
    redirect('admin/seeker','refresh');
}
?>  
  <div class="login-box">
    <div class="login-box-body">
      <p class="login-box-msg">Use a valid username and password
        to gain access to the jobseeker console.</p>

        <div style="text-align: center;font-size: 18px;padding-bottom: 9px;color: #0db142;font-weight: bold;">
          Jobseeker Access Login
        </div>
        <?php echo form_open("admin/auth/jobseeker_console_login?".$page);?>

        <?php if(isset($message)){ ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $message;?>
        </div> 
        <?php } ?> 

        <div class="form-group has-feedback">
          <?php          
          $identity['name'] = "identity";
          $identity['class'] = "form-control";
          $identity['placeholder'] = "Email/Username";
          echo form_input($identity);
          ?>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <?php
          $password['name'] = "password";
          $password['type'] = "password";
          $password['class'] = "form-control";
          $password['placeholder'] = "Password";
          echo form_input($password);?>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->