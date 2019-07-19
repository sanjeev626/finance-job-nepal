<?php
if (!empty($advertisement_detail)) {
    $action = base_url() . 'admin/advertisement/editadvertisement/' . $advertisement_detail->id;
} else {
    $action = base_url() . 'admin/advertisement/addadvertisement';
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
        echo form_open_multipart($action, $attributes);
        ?>

        <div class="form-group">
            <label class="col-sm-3 control-label">Title :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="addtitle" id='addtitle' class="form-control" value='<?php if (!empty($advertisement_detail)) echo $advertisement_detail->addtitle; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Website URL :</label>
            <div class="col-sm-7">
                <input type="text"  name="website" id='website' class="form-control" value='<?php if (!empty($advertisement_detail)) echo $advertisement_detail->website; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Image :</label>
            <div class="col-sm-7">
                <input type="file" name="image" id='image' class="form-control" value='<?php if (!empty($advertisement_detail)) echo $advertisement_detail->image; ?>' />
                <span class="green">(Image resolution must be 250 X 100 for better view)</span>

                <?php if (!empty($advertisement_detail) && isset($advertisement_detail->image)) { ?>
                    <img src="" alt="">
                    <!--<input type="hidden" value="<?php /*echo $advertisement_detail->image; */?>" name="rightimage">-->
                    <div style="padding-top:10px;"><img height="30%" width="30%" src="<?php echo base_url().'uploads/advertisement/'.$advertisement_detail->image; ?>"></div>

                <?php } ?>

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

