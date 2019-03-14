<?php
    $action = base_url() . 'admin/Banner/editBanner/' . $banner_detail->id;
?> 

<div class="box box-info">
    <div class="box-header with-border">
         <section class="content-header">
          <h1>
            Edit Banner
          </h1>
        </section>
    </div>
    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open_multipart($action, $attributes);
        ?>

        <div class="form-group">
            <label class="col-sm-3 control-label">Left Image :</label>
            <div class="col-sm-7">
                <input type="file" name="leftimage" id='leftimage' class="form-control" value='<?php if (!empty($banner_detail)) echo $banner_detail->leftimage; ?>' />
                    <span class="green">(Image resolution must be 250 X 100 for better view)</span>

                <?php if (!empty($banner_detail) && isset($banner_detail->leftimage)) { ?>
                    <input type="hidden" value="<?php echo $banner_detail->leftimage; ?>" name="leftimage">
                    <div style="padding-top:10px;"><img height="50%" width="50%" src="<?php echo base_url() . 'uploads/banner/' . $banner_detail->leftimage; ?>"></div>
                <?php } ?>

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Left Image Link :</label>
            <div class="col-sm-7">
                <input type="text" name="leftlink" id='leftlink' class="form-control" value='<?php if (!empty($banner_detail)) echo $banner_detail->leftlink; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Right Image :</label>
            <div class="col-sm-7">
                <input type="file" name="rightimage" id='rightimage' class="form-control" value='<?php if (!empty($banner_detail)) echo $banner_detail->rightimage; ?>' />
                <span class="green">(Image resolution must be 250 X 100 for better view)</span>

                <?php if (!empty($banner_detail) && isset($banner_detail->rightimage)) { ?>
                    <input type="hidden" value="<?php echo $banner_detail->rightimage; ?>" name="rightimage">
                    <div style="padding-top:10px;"><img height="50%" width="50%" src="<?php echo base_url() . 'uploads/banner/' . $banner_detail->rightimage; ?>"></div>
                <?php } ?>

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Right Image Link :</label>
            <div class="col-sm-7">
                <input type="text" name="rightlink" id='rightlink' class="form-control" value='<?php if (!empty($banner_detail)) echo $banner_detail->rightlink; ?>' />
            </div>
        </div>

         <div class="form-group">
            <label class="col-sm-3 control-label">Flash Image :</label>
            <div class="col-sm-7">
                <input type="file" name="flashimage" id='flashimage' class="form-control" value='' />
                <span class="green">(Flash resolution must be 500 X 103)</span>

                <script src="<?php echo base_url(); ?>content_admin/assets/AC_RunActiveContent.js" type="text/javascript"></script>
              <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','564','height','116','title','Flash Banner','src','<?php echo base_url()?>uploads/banner/flash','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','<?php echo base_url()?>uploads/banner/flash' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="564" height="116" title="Flash Banner">
<param name="movie" value="../images/flash/flash.swf">
<param name="quality" value="high">
<embed src="<?php echo base_url()?>uploads/banner/flash.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="564" height="116"></embed>
</object></noscript>  

            </div>
        </div>

         <div class="form-group">
            <label class="col-sm-3 control-label">Job Seeker Logo:</label>
            <div class="col-sm-7">
                <input type="file" name="jobseeker" id='jobseeker' class="form-control" value='<?php if (!empty($banner_detail)) echo $banner_detail->jobseeker; ?>' />
                <span class="green">(Image resolution must be 400 X 315 for better view)</span>

                <?php if ($banner_detail->jobseeker) { ?>
                    <input type="hidden" value="<?php echo $banner_detail->jobseeker; ?>" name="old_desktop_banner_image">
                    <div style="padding-top:10px;"><img height="50%" width="50%" src="<?php echo base_url() . 'uploads/banner/' . $banner_detail->jobseeker; ?>"></div>
                <?php } ?>

            </div>
        </div>

         <div class="form-group">
            <label class="col-sm-3 control-label">Employer Logo :</label>
            <div class="col-sm-7">
                <input type="file" name="employer" id='employer' class="form-control" value='<?php if (!empty($banner_detail)) echo $banner_detail->employer; ?>' />
                <span class="green">(Image resolution must be 400 X 315 for better view)</span>

                <?php if ($banner_detail->employer) { ?>
                    <input type="hidden" value="<?php echo $banner_detail->employer; ?>" name="employer">
                    <div style="padding-top:10px;"><img height="50%" width="50%" src="<?php echo base_url() . 'uploads/banner/' . $banner_detail->employer; ?>"></div>
                <?php } ?>

            </div>
        </div>

        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <button class="btn btn-success btn-flat" type="submit">
                        Update Banner
                    </button>&nbsp;
                </div>
            </div>
        </div><!-- panel-footer -->
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->

