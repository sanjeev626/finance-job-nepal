<div class="col-lg-4 col-md-12 col-sm-12 col-12">
    <div class="blog-page-right">
        <!-- <div class="blog-sidebar-widget">
            <form>
                <input type="search" placeholder="Search...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div> -->
        <!-- <div class="blog-sidebar-widget">
            <div class="blog-social-follow">
                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i> 2.1k Fans</a>
                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i> 811 Followers</a>
                <a href="#" class="pinterest-bg"><i class="fa fa-pinterest"></i> 1.5k Fans</a>
                <a href="#" class="instagram-bg"><i class="fa fa-instagram"></i> 5.2k Followers</a>
                <a href="#" class="vk-bg"><i class="fa fa-vk"></i> 940k Followers</a>
                <a href="#" class="youtube-bg"><i class="fa fa-youtube"></i> 2.2k Subscriber</a>
            </div>
        </div> -->
        <!-- <div class="blog-sidebar-widget">
            <h3>by Categories</h3>
            <ul class="blog-categories">
                <li>
                    <a href="#">
                        <i class="fa fa-angle-double-right "></i>
                        business <span>(23)</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-angle-double-right "></i>
                        consulting <span>(12)</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-angle-double-right "></i>
                        business partnership <span>(09)</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-angle-double-right "></i>
                        Audit & assurance <span>(32)</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-angle-double-right "></i>
                        investment <span>(11)</span>
                    </a>
                </li>
            </ul>
        </div> -->
        <!-- <div class="blog-sidebar-widget">
            <h3>tags</h3>
            <ul class="Tags-catagory">
                <li><a href="#">business</a></li>
                <li><a href="#">investment </a></li>
                <li><a href="#">Audit</a></li>
                <li><a href="#">assurance</a></li>
                <li><a href="#">consulting </a></li>
                <li><a href="#">partnership</a></li>
                <li><a href="#">life</a></li>
                <li><a href="#">Secutity</a></li>
                <li><a href="#">Camera</a></li>
            </ul>
        </div> -->
        <?php
        $this->load->model('blog_model');
        $bloglists = $this->blog_model->get_all_blog();
        ?>
        <div class="blog-sidebar-widget">
            <h3>related Post</h3>
            <ul class="featured-list">
                <?php
                foreach($bloglists as $hb){
                $day = date("d",strtotime($hb->cr_date));
                $month = date("M",strtotime($hb->cr_date));
                $year = date("Y",strtotime($hb->cr_date));
                $url = base_url().'blog/'.$hb->slug;
                ?>
                <li class="sidebr-pro-widget">
                    <div class="blog-thumb-info">
                        <div class="blog-thumb-info-image">
                            <a href="#">
                                <img src="<?php echo base_url()?>uploads/blog/<?php echo $hb->image;?>" alt="<?php echo $hb->title;?>" />
                            </a>
                        </div>
                        <div class="blog-thumb-info-content">
                            <h4><a href="<?php echo $url;?>"><?php echo $hb->title;?></a></h4>
                            <!-- <p>Posted on :<a href="#"><?php echo $hb->cr_date;?></a></p> -->
                        </div>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!-- <div class="blog-sidebar-widget">
            <h3>Instagram</h3>
            <ul class="instagram">
                <li>
                    <a href="#">
                        <img src="<?php echo base_url()?>content_home/img/img-1.jpg" alt="instagram" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo base_url()?>content_home/img/img-2.jpg" alt="instagram" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo base_url()?>content_home/img/img-3.jpg" alt="instagram" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo base_url()?>content_home/img/img-1.jpg" alt="instagram" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo base_url()?>content_home/img/img-5.jpg" alt="instagram" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo base_url()?>content_home/img/img-3.jpg" alt="instagram" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo base_url()?>content_home/img/img-2.jpg" alt="instagram" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo base_url()?>content_home/img/img-5.jpg" alt="instagram" />
                    </a>
                </li>
            </ul>
        </div> -->
    </div>
</div>