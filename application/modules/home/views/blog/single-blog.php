<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">
    <div class="breadcromb-top section_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb-box">
                        <h3><?php echo $blogdetail->title?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcromb-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb-box-pagin">
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">pages</a></li>
                            <li class="active-breadcromb"><a href="#"><?php echo $blogdetail->title?></a></li>
                        </ul>
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
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="single-blog-page-item">
                    <div class="single-blog-item-img">
                        <img src="<?php echo base_url().'uploads/blog/'.$blogdetail->image?>" alt="blog">
                    </div>
                    <div class="single-blog-item-date">
                        <?php
                        $day = date("d",strtotime($blogdetail->cr_date));
                        $month = date("M",strtotime($blogdetail->cr_date));
                        $year = date("Y",strtotime($blogdetail->cr_date));
                        $url = base_url().'blog/'.$blogdetail->slug;
                        ?>
                        <h4><?php echo $day?><span><?php echo $month;?></span></h4>
                    </div>
                    <div class="blog-title">
                        <h3>If you're having trouble coming up with</h3>
                        <p>
                            <i class="fa fa-user"></i>
                            <a href="#">Admin</a>
                        </p>
                        <p>
                            <i class="fa fa-tag"></i>
                            <a href="#">fast food</a>
                        </p>
                        <p>
                            <i class="fa fa-comments-o"></i>
                            <a href="#">
                                (21)
                            </a>
                        </p>
                    </div>
                    <div class="blog-content">
                        <?php echo $blogdetail->articles?>
                    </div>
                </div>
            </div>


            <?php include('sidebar.php');?>

        </div>
    </div>
</section>
<!-- Blog Page Area End -->