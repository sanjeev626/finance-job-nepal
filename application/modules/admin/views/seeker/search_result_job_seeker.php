<?php
$dropdown_length = 60;
?>
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <div class="row">
        <div class="col-md-12">
            <div class="panel-footer">
            <a class="btn btn-success below_space" href="<?php echo base_url(); ?>admin/Seeker/viewJobSekeerBasket"><i class="fa fa-shopping-cart" data-original-title="View Basket"></i> View Basket </a>
            <button type="button" class="btn btn-success below_space" data-toggle="modal" data-target="#myModalSearch"><i class="fa fa-search tooltips" data-original-title="Search Job Client"></i> Search Job Seeker</button>
        </div>
        <span class="text-center"><h3 class="green-bold"><?php if($total_job_seeker>0) echo $total_job_seeker; else echo "No"; ?> Job Seeker Found !!!</h3></span>
          <div class="table-responsive">  
            <?php
            if ($this->uri->segment(4) == NULL) {
              $i = 1;
            } else {
              $i = $this->uri->segment(4) + 1;
            }
            if (!empty($seeker)) { 
              foreach ($seeker as $key): 
              $sid = $key->id;
              $data2['faculty'] = $key->faculty;
              $data2['nationality'] = $key->nationality;
              $data2['sid'] = $sid;
              $data2['key'] = $key;
              $this->load->view('seeker/view_seeker_outline',$data2);
              
              $i++;
              endforeach;
              } else {
              ?>
              <div><center>No Job Seeker matches the search criteria !!!</center>
              </div>
              <?php } ?>

            
           <?php echo $this->pagination->create_links();?>
          </div><!-- col-md-6 -->
        </div>


      </div>
    </div>
    <!-- /.box -->

  </section>


