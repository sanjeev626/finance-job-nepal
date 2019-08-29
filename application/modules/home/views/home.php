<!--Banner Area Start -->
<section class="fjn-banner-area">
    <div class="banner-slider owl-carousel">
        <div class="banner-single-slider slider-item-1">
            <div class="slider-offset"></div>
        </div>
        <div class="banner-single-slider slider-item-2">
            <div class="slider-offset"></div>
        </div>
    </div>
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-search">
                        <h2>Hire expert freelancers.</h2>
                        <h4>We have 1542 job offers for you! </h4>
                        <form>
                            <div class="banner-form-box">
                                <div class="banner-form-input">
                                    <input type="text" placeholder="Job Title, Keywords, or Phrase">
                                </div>
                                <div class="banner-form-input">
                                    <input type="text" placeholder="City, State or ZIP">
                                </div>
                                <div class="banner-form-input">
                                    <select class="banner-select">
                                        <option selected>Select Sector</option>
                                        <option value="1">Design & multimedia</option>
                                        <option value="2">Programming & tech</option>
                                        <option value="3">Accounting/finance</option>
                                        <option value="4">content writting</option>
                                        <option value="5">Training</option>
                                        <option value="6">Digital Marketing</option>
                                    </select>
                                </div>
                                <div class="banner-form-input">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->

<!-- Job Tab Area Start -->

<?php include('includes/home-job-section.php');?>

<!-- Job Tab Area End -->


<!-- Categories Area Start -->
<section class="fjn-categories-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-heading">
                    <h2>top Trending <span>Categories</span></h2>
                    <p>A better career is out there. We'll help you find it. We're your first step to becoming everything you want to be.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach($job_category as $jc){?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="<?php echo base_url().'category/'.$jc->slug;?>" class="single-category-holder account_cat">
                        <div class="category-holder-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <div class="category-holder-text">
                            <h3><?php echo $jc->dropvalue;?></h3>
                        </div>
                        <?php
                            if(!empty($jc->image)){
                                $image = base_url().'uploads/category/'.$jc->image;
                            }
                        else{
                            $image = base_url().'content_home/img/account_cat.jpg';
                        }
                        ?>
                        <img src="<?php echo $image;?>" alt="<?php echo $jc->dropvalue;?>" />
                    </a>
                </div>
            <?php  }
            ?>
        </div>
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="load-more">
                    <a href="#" class="fjn-btn">browse all categories</a>
                </div>
            </div>
        </div> -->
    </div>
</section>
<!-- Categories Area End -->


<!-- Inner Hire Area Start -->
<!-- <section class="fjn-inner-hire-area section_100">
    <div class="hire_circle"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-hire-left">
                    <h3>Hire an employee</h3>
                    <p>placerat congue dui rhoncus sem et blandit .et consectetur Fusce nec nunc lobortis lorem ultrices facilisis. Ut dapibus placerat blandit nunc.congue dui rhoncus sem et blandit .et consectetur Fusce nec nunc lobortis lorem ultrices facilisis. Ut dapibus placerat blandi </p>
                    <a href="#" class="fjn-btn-3">sign up as company</a>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Inner Hire Area End -->





<!-- Video Area Start -->
<!--<section class="fjn-video-area section_100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="video-container">
                    <h2>Hire experts freelancers today for <br> any job, any time.</h2>
                    <div class="video-btn">
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=k-R6AFn9-ek">
                            <i class="fa fa-play"></i>
                            how it works
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!-- Video Area End -->


<!-- How Works Area Start -->
<!-- <section class="how-works-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-heading">
                    <h2>how it <span>works</span></h2>
                    <p>It's easy. Simply post a job you need completed and receive competitive bids from freelancers within minutes</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="how-works-box box-1">
                    <img src="<?php echo base_url();?>content_home/img/arrow-right-top.png" alt="works" />
                    <div class="works-box-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="works-box-text">
                        <p>sign up</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="how-works-box box-2">
                    <img src="<?php echo base_url();?>content_home/img/arrow-right-bottom.png" alt="works" />
                    <div class="works-box-icon">
                        <i class="fa fa-gavel"></i>
                    </div>
                    <div class="works-box-text">
                        <p>post job</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="how-works-box box-3">
                    <div class="works-box-icon">
                        <i class="fa fa-thumbs-up"></i>
                    </div>
                    <div class="works-box-text">
                        <p>choose expert</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- How Works Area End -->


<!-- Blog Area Start -->
<?php include('includes/home-blog-section.php');?>
<!-- Blog Area End