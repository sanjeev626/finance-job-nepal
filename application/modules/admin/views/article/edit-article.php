<?php
    $action = base_url() . 'admin/Article/editArticle/' . $article_detail->id;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <section class="article-header">
          <h1>
            Edit <?php echo $article_detail->title; ?> Article
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
                <input type="text" name="title" id='title' class="form-control" value='<?php if (!empty($article_detail)) echo $article_detail->title; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Article:</label>
            <div class="col-sm-8">
                <textarea name="articles" class="form-control simple" id="description" ><?php
                    if (!empty($article_detail)) {
                        echo $article_detail->articles;
                    }
                    ?>
                </textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <button class="btn btn-success btn-flat" type="submit">Update Article</button>&nbsp;
            </div>
        </div>
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->