<!-- Modal -->
  <div id="myModalSearch" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Search Job Seeker</h2>
          <input type="hidden" value="" class="news_id" name="">
        </div>
        <div class="modal-body">


      <div class="panel-body panel-body-nopadding">
        <?php
        $action = base_url() . 'admin/Seeker/searchSeeker';

        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open_multipart($action, $attributes);
        ?>

        <div class="form-group">
            <label class="col-sm-3 control-label">Employer Ref No:</label> 
            <div class="col-sm-3">
             <div class="input-group below_space">
              <div class="input-group-addon">From</div>
              <input type="text" name="sid" class="form-control" id="sid" placeholder="123">
            </div> 
            </div>

            <div class="col-sm-3">
             <div class="input-group below_space">
              <div class="input-group-addon">To</div>
              <input type="text" name="sid2" class="form-control" id="sid2" placeholder="456">
            </div> 
            </div>        
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">His/Her Title :</label>
            <div class="col-sm-7">
            <select class="form-control chosen-select" name='salutation' data-placeholder="Choose a Title">
                <option value="0">All</option>
                    <?php foreach ($salutation as $key => $value) {?>
                    <option value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">First Name :</label>
            <div class="col-sm-7">
                <input type="text" name="fname" id='fname' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Last Name :</label>
            <div class="col-sm-7">
                <input type="text" name="lname" id='lname' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
                <label class="col-sm-3 control-label">Date of Birth:</label>
                <div class="col-sm-7">
                 <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="dob" class="form-control pull-right" id="dob">
                  </div> 
                </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Address :</label>
            <div class="col-sm-7">
                <input type="text" name="address" id='address' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">City :</label>
            <div class="col-sm-7">
                <input type="text" name="city" id='city' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Phone :</label>
            <div class="col-sm-7">
                <input type="text" name="phone" id='phone' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Email :</label>
            <div class="col-sm-7">
                <input type="text" name="email" id='email' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Functional Area :</label>
            <div class="col-sm-7">
                <select class="form-control chosen-select" name='funcarea' data-placeholder="Choose a Functional Area">
                <option value="0">-- Select Organization Type --</option>
                    <?php foreach ($functional_area as $key => $value) {?>
                    <option value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Job Title :</label>
            <div class="col-sm-7">
                <select class="form-control chosen-select" name='jid' data-placeholder="Choose a Job Title">
                <option value="0">-- Select Job Title --</option>
                    <?php foreach ($job_title as $key => $value) {
                      $empId = $value->eid;
                      $org_name = $this->general_model->getById('employer','id',$empId,'orgname');
                      if($value->displayname){
                        $jobTitleOrg = substr($value->displayname,0,35);
                      }else{
                        $jobTitleOrg = $org_name->orgname;
                      }
                      ?>
                    <option value='<?php echo $value->id; ?>'><?php echo substr($value->jobtitle, 0,$dropdown_length); ?> -- <?php echo $jobTitleOrg; ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Applied Position :</label>
            <div class="col-sm-7">
                <select class="form-control chosen-select" name='appliedposition' data-placeholder="Choose a Applied Position">
                <option value="0">-- Select Position --</option>
                    <?php foreach ($job_title as $key => $value) {
                      $empId = $value->eid;
                      $org_name = $this->general_model->getById('employer','id',$empId,'orgname');
                      if($value->displayname){
                        $jobTitleOrg = substr($value->displayname,0,35);
                      }else{
                        $jobTitleOrg = $org_name->orgname;
                      }
                      ?>
                    <option value='<?php echo $value->id; ?>'><?php echo substr($value->jobtitle, 0,$dropdown_length); ?> -- <?php echo $jobTitleOrg; ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
                <label class="col-sm-3 control-label">Applied Date:</label>
                <div class="col-sm-7">
                 <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="appdate" class="form-control pull-right" id="datepicker">
                  </div> 
                </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Education/Qualification :</label>
            <div class="col-sm-7">
                <input type="text" name="qualification" id='qualification' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Keyskills :</label>
            <div class="col-sm-7">
                <input type="text" name="keyskills" id='keyskills' class="form-control" value='' />
                <span class="green">Note : Separate Keyskills by Comma (,)</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Current Job Position :</label>
            <div class="col-sm-7">
                <input type="text" name="cjobposition" id='cjobposition' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Preferred Job Title :</label>
            <div class="col-sm-7">
                <input type="text" name="jobtitle" id='jobtitle' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Preferred Location :</label>
            <div class="col-sm-7">
                <select class="form-control chosen-select" name='joblocation' data-placeholder="Choose a Location">
                <option value="0">-- Select Location --</option>
                    <?php foreach ($location as $key => $value) {?>
                    <option value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Years of Experience :</label> 
            <div class="col-sm-2">
             <div class="input-group below_space">
              <div class="input-group-addon">From</div>
              <input type="text" name="expyrs" class="form-control" id="expyrs" placeholder="1">
            </div> 
            </div>

            <div class="col-sm-2">
             <div class="input-group below_space">
              <div class="input-group-addon">To</div>
              <input type="text" name="expyrs2" class="form-control" id="expyrs2" placeholder="3">
            </div> 
            </div>        
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Expected Salary :</label>
            <div class="col-sm-7">
                <select class="form-control chosen-select" name='expsal' data-placeholder="Choose a Excepted Salary">
                <option value="0">-- Select Expected Salary --</option>
                    <?php foreach ($salary_range as $key => $value) {?>
                    <option value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Applied Organization Name :</label>
            <div class="col-sm-7">
                <select class="form-control chosen-select" name='apporg' data-placeholder="Choose a Organisation Name">
                <option value="0">-- Select Organization --</option>
                    <?php foreach ($applied_organisation as $key => $value) {?>
                    <option value='<?php echo $value->id; ?>'><?php echo $value->orgname; ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
                <label class="col-sm-3 control-label">Registered Date:</label>
                <div class="col-sm-7">
                 <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="registerdate" class="form-control pull-right" id="seeker_date1">
                  </div> 
                </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Modified Date:</label> 
            <div class="col-sm-7">
                 <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="modifieddate" class="form-control pull-right" id="seeker_date2">
                  </div> 
                </div>            
        </div>

        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <button class="btn btn-success btn-flat" type="submit">
                        Search Job Seeker
                    </button>&nbsp;
                </div>
            </div>
        </div><!-- panel-footer -->
        <?php echo form_close(); ?>
    </div><!-- panel-body -->


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