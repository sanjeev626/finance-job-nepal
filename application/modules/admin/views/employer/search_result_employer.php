<?php //print_r($_POST);?>
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">


      <div class="row">
        <div class="col-md-12">
            <div class="panel-footer">
                <!--<a class="btn btn-success below_space"
                   href="<?php /*echo base_url(); */?>admin/Employer/viewEmployerBasket"><i class="fa fa-shopping-cart"
                                                                                        data-original-title="View Basket"></i>
                    View Basket </a>
                <button type="button" class="btn btn-success below_space" data-toggle="modal" data-target="#myModal"><i
                        class="fa fa-search tooltips" data-original-title="Edit Client"></i> Search Employer
                </button>-->
                <?php include('employer-searchform.php')?>
            </div>
        <span class="text-center"><h3 class="green-bold"><?php echo $total_employer; ?> Employer Found !!!</h3></span>
        

          <div class="table-responsive">  
            <table class="table table-hover" id="table1" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="1%">SN.</th>
                  <th width="25%">Contact Name </th>
                  <th width="25%">Organisation </th>
                  <th width="25%">Email </th>

                  <th width="24%" class="table-action text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($this->uri->segment(4) == NULL) {
                  $i = 1;
                } else {
                  $i = $this->uri->segment(4) + 1;
                }
                if (!empty($employer)) { 
                  foreach ($employer as $key):
                    ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $key->contact_name; ?></td>
                    <td><?php echo $key->orgname; ?></td>
                    <td><?php echo $key->email; ?></td>

                    
                    <td class="table-action text-center">
                      <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>admin/employer/view/<?php echo $key->id; ?>"><i class="fa fa-eye tooltips" data-original-title="Edit Employer"></i> View</a>
                      |
                      <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>admin/employer/joblist/<?php echo $key->id; ?>"><i class="fa fa-file-text-o tooltips" data-original-title="Job List"></i> Job List</a>
                      |
                      <button type="button" class="btn btn-success btn-sm delete_employer" link="<?php echo base_url(); ?>admin/employer/delete/<?php echo $key->id; ?>" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash tooltips" data-original-title="Delete Employer"></i> Delete</button>
                    </td>
                  </tr>
                  <?php
                  $i++;
                  endforeach;
                } else {
                  ?>
                  <tr>
                    <td colspan="8"><center>No Employer Found !!!</center></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div><!-- table-responsive -->
           <?php echo $this->pagination->create_links();?>
          </div><!-- col-md-6 -->
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
          <h2 class="modal-title">Search Employer</h2>
          <input type="hidden" value="" class="news_id" name="testme">
        </div>
        <div class="modal-body">


      <div class="panel-body panel-body-nopadding">
        <?php
        $action = base_url() . 'admin/Employer/searchEmployer';

        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open_multipart($action, $attributes);
        ?>

        <div class="form-group">
            <label class="col-sm-3 control-label">Employer ID:</label> 
            <div class="col-sm-4">
             <div class="input-group below_space">
              <div class="input-group-addon">From</div>
              <input type="text" name="empId" class="form-control" id="empId" placeholder="123">
            </div> 
            </div>

            <div class="col-sm-4">
             <div class="input-group below_space">
              <div class="input-group-addon">To</div>
              <input type="text" name="empId2" class="form-control" id="exampleInputAmount" placeholder="456">
            </div> 
            </div>        
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Company Name :</label>
            <div class="col-sm-7">
                <input type="text" name="orgname" id='orgname' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Address :</label>
            <div class="col-sm-7">
                <input type="text" name="address" id='address' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Email :</label>
            <div class="col-sm-7">
                <input type="text" name="email" id='email' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">URL :</label>
            <div class="col-sm-7">
                <input type="text" name="website" id='website' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Organization Type :</label>
            <div class="col-sm-7">
                <select class="form-control chosen-select" name='orgtype' data-placeholder="Choose a Organisation Type">
                <option value="0">-- Select Organization Type --</option>
                    <?php foreach ($organisation_type as $key => $value) {?>
                    <option value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>

        <!-- <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-file-text-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"><h3>Account Contact Information</h3></span>
                </div>
              </div>
            </div>
        </div> -->

        <div class="form-group">
            <label class="col-sm-3 control-label">Telephone No. :</label>
            <div class="col-sm-7">
                <input type="text" name="phone" id='phone' class="form-control" value='' />
            </div>
        </div>

        <!-- <div class="form-group">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-file-text-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>Login Information</h3></span>
              </div>
            </div>
          </div>
        </div> -->

        <div class="form-group">
                <label class="col-sm-3 control-label">Registered Date:</label>
                <div class="col-sm-7">
                 <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="joindate" class="form-control pull-right" id="reservation1">
                  </div> 
                </div>
        </div>

        <!-- <div class="form-group">
          <label class="col-sm-3 control-label">Modified Date:</label> 
          <div class="col-sm-7">
           <div class="input-group date">
              <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="modifieddate" class="form-control pull-right" id="reservation2">
            </div> 
          </div>            
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Username:</label>
            <div class="col-sm-7">
                <input type="text" name="username" id='username' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Password :</label>
            <div class="col-sm-7">
                <input type="text" name="password" id='password' class="form-control" value='' />
            </div>
        </div> -->

        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <button class="btn btn-success btn-flat" type="submit">
                        Search Employer
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