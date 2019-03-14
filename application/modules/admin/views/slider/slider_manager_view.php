<section class="content">



  <!-- Default box -->

  <div class="box">

    <div class="box-header with-border">





      <div class="row">

        <div class="col-md-12">

            <div class="panel-footer">

            <a class="btn btn-success" href="<?php echo base_url(); ?>admin/Slider/listslider/slider">Slider </a>

            <a class="btn btn-success" href="<?php echo base_url(); ?>admin/Slider/listslider/right_portion">Right Portion </a>

            <!-- <a class="btn btn-success" href="<?php echo base_url(); ?>admin/Slider/listslider/middle_portion">Middle Portion </a>
            <a class="btn btn-success" href="<?php echo base_url(); ?>admin/Slider/listslider/notice">Notice </a> -->

            <a class="btn btn-success" href="<?php echo base_url(); ?>admin/Slider/add<?php if(!empty($type)) echo '/'.$type;?>" style="float: right;">+ Add Banner </a>

        </div>

          <div class="table-responsive">

          <?php

          $action = base_url() . 'admin/Slider/updateordering/' . $type;

          $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');

          echo form_open_multipart($action, $attributes);

          ?>

            <table class="table table-striped mb30" id="table1" cellspacing="0" width="100%">

              <thead>

                <tr>

                  <th width="5%"><?php if(empty($type)) echo "SN."; else echo "Ordering";?></th>

                  <th width="20%">Banner Image</th>

                  <th width="25%">Image Url</th>

                  <th width="20%">Placement</th>

                  <th width="10%">Status</th>

                  <th width="20%" class="table-action">Action</th>

                </tr>

              </thead>

              <tbody>

                <?php

                if ($this->uri->segment(3) == NULL) {

                  $i = 1;

                } else {

                  $i = $this->uri->segment(3) + 1;

                }

                if (!empty($slider_info)) {

                  foreach ($slider_info as $key):

                    ?>

                  <tr>

                    <td>

                      <?php if(empty($type)) echo $i; else {?>

                      <input type="text" name="ordering[]" id='ordering[]' class="form-control" value='<?php echo $key->ordering; ?>' />

                      <input type="hidden" name="banner_id[]" id='banner_id[]' class="form-control" value='<?php echo $key->id; ?>' />

                      <?php } ?>

                    </td>

                    <td><img src="<?php echo base_url().'uploads/slider/'.$key->sliderimage; ?>" style="width:100px; height:auto;"></td>

                    <td><?php echo $key->link; ?></td>

                    <td><?php echo $key->type; ?></td>

                    <td><?php echo $key->status; ?></td>

                    <td class="table-action">

                      <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>admin/Slider/edit/<?php echo $key->id; ?>"><i class="fa fa-edit tooltips" data-original-title="Edit Banner"></i> Edit</a>

                      |

                      <button type="button" class="btn btn-success btn-sm delete_slider" link="<?php echo base_url(); ?>admin/Slider/deleteSlider/<?php echo $key->id; ?>" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-trash tooltips" data-original-title="Delete Banner"></i> Delete</button>

                    </td>

                  </tr>

                  <?php

                  $i++;

                  endforeach;

                if(!empty($type)){

                ?>

                <tr>

                  <td><button type="submit" class="btn btn-success btn-sm delete_slider"><i class="fa fa-save tooltips" data-original-title="Save Ordering"></i> Save</button></td>

                  <td colspan="5">&nbsp;</td>

                </tr>

                <?php

                }

                } 

                else {

                  ?>

                  <tr>

                    <td colspan="8"><center>No Banner Found !!!</center></td>

                  </tr>

                  <?php } ?>

                </tbody>

              </table>

              <?php echo form_close(); ?>

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

          <h4 class="modal-title green">Are you sure to Delete a Banner ?</h4>

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

      $('.delete_slider').on('click',function(){

        var link  = $(this).attr('link');

        $('.get_link').attr('href',link);



      });

    });

  </script>

