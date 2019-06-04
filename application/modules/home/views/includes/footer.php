<!-- Footer Area Start -->
<footer class="fjn-footer-area">
  <div class="footer-top section_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="single-footer-widget">
            <div class="footer-logo"> <a href="<?php echo base_url();?>"> <img src="<?php echo base_url(); ?>content_home/img/logo.png" alt="jobguru logo" /> </a> </div>
            <p>Our unique, ethically led approach to Accounts &amp; Finance recruitment, meets the Industry expectations &amp; requirement for a truly sustainable recruitment solution.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="single-footer-widget">
            <h3>Job Seeker</h3>
            <ul>
              <li><a href="<?php echo base_url().'jobseeker/signup'?>"><i class="fa fa-angle-double-right "></i>Create Account</a></li>
              <li><a href="<?php echo base_url().'jobseeker/signup#uploadcv'?>"><i class="fa fa-angle-double-right "></i>Direct CV Upload</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right "></i>Online CV</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right "></i>Search Job</a></li>
              <li><a href="<?php echo base_url().'content/seeker-terms-conditions'?>"><i class="fa fa-angle-double-right "></i>Terms &amp; Conditions</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="single-footer-widget">
            <h3>Employer</h3>
            <ul>
                <?php
                if(!empty($employer_profile)){ ?>
                    <li><a href="<?php echo base_url() . 'employer/postJob' ?>"><i class="fa fa-angle-double-right "></i>Post Job</a></li>
                <?php }else{?>
                    <li><a href="<?php echo base_url();?>employer/signup"><i class="fa fa-angle-double-right "></i>Create Account</a></li>
                <?php }
                ?>

              <li><a href="<?php echo base_url().'content/employer-terms-conditions'?>"><i class="fa fa-angle-double-right "></i>Terms &amp; Conditions</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="single-footer-widget">
            <h3>Services we offer</h3>
            <ul>
              <li><a href="<?php echo base_url().'services/recruitment'?>"><i class="fa fa-angle-double-right "></i>Recruitment</a></li>
              <li><a href="<?php echo base_url().'services/staff-outsourcing'?>"><i class="fa fa-angle-double-right "></i>Staff Outsourcing</a></li>
              <li><a href="<?php echo base_url().'services/hr-audit-consulting'?>"><i class="fa fa-angle-double-right "></i>HR Audit &amp; Consulting</a></li>
              <li><a href="<?php echo base_url().'services/payroll-management'?>"><i class="fa fa-angle-double-right "></i>Payroll Management</a></li>
              <li><a href="<?php echo base_url().'services/corporate-training'?>"><i class="fa fa-angle-double-right "></i>Corporate Training</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <ul class="footer-social">
              <li><a href="https://www.facebook.com/financejobnepal/" class="fb" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#" class="gp"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#" class="skype"><i class="fa fa-skype"></i></a></li>
            </ul>         
        </div>
        <div class="col-lg-9 col-md-12"><div class="need_help">Need Help? <a href="tel:015139273">Dial 01-5139273</a></div></div>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="copyright-left">
            <p class="align-left">Copyright &copy; 2019 Finance Job Nepal. All Rights Reserved</p>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="powered-right">
            <p class="align-right"> Powered By : <a href="http://digitalagencycatmandu.com/" target="_blank"><img src="https://www.digitalagencycatmandu.com/images/dac-footer-icon.png" alt="DAC" class="img-responsive"> DAC </a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Footer Area End -->


<!--Popper js-->
<script src="<?php echo base_url(); ?>content_home/js/popper.min.js"></script>
<!--Bootstrap js-->
<script src="<?php echo base_url(); ?>content_home/js/bootstrap.min.js"></script>
<!--Bootstrap Datepicker js-->
<script src="<?php echo base_url(); ?>content_home/js/bootstrap-datepicker.min.js"></script>
<!--Perfect Scrollbar js-->
<script src="<?php echo base_url(); ?>content_home/js/jquery-perfect-scrollbar.min.js"></script>
<!--Owl-Carousel js-->
<script src="<?php echo base_url(); ?>content_home/js/owl.carousel.min.js"></script>
<!--SlickNav js-->
<script src="<?php echo base_url(); ?>content_home/js/jquery.slicknav.min.js"></script>
<!--Magnific js-->
<script src="<?php echo base_url(); ?>content_home/js/jquery.magnific-popup.min.js"></script>
<!--Select2 js-->
<script src="<?php echo base_url(); ?>content_home/js/select2.min.js"></script>
<!--jquery-ui js-->
<script src="<?php echo base_url(); ?>content_home/js/jquery-ui.min.js"></script>
<!--Tinymce-->
<script src="<?php echo base_url(); ?>/tinymce/js/tinymce/tinymce.min.js"></script>
<!--Main js-->
<script src="<?php echo base_url(); ?>content_home/js/main.js"></script>

<script>
    function dynamiceditor(){

        tinymce.EditorManager.editors = [];

        tinymce.init({selector:'textarea'});//this will reinitialze tinymce

    }

    $('document').ready(function () {

        tinymce.init({
            selector: "textarea", theme: "modern", height: 300,
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            image_caption: true,
            image_advtab: true,
            relative_urls: false,
            external_filemanager_path: "<?php echo base_url();?>" + "tinymce/file_manager/filemanager/",
            filemanager_title: "Responsive Filemanager",
            external_plugins: {"filemanager": "<?php echo base_url();?>" + "tinymce/file_manager/filemanager/plugin.min.js"}
        });

        if(window.location.hash) {
            var hash = window.location.hash.substring(1);
            if(hash == 'uploadcv'){
                $('#cvModal').modal();
            }

        } else {

        }
    });

</script>

</body>
</html>