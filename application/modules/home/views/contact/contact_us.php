<!-- Breadcromb Area Start -->

<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->
<!-- Contact Page Start -->
<section class="fjn-contact-page-area section_15">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="contact-left">
                    <h3>Contact information</h3>
                    <div class="contact-details">
                        <p><i class="fa fa-map-marker"></i> Tanka Prasad Ghumti Sadak, Purbi Gate, Anamnagar-29, Behind Labour Court</p>
                        <div class="single-contact-btn">
                            <h4>Email Us</h4>
                            <a href="mailto:info@financejobnepal.com" class="fjn-btn-2">info@financejobnepal.com</a>
                        </div>
                        <div class="single-contact-btn">
                            <h4>Call Us</h4>
                            <a href="tel:016226783" class="fjn-btn-2">977 01-6201360</a>
                        </div>
                        <div class="social-links-contact">
                            <h4>Follow Us:</h4>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="contact-right">
                    <h3>Feel free to contact us!</h3>
                    <?php if($this->session->flashdata('error')){ ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                            <?php echo $this->session->flashdata('error');?> </div>
                    <?php } ?>

                    <?php if($this->session->flashdata('success')){ ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                            <?php echo $this->session->flashdata('success');?> </div>
                    <?php } ?>
                    <?php
                    $action = base_url() . 'submitcontact';
                    $attributes = array('class' => 'contactform clearfix');
                    echo form_open($action, $attributes);
                    ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-contact-field">
                                    <input type="text" name="name" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-contact-field">
                                    <input type="email" name="email" placeholder="Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="single-contact-field">
                                    <input type="text" name="subject" placeholder="Subject">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="single-contact-field">
                                    <textarea name="message" placeholder="Write here your message" class="contacttext"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="single-contact-field">
                                    <button type="submit"><i class="fa fa-paper-plane"></i> Send Message</button>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Page End -->