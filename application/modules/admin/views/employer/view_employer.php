<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">


      <div class="row">
      <div class="col-md-2">
      </div>
        <div class="col-md-8">
            <div class="panel-footer">
            
            <!--<a class="btn btn-success btn-sm below_space" href="<?php /*echo base_url(); */?>admin/Employer/moveToBasket/<?php /*echo $employer_info->id; */?>"><i class="fa fa-shopping-cart" data-original-title="View Basket"></i> Move To Basket </a>
            <a class="btn btn-success btn-sm below_space" href="<?php /*echo base_url(); */?>admin/Employer/employerJobList/<?php /*echo $employer_info->id; */?>"><i class="fa fa-file-text-o" data-original-title="View Basket"></i> Job List </a>-->
            <a class="btn btn-success btn-sm below_space" href="<?php echo base_url(); ?>admin/employer/edit/<?php echo $employer_info->id; ?>"><i class="fa fa-edit" data-original-title="View Employer"></i> Edit</a>
            <!--<button type="button" class="btn btn-success btn-sm below_space delete_employer" link="<?php /*echo base_url(); */?>admin/Employer/deleteEmployer/<?php /*echo $employer_info->id; */?>" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash tooltips" data-original-title="Delete Employer"></i> Delete</button>-->
        </div>
          <div class="table-responsive">
            <table class="table table-striped mb30" id="table1" cellspacing="0" width="100%" frame="box">
              <thead>
                <tr>
                  <th width="27%"></th>
                  <th width="30%"> </th>
                  <th width="27%"> </th>
                  <th width="30%"></th>
                </tr>
              </thead>
              <tbody>
                
                  <tr>
                    <td colspan="3" class="green-bold"><?php echo $employer_info->orgname; ?></td>
                    <td> <!--<a class="btn btn-success btn-xs" href="<?php /*echo base_url(); */?>admin/Employer/changeCorporate/<?php /*echo $employer_info->id; */?>/<?php /*echo $employer_info->isCorporate; */?>"><?php /*if($employer_info->isCorporate =='No'){ echo "Make Corporate"; } else { echo "Make General"; } */?> </a>--></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Email</td>
                  	<td><?php echo $employer_info->email; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <!--<tr>
                  	<td class="green-bold">Secondary Email</td>
                  	<td><?php /*echo $employer_info->contact_email; */?></td>
                  	<td></td>
                  	<td></td>
                  </tr>-->

                  <tr>
                  <td colspan="4"><h3 class="green-bold">Company Details </h3></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Organization Name : </td>
                  	<td><?php echo $employer_info->orgname; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                      <td class="green-bold">Phone :</td>
                      <td><?php echo $employer_info->organization_phone; ?></td>
                      <td></td>
                      <td></td>
                  </tr>

                  <tr>
                      <td class="green-bold">Address :</td>
                      <td><?php echo $employer_info->organization_address; ?></td>
                      <td></td>
                      <td></td>
                  </tr>

                  <tr>
                      <td class="green-bold">Fax :</td>
                      <td><?php echo $employer_info->organization_fax; ?></td>
                      <td></td>
                      <td></td>
                  </tr>

                  <tr>
                      <td class="green-bold">P.O.Box  :</td>
                      <td><?php echo $employer_info->organization_pobox; ?></td>
                      <td></td>
                      <td></td>
                  </tr>

                  <tr>
                      <td class="green-bold">Website :</td>
                      <td><?php echo $employer_info->organization_website; ?></td>
                      <td></td>
                      <td></td>
                  </tr>

                  <tr>
                      <td class="green-bold">Facebook :</td>
                      <td><?php echo $employer_info->organization_facebook; ?></td>
                      <td></td>
                      <td></td>
                  </tr>

                  <tr>
                      <td class="green-bold">Linkedin :</td>
                      <td><?php echo $employer_info->organization_linkedin; ?></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <?php 
                    /*$natureoforg = '';
                    $natureoforg_arr = $this->general_model->getById('dropdown','id',$employer_info->natureoforg);
                    if(isset($natureoforg_arr) && !empty($natureoforg_arr))
                      $natureoforg = $natureoforg_arr->dropvalue;*/

                    //$organi_type = $this->general_model->getById('dropdown','id',$employer_info->orgtype)->dropvalue;
                    //$ownership = $this->general_model->getById('dropdown','id',$employer_info->ownership)->dropvalue;
                    //$saluts = $this->general_model->getById('dropdown','id',$employer_info->salutation)->dropvalue;
                    $orga_head = $employer_info->contact_name;
                    
                    /*$consatuts='';
                    $consatuts_data = $this->general_model->getById('dropdown','id',$employer_info->consalutation);
                    if(isset($consatuts_data) && !empty($consatuts_data))
                    $consatuts = $consatuts_data->dropvalue;*/

                    //$conc_person = $consatuts." ".$employer_info->confname." ".$employer_info->conmname." ".$employer_info->conlname;
                  ?>

                  <!--<tr>
                  	<td class="green-bold">Nature of Organization : </td>
                  	<td colspan="3"><?php /*echo $natureoforg; */?></td>
                  </tr>
                  <tr>
                  	<td class="green-bold">Organization Type :</td>
                  	<td><?php /*echo $organi_type; */?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Ownership :</td>
                  	<td><?php /*echo $ownership; */?></td>
                  	<td></td>
                  	<td></td>
                  </tr>-->

                  <tr>
                  	<td class="green-bold">Organization Logo:</td>
                  	<td><?php if(!empty($employer_info->organization_logo)){?><img src="<?php echo the_employer_logo($employer_info->organization_logo,'');?>" alt="Logo" style="width: 100px;"><?php } ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                      <td class="green-bold">Organization Banner :</td>
                      <td colspan="3"><?php if(!empty($employer_info->organization_banner)){?><img src="<?php echo the_employer_logo($employer_info->organization_banner,'');?>" alt="banner" style="width: 100%;"><?php } ?></td>

                  </tr>

                  <!--<tr>
                  	<td class="green-bold">Organization Head :</td>
                  	<td><?php /*echo $orga_head; */?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Designation :</td>
                  	<td><?php /*echo $employer_info->contact_designation; */?></td>
                  	<td></td>
                  	<td></td>
                  </tr>-->

                  <tr>
                  <td colspan="4"><h3 class="green-bold">Contact Details </h3></td>
                  </tr>


                  <tr>
                  	<td class="green-bold">Contact Person :</td>
                  	<td><?php echo $employer_info->contact_name; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                      <td class="green-bold">Designation :</td>
                      <td><?php echo $employer_info->contact_designation; ?></td>
                      <td></td>
                      <td></td>
                  </tr>

                  <tr>
                      <td class="green-bold">Phone :</td>
                      <td><?php echo $employer_info->contact_mobile; ?></td>
                      <td></td>
                      <td></td>
                  </tr>

                  <tr>
                  <td colspan="4"><h3 class="green-bold">Login Details </h3></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Username :</td>
                  	<td><?php echo $employer_info->username; ?></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Password :</td>
                  	<td><button type="button" class="btn btn-success btn-xs change_pass" emp_id="<?php echo $employer_info->id; ?>"data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt tooltips" data-original-title="Change Password"></i> Change Password</button></td>
                  	<td></td>
                  	<td></td>
                  </tr>

                  <tr>
                  <td colspan="4"></td>
                  </tr>

                  <tr>
                  	<td class="green-bold">Is Locked :</td>
                  	<td>No</td>
                  	<td class="green-bold">Is Registered</td>
                  	<td>Yes</td>
                  </tr>

                  <tr>

                  	<td class="green-bold">Membership Date</td>
                  	<td><?php echo $employer_info->date_created; ?></td>
                      <td class="green-bold">&nbsp;</td>
                      <td><?php //echo $employer_info->date_modified; ?></td>
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
             $action = base_url() . 'admin/Employer/changeEmployerPassword';
       		 $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        	 echo form_open($action, $attributes);
        	?>
		        <div class="form-group">
		            <label class="col-sm-3 control-label">New Password:<span class="asterisk">*</span></label>
		            <div class="col-sm-7">
		                <input type="text" required name="password" id='password' class="form-control" value='' />
		                <input type="hidden"  name="emp_id" id='emp_id' class="form-control" value='<?php echo $employer_info->id; ?>' />
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
          <h4 class="modal-title green">Are you sure to Delete a Employer ?</h4>
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
      $('.delete_employer').on('click',function(){ 
        var link  = $(this).attr('link');
        $('.get_link').attr('href',link); 

      });
    });
  </script>