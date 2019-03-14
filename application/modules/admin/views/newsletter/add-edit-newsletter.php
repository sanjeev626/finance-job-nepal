<?php
if (!empty($newsletter_detail)) {
    $action = base_url() . 'admin/newsletter/editNewsletter/' . $newsletter_detail->newsid;
} else {
    $action = base_url() . 'admin/newsletter/addNewsletter';
}
?> 

<div class="box box-info">
    <div class="box-header with-border">
         <section class="content-header">
          <h1>
            <?php if (!empty($newsletter_detail)) { echo "Edit Newsletter"; } else { echo "Add Newsletter"; } ?>
          </h1>
        </section>
    </div>
    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open($action, $attributes);
        ?>

        <div class="form-group">
            <label class="col-sm-3 control-label">Select Category :</label>
            <div class="col-sm-7">
                <select class="form-control chosen-select" name='cid' data-placeholder="Choose a Category...">
                    <option value="">Select Category</option>
                    <?php foreach ($functionalarea as $key => $value) { ?>
                    <option <?php if (isset($newsletter_detail) && $newsletter_detail->cid == $value->id) echo "selected='selected'"; ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">News Heading:<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="newstitle" id='newstitle' class="form-control" value='<?php if (!empty($newsletter_detail)) echo $newsletter_detail->newstitle; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">News Content:</label>
            <div class="col-sm-7">
                <textarea name="newscontents" class="form-control simple" id="description" ><?php
                    if (!empty($newsletter_detail)) {
                        echo $newsletter_detail->newscontents;
                    }
                    ?></textarea>

            </div>
        </div>


        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <button class="btn btn-success btn-flat" type="submit">
                        <?php
                        if (!empty($newsletter_detail)) {
                            echo 'Update Newsletter';
                        } else {
                            echo 'Add Newsletter';
                        }
                        ?>
                    </button>&nbsp;
                </div>
            </div>
        </div><!-- panel-footer -->
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->

