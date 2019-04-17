<style>
    .appendedu{border-top: 1px dashed #ccc;padding-top: 10px}
    .removebutton{color:#ff0000}
</style>
<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->


<section class="candidate-dashboard-area section_70">
    <div class="container">
        <div class="row">
            <?php include('includes/jobseeker-dashboard-sidebar.php'); ?>

            <div class="col-md-12 col-lg-8 dashboard-left-border">
                <div class="dashboard-right">
                    <div class="candidate-single-profile-info earnings-page-box manage-jobs">
                        <?php
                        $action =base_url().'Jobseeker/updateEducation/'.$sid;
                        $attributes = array('class' => 'form-horizontal user-logIn','name'=>'jobseekersupdate',);
                        echo form_open_multipart($action, $attributes);
                        ?>

                            <div class="resume-box text-left">
                                <div class="single-resume-feild">
                                    <div class="single-input">
                                        <h4>Education :</h4>
                                    </div>
                                    <?php if($this->session->flashdata('success')){ ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                            <?php echo $this->session->flashdata('success');?> </div>
                                    <?php } ?>
                                </div>
                                 <?php
                                 if(!empty($education_detail)){
                                     foreach($education_detail as $keys => $val){?>
                                        <div class="<?php echo $keys==0?'edudiv':'appendedu'?>">
                                             <div class="single-resume-feild feild-flex-2">
                                                 <div class="single-input">
                                                     <select name="degree[<?php echo $keys;?>]" id="degree">
                                                         <option value="">--Select Degree--</option>
                                                         <?php foreach ($education as $value) { ?>
                                                             <option
                                                                 value='<?php echo $value->id; ?>' <?php if($val->degree == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->dropvalue; ?></option>
                                                         <?php } ?>
                                                     </select>
                                                 </div>
                                                 <div class="single-input">
                                                     <input type="text" required="" name="education_program[<?php echo $keys;?>]" value="<?php echo $val->education_program?>"
                                                            class="form-control" placeholder="Education Program">
                                                 </div>
                                             </div>

                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <select name="education_board[<?php echo $keys;?>]" id="education_board">
                                                        <option value="">Select Education Board</option>
                                                        <option value="HSEB" <?php if($val->board == 'HSEB'){ echo "selected='selected'"; } ?>>HSEB</option>
                                                        <option value="Kathmandu University" <?php if($val->board == 'Kathmandu University'){ echo "selected='selected'"; } ?>>Kathmandu University</option>
                                                        <option value="Tribhuvan University" <?php if($val->board == 'Tribhuvan University'){ echo "selected='selected'"; } ?>>Tribhuvan University</option>
                                                        <option value="Pokhara University" <?php if($val->board == 'Pokhara University'){ echo "selected='selected'"; } ?>>Pokhara University</option>
                                                        <option value="Purbanchal University" <?php if($val->board == 'Purbanchal University'){ echo "selected='selected'"; } ?>>Purbanchal University</option>

                                                    </select>
                                                </div>
                                                <div class="single-input">
                                                    <input type="text" value="<?php echo $val->instution ?>" name="name_of_institute[<?php echo $keys;?>]"
                                                           id="name_of_institute" placeholder="Name of Institute">
                                                </div>
                                            </div>

                                            <div class="single-job-sidebar sidebar-type">
                                                <div class="job-sidebar-box checkbox section_0">
                                                    <input class="" type="checkbox" id="currently_studying"
                                                           name="currently_studying[<?php echo $keys;?>]" value="1" <?php echo ($val->current_studying==1)?'checked':'';?>/>
                                                    <label for="currently_studying" class="currently_studying"><span></span>Currently
                                                        studying here?</label>
                                                </div>
                                            </div>

                                            <div class="graduation">
                                                <div class="single-resume-feild feild-flex-2">
                                                    <div class="single-input">
                                                        <select id="marks_secured_in" name="marks_secured_in[<?php echo $keys;?>]">
                                                            <option value="">Marks secured in</option>
                                                            <option value="Percentage" <?php if($val->marks_secured_in == 'Percentage'){ echo "selected='selected'"; } ?>>Percentage</option>
                                                            <option value="CGPA" <?php if($val->marks_secured_in == 'CGPA'){ echo "selected='selected'"; } ?>>CGPA</option>
                                                        </select>
                                                    </div>
                                                    <div class="single-input">
                                                        <input type="text" value="<?php echo $val->marks_secured?>" id="marks_secured" name="marks_secured[<?php echo $keys;?>]"
                                                               placeholder="Marks Secured">
                                                    </div>
                                                </div>
                                                <div class="single-resume-feild feild-flex-2">
                                                    <div class="single-input">
                                                        <select id="graduation_year" name="graduation_year[<?php echo $keys;?>]">
                                                            <option value="">Select Graduation Year</option>
                                                            <?php
                                                            $cyear = date('Y');
                                                            $pyear = $cyear - 50;
                                                            for ($y = $pyear; $y <= $cyear; $y++) {
                                                                ?>
                                                                <option value="<?php echo $y; ?>"<?php if($val->graduationyear == $y){echo "selected='selected'";}?>><?php echo $y; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="single-input">
                                                        <select id="graduation_month" name="graduation_month[<?php echo $keys;?>]">
                                                            <option value="">Select Graduation Month</option>
                                                            <option value="January" <?php if($val->graduation_month == 'January'){echo "selected='selected'";}?>>January</option>
                                                            <option value="February" <?php if($val->graduation_month == 'February'){echo "selected='selected'";}?>>February</option>
                                                            <option value="March" <?php if($val->graduation_month == 'March'){echo "selected='selected'";}?>>March</option>
                                                            <option value="April" <?php if($val->graduation_month == 'April'){echo "selected='selected'";}?>>April</option>
                                                            <option value="May" <?php if($val->graduation_month == 'May'){echo "selected='selected'";}?>>May</option>
                                                            <option value="June" <?php if($val->graduation_month == 'June'){echo "selected='selected'";}?>>June</option>
                                                            <option value="July" <?php if($val->graduation_month == 'July'){echo "selected='selected'";}?>>July</option>
                                                            <option value="August" <?php if($val->graduation_month == 'August'){echo "selected='selected'";}?>>August</option>
                                                            <option value="September" <?php if($val->graduation_month == 'September'){echo "selected='selected'";}?>>September</option>
                                                            <option value="October" <?php if($val->graduation_month == 'October'){echo "selected='selected'";}?>>October</option>
                                                            <option value="November" <?php if($val->graduation_month == 'November'){echo "selected='selected'";}?>>November</option>
                                                            <option value="December" <?php if($val->graduation_month == 'December'){echo "selected='selected'";}?>>December</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="currentgrad" style="display: none;">
                                                <div class="single-resume-feild feild-flex-2 started" >
                                                    <div class="single-input">
                                                        <select id="gender">
                                                            <option value="">Select Started Year</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                        </select>
                                                    </div>
                                                    <div class="single-input">
                                                        <select id="gender">
                                                            <option value="">Select Started Month</option>
                                                            <option value="January">January</option>
                                                            <option value="February">February</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            if($keys != 0){
                                                echo '<div class="single-resume-feild">
                                                    <div class="single-input text-center">
                                                        <a href="javascript:void(0)" class="removebutton" id="remove_edu"><i class="fa fa-minus"
                                                                                                                     aria-hidden="true"></i>
                                                            Remove Education
                                                        </a>
                                                    </div>
                                                </div>';
                                            }
                                            ?>
                                        </div>
                                     <?php }
                                 }
                                 else{?>
                                     <div class="edudiv">
                                         <div class="single-resume-feild feild-flex-2">
                                             <div class="single-input">
                                                 <select name="degree[0]" id="degree">
                                                     <option value="">--Select Degree--</option>
                                                     <?php foreach ($education as  $value) { ?>
                                                         <option value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                                                     <?php } ?>
                                                 </select>
                                             </div>
                                             <div class="single-input">
                                                 <input type="text" required="" name="education_program[0]" value=""
                                                        class="form-control" placeholder="Education Program">
                                             </div>
                                         </div>
                                         <div class="single-resume-feild feild-flex-2">
                                             <div class="single-input">
                                                 <select name="education_board[0]" id="education_board">
                                                     <option value="">Select Education Board</option>
                                                     <option value="HSEB">HSEB</option>
                                                     <option value="Kathmandu University">Kathmandu University</option>
                                                     <option value="Tribhuvan University">Tribhuvan University</option>
                                                     <option value="Pokhara University">Pokhara University</option>
                                                     <option value="Purbanchal University">Purbanchal University</option>

                                                 </select>
                                             </div>
                                             <div class="single-input">
                                                 <input type="text" value="" name="name_of_institute[0]"
                                                        id="name_of_institute" placeholder="Name of Institute">
                                             </div>
                                         </div>
                                         <div class="single-job-sidebar sidebar-type">
                                             <div class="job-sidebar-box checkbox section_0">
                                                 <input class="" type="checkbox" id="currently_studying"
                                                        name="currently_studying[0]" value="1"/>
                                                 <label for="currently_studying" class="currently_studying"><span></span>Currently
                                                     studying here?</label>
                                             </div>
                                         </div>
                                         <div class="graduation">
                                             <div class="single-resume-feild feild-flex-2">
                                                 <div class="single-input">
                                                     <select id="marks_secured_in" name="marks_secured_in[0]">
                                                         <option value="">Marks secured in</option>
                                                         <option value="Percentage">Percentage</option>
                                                         <option value="CGPA">CGPA</option>
                                                     </select>
                                                 </div>
                                                 <div class="single-input">
                                                     <input type="text" value="" id="marks_secured" name="marks_secured[0]"
                                                            placeholder="Marks Secured">
                                                 </div>
                                             </div>
                                             <div class="single-resume-feild feild-flex-2">
                                                 <div class="single-input">
                                                     <select id="graduation_year" name="graduation_year[0]">
                                                         <option value="">Select Graduation Year</option>
                                                         <?php
                                                         $cyear = date('Y');
                                                         $pyear = $cyear - 50;
                                                         for ($y = $pyear; $y <= $cyear; $y++) {
                                                             ?>
                                                             <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                                         <?php } ?>
                                                     </select>
                                                 </div>
                                                 <div class="single-input">
                                                     <select id="graduation_month" name="graduation_month[0]">
                                                         <option value="">Select Graduation Month</option>
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
                                             </div>
                                         </div>
                                         <div class="currentgrad" style="display: none;">
                                             <div class="single-resume-feild feild-flex-2 started" >
                                                 <div class="single-input">
                                                     <select id="gender">
                                                         <option value="">Select Started Year</option>
                                                         <option value="2019">2019</option>
                                                         <option value="2018">2018</option>
                                                     </select>
                                                 </div>
                                                 <div class="single-input">
                                                     <select id="gender">
                                                         <option value="">Select Started Month</option>
                                                         <option value="January">January</option>
                                                         <option value="February">February</option>
                                                     </select>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 <?php }
                                 ?>


                                <div class="addeducationdiv">
                                </div>
                                <div class="single-resume-feild">
                                    <div class="single-input text-center">
                                        <?php
                                            if(!empty($education_detail)){
                                                $count = count($education_detail)-1;
                                            }
                                            else
                                                $count = 0;
                                        ?>
                                        <input type="hidden" name="educount" id="educount"  value="<?php echo $count;?>">
                                        <a href="javascript:void(0)"  id="addeducation"><i class="fa fa-plus"
                                                                                                     aria-hidden="true"></i>
                                            Add Another Education
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
        $('#addeducation').on('click',function(){
            var count = $('#educount').val();
            $.ajax({
                data :{count:count},
                type: 'POST',
                url: '<?php echo base_url('Jobseeker/appendEducation')?>',
                success: function (data) {
                    $('.addeducationdiv').last().append(data);
                    count++;
                    $('#educount').val(count);


                }
            });
        });

        $(document).on('click','#remove_edu',function(){
            $(this).parent().parent().parent().remove();
        });
    });
</script>