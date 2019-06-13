<?php
$nav_arr = array('dashboard');
$user_id = $this->session->userdata('user_id');
//echo $user_id;
if($user_id=='2')
  $nav_arr = array('user','dashboard','content','vacancy','employer','seeker','dropdown','newsletter','banner','client','testimonial','employer_service','service','jobseek_right','article','blog','category');
if($user_id=='3')
  $nav_arr = array('user','dashboard','content','vacancy','employer','dropdown','newsletter','banner','client','testimonial','employer_service','jobseek_right','article');
if($user_id=='4')
  $nav_arr = array('user','dashboard','vacancy','employer','seeker');


//print_r($nav_arr);
if(!in_array($nav, $nav_arr))
{
  echo "Sorry, you are not authorized to access this page.";
  redirect('admin/seeker/not_authorized', 'refresh');
}
/* Check recruiter login 
$identity_2 = $this->session->userdata('identity_2');
$user_id_2 = $this->session->userdata('user_id_2');
//echo $user_id_2.' -- '.$identity_2;
if(isset($user_id_2) && $user_id_2==4 && isset($identity_2) && !empty($identity_2))
{
  $vacancy_link = base_url()."admin/vacancy";
  $seeker_link = base_url()."admin/seeker";
}
else
{  
  $vacancy_link = base_url()."admin/Seeker/check_login?vacancy";
  $seeker_link = base_url()."admin/Seeker/check_login?seeker";
}
*/
/* Check recruiter login ends here */
  $vacancy_link = base_url()."admin/vacancy";
  $seeker_link = base_url()."admin/seeker";
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="background-color: #fff;">
        <div class="pull-left">
          <img src="<?php echo base_url();?>/content_admin/images/logo.jpg" alt="Global Job" width="100%" class="img-responsive">
        </div>
      </div>
      <?php if($user_id<4){?>
      <ul class="sidebar-menu">
        <li class ="<?php if($nav == 'dashboard'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-home"></i><span>DASHBOARD</span></a></li>
        <!--<li class ="<?php /*if($nav == 'content'){ echo 'active'; } */?>"><a href="<?php /*echo base_url(); */?>admin/Content"><i class="fa fa-edit"></i><span>CONTENT</span></a></li>-->
        <li class ="<?php if($nav == 'vacancy'){ echo 'active'; } ?>"><a href="<?php echo $vacancy_link; ?>"><i class="fa fa-bullhorn"></i><span>VACANCY</span></a></li>
        <li class ="<?php if($nav == 'employer'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/employer"><i class="fa fa-user-secret"></i><span>EMPLOYER</span></a></li>
        <?php if($user_id!=3){?>
        <li class ="<?php if($nav == 'seeker'){ echo 'active'; } ?>"><a href="<?php echo $seeker_link; ?>"><i class="fa fa-user"></i><span>JOB SEEKER</span></a></li>
        <?php } ?>
<!--         <li class ="<?php if($nav == 'seeker'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/Seeker/check_login"><i class="fa fa-user"></i><span>JOB SEEKER test</span></a></li>
 -->
        <!-- <li class ="<?php if($nav == 'advertisement'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/Advertisement"><i class="fa fa-hand-o-right"></i><span>RIGHT PORTION</span></a></li> -->
        <li class ="<?php if($nav == 'dropdown'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/dropdown"><i class="fa fa-caret-square-o-down"></i><span>DROP DOWN</span></a></li>
        <!-- <li class ="<?php if($nav == 'newsletter'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/Newsletter"><i class="fa fa-envelope-o"></i><span>NEWSLETTER</span></a></li> -->
        <!--<li class ="<?php if($nav == 'banner'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/Banner"><i class="fa fa-image"></i><span>BANNER</span></a></li>-->
        <!-- <li class ="<?php if($nav == 'banner'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/Slider/listslider/slider"><i class="fa fa-image"></i><span>BANNER</span></a></li>
        <li class ="<?php if($nav == 'client'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/Client"><i class="fa fa-user-secret"></i><span>CLIENTS</span></a></li> -->
        <!-- <li class ="<?php if($nav == 'service'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/Service"><i class="fa fa-cogs"></i><span>SERVICES</span></a></li>    -->
        <!-- <li class ="<?php if($nav == 'testimonial'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/Testimonial"><i class="fa fa-comments-o"></i><span>TESTIMONIAL</span></a></li>
<li class ="<?php if($nav == 'jobseek_right'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/JobSeekBanner"><i class="fa fa-file-image-o"></i><span>JOBSEEKER-RIGHT BANNER</span></a></li>
         -->
        <!--<li class ="<?php /*if($nav == 'employer_service'){ echo 'active'; } */?>"><a href="<?php /*echo base_url(); */?>admin/EmployerService"><i class="fa fa-wrench"></i><span>EMPLOYER SERVICE</span></a></li>-->
        <li class ="<?php if($nav == 'service'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/service"><i class="fa fa-wrench"></i><span>SERVICE</span></a></li>

        <!--<li class ="<?php /*if($nav == 'article'){ echo 'active'; } */?>"><a href="<?php /*echo base_url(); */?>admin/Article"><i class="fa fa-newspaper-o"></i> <span>ARTICLE</span></a></li>
-->
        <li class ="<?php if($nav == 'content'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/content"><i class="fa fa-newspaper-o"></i> <span>CONTENT</span></a></li>

          <!-- <li class ="<?php if($nav == 'category'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/blog/category"><i class="fa fa-newspaper-o"></i> <span>BLOG CATEGORY</span></a></li> -->
          <li class ="<?php if($nav == 'blog'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/blog"><i class="fa fa-newspaper-o"></i> <span>BLOG</span></a></li>
      </ul>
      <?php
      }
      else
      {
      ?>
      <ul class="sidebar-menu">
        <li class ="<?php if($nav == 'employer'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/Employer"><i class="fa fa-user-secret"></i><span>EMPLOYER</span></a></li>
        <li class ="<?php if($nav == 'vacancy'){ echo 'active'; } ?>"><a href="<?php echo $vacancy_link; ?>"><i class="fa fa-bullhorn"></i><span>VACANCY</span></a></li>
        <li class ="active"><a href="<?php echo base_url(); ?>admin/Seeker"><i class="fa fa-user"></i><span>JOB SEEKER</span></a></li>
      </ul>
      <?php
      }
      ?>
  </section>
    <!-- /.sidebar -->
</aside>
