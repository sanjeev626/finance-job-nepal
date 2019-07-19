<?php
if (!empty($client_detail)) {
    $action = base_url() . 'admin/client/editclient/' . $client_detail->id;
} else {
    $action = base_url() . 'admin/client/addclient';
}
?> 

<div class="box box-info">
    <div class="box-header with-border">
        <section class="content-header">
          <h1>
            <?php if (!empty($client_detail)) { echo "Edit Client"; } else { echo "Add Client"; } ?>
          </h1>
        </section>
    </div>
    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open_multipart($action, $attributes);
        ?>

        <div class="form-group">
            <label class="col-sm-3 control-label">Client Name :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="clientname" id='clientname' class="form-control" value='<?php if (!empty($client_detail)) echo $client_detail->clientname; ?>' />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Website URL :</label>
            <div class="col-sm-7">
                <input type="text"  name="website" id='website' class="form-control" value='<?php if (!empty($client_detail)) echo $client_detail->url; ?>' />
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-3 control-label">Image :</label>
            <div class="col-sm-7">
                <input type="file" name="clientImage" id='clientImage' class="form-control" value='<?php if (!empty($client_detail)) echo $client_detail->image; ?>' />
                    <span class="green">(Image resolution must be 130 X 110 for better view)</span>

                <?php if (!empty($client_detail) && isset($client_detail->image)) { ?>
                    <!--<input type="hidden" value="<?php /*echo $client_detail->image; */?>" name="clientImage">-->
                    <div style="padding-top:10px;"><img height="30%" width="30%" src="<?php echo base_url() . 'uploads/clients/' . $client_detail->image; ?>"></div>
                <?php } ?>

            </div>
        </div>

        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <button class="btn btn-success btn-flat" type="submit">
                        <?php
                        if (!empty($client_detail)) {
                            echo 'Update Client';
                        } else {
                            echo 'Add Client';
                        }
                        ?>
                    </button>&nbsp;
                </div>
            </div>
        </div><!-- panel-footer -->
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->

