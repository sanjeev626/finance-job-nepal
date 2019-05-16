<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">

      <div class="row">
        <div class="col-md-12">
            
            <div class="table-responsive">
              <table class="table table-striped mb30" id="table1" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th width="5%">SN.</th>
                    <th width="35%">Job Title </th>
                    <th width="35%">Organisation </th>
                    <th width="10%">Applied Date </th>
                    <th width="10%">Job Level </th>
                    <th width="5%" class="text-center">Required </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  /*if ($this->uri->segment(3) == NULL) {
                    $i = 1;
                  } else {
                    $i = $this->uri->segment(3) + 1;
                  }*/
                  $i=1;
                  if (!empty($applied_job_info)) {  
                  foreach ($applied_job_info as $key => $val):

                    $organiation = $this->vacancy_model->get_organisation_by_eid($val->eid);
                    if(empty($organiation)) $organiation = $val->displayname;
                    $applybefore = $val->apdd."-".$val->apmm."-".$val->apyy;
                    $cdate = date('d-m-Y');
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $val->jobtitle; ?></td>
                    <td><?php echo $organiation; ?></td>
                    <td><?php echo $val->appdate; ?></td>
                    <td><?php echo $val->joblevel; ?></td>
                    <td class="text-center"><?php echo $val->requiredno; ?></td>
                  </tr>
                  <?php
                  $i++;
                  endforeach; 
                  ?>
                  <?php }else{?>
            <td colspan="7">No Applied Job Found !!!</td>
            <?php } ?>
                </tbody>
              </table>
            </div><!-- table-responsive -->
            
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
          <h4 class="modal-title green">Are you sure to Delete a Job Applied ?</h4>
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
      $('.delete_job_applied').on('click',function(){ 
        var link  = $(this).attr('link');
        $('.get_link').attr('href',link); 

      });
    });
  </script>