<style>
    .appendreference{border-top: 1px dashed #ccc;padding-top: 10px}
    .removebutton{color:#ff0000}
</style>
<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->


<section class="candidate-dashboard-area section_15">
    <div class="container">
        <div class="row">
            <?php include('includes/jobseeker-dashboard-sidebar.php');?>

            <div class="col-md-12 col-lg-8 dashboard-left-border">
                <div class="dashboard-right">
                    <div class="candidate-single-profile-info earnings-page-box manage-jobs">
                        <?php
                        $action =base_url().'jobseeker/updatereference/'.$sid;
                        $attributes = array('class' => 'form-horizontal user-logIn','name'=>'jobseekersupdate',);
                        echo form_open_multipart($action, $attributes);
                        ?>
                            <div class="resume-box text-left">
                                <div class="single-resume-feild">
                                    <div class="single-input">
                                        <h4>Reference :</h4>
                                        <?php if($this->session->flashdata('success')){ ?>
                                            <div class="alert alert-success alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                                <?php echo $this->session->flashdata('success');?> </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php if(!empty($reference_detail)){
                                    foreach($reference_detail as $key=>$val){?>
                                        <div class="<?php echo $key==0?'referencediv':'appendreference'?>">
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <input type="text" required="" name="reference_name[]" value="<?php echo $val->reference_name?>" class="form-control" placeholder="Reference's Name">
                                                </div>
                                                <div class="single-input">
                                                    <input type="text" required="" name="position[]" value="<?php echo $val->position?>" class="form-control" placeholder="Position">
                                                </div>
                                            </div>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <input type="text" required="" name="organization_name[]" value="<?php echo $val->organization_name?>" class="form-control" placeholder="Organization name">
                                                </div>
                                                <div class="single-input">
                                                    <input type="text" required="" name="email[]" value="<?php echo $val->email?>" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <input type="number" required="" name="mobile_number[]" value="<?php echo $val->mobile_number?>" class="form-control" placeholder="Mobile Number">
                                                </div>
                                                <div class="single-input">
                                                    <input type="number"  name="other_number[]" value="<?php echo $val->other_number?>" class="form-control" placeholder="Other Number">
                                                </div>
                                            </div>
                                            <?php if($key !=0){?>
                                            <div class="single-resume-feild">
                                                <div class="single-input text-center">
                                                    <a href="javascript:void(0)" class="removebutton" id="remove_reference"><i class="fa fa-minus"                                                                                                     aria-hidden="true"></i>
                                                        Remove Reference
                                                    </a>
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                    <?php }
                                }
                                else{?>
                                    <div class="referencediv">
                                        <div class="single-resume-feild feild-flex-2">
                                            <div class="single-input">
                                                <input type="text" required="" name="reference_name[]" value="" class="form-control" placeholder="Reference's Name">
                                            </div>
                                            <div class="single-input">
                                                <input type="text" required="" name="position[]" value="" class="form-control" placeholder="Position">
                                            </div>
                                        </div>
                                        <div class="single-resume-feild feild-flex-2">
                                            <div class="single-input">
                                                <input type="text" required="" name="organization_name[]" value="" class="form-control" placeholder="Organization name">
                                            </div>
                                            <div class="single-input">
                                                <input type="text" required="" name="email[]" value="" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="single-resume-feild feild-flex-2">
                                            <div class="single-input">
                                                <input type="number" required="" name="mobile_number[]" value="" class="form-control" placeholder="Mobile Number">
                                            </div>
                                            <div class="single-input">
                                                <input type="number"  name="other_number[]" value="" class="form-control" placeholder="Other Number">
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>

                                <div class="addreferencediv">

                                </div>

                                <div class="single-resume-feild">
                                    <div class="single-input text-center">
                                        <a href="javascript:void(0)" id="addreference"><i class="fa fa-plus" aria-hidden="true"></i> Add Another Reference
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
        $('#addreference').on('click',function(){
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('jobseeker/appendreference')?>',
                success: function (data) {
                    $('.addreferencediv').last().append(data);
                }
            });
        });

        $(document).on('click','#remove_reference',function(){
            $(this).parent().parent().parent().remove();
        });
    });
</script>