<div class="col-md-9">
    <div class="row">
        <div class="col-md-4">
            <?php if(!empty($premium_job)){ ?>
            <?php $this->load->view('home-premium-job-new'); //PREMIUM JOBS ?>
            <section id="vertical-horizontal-scrollbar-demo" class="hunting-job premium-hunting-job default-skin demo clearfix">
                <?php $this->load->view('home-premium-job'); //PREMIUM JOBS?>
            </section>
            <?php } ?>
            <div class="left-aside clearfix">
                <?php $this->load->view('home-corporate-job');?>
            </div>   
        </div>
          <!-- left-aside end -->

      <!-- Mid aside start -->
        <div class="col-md-8">
            <div class="contain-bar">
                <!-- Carousel ================================================== -->
                <?php if(!empty($sliders)): 
                    $this->load->view('home-sliders');
                 endif; ?>
                <!-- /.carousel -->

                <section class="mid-tab clearfix">
                    <?php $this->load->view('home-tab-section-top');?>
                </section>
                <section class="top-jobs clearfix">
                  <?php $this->load->view('home-top-job');?>    
                </section>
            </div>
        </div>
    </div>

    <!--Job list start -->
    <div class="row">
    <?php $this->load->view('job-by-section');?> 
    </div>
    <!--Job list end -->
</div> 

<script type="text/javascript">
$(window).load(function () {
    //$(".demo1").customScrollbar();
  //  $(".demo101").customScrollbar();
  //  $("#vertical-horizontal-scrollbar-demo").customScrollbar();
//    $("#vertical-horizontal-scrollbar-demo1").customScrollbar();
    
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
    
  
});
</script>