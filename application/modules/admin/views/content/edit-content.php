<?php
    $action = base_url() . 'admin/Content/editContent/' . $content_detail->id;
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
            <label class="col-sm-1 control-label">Title :<span class="asterisk">*</span></label>
            <div class="col-sm-9">
                <input type="text" name="title" id='title' class="form-control" value='<?php if (!empty($content_detail)) echo $content_detail->title; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-1 control-label">Content:</label>
            <div class="col-sm-9">&nbsp;</div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <textarea name="contents" class="form-control simple" id="description" ><?php
                    if (!empty($content_detail)) {
                        echo $content_detail->contents;
                    }
                    ?></textarea>

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

