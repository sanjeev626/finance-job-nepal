<!-- Footer start -->
<?php
$term_id = 4;
$term_slug = $this->general_model->getById('content','id','4')->slug;
$term_title = $this->general_model->getById('content','id','4')->title;
$privacy_slug = $this->general_model->getById('content','id','5')->slug;
$privacy_title = $this->general_model->getById('content','id','5')->title;
$faqs_slug = $this->general_model->getById('content','id','6')->slug;
$faqs_title = $this->general_model->getById('content','id','6')->title;
$payment_slug = $this->general_model->getById('content','id','25')->slug;
$payment_title = $this->general_model->getById('content','id','25')->title;

?>
<div class="footer">
	<div class="mask">
		<div class="container">
    		<div class="row">
      			<div class="col-md-4">
					<div class="quick-links">
						<h3>Quick Links</h3>
						<ul style="float: left; margin-right: 20px;">
							<li><a href="<?php echo base_url();?>aboutus">About Us</a></li>
							<!-- <li><a href="<?php echo base_url();?>">Home </a></li> -->
							<li><a href="<?php echo base_url();?>Jobseeker/login">Jobseeker Login</a></li>
							<!-- <li><a href="<?php echo base_url();?>jobseeker_feedbacks">Share your Success</a></li> -->
							<li><a href="<?php echo base_url();?>content/<?php echo $term_slug;?>"><?php echo $term_title;?></a></li>
						</ul>
						<ul>
							<!-- <li><a href="<?php echo base_url();?>content/<?php echo $faqs_slug;?>"><?php echo $faqs_title;?></a></li> -->
							<li><a href="<?php echo base_url();?>Employer/login">Employer Login</a></li>
							<!-- <li><a href="<?php echo base_url();?>feedback">Feedback</a></li> -->
							<li><a href="<?php echo base_url();?>content/<?php echo $privacy_slug;?>"><?php echo $privacy_title;?></a></li>
							<li><a href="<?php echo base_url();?>content/<?php echo $payment_slug;?>"><?php echo $payment_title;?></a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-4">
					<div class="quick-links foot-services">
						<h3>Services</h3>
						<ul style="float: left; margin-right: 15px;">
							<li><a href="<?php echo $this->home_model->get_content_url('21');?>">Job Oriented Traininng </a></li>
							<li><a href="<?php echo $this->home_model->get_content_url('8');?>">Interview Prep Techniques</a></li>
							<li><a target="_blank" href="http://www.president.edu.np/">Abroad Studies</a></li>
						</ul>

						<ul>
							<li><a href="<?php echo $this->home_model->get_content_url('22');?>">Management Consulting</a></li>
							<!--<li><a href="<?php echo $this->home_model->get_content_url('23');?>">Benefits of Video CV</a></li>-->
							<li><a href="<?php echo base_url();?>contactus">Contact Us</a></li>
						</ul>
					</div>
				</div>

				<!--<div class="col-md-3">
					<div class="quick-links social-net">
						<h3>Social Networks</h3>
						<ul>
							<li><a href="#">Facebook</a></li>
							<li><a href="#">Twitter</a></li>
							<li><a href="#">Youtube</a></li>
							<li><a href="#">Google+</a></li>
							<li><a href="#">Flicker</a></li>
						</ul>
					</div>
				</div>-->

				<div class="col-md-4">
					<div class="quick-links gjob">
						<h3>Global Job Pvt. Ltd.	
						<ul class="footer-social" style="float:right;">
							<li><a href="https://www.facebook.com/Global-Job-Complete-HR-Solution-109480202434134/" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
							<li><a href="https://www.linkedin.com/in/global-jobs-private-limited-ab126195/" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
					
						</ul></h3>
						<ul>
							<li class="address">P.O.Box 8975 EPC 5273, 4th Floor,<br>Kathmandu Plaza-Y Block, Kamaladi, Kathmandu</li>
							<li><a class="" href="mailto:info@globaljob.com.np"> <i class="fa fa-envelope"></i> info@globaljob.com.np</a>&nbsp;&nbsp;
							<i class="fa fa-phone"></i>
							<a class="number" href="callto:4168658">4168658,</a>
							<a class="number" href="callto:4168517">4168517</a></li>
						</ul>
					</div>
				</div>

    		</div>
  		</div>
	</div>
</div>


<section class="footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<p>Copyright &copy; <?php echo date('Y');?> www.globaljob.com.np. All rights reserved. </p>
			</div>
			<div class="col-xs-6">
				<!-- <p class="pull-right"> Powered by : <a target="_blank" href="http://digitalagencycatmandu.com/"><img src="<?php echo base_url();?>content_home/images/footer-logo.png" alt="Footer Logo"> dac </a></p> -->
			</div>
	    </div>
	</div>
</section>

<div class="subscribe">

    <div class="subscribe-body">
        <button id="hide"><i class="fa fa-close"></i></button>
        <?php
                $action = base_url() . 'subscribe';
                $attributes = array('id' => 'form1');
                echo form_open($action, $attributes);
            ?>
            <div class="form-group">
                <input type="text" required name="name" class="form-control" placeholder="Your Name">
            </div>
            <div class="form-group">
                <input type="email" required name="email" class="form-control" placeholder="Email Address">
            </div>
            <div class="form-group sub-btn">
                <button type="submit" class="btn btn-default">Subscribe</button>
            </div>
        <?php echo form_close(); ?>
    </div>
    <a class="facebook_right_middle" href="https://www.facebook.com/Global-Job-Complete-HR-Solution-109480202434134/" target="_blank"><i class="fa fa-facebook-square"></i></a><br>
    <a class="linkedin_right_middle" href="https://www.linkedin.com/in/global-jobs-private-limited-ab126195/" target="_blank"><i class="fa fa-linkedin-square"></i></a>
    <button id="show">Subscribe</button>

</div>

<!-- Footer en -->

<a href="#" class="scrollToTop" title="Scroll Back to Top"><i class="fa fa-angle-up"></i></a>

<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>-->
<style>
.facebook_right_middle{
	position: fixed;
    right: -37px;
    top: 34%;
    border: none;
    padding: 0px 40px 0 0;
    font-size: 33px;
}
.linkedin_right_middle{
	position: fixed;
    right: -37px;
    top: 39.4%;
    border: none;
    padding: 0px 40px 0 0;
    font-size: 33px;
}
</style>
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/css/bootstrapvalidator.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
<script src="<?php echo base_url();?>content_home/globaljob/employer.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>content_home/js/jquery.custom-scrollbar.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>content_home/js/enscroll-0.6.2.min.js"></script>
<script src="<?php echo base_url();?>content_home/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>content_home/js/main.js"></script>


<script src="<?php echo base_url();?>/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="application/javascript">
$('document').ready(function() {
     tinymce.init({
        selector: ".simple", theme: "modern",  height: 200
    });
});
</script>
<script type="text/javascript">function add_chatinline(){var hccid=82187947;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script>
</body>
</html>