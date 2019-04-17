<style>
    .appendlanguage{border-top: 1px dashed #ccc;padding-top: 10px}
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
                        $action =base_url().'Jobseeker/updateLanguage/'.$sid;
                        $attributes = array('class' => 'form-horizontal user-logIn','name'=>'jobseekersupdate',);
                        echo form_open_multipart($action, $attributes);
                        ?>
                            <div class="resume-box text-left">
                                <div class="single-resume-feild">
                                    <div class="single-input">
                                        <h4>Languages :</h4>
                                        <?php if($this->session->flashdata('success')){ ?>
                                            <div class="alert alert-success alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                                <?php echo $this->session->flashdata('success');?> </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                                if(!empty($language_detail)){
                                    foreach ($language_detail as $key=> $val ) {?>
                                        <div class="<?php echo $key==0?'languagediv':'appendlanguage'?>">
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <input type="text" required="" name="language[]" value="<?php echo $val->lang;?>" class="form-control" placeholder="Language">
                                                </div>
                                                <div class="single-input">
                                                    <select name="reading[]" id="reading">
                                                        <option value="" <?php if($val->reading == ''){ echo "selected='selected'"; } ?>>Reading</option>
                                                        <option value="Excellent" <?php if($val->reading == 'Excellent'){ echo "selected='selected'"; } ?>>Excellent</option>
                                                        <option value="Good" <?php if($val->reading == 'Good'){ echo "selected='selected'"; } ?>>Good</option>
                                                        <option value="Medium" <?php if($val->reading == 'Medium'){ echo "selected='selected'"; } ?>>Medium</option>
                                                        <option value="Bad" <?php if($val->reading == 'Bad'){ echo "selected='selected'"; } ?>>Bad</option>
                                                    </select>
                                                </div>
                                                <div class="single-input">
                                                    <select name="writing[]" id="writing">
                                                        <option value="" <?php if($val->writing == ''){ echo "selected='selected'"; } ?>>Writing</option>
                                                        <option value="Excellent" <?php if($val->writing == 'Excellent'){ echo "selected='selected'"; } ?>>Excellent</option>
                                                        <option value="Good" <?php if($val->writing == 'Good'){ echo "selected='selected'"; } ?>>Good</option>
                                                        <option value="Medium" <?php if($val->writing == 'Medium'){ echo "selected='selected'"; } ?>>Medium</option>
                                                        <option value="Bad" <?php if($val->writing == 'Bad'){ echo "selected='selected'"; } ?>>Bad</option>
                                                    </select>
                                                </div>
                                                <div class="single-input">
                                                    <select name="speaking[]" id="speaking">
                                                        <option value="" <?php if($val->speaking == ''){ echo "selected='selected'"; } ?>>Speaking</option>
                                                        <option value="Excellent" <?php if($val->speaking == 'Excellent'){ echo "selected='selected'"; } ?>>Excellent</option>
                                                        <option value="Good" <?php if($val->speaking == 'Good'){ echo "selected='selected'"; } ?>>Good</option>
                                                        <option value="Medium" <?php if($val->speaking == 'Medium'){ echo "selected='selected'"; } ?>>Medium</option>
                                                        <option value="Bad" <?php if($val->speaking == 'Bad'){ echo "selected='selected'"; } ?>>Bad</option>
                                                    </select>
                                                </div>
                                                <div class="single-input">
                                                    <select name="listening[]" id="listening">
                                                        <option value="" <?php if($val->listening == ''){ echo "selected='selected'"; } ?>>Listening</option>
                                                        <option value="Excellent" <?php if($val->listening == 'Excellent'){ echo "selected='selected'"; } ?> >Excellent</option>
                                                        <option value="Good" <?php if($val->listening == 'Good'){ echo "selected='selected'"; } ?>>Good</option>
                                                        <option value="Medium" <?php if($val->listening == 'Medium'){ echo "selected='selected'"; } ?>>Medium</option>
                                                        <option value="Bad" <?php if($val->listening == 'Bad'){ echo "selected='selected'"; } ?>>Bad</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php if($key != 0){?>
                                            <div class="single-resume-feild">
                                                <div class="single-input text-center">
                                                    <a href="javascript:void(0)" class="removebutton" id="remove_language"><i class="fa fa-minus"                                                                                                     aria-hidden="true"></i>
                                                        Remove Education
                                                    </a>
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                    <?php }

                                }
                                else{?>
                                    <div class="languagediv">
                                        <div class="single-resume-feild feild-flex-2">
                                            <div class="single-input">
                                                <input type="text" required="" name="language[]" value="" class="form-control" placeholder="Language">
                                            </div>
                                            <div class="single-input">
                                                <select name="reading[]" id="reading">
                                                    <option value="">Reading</option>
                                                    <option value="Excellent">Excellent</option>
                                                    <option value="Good">Good</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Bad">Bad</option>
                                                </select>
                                            </div>
                                            <div class="single-input">
                                                <select name="writing[]" id="writing">
                                                    <option value="">Writing</option>
                                                    <option value="Excellent">Excellent</option>
                                                    <option value="Good">Good</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Bad">Bad</option>
                                                </select>
                                            </div>
                                            <div class="single-input">
                                                <select name="speaking[]" id="speaking">
                                                    <option value="">Speaking</option>
                                                    <option value="Excellent">Excellent</option>
                                                    <option value="Good">Good</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Bad">Bad</option>
                                                </select>
                                            </div>
                                            <div class="single-input">
                                                <select name="listening[]" id="listening">
                                                    <option value="">Listening</option>
                                                    <option value="Excellent">Excellent</option>
                                                    <option value="Good">Good</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Bad">Bad</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>


                                <div class="addlanguagediv">

                                </div>

                                <div class="single-resume-feild">
                                    <div class="single-input text-center">
                                        <a href="javascript:void(0)" id="addlanguage"><i class="fa fa-plus" aria-hidden="true"></i> Add Another Language
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
        $('#addlanguage').on('click',function(){
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Jobseeker/appendLanguage')?>',
                success: function (data) {
                    $('.addlanguagediv').last().append(data);
                }
            });
        });

        $(document).on('click','#remove_language',function(){
            $(this).parent().parent().parent().remove();
        });
    });
</script>