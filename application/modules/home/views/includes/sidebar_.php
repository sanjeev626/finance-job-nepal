<div>
  <?php
    $seg1 = $this->uri->segment('1');
    $seg2 = $this->uri->segment('2');
    if($seg1=='job' || $seg1=='Search')
    {
      $this->load->view('includes/advance-search-sidebar');
    }
    else
    {
      /*if(!empty($testimonial)){ 
        $this->load->view('home-testimonial');
      }*/
      $this->load->view('home-keypositions'); 
      $this->load->view('includes/article-banner-sidebar');  
    }
  ?>
</div>
<!--<style>
  .testimonial-sidebar img{
      float: left;
      margin-right: 10px;
  }
</style>-->
