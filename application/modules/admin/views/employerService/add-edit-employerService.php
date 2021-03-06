<?php
if (!empty($employerservice_detail)) {
    $action = base_url() . 'admin/EmployerService/editEmployerService/' . $employerservice_detail->id;
} else {
    $action = base_url() . 'admin/EmployerService/addEmployerService';
}
?> 

<div class="box box-info">
    <div class="box-header with-border">
        <section class="content-header">
          <h1>
            <?php if (!empty($employerservice_detail)) { echo "Edit Employer Service"; } else { echo "Add Employer Service"; } ?>
          </h1>
        </section>
    </div>
    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open_multipart($action, $attributes);
        ?>

        <div class="form-group">
            <label class="col-sm-3 control-label">Title:<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="title" id='title' class="form-control" value='<?php if (!empty($employerservice_detail)) echo $employerservice_detail->title; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Logo :</label>
            <div class="col-sm-7">
                <input type="file" name="servicelogo" id='servicelogo' class="form-control" value='<?php if (!empty($employerservice_detail)) echo $employerservice_detail->logo; ?>' />
                    <span class="green">(Image resolution must be 714 X 518 for better view)</span>

                <?php if (!empty($employerservice_detail) && isset($employerservice_detail->logo)) { ?>
                    <input type="hidden" value="<?php echo $employerservice_detail->logo; ?>" name="old_servicelogo">
                    <div style="padding-top:10px;"><img height="30%" width="30%" src="<?php echo base_url() . 'uploads/service/' . $employerservice_detail->logo; ?>"></div>
                <?php } ?>

            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-3 control-label">Short Description :</label>
            <div class="col-sm-9">
                
                <textarea required rows="5" name="short_description" class="form-control simple" id="description" ><?php
                    if (!empty($employerservice_detail)) {
                        echo $employerservice_detail->short_description;
                    }
                    ?>
                </textarea>

            </div>
        </div>
        
         <div class="form-group">
            <label class="col-sm-3 control-label">Content :</label>
            <div class="col-sm-9">
                
                <textarea required rows="5" name="content" class="form-control textarea_description" id="description" ><?php
                    if (!empty($employerservice_detail)) {
                        echo $employerservice_detail->content;
                    }
                    ?>
                </textarea>

            </div>
        </div>

        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <button class="btn btn-success btn-flat" type="submit">
                        <?php
                        if (!empty($employerservice_detail)) {
                            echo 'Update Employer Service';
                        } else {
                            echo 'Add Employer Service';
                        }
                        ?>
                    </button>&nbsp;
                </div>
            </div>
        </div><!-- panel-footer -->
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->

