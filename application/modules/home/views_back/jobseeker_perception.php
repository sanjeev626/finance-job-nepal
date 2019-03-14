<?php $this->load->view('includes/header');?>



<div class="container">

    <div class="row">

        <section class="conact-page-info">

            <div class="col-md-12">

                        <div class="contact-wrap">

                            <div class="row">

                                <div class="col-md-6 col-sm-6">

                                    <div class="contact-form">

                                        <h2 class="border-top">Give Your FEEDBACKS</h2>

                                        <?php

                                            $action = base_url() . 'submitJobseekerFeedbacks';

                                            $attributes = array('class' => 'contactform clearfix');

                                            echo form_open($action, $attributes);

                                        ?>

                                            <div class="row">

                                                <div class="col-xs-12">

                                                    <div class="form-group clearfix">

                                                        <input type="text" name="subject" class="form-control" placeholder="Subject" required>

                                                    </div>

                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-6">

                                                    <div class="form-group clearfix">

                                                        <input type="text" name="name" class="form-control" placeholder="Your Full Name" required>

                                                    </div>

                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-6">

                                                    <div class="form-group clearfix">

                                                        <input type="email" name="email" class="form-control" placeholder="Your Email Address" required>

                                                    </div>

                                                </div>

                                                <div class="col-xs-12">

                                                    <div class="form-group clearfix">

                                                        <textarea class="form-control" name="message" rows="4" placeholder="Your Feedbacks"></textarea>

                                                    </div>

                                                </div>

                                            </div>

                                            <button type="submit" class="btn btn-default border-top" data-dismiss="modal">submit & send</button>

                                        <?php echo form_close(); ?>

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

                            </div>

                        </div>

                    </div>

        </section>

    </div>

</div>



<?php $this->load->view('includes/footer');?>

