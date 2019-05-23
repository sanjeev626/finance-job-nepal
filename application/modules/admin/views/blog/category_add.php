<?php
if (!empty($category_detail)) {
    $action = base_url() . 'admin/blog/category/update/' . $category_detail->id;
} else {
    $action = base_url() . 'admin/blog/category/save';
}
//$action = base_url() . 'admin/blog/category/save';
?>

<div class="box box-info">
    <div class="box-header with-border">
        <section class="article-header">
            <h1>
                <?php echo $panel_title?>
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
                <input type="text" name="title" id='title' class="form-control" value='<?php if (!empty($category_detail)) echo $category_detail->title; ?>' required/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Status :</label>
            <div class="col-sm-8">

                <input type="radio" name="status"  value='Y' <?php if(!empty($category_detail)&& $category_detail->status=='Y')echo 'checked'?>/>Publish |
                <input type="radio" name="status"  value='N' <?php if(!empty($category_detail) && $category_detail->status=='N'){echo 'checked';}?> /> Un Publish

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <button class="btn btn-success btn-flat" type="submit"><?php echo $panel_title?></button>&nbsp;
            </div>
        </div>
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->