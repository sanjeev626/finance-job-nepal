<?php
    $action = base_url() . 'admin/content/editContent/' . $content_detail->id;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <section class="content-header">
          <h1>
            Edit <?php echo $content_detail->title; ?> Content
          </h1>
        </section>
    </div>
    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open_multipart($action, $attributes);
        ?>

       
        <div class="form-group">
            <label class="col-sm-3 control-label">Title :<span class="asterisk">*</span></label>
            <div class="col-sm-8">
                <input type="text" name="title" id='title' class="form-control" value='<?php if (!empty($content_detail)) echo $content_detail->title; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Content:</label>
            <div class="col-sm-8">
                <textarea name="contents" class="form-control simple" id="description" ><?php
                    if (!empty($content_detail)) {
                        echo $content_detail->contents;
                    }
                    ?></textarea>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-3 control-label">Image :</label>
            <div class="col-sm-7">
                <input type="file" name="contentImage" id='contentImage' class="form-control" value='' />
                <span class="green">(Image resolution must be 800 X 800 for better view)</span>
                <?php if (!empty($content_detail->image)) { ?>
                    <!--<input type="hidden" value="<?php /*echo $blog_detail->image; */?>" name="blogImage">-->
                    <div style="padding-top:10px;"><img height="30%" width="30%" src="<?php echo base_url() . 'uploads/content/' . $content_detail->image; ?>"></div>
                <?php } ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Status :</label>
            <div class="col-sm-8">
                <input type="radio" name="status"  value='Y' <?php if(!empty($content_detail)&& $content_detail->stat=='Y')echo 'checked'?>/>Publish |
                <input type="radio" name="status"  value='N' <?php if(!empty($content_detail) && $content_detail->stat=='N'){echo 'checked';}?> /> Un Publish

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Meta Title :</label>
            <div class="col-sm-8">
                <input type="text" name="meta_title" id='meta_title' class="form-control" value='<?php if (!empty($content_detail)) echo $content_detail->meta_title; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Meta keyword :</label>
            <div class="col-sm-8">
                <input type="text" name="meta_keyword" id='meta_keyword' class="form-control" value='<?php if (!empty($content_detail)) echo $content_detail->meta_keyword; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Meta Description :</label>
            <div class="col-sm-8">
                <input type="text" name="meta_desc" id='meta_desc' class="form-control" value='<?php if (!empty($content_detail)) echo $content_detail->meta_description; ?>' />
            </div>
        </div>


        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5" style="margin-left:0;">
                    <button class="btn btn-success btn-flat" type="submit">Update Content</button>&nbsp;
                </div>
            </div>
        </div><!-- panel-footer -->
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->

