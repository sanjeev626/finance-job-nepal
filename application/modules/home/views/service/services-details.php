<style type="text/css">
	.single-blog-item-img{border: 1px solid #ccc;
    padding: 4px;}
	.single-blog-item-img img{width: 100%; height: 300px; object-fit: cover;}
</style>
<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">

</section>
<!-- Breadcromb Area End -->


<!-- Blog Page Area Start -->
<!--<section class="fjn-blog-page-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="single-blog-page-item">
                    <?php
/*                    if(!empty($content->logo)){*/?>
                        <div class="single-blog-item-img">
                            <img src="<?php /*echo base_url().'uploads/service/'.$content->logo*/?>" alt="blog">
                        </div>
                    <?php /*}
                    */?>


                    <div class="blog-title">
                        <h3><?php /*echo $content->title*/?></h3>

                    </div>
                    <div class="blog-content">
                        <?php /*echo $content->content*/?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>-->
<!-- Blog Page Area End -->

<!-- Blog Page Area Start -->

<section class="fjn-blog-page-area candidate-dashboard-area section_15">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="blog-content margin_top_0">
                    <h3 class="margin_bottom_15"><?php echo $content->title?></h3>
                    <?php echo $content->content?>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="blog-page-right blog-content margin_top_0">
                    <div class="blog-sidebar-widget">
                        <h3>Our Services</h3>
                        <ul class="blog-categories">
                            <li><a href="<?php echo base_url().'services/recruitment'?>"><i class="fa fa-angle-double-right "></i>Recruitment</a></li>
                            <li><a href="<?php echo base_url().'services/staff-outsourcing'?>"><i class="fa fa-angle-double-right "></i>Staff Outsourcing</a></li>
                            <li><a href="<?php echo base_url().'services/hr-audit-consulting'?>"><i class="fa fa-angle-double-right "></i>HR Audit &amp; Consulting</a></li>
                            <li><a href="<?php echo base_url().'services/payroll-management'?>"><i class="fa fa-angle-double-right "></i>Payroll Management</a></li>
                            <li><a href="<?php echo base_url().'services/corporate-training-for-employer-job-seeker'?>"><i class="fa fa-angle-double-right "></i>Corporate Training for Employer & Job Seeker</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Page Area End -->