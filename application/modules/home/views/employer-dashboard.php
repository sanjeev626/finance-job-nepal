<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->


<!-- Candidate Dashboard Area Start -->
<section class="candidate-dashboard-area section_70">
    <div class="container">
        <div class="row">
            <?php $this->load->view('includes/employer-dashboard-sidebar');?>

            <div class="col-md-12 col-lg-9">
                <div class="dashboard-right">
                    <div class="candidate-profile">
                        <div class="candidate-single-profile-info">
                            <div class="resume-box">
                                <h3>company profile</h3>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="name">Organization Name:</label><br><?php echo $employerInfo->organization_name;?>
                                    </div>
                                    <div class="single-input">
                                        <div class="resume-image company-resume-image" style="width:60px; height:60px;margin: 0px;">
                                            <img src="<?php echo base_url()?>content_home/img/company_page_logo.jpg" alt="resume avatar">
                                        </div>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="c_cat">organization_type:</label><br>
                                        <?php echo $employerInfo->organization_type;?>
                                    </div>
                                    <div class="single-input">
                                        <label for="member">organization_size:</label><br>
                                        <?php echo $employerInfo->organization_size;?>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="Phone">Phone:</label><br>
                                        <?php echo $employerInfo->organization_phone;?>
                                    </div>
                                    <div class="single-input">
                                        <label for="Email">Email:</label><br>
                                        <?php echo $employerInfo->email;?>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="Phone">POBox:</label><br>
                                        <?php echo $employerInfo->organization_pobox;?>
                                    </div>
                                    <div class="single-input">
                                        <label for="Email">Website:</label><br>
                                        <?php echo $employerInfo->organization_website;?>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="Address22">organization_address:</label><br>
                                        <?php echo $employerInfo->organization_address;?>
                                    </div>
                                    <div class="single-input">
                                        <label for="Zip"></label>
                                    </div>
                                </div>
                                <div class="single-resume-feild ">
                                    <div class="single-input">
                                        <label for="Bio">Description:</label><br>
                                        <?php echo $employerInfo->organization_description;?>
                                    </div>
                                </div>
                            </div>
                            <div class="resume-box">
                                <h3>Contact Information</h3>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="Phone">Contact Name:</label><br>
                                        <?php echo $employerInfo->contact_name;?>
                                    </div>
                                    <div class="single-input">
                                        <label for="Email">Designation:</label><br>
                                        <?php echo $employerInfo->contact_designation;?>
                                    </div>
                                </div>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="Phone">Contact Email:</label><br>
                                        <?php echo $employerInfo->contact_email;?>
                                    </div>
                                    <div class="single-input">
                                        <label for="Email">Contact Mobile:</label><br>
                                        <?php echo $employerInfo->contact_mobile;?>
                                    </div>
                                </div>

                                <div class="single-resume-feild ">
                                    <div class="single-input">
                                        <label for="Bio">Alternate Contact Name:</label><br>
                                        <?php echo $employerInfo->alternate_contact_name;?>
                                    </div>
                                </div>
                            </div>
                            <div class="resume-box">
                                <h3>social link</h3>
                                <div class="single-resume-feild feild-flex-2">
                                    <div class="single-input">
                                        <label for="twitter">
                                            <i class="fa fa-facebook facebook"></i>
                                            facebook page
                                        </label><br>
                                        https://www.facebook.com
                                    </div>
                                    <div class="single-input">
                                        <label for="linkedin">
                                            <i class="fa fa-linkedin linkedin"></i>
                                            linkedin
                                        </label><br>
                                        https://www.linkedin.com
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Candidate Dashboard Area End -->