<style>
    .appendtraining{border-top: 1px dashed #ccc;padding-top: 10px}
    .removebutton{color:#ff0000}
</style>
<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->


<section class="candidate-dashboard-area section_70">
    <div class="container">
        <div class="row">
            <?php include('includes/jobseeker-dashboard-sidebar.php');?>

            <div class="col-md-12 col-lg-8 dashboard-left-border">
                <div class="dashboard-right">
                    <div class="candidate-single-profile-info earnings-page-box manage-jobs">
                        <?php
                        $action =base_url().'jobseeker/updatetraining/'.$sid;
                        $attributes = array('class' => 'form-horizontal user-logIn','name'=>'jobseekersupdate',);
                        echo form_open_multipart($action, $attributes);
                        ?>
                            <div class="resume-box text-left">
                                <div class="single-resume-feild">
                                    <div class="single-input">
                                        <h4>Trainings :</h4>
                                    </div>
                                    <?php if($this->session->flashdata('success')){ ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                            <?php echo $this->session->flashdata('success');?> </div>
                                    <?php } ?>
                                </div>
                                <?php
                                if(!empty($training_detail)){
                                    foreach($training_detail as $keys=>$val){?>
                                        <div class="<?php echo $keys==0?'trainingdiv':'appendtraining'?>">
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <input type="text" name="course[]" value="<?php echo $val->course;?>" class="form-control" placeholder="Training/Course">
                                                </div>
                                                <div class="single-input">
                                                    <input type="text" required="" name="institution[]" value="<?php echo $val->institution;?>" class="form-control" placeholder="Company/Institute Name">
                                                </div>
                                            </div>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <select name="frommonth[]" id="frommonth">
                                                        <option>From Month</option>
                                                        <option value="January" <?php if($val->frommonth == 'January'){echo "selected='selected'";}?>>January</option>
                                                        <option value="February" <?php if($val->frommonth == 'February'){echo "selected='selected'";}?>>February</option>
                                                        <option value="March" <?php if($val->frommonth == 'March'){echo "selected='selected'";}?>>March</option>
                                                        <option value="April" <?php if($val->frommonth == 'April'){echo "selected='selected'";}?>>April</option>
                                                        <option value="May" <?php if($val->frommonth == 'May'){echo "selected='selected'";}?>>May</option>
                                                        <option value="June" <?php if($val->frommonth == 'June'){echo "selected='selected'";}?>>June</option>
                                                        <option value="July" <?php if($val->frommonth == 'July'){echo "selected='selected'";}?>>July</option>
                                                        <option value="August" <?php if($val->frommonth == 'August'){echo "selected='selected'";}?>>August</option>
                                                        <option value="September" <?php if($val->frommonth == 'September'){echo "selected='selected'";}?>>September</option>
                                                        <option value="October" <?php if($val->frommonth == 'October'){echo "selected='selected'";}?>>October</option>
                                                        <option value="November" <?php if($val->frommonth == 'November'){echo "selected='selected'";}?>>November</option>
                                                        <option value="December" <?php if($val->frommonth == 'December'){echo "selected='selected'";}?>>December</option>
                                                    </select>
                                                </div>
                                                <div class="single-input">
                                                    <select name="fromyear[]" id="fromyear">
                                                        <option>From Year</option>
                                                        <?php
                                                        $cyear = date('Y');
                                                        $pyear = $cyear-50;
                                                        for($y=$pyear;$y<=$cyear;$y++){
                                                            ?>
                                                            <option value="<?php echo $y?>" <?php if($val->fromyear == $y){echo "selected='selected'";}?>><?php echo $y?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <select name="tomonth[]" id="tomonth">
                                                        <option>To Month</option>
                                                        <option value="January" <?php if($val->tomonth == 'January'){echo "selected='selected'";}?>>January</option>
                                                        <option value="February" <?php if($val->tomonth == 'February'){echo "selected='selected'";}?>>February</option>
                                                        <option value="March" <?php if($val->tomonth == 'March'){echo "selected='selected'";}?>>March</option>
                                                        <option value="April" <?php if($val->tomonth == 'April'){echo "selected='selected'";}?>>April</option>
                                                        <option value="May" <?php if($val->tomonth == 'May'){echo "selected='selected'";}?>>May</option>
                                                        <option value="June" <?php if($val->tomonth == 'June'){echo "selected='selected'";}?>>June</option>
                                                        <option value="July" <?php if($val->tomonth == 'July'){echo "selected='selected'";}?>>July</option>
                                                        <option value="August" <?php if($val->tomonth == 'August'){echo "selected='selected'";}?>>August</option>
                                                        <option value="September" <?php if($val->tomonth == 'September'){echo "selected='selected'";}?>>September</option>
                                                        <option value="October" <?php if($val->tomonth == 'October'){echo "selected='selected'";}?>>October</option>
                                                        <option value="November" <?php if($val->tomonth == 'November'){echo "selected='selected'";}?>>November</option>
                                                        <option value="December" <?php if($val->tomonth == 'December'){echo "selected='selected'";}?>>December</option>
                                                    </select>
                                                </div>
                                                <div class="single-input">
                                                    <select name="toyear[]" id="toyear">
                                                        <option>To Year</option>
                                                        <?php
                                                        $cyear = date('Y');
                                                        $pyear = $cyear-50;
                                                        for($y=$pyear;$y<=$cyear;$y++){
                                                            ?>
                                                            <option value="<?php echo $y?>" <?php if($val->toyear == $y){echo "selected='selected'";}?>><?php echo $y?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>

                                            <?php
                                            if($keys != 0){
                                                echo '<div class="single-resume-feild">
                                                            <div class="single-input text-center">
                                                                <a href="javascript:void(0)" class="removebutton" id="remove_training"><i class="fa fa-minus"                                                                                                aria-hidden="true"></i>
                                                                    Remove Training
                                                                </a>
                                                            </div>
                                                        </div>';
                                            }
                                            ?>
                                        </div>
                                    <?php }
                                }else{?>
                                <div class="trainingdiv">
                                    <div class="single-resume-feild feild-flex-2">
                                        <div class="single-input">
                                            <input type="text" name="course[]" value="" class="form-control" placeholder="Training/Course">
                                        </div>
                                        <div class="single-input">
                                            <input type="text" required="" name="institution[]" value="" class="form-control" placeholder="Company/Institute Name">
                                        </div>
                                    </div>
                                    <div class="single-resume-feild feild-flex-2">
                                        <div class="single-input">
                                            <select name="frommonth[]" id="frommonth">
                                                <option>From Month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                        <div class="single-input">
                                            <select name="fromyear[]" id="fromyear">
                                                <option>From Year</option>
                                                <?php
                                                $cyear = date('Y');
                                                $pyear = $cyear-50;
                                                for($y=$pyear;$y<=$cyear;$y++){
                                                ?>
                                                    <option value="<?php echo $y?>"><?php echo $y?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <select name="tomonth[]" id="tomonth">
                                            <option>To Month</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                    <div class="single-input">
                                        <select name="toyear[]" id="toyear">
                                            <option>To Year</option>
                                            <?php
                                            $cyear = date('Y');
                                            $pyear = $cyear-50;
                                            for($y=$pyear;$y<=$cyear;$y++){
                                                ?>
                                                <option value="<?php echo $y?>"><?php echo $y?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <?php }
                                ?>
                                <div class="addtrainingdiv">

                                </div>
                                <div class="single-resume-feild">
                                    <div class="single-input text-center">
                                        <a href="javascript:void(0)" id="add_training"><i class="fa fa-plus" aria-hidden="true"></i> Add Another Training
                                        </a>
                                    </div>
                                </div>
                                <div class="submit-resume">
                                    <button name="btnSave" type="submit">Save</button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $('#add_training').on('click',function(){
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('jobseeker/appendtraining')?>',
                success: function (data) {
                    $('.addtrainingdiv').last().append(data);
                }
            });
        });

        $(document).on('click','#remove_training',function(){
            $(this).parent().parent().parent().remove();
        });
    });
</script>