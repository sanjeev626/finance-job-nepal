<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">
    <div class="breadcromb-top section_15">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb-box">
                        <h3>Blog</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcromb Area End -->


<!-- Blog Page Area Start -->
<section class="fjn-blog-page-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                   
                        <?php 
                            foreach($bloglists as $hb){
                    $day = date("d",strtotime($hb->cr_date));
                    $month = date("M",strtotime($hb->cr_date));
                    $year = date("Y",strtotime($hb->cr_date));
                    $url = base_url().'blog/'.$hb->slug;
                    ?>
                    <div class="col-lg-4 col-md-12">
                        <a href="<?php echo $url;?>">
                            <div class="single-blog">
                                <div class="blog-image">
                                    <img src="<?php echo base_url().'uploads/blog/'.$hb->image;?>" alt="<?php echo $hb->title?>" />
                                    <!-- <p><span> <?php echo $day;?></span> <?php echo $month;?></p> -->
                                </div>
                                <div class="blog-text">
                                    <h3><?php echo $hb->title?></h3>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php }
                        ?>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- Blog Page Area End -->