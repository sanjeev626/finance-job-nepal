<style type="text/css">
	.single-blog-item-img{border: 1px solid #ccc;
    padding: 4px;}
	.single-blog-item-img img{width: 100%; height: 300px; object-fit: cover;}
</style>

<!-- Breadcromb Area Start -->

<section class="fjn-breadcromb-area">
    <div class="breadcromb-top section_15">
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
</section>
<!-- Breadcromb Area End -->
<!-- Blog Page Area Start -->
<section class="fjn-blog-page-area candidate-dashboard-area section_15">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="blog-content">
                    <?php echo $content->contents?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Page Area End -->