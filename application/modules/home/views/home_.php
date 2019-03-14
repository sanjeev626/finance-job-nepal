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
    <div class="col-md-9">
        <!-- Mid aside start -->
        <div class="contain-bar">
            <!-- Carousel ================================================== -->
            <?php if(!empty($sliders)): 
                $this->load->view('home-sliders');
             endif; ?>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Mid aside start -->
        <div class="contain-bar">
            <section class="mid-tab clearfix">
                <?php $this->load->view('home-tab-section-top');?>
            </section>
            <section class="top-jobs clearfix">
              <?php $this->load->view('home-top-job');?>    
            </section>
        </div>
    </div>
    <div class="col-md-3">
        <?php $this->load->view('includes/sidebar');?>
    </div>
    <div class="col-md-12">
        <!--Job list start -->
        <div class="row">
        <?php $this->load->view('job-by-section');?> 
        </div>
        <!--Job list end -->
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