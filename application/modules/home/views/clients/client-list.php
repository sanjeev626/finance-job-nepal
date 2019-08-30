<style type="text/css">
    .services{
        padding: 20px 5px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        text-align: center;
    }
    .services a{color:#04a735 ; font-weight: 600}
    .services a:hover{color:#fd0000 }
    .services .serviceimg{margin-bottom: 10px;}
    .services .serviceimg img
    {
        border: 1px solid #ccc;
        border-radius: 128px;
        width: 200px;
        height: 200px; 
    }
</style>
<!-- Breadcromb Area Start -->
<section class="fjn-breadcromb-area">
    <div class="breadcromb-top section_15">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb-box">
                        <h3><?php echo $title?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="fjn-blog-page-area candidate-dashboard-area section_15">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="blog-content">
                   <div class="row">

                    <?php
                        foreach ($client_list as $cl) {                                
                            echo '<div class="col-md-4">
                                <div class="services">
                                    <div class="serviceimg">
                                        <a href="' . $cl->url . '" target="_blank">
                                        <img src="' . base_url() . 'uploads/clients/' . $cl->image . '" alt="' . $cl->clientname . '">
                                        </a>
                                    </div>
                                    <a href="' . $cl->url . '" target="_blank">
                                        ' . $cl->clientname . '
                                    </a>
                                </div>
                            </div>';
                        }
                    ?>            
                   </div> 
                </div>
            </div>
        </div>
    </div>
</section>