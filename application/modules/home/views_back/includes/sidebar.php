<?php
$segment = $this->uri->segment(2);
if($this->uri->segment('1')!="") $n='3'; else $n='4';

$style='padding-right: 0px;';
if($segment=="jobList")
  $style='padding-left: 0px;';
?>
<div class="col-md-<?php echo $n;?>" style="<?php echo $style;?>">
  <?php
    $seg1 = $this->uri->segment('1');
    $seg2 = $this->uri->segment('2');
    if($seg1=='job' || $seg1=='Search')
    {
      $this->load->view('includes/advance-search-sidebar');
    }
    else
    {
      //$this->load->view('home-testimonial');
      $this->load->view('home-keypositions'); 
      $this->load->view('includes/article-banner-sidebar');  
    }
  ?>
</div>
<style>
  .testimonial-sidebar img{
      float: left;
      margin-right: 10px;
  }
</style>
