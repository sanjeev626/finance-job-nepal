<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">


      <div class="row">
      <div class="col-md-2">
      </div>
        <div class="col-md-8">
            <div class="panel-footer">
            
            <a class="btn btn-success btn-sm below_space" href="<?php echo base_url(); ?>admin/Seeker/moveJobToBasket/<?php echo $job_seeker_info->id; ?>"><i class="fa fa-shopping-cart" data-original-title="View Basket"></i> Move To Basket </a>
            <a class="btn btn-success btn-sm below_space" href="<?php echo base_url(); ?>admin/Employer/employerJobList/<?php echo $job_seeker_info->id; ?>"><i class="fa fa-file-text-o" data-original-title="View Basket"></i> Applied Job List </a>
            <?php if(!empty($job_seeker_info->resume) && file_exists(FCPATH.'uploads/resume/'.$job_seeker_info->resume)){ ?>
              <a class="btn btn-success btn-sm below_space" href="<?php echo base_url().'uploads/resume/'.$job_seeker_info->resume;?>" class="link2" target="_blank"><i class="fa fa-edit" data-original-title="View Employer"></i> Download/Open Resume</a>
            <?php } ?>
            <?php if(!empty($job_seeker_info->video_resume_youtube)){ ?>
            <a href="#myModalYoutube" class="btn btn-success btn-sm below_space" data-toggle="modal">Play Video resume</a>
    
            <!-- Modal HTML -->
            <div id="myModalYoutube" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Video resume of <?php echo $job_seeker_info->fname; ?>
                      <?php if(!empty($job_seeker_info->mname)) echo " ".$job_seeker_info->mname; ?>
                      <?php if(!empty($job_seeker_info->lname)) echo " ".$job_seeker_info->lname; ?></h4>
                        </div>
                        <div class="modal-body">
                            <iframe id="cartoonVideo" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $job_seeker_info->video_resume_youtube;?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <button type="button" class="btn btn-success below_space btn-sm delete_seeker" link="<?php echo base_url(); ?>admin/Seeker/deleteSeeker/<?php echo $job_seeker_info->id; ?>" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash tooltips" data-original-title="Delete Job Seeker"></i> Delete</button>

        </div>
          <div class="table-responsive">
            <table class="table table-striped mb30" id="table1" cellspacing="0" width="100%" frame="box">
              <thead>
                <tr style="background-color: #00a65a;">
                  <th width="40%"></th>
                  <th width="40%"> </th>
                  <th width="10%"> </th>
                  <th width="10%"></th>
                </tr>
              </thead>
              <tbody>
  <?php
    $saturation = $this->general_model->getById('dropdown','id',$job_seeker_info->salutation)->dropvalue;
    $nationality = $this->general_model->getById('dropdown','id',$job_seeker_info->nationality);
    if($nationality){
      $nationality = $nationality->dropvalue;
    }
    $expected_salary = $this->general_model->getById('dropdown','id',$job_seeker_info->expsal);
    if($expected_salary){
      $expected_salary = $expected_salary->dropvalue;
    }
     $job_type1 = '';
     $job_type2 = '';
     $job_type3 = '';
     if(!empty($job_seeker_info->jobtype1)) $job_type1 = $job_seeker_info->jobtype1 .", ";
     if(!empty($job_seeker_info->jobtype2)) $job_type2 = $job_seeker_info->jobtype2 .", ";
     if(!empty($job_seeker_info->jobtype3)) $job_type3 = $job_seeker_info->jobtype3;

    $jobType = $job_type1.''.$job_type2.''.$job_type3;

    $funcarea1 = $this->general_model->getById('dropdown','id',$job_seeker_info->funcarea1);
    if($funcarea1){
      $funcarea1 = $funcarea1->dropvalue;
    }

    $funcarea2 = $this->general_model->getById('dropdown','id',$job_seeker_info->funcarea2);
    if($funcarea2){
      $funcarea2 = $funcarea2->dropvalue;
    }

  ?>
                  <tr>
                    <td colspan="3" class="green-bold"><h3><?php echo $saturation; ?>
                      <?php echo $job_seeker_info->fname; ?>
                      <?php if(!empty($job_seeker_info->mname)) echo " ".$job_seeker_info->mname; ?>
                      <?php if(!empty($job_seeker_info->lname)) echo " ".$job_seeker_info->lname; ?></h3></td>
                    <td> <a class="btn btn-success btn-xs" href="<?php echo base_url(); ?>admin/Seeker/changeActivation/<?php echo $job_seeker_info->id; ?>/<?php echo $job_seeker_info->isActivated; ?>"><?php if($job_seeker_info->isActivated =='1'){ echo "Change to UnActive State"; } else { echo "Change To Active State"; } ?> </a></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Email</td>
                  	<td><?php echo $job_seeker_info->email; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Secondary Email</td>
                  	<td><?php echo $job_seeker_info->email2; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  <td colspan="4"><h3 class="green-bold">Personal Details </h3></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Date of Birth : </td>
                  	<td><?php echo $job_seeker_info->dd .'-'. $job_seeker_info->mm .'-' . $job_seeker_info->yy; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Nationality : </td>
                  	<td><?php echo $nationality; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Phone (Res) :</td>
                  	<td><?php echo $job_seeker_info->phoneres; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Phone (off) :</td>
                  	<td><?php echo $job_seeker_info->phoneoff; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Cell No. :</td>
                  	<td><?php echo $job_seeker_info->phonecell; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Cell No. 2 :</td>
                  	<td><?php echo $job_seeker_info->phonecell2; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Marital Status :</td>
                  	<td><?php echo $job_seeker_info->maritalstatus; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Current Address :</td>
                  	<td><?php echo $job_seeker_info->currentadd; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                    <td class="green-bold">Permanent Address :</td>
                    <td><?php echo $job_seeker_info->permanentadd; ?></td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                  <td colspan="4"><h3 class="green-bold">Experience Details </h3></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Have work experience :</td>
                  	<td><?php echo $job_seeker_info->workexp.', '.$job_seeker_info->expyrs.' years '.$job_seeker_info->expmths.' Months'; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Present Salary :</td>
                  	<td><?php echo $job_seeker_info->preunit.' '.$job_seeker_info->presal; ?>per month (Gross)</td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Expected Salary :</td>
                  	<td><?php echo $job_seeker_info->expunit.' '.$expected_salary; ?>per month (Gross)</td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Looking for :</td>
                  	<td><?php echo $job_seeker_info->joblevel; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Job Type :</td>
                  	<td><?php echo $jobType; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  <td colspan="4"><h3 class="green-bold">Login Details </h3></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Username :</td>
                  	<td><?php echo $job_seeker_info->username; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Password :</td>
                  	<td><button type="button" class="btn btn-success btn-xs change_pass" emp_id="<?php echo $job_seeker_info->id; ?>"data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt tooltips" data-original-title="Change Password"></i> Change Password</button></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  <td colspan="4"><h3 class="green-bold">Preferred Job Category</td>
                  </tr>
                  <tr>
                    <td colspan="4"><h4>First Job Preference</h4></td>
                  </tr>
                  <tr>
                    <td class="green-bold">Funtional Area :</td>
                    <td><?php echo $funcarea2; ?></td>
                    <td></td>
                    <td></td>
                    <tr>
                    <td class="green-bold">Nature of Organization :</td>
                    <td><?php echo $job_seeker_info->natureoforg1; ?></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="4"><h3>Second Job Preference</h3></td>
                  </tr>
                  <tr>
                    <td class="green-bold">Funtional Area : :</td>
                    <td><?php echo $funcarea2; ?></td>
                    <td></td>
                    <td></td>
                    </tr>
                    <tr>
                    <td class="green-bold">Nature of Organization :</td>
                    <td><?php echo $job_seeker_info->natureoforg2; ?></td>
                    <td></td>
                    <td></td>
                  </tr>

                  
                </tbody>
              </table>
            </div><!-- table-responsive -->
          </div><!-- col-md-6 -->
          <div class="col-md-2">
         </div>
        </div>


      </div>
    </div>
    <!-- /.box -->
  </section>


  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title news_title">Change Password</h4>
          <input type="hidden" value="" class="news_id" name="">
        </div>
        <div class="modal-body center">
                 
           <div class="panel-body panel-body-nopadding">
            <?php
             $action = base_url() . 'admin/Seeker/changeSeekerPassword';
       		 $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        	 echo form_open($action, $attributes);
        	?>
		        <div class="form-group">
		            <label class="col-sm-3 control-label">New Password:<span class="asterisk">*</span></label>
		            <div class="col-sm-7">
		                <input type="text" required name="password" id='password' class="form-control" value='' />
		                <input type="hidden"  name="job_id" id='job_id' class="form-control" value='<?php echo $job_seeker_info->id; ?>' />
		            </div>
		        </div>

		        <div class="panel-footer">
		            <div class="row">
		                <div class="col-sm-6 col-sm-offset-5">
		                    <button class="btn btn-success btn-flat" type="submit">
		                        Update Password
		                    </button>&nbsp;
		                </div>
		            </div>
		        </div><!-- panel-footer -->
		        <?php echo form_close(); ?>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

<!-- Delete Modal -->
  <div id="myModalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title green">Are you sure to Delete a Job Seeker ?</h4>
        </div>
        <div class="modal-body center">
           
          <a class="btn btn-success get_link" href="">Yes</a>
          &nbsp; | &nbsp; 
          <button type="button" class="btn btn-success" data-dismiss="modal">No</button>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <script type="text/javascript">
    $('document').ready(function(){
      $('.delete_seeker').on('click',function(){ 
        var link  = $(this).attr('link');
        $('.get_link').attr('href',link); 

      });
    });
  </script>
