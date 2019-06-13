<?php

if (!empty($blog_detail)) {
    $action = base_url() . 'admin/blog/update/' . $blog_detail->id;
} else {
    $action = base_url() . 'admin/blog/save';
}
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
                <input type="text" name="title" id='title' required class="form-control" value='<?php if (!empty($blog_detail)) echo $blog_detail->title; ?>' />
            </div>
        </div>
        <!-- <div class="form-group">
            <label class="col-sm-3 control-label" for="category">Category</label>
            <div class="col-sm-8">
                <select class="form-control" name="category" id="category">
                    <option value="0">--Select Category--</option>
                    <?php
                        foreach($categories as $category){
                            if($category->id == $blog_detail->cat_id){
                                $selected = "selected";
                            }
                            else{
                                $selected = '';
                            }
                            echo '<option value="'.$category->id.'" '.$selected.'>'.$category->title.'</option>';
                        }
                    ?>
                </select>
            </div>
        </div> -->

        <div class="form-group">
            <label class="col-sm-3 control-label">Article:</label>
            <div class="col-sm-8">
                <textarea name="articles" class="form-control simple" id="description" ><?php if (!empty($blog_detail)) echo $blog_detail->articles; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Image :</label>
            <div class="col-sm-7">
                <input type="file" name="blogImage" id='blogImage' class="form-control" value='' />
                <span class="green">(Image resolution must be 800 X 800 for better view)</span>

                <?php if (!empty($blog_detail) && isset($blog_detail->image)) { ?>
                    <!--<input type="hidden" value="<?php /*echo $blog_detail->image; */?>" name="blogImage">-->
                    <div style="padding-top:10px;"><img height="30%" width="30%" src="<?php echo base_url() . 'uploads/blog/' . $blog_detail->image; ?>"></div>
                <?php } ?>

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Status :</label>
            <div class="col-sm-8">
                <input type="radio" name="status"  value='Y' <?php if(!empty($blog_detail)&& $blog_detail->stat=='Y')echo 'checked'?>/>Publish |
                <input type="radio" name="status"  value='N' <?php if(!empty($blog_detail) && $blog_detail->stat=='N'){echo 'checked';}?> /> Un Publish

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