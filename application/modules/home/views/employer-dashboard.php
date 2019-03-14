<div class="col-md-9 login-contains">
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="My-Profile">
            <div class="educational-detail">
                <h3>Dashboard</h3>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th style='width:5%'>S.N.</th>
                            <th style='width:30%'>Positions</th>
                            <th style='width:14%'>Required No.</th>
                            <th style='width:23%'>Applications Received</th>
                            <th style='width:13%'>Total Views</th>
                            <th>Deadline Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         if(!empty($post_job)){
                        foreach($post_job as $key => $val):
                        $key += 1;
                        $receivedJob = $this->employer_model->total_received_job($val->id);
                        $date =$val->applybefore;
                        ?>
                        <tr>
                            <td><?php echo $key++; ?></td>
                            <td><?php echo $val->jobtitle;?></td>
                            <td><?php echo $val->requiredno;?></td>
                            <td><?php echo $receivedJob; ?> <?php if($receivedJob > 0){?>[ <a href="<?php echo base_url();?>Employer/showApplicants/<?php echo $val->id; ?>" aria-controls="profile"><i class="fa fa-eye" aria-hidden="true"></i>View</a> ] <?php } ?></td>
                            <td><?php echo ($val->no_of_views != '') ? $val->no_of_views : 0;?></td>
                            <td><?php echo date('d M Y',strtotime($date)); ?></td>
                        </tr>
                        <?php endforeach;
                        } else{ ?>
                        <tr>
                            <td colspan="6">You haven't posted any Job</td>
                        </tr>
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

          <h4 class="modal-title green">Are you sure to Remove a Applied Job ?</h4>

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

