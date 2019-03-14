<?php
    $action = base_url() . 'admin/Content/addContent/';
?>

<div class="box box-info">
    <div class="box-header with-border">
        <section class="content-header">
          <h1>
            Add Content
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
                <input type="text" name="title" id='title' class="form-control" value='' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Content:</label>
            <div class="col-sm-8">
                <textarea name="contents" class="form-control simple" id="description" ></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <button class="btn btn-success btn-flat" type="submit">Add Content</button>&nbsp;
            </div>
        </div>
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->

