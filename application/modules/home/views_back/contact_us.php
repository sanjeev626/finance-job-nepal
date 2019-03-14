<?php $this->load->view('includes/header');?>

<div class="container">
    <div class="row">
        <section class="conact-page-info">
            <div class="col-md-12">
                        <div class="contact-wrap">
                            <div class="row">
                               <div class="col-sm-12">
                                    <div class="contact-map" style="margin-bottom: 30px;">
                                        <h2 class="border-top">Locate Global Job</h2>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.256133267802!2d85.31961221465627!3d27.70937698279107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19065bbbfe95%3A0xcd7fe29897db2860!2sGlobal+Job+Complete+Hr+Solution!5e0!3m2!1sen!2snp!4v1489725030812" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="contact-contain">
                                        <p>P.O.Box 8975 EPC 5273 <br>4th Floor, Kathmandu Plaza-Y Block, Kamaladi, Kathmandu</p>
                                        <ul>
                                            <li>Tel:<a class="phone" href="Callto:+4168657"> 4168657,4168658,4168517</a></li>
                                            <li>Email:<a class="email" href="emailto:info@globaljob.com.np">  info@globaljob.com.np</a></li>
                                            <li><a href="http://www.globaljob.com.np/"> www.globaljob.com.np</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="contact-form">
                                        <h2 class="border-top">Contact form</h2>
                                        <?php
                                            $action = base_url() . 'submitContact';
                                            $attributes = array('class' => 'contactform clearfix');
                                            echo form_open($action, $attributes);
                                        ?>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <div class="form-group clearfix">
                                                        <input type="text" name="name" class="form-control" placeholder="Your Name Here" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <div class="form-group clearfix">
                                                        <input type="email" name="email" class="form-control" placeholder="Your Email Address" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="form-group clearfix">
                                                        <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="form-group clearfix">
                                                        <textarea class="form-control" name="message" rows="4" placeholder="Your Message"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-default border-top" data-dismiss="modal">submit & send</button>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </div>
</div>

<?php $this->load->view('includes/footer');?>
