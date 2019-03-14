<?php
$position = $this->uri->segment(4);
if (!empty($slider_detail))
{
  $position = $slider_detail->type;
}

if (!empty($slider_detail)) {
    $action = base_url() . 'admin/Slider/editSlider/' . $slider_detail->id;
} else {
    $action = base_url() . 'admin/Slider/addSlider';
}


?>

<div class="box box-info">
    <div class="panel-footer">

            <a class="btn btn-success" href="<?php echo base_url(); ?>admin/Slider/listslider/slider">Slider </a>

            <a class="btn btn-success" href="<?php echo base_url(); ?>admin/Slider/listslider/right_portion">Right Portion </a>

            <a class="btn btn-success" href="<?php echo base_url(); ?>admin/Slider/listslider/middle_portion">Middle Portion </a>
            <a class="btn btn-success" href="<?php echo base_url(); ?>admin/Slider/listslider/notice">Notice </a>
        </div>
    <div class="box-header with-border">
        <section class="content-header">
          <h1><?php if (!empty($slider_detail)) { echo "Edit Banner"; } else { echo "Add Banner"; } ?></h1>
        </section>
    </div>
    <div class="panel-body panel-body-nopadding">
        

        <div class="col-md-12">            
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open_multipart($action, $attributes);
        ?>

        <div class="form-group">
        <label class="col-sm-3 control-label">Position:</label>
        <div class="col-sm-7">
            <select class="form-control chosen-select" name='type' data-placeholder="Choose a Type...">
                <option value='slider' <?php if ($position == 'slider' ) echo 'selected="selected"'; ?>>Slider</option>
                <option value='right_portion' <?php if ($position == 'right_portion' ) echo 'selected="selected"'; ?>>Right Portion</option>
                <option value='middle_portion' <?php if ($position == 'middle_portion' ) echo 'selected="selected"'; ?>>Middle Portion</option>
                <option value='notice' <?php if ($position == 'notice' ) echo 'selected="selected"'; ?>>Notice</option>
            </select>
        </div>
    	</div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Title :</label>
            <div class="col-sm-7">
                <input type="text" name="title" id='title' class="form-control" value='<?php if (!empty($slider_detail)) echo $slider_detail->title; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Banner Image :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input <?php if (empty($slider_detail)) echo 'required'; ?> type="file" name="sliderimage" id='sliderimage' class="form-control" value='<?php if (!empty($slider_detail)) echo $slider_detail->sliderimage; ?>' />
                    <span class="green">(Image Dimension: <?php if (!empty($slider_detail) && $slider_detail->type == 'right_portion' ) echo "Image width must be 265px"; elseif (!empty($slider_detail) && $slider_detail->type == 'notice' ) echo "Image resolution must be 540 X 50px"; else echo "Image resolution must be 860 x 253 for Banner.<br>width must be 265px for Right Banner."; ?> and Max file size 50 kb)</span>

                <?php if (!empty($slider_detail) && isset($slider_detail->sliderimage)) { ?>
                    <input type="hidden" value="<?php echo $slider_detail->sliderimage; ?>" name="sliderimage">
                    <div style="padding-top:10px;"><img height="20%" width="20%" src="<?php echo base_url() . 'uploads/slider/' . $slider_detail->sliderimage; ?>"></div>
                <?php } ?>
            </div>
        </div>   
		<?php if (!empty($slider_detail) && $slider_detail->type == 'right_portion' ) { ?>
        <div class="form-group">
            <label class="col-sm-3 control-label">Banner Image 2 :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input <?php if (empty($slider_detail)) echo 'required'; ?> type="file" name="sliderimage2" id='sliderimage2' class="form-control" value='<?php if (!empty($slider_detail)) echo $slider_detail->sliderimage2; ?>' />
                    <span class="green">(Image width must be 265px)</span>

                <?php if (!empty($slider_detail) && !empty($slider_detail->sliderimage2)) { ?>
                    <input type="hidden" value="<?php echo $slider_detail->sliderimage2; ?>" name="sliderimage2">
                    <div style="padding-top:10px;">
                        <img height="20%" width="20%" src="<?php echo base_url() . 'uploads/slider/' . $slider_detail->sliderimage2; ?>">
                        <br><button type="button" class="btn btn-success btn-sm delete_slider" link="<?php echo base_url(); ?>admin/Slider/deleteSliderImage/<?php echo $slider_detail->id; ?>/sliderimage2" data-toggle="modal" data-target="#myModalDelete" title="Remove this image"><i class="fa fa-trash tooltips" data-original-title="Delete Banner"></i> Remove</button>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Banner Image 3 :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input <?php if (empty($slider_detail)) echo 'required'; ?> type="file" name="sliderimage3" id='sliderimage3' class="form-control" value='<?php if (!empty($slider_detail)) echo $slider_detail->sliderimage3; ?>' />
                    <span class="green">(Image width must be 265px)</span>

                <?php if (!empty($slider_detail) && !empty($slider_detail->sliderimage3)) { ?>
                    <input type="hidden" value="<?php echo $slider_detail->sliderimage3; ?>" name="sliderimage3">
                    <div style="padding-top:10px;">
                        <img height="20%" width="20%" src="<?php echo base_url() . 'uploads/slider/' . $slider_detail->sliderimage3; ?>">
                        <br><button type="button" class="btn btn-success btn-sm delete_slider" link="<?php echo base_url(); ?>admin/Slider/deleteSliderImage/<?php echo $slider_detail->id; ?>/sliderimage3" data-toggle="modal" data-target="#myModalDelete" title="Remove this image"><i class="fa fa-trash tooltips" data-original-title="Delete Banner"></i> Remove</button>
                    </div>
                <?php } ?>
            </div>
        </div>
		<?php } ?>
        <div class="form-group">
            <label class="col-sm-3 control-label">Url :</label>
            <div class="col-sm-7">
                <input type="text" name="link" id='link' class="form-control" value='<?php if (!empty($slider_detail)) echo $slider_detail->link; ?>' />
            </div>
        </div>


        <div class="form-group">
        <label class="col-sm-3 control-label">Status:</label>
        <div class="col-sm-7">
            <select class="form-control chosen-select" name='status' data-placeholder="Choose a Status...">
                <option value='Enabled' <?php if (!empty($slider_detail) && $slider_detail->status == 'Enabled' ) echo 'selected="selected"'; ?>>Enabled</option>
                <option value='Disabled' <?php if (!empty($slider_detail) && $slider_detail->status == 'Disabled' ) echo 'selected="selected"'; ?>>Disabled</option>
            </select>
        </div>
    </div>



        <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-7">
                <button class="btn btn-success btn-flat" type="submit">
                        <?php
                        if (!empty($slider_detail)) {
                            echo 'Update Banner';
                        } else {
                            echo 'Add Banner';
                        }
                        ?>
                    </button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->



<!-- Delete Modal -->
  <div id="myModalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title green">Are you sure to remove this banner image ?</h4>
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