<style type="text/css">
	.single-blog-item-img{border: 1px solid #ccc;
    padding: 4px;}
	.single-blog-item-img img{width: 100%; height: 300px; object-fit: cover;}
</style>
<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">
    <div class="breadcromb-top section_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb-box">
                        <h3><?php echo $content->title?></h3>
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
                            <li><a href="<?php echo base_url();?>">home</a></li>
                            
                            <li class="active-breadcromb"><a href="#"><?php echo $content->title?></a></li>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="single-blog-page-item">
                    <div class="single-blog-item-img">
                        <img src="<?php echo base_url().'uploads/content/'.$content->image?>" alt="blog">
                    </div>
                    <div class="single-blog-item-date">
                        <?php
                        $day = date("d",strtotime($content->cr_date));
                        $month = date("M",strtotime($content->cr_date));
                        $year = date("Y",strtotime($content->cr_date));
                        $url = base_url().'blog/'.$content->slug;
                        ?>
                        <h4><?php echo $day?><span><?php echo $month;?></span></h4>
                    </div>
                    <div class="blog-title">
                        <h3><?php echo $content->title?></h3>
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
                        <?php echo $content->contents?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Blog Page Area End -->