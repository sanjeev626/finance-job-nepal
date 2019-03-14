
<div class="col-md-12">    
    <div class="row">
        <div class="col-md-3">
            <?php            
            if(!empty($premium_job)){ 
                $this->load->view('home-premium-job'); //PREMIUM JOBS          
            } 
            $this->load->view('home-corporate-job');  
            //$this->load->view('home-jobseeker-services'); 
            ?>
        </div>
        <div class="col-md-9" style="padding-left:0px;">
            <div class="contain-bar">
            <!-- Carousel ================================================== -->
                <?php if(!empty($sliders)): 
                    $this->load->view('home-sliders');
                 endif; ?>
                <section class="col-md-8" style="position: absolute; bottom: 5px; right: 5px;">
                    <?php $this->load->view('home-search-top');?>
                </section>
                <!-- /.carousel -->
            </div>
        </div>
        <div class="col-md-9" style="padding-left: 0px;">
            <div class="col-md-8 contain-bar" style="padding-left: 0px; padding-right: 0px;">
                <?php /* ?>
                <section class="mid-tab clearfix">
                    <?php $this->load->view('home-tab-section-top');?>
                </section> 
                <?php */ ?>               
                <section class="mid-tab clearfix">
                    <?php $this->load->view('home-tab-section-top-2');?>
                </section>
                <?php if($tno_corporate_job>$no_of_corporate_job){ ?>
                <section class="top-jobs clearfix">
                  <?php $this->load->view('home-corporate-job-middle');?>    
                </section>
                <?php } ?>
                <section class="top-jobs clearfix" style="margin-top: 10px;">
                  <?php $this->load->view('home-hot-job');?>    
                </section>
            </div>
            <?php $this->load->view('includes/sidebar');?>
        </div>
        <?php $this->load->view('job-by-section');?> 
        <?php /* ?>
        <div class="col-md-3">
        <?php
            $this->load->view('home-testimonial');
        ?>
        </div>
        <div class="col-md-9">
            <div class="contain-bar">
        <!-- Carousel ================================================== -->
                <?php if(!empty($sliders)): 
                    $this->load->view('home-sliders');
                 endif; ?>
                <!-- /.carousel -->
            </div>
        </div>
        <?php */ ?>
    </div>
</div>

<script type="text/javascript">
$(window).load(function () {
    $('#scrollbox3').enscroll({
        showOnHover: true,
        verticalTrackClass: 'track3',
        verticalHandleClass: 'handle3'
    });
    
    $('#scrollbox4').enscroll({
        showOnHover: true,
        verticalTrackClass: 'track4',
        verticalHandleClass: 'handle4'
    });

    $('#scrollbox5').enscroll({
        showOnHover: true,
        verticalTrackClass: 'track5',
        verticalHandleClass: 'handle5'
    });

    $('#scrollbox6').enscroll({
        showOnHover: true,
        verticalTrackClass: 'track6',
        verticalHandleClass: 'handle6'
    });
});
</script>