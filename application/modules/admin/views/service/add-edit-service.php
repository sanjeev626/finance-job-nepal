<?php
if (!empty($service_detail)) {
    $action = base_url() . 'admin/Service/editService/' . $service_detail->id;
} else {
    $action = base_url() . 'admin/Service/addService';
}
?> 

<div class="box box-info">
    <div class="box-header with-border">
        <section class="content-header">
          <h1>
            <?php if (!empty($service_detail)) { echo "Edit Service"; } else { echo "Add Service"; } ?>
          </h1>
        </section>
    </div>
    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open_multipart($action, $attributes);
        ?>

        <div class="form-group">
            <label class="col-sm-3 control-label">Service Name :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="servicename" id='servicename' class="form-control" value='<?php if (!empty($service_detail)) echo $service_detail->servicename; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Content:</label>
            <div class="col-sm-7">
                <textarea name="content" class="form-control simple" id="description" ><?php
                    if (!empty($service_detail)) {
                        echo $service_detail->content;
                    }
                    ?></textarea>

            </div>
        </div>


        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <button class="btn btn-success btn-flat" type="submit">
                        <?php
                        if (!empty($service_detail)) {
                            echo 'Update Service';
                        } else {
                            echo 'Add Service';
                        }
                        ?>
                    </button>&nbsp;
                </div>
            </div>
        </div><!-- panel-footer -->
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->

