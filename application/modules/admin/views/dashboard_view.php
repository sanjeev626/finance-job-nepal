<?php  
/*$identity_2 = $this->session->userdata('identity_2');
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
}*/
 $vacancy_link = base_url()."admin/vacancy/active";
  $seeker_link = base_url()."admin/seeker";
?>
<div class="row">
  <div class="col-md-12">
    <h1>Welcome To Finance Job Nepal.</h1>
  </div>
</div>

<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $total_job; ?></h3>
        <p>Active Vacancies</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-search"></i>
      </div>
      <a href="<?php echo $vacancy_link;?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $total_job_seeker; ?></h3>
        <p>Job Seekers</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-contacts"></i>
      </div>
      <a href="<?php echo $seeker_link;?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $total_employer; ?></h3>
        <p>Employers</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-contact-outline"></i>
      </div>
      <a href="<?php echo base_url(); ?>admin/employer/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>
  <!-- ./col -->
  <!-- <div class="col-lg-3 col-xs-6"> -->
    <!-- small box -->
    <!-- <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $total_clients; ?></h3>
        <p>Clients</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-stalker"></i>
      </div>
      <a href="<?php echo base_url(); ?>admin/Client" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div> -->
  <!-- </div> -->
  <!-- ./col -->
</div>
