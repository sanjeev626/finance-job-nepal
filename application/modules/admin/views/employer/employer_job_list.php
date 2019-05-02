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
                    <th width="20%">Job Title </th>
                    <th width="20%">Organisation </th>
                    <th width="10%">Apply Before </th>
                    <th width="10%">Job Level </th>
                    <th width="10%" class="text-center">Required </th>
                    <th width="20%" class="table-action text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($this->uri->segment(4) == NULL) {
                    $i = 1;
                  } else {
                    $i = $this->uri->segment(4) + 1;
                  }
                  if (!empty($employer_job_info)) {  
                  foreach ($employer_job_info as $key => $val):

                    $organiation = $this->vacancy_model->get_organisation_by_eid($val->eid);
                    if(empty($organiation)) $organiation = $val->displayname;
                    $applybefore = $val->apdd."-".$val->apmm."-".$val->apyy;
                    $cdate = date('d-m-Y');
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $val->jobtitle; ?></td>
                    <td><?php echo $organiation; ?></td>
                    <td <?php if($applybefore < $cdate){ ?> style="color:#FF0000;"<?php } ?>><?php echo $applybefore; ?></td>
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

                      <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>admin/Vacancy/edit/<?php echo $val->id; ?>"><i class="fa fa-edit tooltips" data-original-title="Edit Job"></i> Edit</a>
                      |
                      <a class="btn btn-success btn-sm" id="delete_<?php echo $val->id; ?>" href="javascript:void(0);" onclick="showPopupBox('delete_<?php echo $val->id; ?>', 'Are you sure to delete a Job ?', '<?php echo base_url(); ?>admin/Vacancy/deleteVacancy/<?php echo $val->id; ?>');" class="delete-row"><i class="fa fa-trash tooltips" data-original-title="Edit Job"></i> Delete</a>

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