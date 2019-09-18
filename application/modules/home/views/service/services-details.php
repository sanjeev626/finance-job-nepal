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

<section class="fjn-blog-page-area candidate-dashboard-area section_15">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="blog-content margin_top_0">
                    <h3 class="margin_bottom_15"><?php echo $content->title?></h3>
                    <?php echo $content->content?>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                <?php $this->load->view('includes/right-sidebar');?>
                <!-- <div class="blog-page-right blog-content margin_top_0">
                    <div class="blog-sidebar-widget">
                        <h3>Our Services</h3>
                        <ul class="blog-categories">
                            <?php
                            $this->load->model('../../admin/models/service_model');
                            $services = $this->service_model->get_all_service();
                            foreach($services as $service){
                                echo '<li><a href="'.base_url().'services/'.$service->urlcode.'"><i class="fa fa-angle-double-right "></i>'.$service->title.'</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- Blog Page Area End -->