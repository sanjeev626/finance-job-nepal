<?php $this->load->view('includes/header');?>

<?php $this->load->helper("view_helper"); ?>



        <div class="container">

            <div class="employee-users">

                   <h4>Top Clients</h4>
                    <?php foreach($client_list as $key => $clientVal): 
                    if(!empty($clientVal->image) && file_exists('uploads/clients/'.$clientVal->image)):
                    ?>
                    <div class="col-md-2 col-sm-3 col-xs-4">
                      <figure>
                        <img class="img-responsive" src="<?php echo the_client_logo($clientVal->image); ?>" alt="<?php echo $clientVal->clientname; ?>">
                      </figure>
                      <span><?php echo $clientVal->clientname; ?></span>
                    </div>

                    

                     <?php endif; endforeach; ?>  

                </div>

        </div>





        <!-- right-aside start -->





        <!-- body end -->









       <?php $this->load->view('includes/footer');?>