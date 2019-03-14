<?php
if (!empty($jobseekBanner_detail)) {
    $action = base_url() . 'admin/JobSeekBanner/editJobSeekBanner/' . $jobseekBanner_detail->id;
} else {
    $action = base_url() . 'admin/JobSeekBanner/addJobSeekBanner';
}
?>

<div class="box box-info">
    <div class="box-header with-border">
        <section class="content-header">
          <h1>
            <?php if (!empty($jobseekBanner_detail)) { echo "Edit JobSeekBanner"; } else { echo "Add JobSeekBanner"; } ?>
          </h1>
        </section>
    </div>
    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open_multipart($action, $attributes);
        ?>

        <div class="form-group">
            <label class="col-sm-3 control-label">Title:<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="title" id='title' class="form-control" value='<?php if (!empty($jobseekBanner_detail)) echo $jobseekBanner_detail->title; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Image :</label>
            <div class="col-sm-7">
                <input type="file" name="bannerImage" id='bannerImage' class="form-control" value='<?php if (!empty($jobseekBanner_detail)) echo $jobseekBanner_detail->image; ?>' />
                    <span class="green">(Image resolution must be 714 X 518 for better view)</span>

                <?php if (!empty($jobseekBanner_detail) && isset($jobseekBanner_detail->image)) { ?>
                    <input type="hidden" value="<?php echo $jobseekBanner_detail->image; ?>" name="old_bannerImage">
                    <div style="padding-top:10px;"><img height="30%" width="30%" src="<?php echo base_url() . 'uploads/jobseeker_banner/' . $jobseekBanner_detail->image; ?>"></div>
                <?php } ?>

            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-3 control-label">Link:</label>
            <div class="col-sm-7">
                <input type="text"  name="link" id='link' class="form-control" value='<?php if (!empty($jobseekBanner_detail)) echo $jobseekBanner_detail->link; ?>' />
            </div>
        </div>
        
         <div class="form-group">
        <label class="col-sm-3 control-label">Status:</label>
        <div class="col-sm-7">
            <select class="form-control chosen-select" name='publish' data-placeholder="Choose a Status...">
                <option value='1' <?php if (!empty($jobseekBanner_detail) && $jobseekBanner_detail->publish == 1 ) echo 'selected="selected"'; ?>>Enabled</option>
                <option value='0' <?php if (!empty($jobseekBanner_detail) && $jobseekBanner_detail->publish == 0 ) echo 'selected="selected"'; ?>>Disabled</option>
            </select>
        </div>
    </div>

        <!--<div class="form-group">
            <label class="col-sm-3 control-label">Banner Order:</label>
            <div class="col-sm-7">
                <input type="number" class="form-control" name="banner_order" id="banner_order" value="<?php /*if(!empty($jobseekBanner_detail)) echo $jobseekBanner_detail->banner_order */?>" >
            </div>
        </div>-->


        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <button class="btn btn-success btn-flat" type="submit">
                        <?php
                        if (!empty($jobseekBanner_detail)) {
                            echo 'Update JobSeekBanner';
                        } else {
                            echo 'Add JobSeekBanner';
                        }
                        ?>
                    </button>&nbsp;
                </div>
            </div>
        </div><!-- panel-footer -->
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->

