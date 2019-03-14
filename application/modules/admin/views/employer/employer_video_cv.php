<?php
$eid = $this->uri->segment(4);
$video_cv_activated_on = $this->general_model->getfieldById('employer', 'video_cv_activated_on', $eid);
$orgname = $this->general_model->getfieldById('employer', 'orgname', $eid);
?>
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
        <div class="col-md-12">
            <div class="panel-footer" style="height:60px;">
              <div class="col-sm-6">
              <strong>Video CV of : </strong><?php echo $orgname;?><br>
              <strong>Activated On : </strong><?php echo $video_cv_activated_on;?>
              </div>
              <div class="col-sm-6" style="text-align:right;">
                <a class="btn btn-success below_space" href="<?php echo base_url(); ?>admin/Employer/videocvAdd/<?php echo $this->uri->segment(4);?>"><i class="fa fa-plus" data-original-title="View Basket"></i> Add Video CV feature </a>
              </div>
            </div>
        </div>
        <div class="col-md-12">
            
            <div class="table-responsive">
              <table class="table table-striped mb30" id="table1" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th width="5%">SN.</th>
                    <th width="25%">Start Date </th>
                    <th width="25%">Expiry Date </th>
                    <th width="20%" class="table-action text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($this->uri->segment(3) == NULL) {
                    $i = 1;
                  } else {
                    $i = $this->uri->segment(3) + 1;
                  }
                  if (!empty($employer_video_cv_info)) {  
                  foreach ($employer_video_cv_info as $key => $val):
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $val->start_date; ?></td>
                    <td><?php echo $val->expiry_date; ?></td>
                    <td class="table-action text-center">

                      <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>admin/Employer/videocvEdit/<?php echo $val->id; ?>"><i class="fa fa-edit tooltips" data-original-title="Edit Job"></i> Edit</a>
                      |
                      <a class="btn btn-success btn-sm" id="delete_<?php echo $val->id; ?>" href="javascript:void(0);" onclick="showPopupBox('delete_<?php echo $val->id; ?>', 'Are you sure to delete this Video CV activation ?', '<?php echo base_url(); ?>admin/Employer/deleteVideoCv/<?php echo $val->eid; ?>/<?php echo $val->id; ?>');" class="delete-row"><i class="fa fa-trash tooltips" data-original-title="Delete"></i> Delete</a>

                    </td>
                  </tr>
                  <?php
                  $i++;
                  endforeach;
                  ?>
                  <?php }else{?>
            <td colspan="7">No Employer Job Found !!!</td>
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


<!-- div for the pop up messages mainly during click on a delete button -->
<div id="popup" class="popup_msg">
    <p id="popup_message"></p>
    <div class="ok_btn_align">
        <div class="ok_btn"><a id="yes" hreflang="" href="javascript:hidePopupBox('yes')">Yes</a></div>
        <div class="ok_btn"><a href="javascript:hidePopupBox('no')">No</a></div>
    </div>
</div>
<!--End of Popup Message -->