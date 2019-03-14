<?php $this->load->view('includes/header');?>
<?php $this->load->helper("view_helper"); ?>

        <div class="container">
            <div class="row">
               
               <?php if(!empty($testimonial_list)):
                    foreach($testimonial_list as $key => $valTest): 
$key = $key +1;
                    ?>

                <div class="col-md-4 col-sm-6">
                    <div class="test-list-item">
                        <figure>
                            <img src="<?php echo the_testimonial_image($valTest->image); ?>" alt="<?php echo $valTest->name;?>">
                        </figure>
                        <figcaption>
                            <p><?php echo substr($valTest->feedback,0,50);?>...</p>
                            <hr>
                            <p><?php echo $valTest->name;?>, <?php echo $valTest->position;?>, <?php echo $valTest->company_name;?></p>
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-info btn-defult" data-toggle="modal" data-target="#myModal_<?php echo $key;?>">Read More...</button>

                            <!-- Modal -->
                            <div id="myModal_<?php echo $key;?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><?php echo $valTest->name;?>, <?php echo $valTest->position;?>, <?php echo $valTest->company_name;?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="test-list-item">
                                                <figure>
                                                    <img src="<?php echo the_testimonial_image($valTest->image); ?>" alt="<?php echo $valTest->name;?>">
                                                </figure>
                                                <figcaption>
                                                    <p><?php echo $valTest->feedback ;?></p>
                                                </figcaption>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </figcaption>
                    </div>
                </div>
                
<?php endforeach; endif; ?>


            </div>
        </div>


        <!-- right-aside start -->


        <!-- body end -->



       <?php $this->load->view('includes/footer');?>