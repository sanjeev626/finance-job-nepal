<?php
if (!empty($dropdown_detail)) {
    $action = base_url() . 'admin/dropdown/editdropdown/' . $dropdown_detail->id;
} else {
    $action = base_url() . 'admin/dropdown/adddropdown';
}
?> 

<div class="box box-info">
    <div class="box-header with-border">
        <section class="content-header">
          <h1>
            <?php if (!empty($dropdown_detail)) { echo "Edit Dropdown Value"; } else { echo "Add Dropdown Value"; } ?>
          </h1>
        </section>
    </div>
    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open_multipart($action, $attributes);
        ?>

        <div class="form-group">
            <label class="col-sm-3 control-label">Select Field :</label>
            <div class="col-sm-7">
                <select class="form-control chosen-select" name='fid' id="fid" data-placeholder="Choose a Field..." onchange="getfid(this);">
                <?php foreach ($dropdown as $key => $value) { ?>
                    <option value='<?php echo $value->id; ?>' 
                        <?php 
                        if (isset($dropdown_detail) && $dropdown_detail->fid == $value->id) 
                            echo "selected='selected'";
                        elseif($this->session->flashdata('selectedfield')==$value->id){
                            echo "selected= 'selected'";
                        }
                             ?>

                        ><?php echo $value->title; ?> </option>
                <?php } ?>    
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Add Dropdown Value :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="dropvalue" id='dropvalue' class="form-control" value='<?php if (!empty($dropdown_detail)) echo $dropdown_detail->dropvalue; ?>' />
            </div>
        </div>


        <div class="categoryimage hide">
            <div class="form-group">
                <label class="col-sm-3 control-label">Categor Image :</label>
                <div class="col-sm-7">
                    <input type="file" name="image" class="form-control" value="">
                    <?php if(!empty($dropdown_detail->image)){?>
                    <img src="<?php echo base_url().'uploads/category/'.$dropdown_detail->image?>" alt="" width="150px">
                    <?php }?>
                </div>
            </div>
        </div>



        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <button class="btn btn-success btn-flat" type="submit">
                        <?php
                        if (!empty($dropdown_detail)) {
                            echo 'Update Dropdown Value';
                        } else {
                            echo 'Add Dropdown Value';
                        }
                        ?>
                    </button>&nbsp;
                </div>
            </div>
        </div><!-- panel-footer -->
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->
<?php
if (isset($dropdown_detail)){?>

    <script>
        $( document ).ready(function() {
            var fid = <?php echo $dropdown_detail->fid;?>;
            if(fid == 9){
                $('.categoryimage').removeClass('hide');
            }
        });
    </script>
<?php }
?>
    <script>
        function getfid(sel){

            if(sel.value == 9){
                $('.categoryimage').removeClass('hide');
            }
            else{
                $('.categoryimage').addClass('hide');
            }
        }
    </script>