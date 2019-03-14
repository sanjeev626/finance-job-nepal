<?php
if (!empty($advertisement_detail)) {
    $action = base_url() . 'admin/Advertisement/editAdvertisement/' . $advertisement_detail->id;
} else {
    $action = base_url() . 'admin/Advertisement/addAdvertisement';
}
?> 

<div class="box box-info">
    <div class="box-header with-border">
        <section class="content-header">
          <h1>
            <?php if (!empty($advertisement_detail)) { echo "Edit Advertisement"; } else { echo "Add Advertisement"; } ?>
          </h1>
        </section>
    </div>
    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open($action, $attributes);
        ?>

        <div class="form-group">
            <label class="col-sm-3 control-label">Title :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="addtitle" id='addtitle' class="form-control" value='<?php if (!empty($advertisement_detail)) echo $advertisement_detail->addtitle; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Website URL :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="website" id='website' class="form-control" value='<?php if (!empty($advertisement_detail)) echo $advertisement_detail->website; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Publish/Unpublish:</label>
            <div class="col-sm-2">
                <select class="form-control chosen-select" name='addstatus' data-placeholder="Choose a Status...">
                    <option value='publish' <?php if (isset($advertisement_detail) && $advertisement_detail->addstatus == 'publish') echo "selected='selected'"; ?>>Publish </option>
                    <option value='unpublish' <?php if (isset($advertisement_detail) && $advertisement_detail->addstatus == 'unpublish') echo "selected='selected'"; ?>>UnPublish</option>
                </select>
            </div>
        </div>

        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <button class="btn btn-success btn-flat" type="submit">
                        <?php
                        if (!empty($advertisement_detail)) {
                            echo 'Update Advertisement';
                        } else {
                            echo 'Add Advertisement';
                        }
                        ?>
                    </button>&nbsp;
                </div>
            </div>
        </div><!-- panel-footer -->
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->

