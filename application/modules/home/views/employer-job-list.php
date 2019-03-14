<div class="col-md-9 login-contains">
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="My-Profile">
      <div class="educational-detail">
        <h3>List Job</h3>
        <table class="table table-condensed">
          <thead>
            <tr>
              <th style='width:3%'>Sn.</th>
              <th style='width:23%'>Job Title</th>
              <th style='width:7%'>Required</th>
              <th style='width:10%'>Post Date</th>
              <th style='width:10%'>Apply Before</th>
              <th style='text-align:center;'>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
      if(!empty($list_job)){
      foreach($list_job as $key => $val):
      $key += 1;
      $receivedJob = $this->employer_model->total_received_job($val->id);
      $postdate =$val->pyy .'-'.$val->pmm.'-'.$val->pdd;
      $applydate =$val->apyy .'-'.$val->apmm.'-'.$val->apdd;
      ?>
            <tr>
              <td><?php echo $key++; ?></td>
              <td><?php echo $val->jobtitle;?></td>
              <td style="text-align: center;"><?php echo $val->requiredno;?></td>
              <td><?php echo date('d M Y',strtotime($postdate)); ?></td>
              <td><?php echo date('d M Y',strtotime($applydate)); ?></td>
              <td style="text-align: center;"><a href="<?php echo base_url(); ?>Employer/update/<?php echo $val->id; ?>" class="btn btn-success btn-sm"><i class="fa fa-edit tooltips" data-original-title="Edit Job" title="Edit this Job"></i></a>
                <button type="button" class="btn btn-success btn-sm delete_emp_job" link="<?php echo base_url(); ?>Employer/deleteJob/<?php echo $val->id; ?>" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash tooltips" data-original-title="Delete Job" title="Delete this job"></i></button>
                <a href="<?php echo base_url(); ?>Employer/showApplicants/<?php echo $val->id; ?>" class="btn btn-success btn-sm"><i class="fa fa-list tooltips" data-original-title="List Applicants" title="List all Applicants"></i></a> <a href="<?php echo base_url(); ?>Employer/showShortlistedApplicants/<?php echo $val->id; ?>" class="btn btn-warning btn-sm"><i class="fa fa-list tooltips" data-original-title="List Applicants" title="List Shortlisted Applicants"></i></a> <a href="<?php echo base_url(); ?>Employer/showRejectedApplicants/<?php echo $val->id; ?>" class="btn btn-danger btn-sm"><i class="fa fa-list tooltips" data-original-title="List Applicants" title="List Rejected Applicants"></i></a></td>
            </tr>
            <?php
            endforeach;
            } else{ ?>
            <?php } ?>
          </tbody>
        </table>
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
        <h4 class="modal-title green">Are you sure to Delete a Job ?</h4>
      </div>
      <div class="modal-body center"> <a class="btn btn-success get_link" href="">Yes</a> &nbsp; | &nbsp;
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
      $('.delete_emp_job').on('click',function(){
        var link  = $(this).attr('link');
        $('.get_link').attr('href',link);
      });
    });
</script> 