<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->


<!-- Candidate Dashboard Area Start -->
<section class="candidate-dashboard-area section_70">
    <div class="container">
        <div class="row">
            <?php $this->load->view('includes/employer-dashboard-sidebar');?>


            <div class="col-lg-9 col-md-12">
                <div class="dashboard-right">
                    <div class="candidate-profile">
                        <div class="candidate-single-profile-info">

                            <div class="single-resume-feild resume-avatar">
                                <div class="resume-image">
                                    <img src="<?php echo base_url()?>content_home/img/author.jpg" alt="resume avatar">
                                    <div class="resume-avatar-hover">
                                        <div class="resume-avatar-upload">
                                            <p>
                                                <i class="fa fa-pencil"></i>
                                                Edit
                                            </p>
                                            <input type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="candidate-single-profile-info">
                            <?php
                            $action =base_url().'Employer/updateEmployerProfile';
                            $attributes = array('class' => 'form-horizontal user-logIn','name'=>'employersignup',);
                            echo form_open_multipart($action, $attributes);
                            ?>
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
                                        <label for="c_cat">Organization_type::</label>
                                        <select id="c_cat">
                                            <option selected>Choose Category</option>
                                            <option>IT Service</option>
                                            <option>Non-Profit</option>
                                            <option>StartUP</option>
                                            <option>Corporate</option>
                                        </select>
                                    </div>
                                    <div class="single-input">
                                        <label for="Start">Organization_size:</label>
                                        <select id="c_cat">
                                            <option selected>Choose Size</option>
                                            <option>1 - 10</option>
                                            <option>11 - 25</option>
                                            <option>25 - 100</option>
                                            <option>100 Plus</option>
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
                                        <input type="text" id="email" value="<?php if (!empty($employerInfo)) echo $employerInfo->email; ?>" name="email" placeholder="Email" class="form-control" autofocus>
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
                                        <textarea class="form-control" rows="4" name="orgdesc" placeholder="Description"><?php if (!empty($employerInfo)) echo $employerInfo->organization_description; ?>
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
                                        <input type="text" value="https://www.facebook.com/" id="facebook" name="facebook">
                                    </div>
                                    <div class="single-input">
                                        <label for="linkedin">
                                            <i class="fa fa-linkedin linkedin"></i>
                                            linkedin
                                        </label>
                                        <input type="text" value="https://www.linkedin.com/" id="linkedin" name="twitter">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-resume">
                                <button type="submit">Update</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Candidate Dashboard Area End -->