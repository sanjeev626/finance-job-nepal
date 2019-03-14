<?php
$eid = $this->uri->segment(4);
$video_cv_activated_on = $this->general_model->getfieldById('employer', 'video_cv_activated_on', $eid);
$activated_date = $video_cv_activated_on;

if (!empty($video_cv_info)) {
    $action = base_url() . 'admin/Employer/editVideo_cv/' . $video_cv_info->id;
    if($video_cv_activated_on=="0000-00-00")
        $activated_date = $video_cv_info->activated_date;
    $start_date = $video_cv_info->start_date;
    $expiry_date = $video_cv_info->expiry_date;
} else {
    $action = base_url() . 'admin/Employer/addVideo_cv/'.$eid;
    if($video_cv_activated_on=="0000-00-00")
        $activated_date = set_value('activated_date');
    $start_date = set_value('start_date');
    $expiry_date = set_value('expiry_date');
}


//echo $video_cv_activated_on;
?>
<script>
  $( function() {
    $( "#activated_date" ).datepicker();
    $( "#activated_date" ).datepicker( "option", "showAnim", 'clip' );              
    $( "#activated_date" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
    $( "#activated_date" ).datepicker("setDate", "<?php echo $activated_date;?>");

    $( "#start_date" ).datepicker();
    $( "#start_date" ).datepicker( "option", "showAnim", 'clip' );                 
    $( "#start_date" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
    $( "#start_date" ).datepicker("setDate", "<?php echo $start_date;?>");

    $( "#expiry_date" ).datepicker();
    $( "#expiry_date" ).datepicker( "option", "showAnim", 'clip' );                 
    $( "#expiry_date" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
    $( "#expiry_date" ).datepicker("setDate", "<?php echo $expiry_date;?>");

  } );
</script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="box box-info">
    <div class="box-header with-border">
        <section class="content-header">
          <h1>
          Video CV for <?php echo $this->general_model->getfieldById('employer', 'orgname', $eid);?>
          </h1>
        </section>
    </div>
    

    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open_multipart($action, $attributes);
        ?>

        <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-video-camera"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"><h3>Video CV Information</h3></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
        </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Activated Date :<span class="asterisk">*</span></label>
        <div class="col-sm-7">
            <input type="text" required readonly  name="activated_date" id='activated_date' class="form-control" value='<?php if (!empty($video_cv_info)) echo $video_cv_info->activated_date; else echo set_value('activated_date'); ?>' />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Start Date :<span class="asterisk">*</span></label>
        <div class="col-sm-7">
            <input type="text" required readonly  name="start_date" id='start_date' class="form-control" value='<?php if (!empty($video_cv_info)) echo $video_cv_info->start_date; else echo set_value('start_date'); ?>' />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Expiry Date :<span class="asterisk">*</span></label>
        <div class="col-sm-7">
            <input type="text" required readonly name="expiry_date" id='expiry_date' class="form-control" value='<?php if (!empty($video_cv_info)) echo $video_cv_info->expiry_date; else echo set_value('expiry_date'); ?>' />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">&nbsp;</label>
        <div class="col-sm-7">
            <button class="btn btn-success btn-flat" type="submit">
                <?php
                if (!empty($job_detail)) {
                    echo 'Update Employer Video CV';
                } else {
                    echo 'Add Employer Video CV';
                }
                ?>
            </button>
        </div>
    </div>
<?php echo form_close(); ?>
</div><!-- panel-body -->
</div><!-- panel -->
