<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">

      <div class="row">
        <div class="col-md-12">
          <div class="panel-footer">
            <div class="col-sm-10 col-md-10">
              <?php echo form_open('admin/vacancy');?>
              <div class="row">
                <fieldset >
                  <div class="col-sm-6 col-md-6 below_space"> 
                    <select  class="form-control chosen-select" name='category' data-placeholder="Choose a Category...">
                      <option value="">Select Category</option>
                      <?php foreach ($jobcategory as $key => $value) { ?>
                      <option value='<?php echo $value->id; ?>' 
                        <?php if(($category) && ($category == $value->id)){ echo "selected"; } ?> ><?php echo $value->dropvalue; ?></option>
                        <?php  } ?>
                      </select>
                    </div>

                    <div class="col-sm-4 col-md-4 below_space">
                      <input class= "btn btn-success" type="submit" value="Search Category" name="">
                    </div>

                  </fieldset>
                </div>
                <?php echo form_close();?>
              </div>
              <div class="below_space margin-left">
              <a class="btn btn-success" href="<?php echo base_url(); ?>admin/vacancy/add">+ Add Job </a>
              </div>

            </div>

            <?php  if (!empty($job_info)) { ?>
            <div class="table-responsive">
              <table class="table table-striped mb30" id="table1" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th width="5%">SN.</th>
                    <th width="20%">Job Title </th>
                    <th width="20%">Organisation </th>
                    <th width="20%">Employer Name </th>
                    <th width="10%">Updated On </th>
                    <th width="10%">Apply Before </th>
                    <th width="8%">Job Level </th>
                    <th width="5%" class="text-center">Required </th>
                    <th width="17%" class="table-action text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($this->uri->segment(4) == NULL) {
                    $i = 1;
                  } else {
                    $i = $this->uri->segment(3) + 1;
                  }
                  foreach ($job_info as $key => $val):

                    $organiation = $this->vacancy_model->get_organisation_by_eid($val->eid);
                    if(empty($organiation)) $organiation = $val->displayname;
                    $addeddate = $val->date_added;
                    $applybefore = $val->applybefore;
                    $cdate = date('d-m-Y');


                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $val->jobtitle; ?></td>
                    <td><?php echo $organiation; ?></td>
                    <td><?php echo $val->displayname; ?></td>
                    <td><?php echo date("d-m-Y", strtotime($addeddate)); ?></td>
                    <td <?php if($applybefore < $cdate){ ?> style="color:#FF0000;"<?php } ?>> <?php echo date("d-m-Y", strtotime($applybefore)); ?></td>
                    <td>
                      <?php
                      $val->joblevel;
                        $dropdowns = $this->dropdown_model->get_dropdown_by_id($val->joblevel);
                        if(!empty($dropdowns))
                          echo  $dropdowns->dropvalue;
                        else
                          echo 'N/A';

                      ?>
                    </td>
                    <td class="text-center"><?php echo $val->requiredno; ?></td>
                    <td class="table-action text-center">

                      <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>admin/vacancy/edit/<?php echo $val->id; ?>"><i class="fa fa-edit tooltips" data-original-title="Edit Job"></i> Edit</a>
                      |
                      <button type="button" class="btn btn-success btn-sm delete_vacancy" link="<?php echo base_url(); ?>admin/vacancy/deletevacancy/<?php echo $val->id; ?>" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash tooltips" data-original-title="Delete Job"></i> Delete</button>

                    </td>
                  </tr>
                  <?php
                  $i++;
                  endforeach;
                  ?>
                </tbody>
              </table>
            </div><!-- table-responsive -->
            <?php } ?>
          </div><!-- col-md-6 -->
        </div>

      </div>
    </div>
    <!-- /.box -->
  </section>


<!-- Delete Modal -->
  <div id="myModalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title green">Are you sure to Delete a Job ?</h4>
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
      $('.delete_vacancy').on('click',function(){ 
        var link  = $(this).attr('link');
        $('.get_link').attr('href',link); 

      });
    });
  </script>