<div class="seekerpart">
	<div class="title">New To Finance Job?</div>

	<a href="<?php echo base_url().'jobseeker/signup';?>" class="seekerregister">Register with us</a>

	<div class="or">or</div>

	<a href="#" data-toggle="modal" data-target="#cvModal" class="resumeupload">Upload CV</a>
	<p>No registration required</p>
</div>

<div class="employerpart">
	<p> Its Free. <Br> Get best matched CV on your email.</p>
	<?php
    $employer_profile = $this->session->userdata('employer_profile');
    if (!empty($employer_profile)) {
        $url = base_url() . 'employer/postjob';
    } else {
        $url = base_url() . 'employer/login';
    }
    ?>
    <a href="<?php echo $url ?>" class="employerpostjob">
       Post a Vacancy
    </a>
</div>
<?php 
$this->load->model('../../admin/models/home_model');
$advetisements = $this->home_model->get_all_advertisment();		

if($advetisements){
?>
<div class="advetisements">
	<?php 
		
		foreach ($advetisements as $key => $advert) {?>
			<?php 
				if(!empty($advert->image)){?>
					<div class="advertlists">
						<a href="<?php echo  $advert->website ?>" target="_blank" title="<?php echo $advert->addtitle ?>"> <img src="<?php echo  base_url() . 'uploads/advertisement/' . $advert->image ?>" alt="<?php echo $advert->addtitle ?>"> </a> 
					</div>
				<?php }
				else{?>
						<div class="advertlists" style="background-color: <?php echo $advert->background_color;?>">
							<a href="<?php echo  $advert->website ?>" target="_blank" title="<?php echo $advert->addtitle ?>">
								<?php echo $advert->addtitle?>
							</a>
						</div>	
				<?php }

			?>

					
		<?php }
	?>
</div>
<?php }?>

<div class="upcoming">
	<div class="upcomingtitle">
		Upcoming Training
	</div>
	<div class="upcomingcontent">
		
	</div>

</div>

<div class="letstalk">
	<div class="letstalktitle">Let's Talk HR</div>
	<p>Coming soon...</p>
</div>



<!-- Modal -->
<div class="modal fade" id="cvModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Apply With Your Basic Information
                    <br>
                    <span>We will get you back soon.</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() . 'jobseeker/jobseekercv' ?>" method="post"
                  enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">First Name*</label>

                        <div>
                            <input type="text" class="form-control input-lg" name="first_name" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Last Name*</label>

                        <div>
                            <input type="text" class="form-control input-lg" name="last_name" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">E-Mail Address*</label>

                        <div>
                            <input type="email" class="form-control input-lg" name="email" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Contact Number</label>

                        <div>
                            <input type="text" class="form-control input-lg" name="contact_number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Upload your CV(Formate Doc, PDF only)*</label>

                        <div>
                            <input type="file" id="exampleInputFile" class="form-control input-lg" name="attachment"
                                   required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                    <button type="submit" name="cvsubmit" class="btn btn-primary subbtn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>