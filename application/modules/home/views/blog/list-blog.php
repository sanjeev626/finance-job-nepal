<!-- Breadcromb Area Start -->
<<<<<<< HEAD
<section class="fjn-breadcromb-area">   
    <div class="breadcromb-top section_15">
=======
<section class="fjn-breadcromb-area">
    <div class="breadcromb-top section_100">
>>>>>>> dbe28e6640d84efbd8f7eb1f920d66f438f9dd8b
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb-box">
                        <h3>Blog</h3>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </div>    
    <!-- <div class="breadcromb-bottom">
=======
    </div>
    <div class="breadcromb-bottom">
>>>>>>> dbe28e6640d84efbd8f7eb1f920d66f438f9dd8b
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb-box-pagin">
                        <ul>
<<<<<<< HEAD
                            <li><a href="<?php echo base_url();?>">home</a></li>
=======
                            <li><a href="#">home</a></li>
>>>>>>> dbe28e6640d84efbd8f7eb1f920d66f438f9dd8b
                            
                            <li class="active-breadcromb"><a href="#">Blogs</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </div> --> 
=======
    </div>
>>>>>>> dbe28e6640d84efbd8f7eb1f920d66f438f9dd8b
</section>
<!-- Breadcromb Area End -->


<!-- Blog Page Area Start -->
<<<<<<< HEAD
<section class="fjn-blog-page-area section_15">
=======
<section class="fjn-blog-page-area section_70">
>>>>>>> dbe28e6640d84efbd8f7eb1f920d66f438f9dd8b
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
<<<<<<< HEAD
                                    <p><span> <?php echo $day;?></span> <?php echo $month;?></p>
=======
                                    <!-- <p><span> <?php echo $day;?></span> <?php echo $month;?></p> -->
>>>>>>> dbe28e6640d84efbd8f7eb1f920d66f438f9dd8b
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