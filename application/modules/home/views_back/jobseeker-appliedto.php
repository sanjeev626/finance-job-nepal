<div class="col-md-9 login-contains">
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="My-Profile">

            <div class="educational-detail">
                <h3>Jobs I've Applied To</h3>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th style='width:5%'>Sn.</th>
                            <th>Job Title</th>
                            <th>Organisation</th>
                            <th style='width:19%;'>Applied Date</th>
                            <th style='width:13%;'>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if(!empty($applied_job)){
                        foreach($applied_job as $key => $val):
                        $key += 1;
                        
                        ?>
                        <tr>
                            <td><?php echo $key++; ?></td>
                            <td><a href="<?php echo base_url() . 'job/' . $val->slug.'/' . $val->id;?>" target="_blank"><?php echo $val->jobtitle;?></a></td>
                            <td><?php echo $val->displayname;?></td>
                            <td><?php echo $val->appdate;?></td>
                            <td style="text-align: center;">
                            <button type="button" class="btn btn-success btn-sm delete_job_applied" link="<?php echo base_url(); ?>Jobseeker/removeAppliedJob/<?php echo $val->appid; ?>" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash tooltips" data-original-title="Remove Job"></i> Remove</button>
                            </td>
                        </tr>
                        <?php endforeach;
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
