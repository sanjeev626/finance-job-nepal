<style>
    .bannerimg {
        border: 1px solid #ccc;
        padding: 2px;
        margin-top: 5px;
    }
</style>
<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->


<!-- Candidate Dashboard Area Start -->
<section class="candidate-dashboard-area section_15">
    <div class="container">
        <div class="row">
            <?php $this->load->view('includes/employer-dashboard-sidebar');?>


            <div class="col-lg-9 col-md-12">
                <div class="dashboard-right">
                    <div class="candidate-profile">
                        <?php
                        $action =base_url().'employer/updateprofile';
                        $attributes = array('class' => 'form-horizontal user-logIn','name'=>'employersignup',);
                        echo form_open_multipart($action, $attributes);
                        ?>
                        <?php if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                <?php echo $this->session->flashdata('success');?> </div>
                        <?php } ?>
                        <div class="candidate-single-profile-info">

                            <!-- <div class="single-resume-feild resume-avatar">
                                <div class="resume-image">
                                    <?php
                                        if (!empty($employerInfo->organization_logo)){
                                            //$imgurl = base_url().'uploads/employer/'.$employerInfo->organization_logo;
                                        }
                                        else{
                                           // $imgurl = base_url().'content_home/img/company_logo.png';
                                        }

                                    ?>
                                    <img src="<?php echo $imgurl;?>" alt="<?php if (!empty($employerInfo)) echo $employerInfo->organization_name; ?>">
                                    <div class="resume-avatar-hover">
                                        <div class="resume-avatar-upload">
                                            <p>
                                                <i class="fa fa-pencil"></i>
                                                Edit
                                            </p>
                                            <input type="file" name="logo" value="">
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="single-resume-feild resume-avatar">
                                <div class="single-resume-feild ">
                                    <div class="single-input">
                                        <label for="name">Organization Logo:</label>
                                        <input type="file" id="banner" value="" name="logo" placeholder="Organization logo" class="form-control" autofocus>
                                        <?php
                                        if (!empty($employerInfo->organization_logo)){
                                            $logoimgurl = base_url().'uploads/employer/'.$employerInfo->organization_logo;
                                        ?>
                                        <div class="">
                                            <img src="<?php echo $logoimgurl;?>" alt="<?php if (!empty($employerInfo)) echo $employerInfo->organization_logo; ?>" width="300px">
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>


                            <div class="single-resume-feild resume-avatar">
                                <div class="single-resume-feild ">
                                    <div class="single-input">
                                        <label for="name">Organization Banner:</label>
                                        <input type="file" id="banner" value="" name="banner" placeholder="Organization Banner" class="form-control" autofocus>
                                        <?php
                                        if (!empty($employerInfo->organization_banner)){
                                            $bannerimgurl = base_url().'uploads/employer/'.$employerInfo->organization_banner;
                                        ?>
                                        <div class="bannerimg">
                                            <img src="<?php echo $bannerimgurl;?>" alt="<?php if (!empty($employerInfo)) echo $employerInfo->organization_banner; ?>">
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="candidate-single-profile-info">

                            <div class="resume-box">
                                <h3>company profile</h3>
                                <div class="single-resume-feild ">
                                    <div class="single-input">
                                        <label for="name">Organization Name:</label>
                                        <input type="text" id="orgname" value="<?php if (!empty($employerInfo)) echo $employerInfo->organization_name; ?>" name="orgname" placeholder="Organization Name" class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="c_cat">Organization Type:</label>
                                        <select class="form-control" name="natureoforg" >
                                            <option value="">--Select Ogranization Type--</option>
                                            <?php foreach ($org_type as $key => $value) {?>
                                                <option <?php if(!empty($employerInfo) && $employerInfo->organization_type == $value->id){ echo "selected='selected'"; } ?> <?php echo set_select('natureoforg', $value->id); ?> value='<?php echo $value->id; ?>'><?php echo $value->dropvalue; ?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                    <div class="single-input">
                                        <label for="Start">Organization size:</label>
                                        <select class="form-control" name="no_of_employees">
                                            <option value="">--Select Ogranization Size--</option>
                                            <?php

                                            foreach ($org_size as $os) {
                                                if($os->id == $employerInfo->organization_size)
                                                    $selected = 'selected';
                                                else
                                                    $selected = '';
                                                echo '<option value="'.$os->id.'" '.$selected.' >'.$os->dropvalue.'</option>';
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="Phone">Phone:</label>
                                        <input type="text" id="phone" value="<?php if (!empty($employerInfo)) echo $employerInfo->organization_phone; ?>" name="phone" placeholder="Phone" class="form-control" autofocus>
                                    </div>
                                    <div class="single-input">
                                        <label for="Email">Email:</label>
                                        <input type="text" id="email" readonly value="<?php if (!empty($employerInfo)) echo $employerInfo->email; ?>" name="email" placeholder="Email" class="form-control" autofocus>
                                        <small>Email cannot be changed</small>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="Location">POBox:</label>
                                        <input type="text" id="pobox" value="<?php if (!empty($employerInfo)) echo $employerInfo->organization_pobox; ?>" name="pobox" placeholder="P.O.Box" class="form-control" autofocus>
                                    </div>
                                    <div class="single-input">
                                        <label for="City">Website:</label>
                                        <input type="text" id="website" value="<?php if (!empty($employerInfo)) echo $employerInfo->organization_website; ?>" name="website" placeholder="Website" class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="single-resume-feild ">
                                    <div class="single-input">
                                        <label for="name">Organization Address:</label>
                                        <input type="text" id="address" value="<?php if (!empty($employerInfo)) echo $employerInfo->organization_address; ?>" name="address" placeholder="Address" class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="single-resume-feild ">
                                    <div class="single-input">
                                        <label for="Bio">Description:</label>
                                        <textarea class="textarea form-control" rows="4" name="orgdesc" placeholder="Description"><?php if (!empty($employerInfo)) echo $employerInfo->organization_description; ?>
</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="resume-box">
                                <h3>Contact Information</h3>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="Phone">Contact Name:</label>
                                        <input type="text" id="contactperson" value="<?php if (!empty($employerInfo)) echo $employerInfo->contact_name; ?>" name="contact_name" placeholder="Contact Person" class="form-control" autofocus>
                                    </div>
                                    <div class="single-input">
                                        <label for="Email">Contact Designation:</label>
                                        <input type="text" id="designation" value="<?php if (!empty($employerInfo)) echo $employerInfo->contact_designation; ?>" name="contact_designation" placeholder="Designation" class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="City">Contact Mobile:</label>
                                        <input type="text" id="email" value="<?php if (!empty($employerInfo)) echo $employerInfo->contact_mobile; ?>" name="contact_mobile" placeholder="Mobile" class="form-control" autofocus>
                                    </div>
                                    <div class="single-input">
                                        <label for="Location">Contact Email:</label>
                                        <input type="text" id="email" value="<?php if (!empty($employerInfo)) echo $employerInfo->contact_email; ?>" name="contact_email" placeholder="Contact Email" class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="single-resume-feild">
                                    <div class="single-input">
                                        <label for="City2">Alternate Contact Name:</label>
                                        <input type="text" id="email" value="<?php if (!empty($employerInfo)) echo $employerInfo->alternate_contact_name; ?>" name="alternate_contact_name" placeholder="Alternate Contact Name" class="form-control" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="resume-box">
                                <h3>social link</h3>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="twitter">
                                            <i class="fa fa-facebook facebook"></i>
                                            facebook
                                        </label>
                                        <input type="text" value="<?php if (!empty($employerInfo)) echo $employerInfo->organization_facebook; ?>" id="facebook" name="facebook">
                                    </div>
                                    <div class="single-input">
                                        <label for="linkedin">
                                            <i class="fa fa-linkedin linkedin"></i>
                                            linkedin
                                        </label>
                                        <input type="text" value="<?php if (!empty($employerInfo)) echo $employerInfo->organization_linkedin; ?>" id="linkedin" name="twitter">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-resume">
                                <button type="submit">Update</button>
                            </div>

                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Candidate Dashboard Area End -->