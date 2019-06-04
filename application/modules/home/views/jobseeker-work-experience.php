<style>
    .appendexperience{border-top: 1px dashed #ccc;padding-top: 10px}
    .removebutton{color:#ff0000}
    .hide{display:none}
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
                        $action =base_url().'jobseeker/updateexperience/'.$sid;
                        $attributes = array('class' => 'form-horizontal user-logIn','name'=>'jobseekersupdate',);
                        echo form_open_multipart($action, $attributes);
                        ?>
                            <div class="resume-box text-left">
                                <div class="single-resume-feild">
                                    <div class="single-input">
                                        <h4>Work Experience :</h4>
                                        <?php if($this->session->flashdata('success')){ ?>
                                            <div class="alert alert-success alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                                <?php echo $this->session->flashdata('success');?> </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                                if(!empty($experience_detail)){
                                    foreach($experience_detail as $key=>$val){?>
                                        <div class="<?php echo $key==0?'experiencediv':'appendexperience'?>">
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <input type="text" required="" name="company[<?php echo $key?>]" value="<?php echo $val->company;?>" class="form-control" placeholder="Organization name">
                                                </div>
                                                <div class="single-input">
                                                    <input type="text" name="location[<?php echo $key?>]" value="<?php echo $val->location;?>" class="form-control" placeholder="Job location">
                                                </div>
                                            </div>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <input type="text"  name="title[<?php echo $key?>]" value="<?php echo $val->title;?>" class="form-control" placeholder="Job Title">
                                                </div>
                                                <div class="single-input">
                                                    <select name="position[<?php echo $key?>]" id="position">
                                                        <option value="">Job level</option>
                                                        <option value="Top Level" <?php if($val->position =='Top Level') echo 'selected'?>>Top Level</option>
                                                        <option value="Senior Level" <?php if($val->position =='Senior Level') echo 'selected'?>>Senior Level</option>
                                                        <option value="Mid Level" <?php if($val->position =='Mid Level') echo 'selected'?>>Mid Level</option>
                                                        <option value="Entry Level" <?php if($val->position =='Entry Level') echo 'selected'?>>Entry Level</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="single-job-sidebar sidebar-type">
                                                <div class="job-sidebar-box checkbox section_0">
                                                    <input value="1" class="" type="checkbox" id="currently_working_<?php echo $key?>" onchange="currentlyworking(<?php echo $key?>)" name="currently_working[<?php echo $key?>]" <?php if($val->currently_working =='1') echo 'checked'?>  />
                                                    <label for="currently_working" class="currently_working"><span></span>Currently working here?</label>
                                                </div>
                                            </div>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <select name="frommonth[<?php echo $key?>]" id="frommonth">
                                                        <option>Start Month</option>
                                                        <option value="January" <?php if($val->frommonth =='January') echo 'selected'?>>January</option>
                                                        <option value="February" <?php if($val->frommonth =='February') echo 'selected'?>>February</option>
                                                        <option value="March" <?php if($val->frommonth =='March') echo 'selected'?>>March</option>
                                                        <option value="April" <?php if($val->frommonth =='April') echo 'selected'?>>April</option>
                                                        <option value="May" <?php if($val->frommonth =='May') echo 'selected'?>>May</option>
                                                        <option value="June" <?php if($val->frommonth =='June') echo 'selected'?>>June</option>
                                                        <option value="July" <?php if($val->frommonth =='July') echo 'selected'?>>July</option>
                                                        <option value="August" <?php if($val->frommonth =='August') echo 'selected'?>>August</option>
                                                        <option value="September" <?php if($val->frommonth =='September') echo 'selected'?>>September</option>
                                                        <option value="October" <?php if($val->frommonth =='October') echo 'selected'?>>October</option>
                                                        <option value="November" <?php if($val->frommonth =='November') echo 'selected'?>>November</option>
                                                        <option value="December" <?php if($val->frommonth =='December') echo 'selected'?>>December</option>
                                                    </select>
                                                </div>
                                                <div class="single-input">
                                                    <select name="fromyear[<?php echo $key?>]" id="fromyear">
                                                        <option>Start Year</option>
                                                        <?php
                                                        $cyear = date('Y');
                                                        $pyear = $cyear - 50;
                                                        for ($y = $pyear; $y <= $cyear; $y++) {
                                                            ?>
                                                            <option value="<?php echo $y; ?>" <?php if($val->fromyear ==$y) echo 'selected'?>><?php echo $y; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="single-resume-feild feild-flex-2 <?php if($val->currently_working =='1') echo 'hide'?>" id="endmonthyear_<?php echo $key?>">
                                                <div class="single-input">
                                                    <select name="tomonth[<?php echo $key?>]" id="tomonth">
                                                        <option>End Month</option>
                                                        <option value="January" <?php if($val->tomonth =='January') echo 'selected'?>>January</option>
                                                        <option value="February" <?php if($val->tomonth =='February') echo 'selected'?>>February</option>
                                                        <option value="March" <?php if($val->tomonth =='March') echo 'selected'?>>March</option>
                                                        <option value="April" <?php if($val->tomonth =='April') echo 'selected'?>>April</option>
                                                        <option value="May" <?php if($val->tomonth =='May') echo 'selected'?>>May</option>
                                                        <option value="June" <?php if($val->tomonth =='June') echo 'selected'?> >June</option>
                                                        <option value="July" <?php if($val->tomonth =='July') echo 'selected'?>>July</option>
                                                        <option value="August" <?php if($val->tomonth =='August') echo 'selected'?>>August</option>
                                                        <option value="September" <?php if($val->tomonth =='September') echo 'selected'?>>September</option>
                                                        <option value="October" <?php if($val->tomonth =='October') echo 'selected'?>>October</option>
                                                        <option value="November" <?php if($val->tomonth =='November') echo 'selected'?>>November</option>
                                                        <option value="December" <?php if($val->tomonth =='December') echo 'selected'?>>December</option>
                                                    </select>
                                                </div>
                                                <div class="single-input">
                                                    <select name="toyear[<?php echo $key?>]" id="toyear">
                                                        <option>End Year</option>
                                                        <?php
                                                        $cyear = date('Y');
                                                        $pyear = $cyear - 50;
                                                        for ($y = $pyear; $y <= $cyear; $y++) {
                                                            ?>
                                                            <option value="<?php echo $y; ?>" <?php if($val->toyear ==$y) echo 'selected'?>><?php echo $y; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="single-resume-feild">
                                                <div class="single-input">
                                                    <textarea class="textarea duties" id="duties" name="duties[<?php echo $key?>]" id="duties_and_responsibilities" placeholder="Duties &amp; Responsibilities Here..."><?php echo $val->roles_and_responsibilities;?></textarea>
                                                </div>
                                            </div>
                                            <?php
                                            if($key!=0){
                                                echo '<div class="single-resume-feild">
                                                        <div class="single-input text-center">
                                                            <a href="javascript:void(0)" class="removebutton" id="remove_experience"><i class="fa fa-minus"                                                                                                     aria-hidden="true"></i>
                                                                Remove Experience
                                                            </a>
                                                        </div>
                                                    </div>';
                                            }
                                            ?>
                                        </div>
                                    <?php }
                                }
                                else{?>
                                    <div class="experiencediv">
                                        <div class="single-resume-feild feild-flex-2">
                                            <div class="single-input">
                                                <input type="text" required="" name="company[0]" value="" class="form-control" placeholder="Organization name">
                                            </div>
                                            <div class="single-input">
                                                <input type="text" name="location[0]" value="" class="form-control" placeholder="Job location">
                                            </div>
                                        </div>
                                        <div class="single-resume-feild feild-flex-2">
                                            <div class="single-input">
                                                <input type="text"  name="title[0]" value="" class="form-control" placeholder="Job Title">
                                            </div>
                                            <div class="single-input">
                                                <select name="position[0]" id="position">
                                                    <option value="">Job level</option>
                                                    <option value="Top Level">Top Level</option>
                                                    <option value="Senior Level">Senior Level</option>
                                                    <option value="Mid Level">Mid Level</option>
                                                    <option value="Entry Level">Entry Level</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="single-job-sidebar sidebar-type">
                                            <div class="job-sidebar-box checkbox section_0">
                                                <input value="1" class="" type="checkbox" id="currently_working_0" onchange="currentlyworking(0)" name="currently_working[0]" />
                                                <label for="currently_working" class="currently_working"><span></span>Currently working here?</label>
                                            </div>
                                        </div>
                                        <div class="single-resume-feild feild-flex-2">
                                            <div class="single-input">
                                                <select name="frommonth[0]" id="frommonth">
                                                    <option>Start Month</option>
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
                                                <select name="fromyear[0]" id="fromyear">
                                                    <option>Start Year</option>
                                                    <?php
                                                    $cyear = date('Y');
                                                    $pyear = $cyear - 50;
                                                    for ($y = $pyear; $y <= $cyear; $y++) {
                                                        ?>
                                                        <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="single-resume-feild feild-flex-2" id="endmonthyear_0">
                                            <div class="single-input">
                                                <select name="tomonth[0]" id="tomonth">
                                                    <option>End Month</option>
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
                                                <select name="toyear[0]" id="toyear">
                                                    <option>End Year</option>
                                                    <?php
                                                    $cyear = date('Y');
                                                    $pyear = $cyear - 50;
                                                    for ($y = $pyear; $y <= $cyear; $y++) {
                                                        ?>
                                                        <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="single-resume-feild">
                                            <div class="single-input">
                                                <textarea class="textarea duties" id="duties" name="duties[0]" id="duties_and_responsibilities" placeholder="Duties &amp; Responsibilities Here..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>



                                <div class="addexperiencediv">

                                </div>
                                <div class="single-resume-feild">
                                    <?php
                                    if(!empty($experience_detail)){
                                        $count = count($experience_detail)-1;
                                    }
                                    else
                                        $count = 0;
                                    ?>
                                    <input type="hidden" name="expcount" id="expcount"  value="<?php echo $count;?>">
                                    <div class="single-input text-center">
                                        <a href="javascript:void(0)" id="addexp"><i class="fa fa-plus" aria-hidden="true"></i> Add Another Experience
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
        $('#addexp').on('click',function(){
            var count = $('#expcount').val();
            var id = 'addexp';
            $.ajax({
                data :{count:count},
                type: 'POST',
                url: '<?php echo base_url('jobseeker/appendexperience')?>',
                success: function (data) {
                    $('.addexperiencediv').last().append(data);
                    count++;
                    $('#expcount').val(count);
                    dynamiceditor();
                }
            });
        });

        $(document).on('click','#remove_experience',function(){
            $(this).parent().parent().parent().remove();
        });
    });

    function currentlyworking(key){
        if ($('#currently_working_'+key).is(':checked')){
            $('#endmonthyear_'+key).addClass('hide');

        }
        else{
            $('#endmonthyear_'+key).removeClass('hide');

        }
    }
</script>