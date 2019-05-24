<?php if($home_blog):?>
<section class="fjn-blog-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-heading">
                    <h2>Recent From <span>Blog</span></h2>
                    <p>It's easy. Simply post a job you need completed and receive competitive bids from freelancers within minutes</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                foreach($home_blog as $hb){
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
                                    <p><span> <?php echo $day;?></span> <?php echo $month;?></p>
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
</section>
<?php endif;?>