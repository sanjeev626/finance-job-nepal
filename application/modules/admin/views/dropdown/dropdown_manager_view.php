<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">


      <div class="row">
        <div class="col-md-12">
          <div class="panel-footer">
            <a class="btn btn-success" href="<?php echo base_url(); ?>admin/Dropdown/add">+ Add Dropdown Value </a>
          </div>
          <div class="table-responsive">
            <table class="table table-striped mb30" id="table1" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>List of Field (Note: Click Field To View Dropdown Value) </th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($dropdown)) { 
                  foreach ($dropdown as $key):

                    $field_value = $this->dropdown_model->get_all_field($key->id);
                  ?>
                  <tr>
                    <td><a href="javascript:;" class="toggle_sku"><i rel="allfield" class="fa fa-plus-circle"></i>&nbsp;&nbsp;&nbsp; Field: <?php echo $key->title; ?></a></td>    
                  </tr>
                  <?php if (!empty($field_value)) { ?>
                  <tr style="display: none">
                    <td colspan="8">
                      <form name="" class="allfield" >
                        <table class="table">
                          <thead>
                            <tr class="success">
                              <th>Sn.</th>
                              <th>Dropdown Value</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php $j = 1;
                            foreach ($field_value as $val) {
                              ?>
                              <tr class="success">
                                <td><?php echo $j ?></td>
                                <td><?php echo $val->dropvalue; ?></td>
                                <td class="table-action">
                                  <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>admin/Dropdown/edit/<?php echo $val->id; ?>"><i class="fa fa-edit tooltips" data-original-title="Edit Dropdown value"></i> Edit</a>
                                  |
                                  <button type="button" class="btn btn-success btn-sm delete_dropdown" link="<?php echo base_url(); ?>admin/Dropdown/deleteDropdown/<?php echo $val->id; ?>" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash tooltips" data-original-title="Delete Dropdown value"></i> Delete</button>
                                </td>
                              </tr>
                              <?php $j++;
                            }
                            ?>
                          </tbody>
                        </table>
                      </form>
                    </td>
                  </tr>
                  <?php
                }
                endforeach;
              } else {
                ?>
                <tr>
                  <td colspan="8"><center>No Dropdown Field Found !!!</center></td>
                </tr>
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
          <h4 class="modal-title green">Are you sure to Delete a Dropdown Value ?</h4>
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
      $('.delete_dropdown').on('click',function(){ 
        var link  = $(this).attr('link');
        $('.get_link').attr('href',link); 

      });
    });
  </script>


<script type="text/javascript">

  $(document).ready(function () {

    $('.toggle_sku').click(function () {
      $(this).parent().parent().next().toggle('slow');
      $(this).find('i').toggleClass("fa-plus-circle fa-minus-circle"); 
    });

  });
</script>