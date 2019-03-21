<div id="myCarousel" class="home-carousel carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    <?php foreach($sliders as $key => $sval):?>
    <div class="item <?php if($key == '0'){ echo 'active'; } ?>">
    <?php
      $link = ($sval->link) ? $sval->link : 'javascript:void(0)';
    ?>
      <a target="_blank" href="<?php echo $link; ?>"> <img class="first-slide" src="<?php echo base_url();?>uploads/slider/<?php echo $sval->sliderimage; ?>" alt="First slide"> </a> </div>
    <?php endforeach; ?>
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> 
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 
    <span class="sr-only">Previous</span> 
  </a> 
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> 
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> 
    <span class="sr-only">Next</span> 
  </a>
</div>