<?php
$article=  $this->general_model->getAll('article','','','id,slug,title');
$right_banner = $this->general_model->getAll('slider',array('status' => 'Enabled','type' => 'right_portion'),'ordering','','',10);
if(!empty($article)):
      $article_title = array();
      $article_link = array();
      $i=0;
      foreach($article as $key => $sval): 
      $article_title[$i] = $sval->title;
      $article_link[$i] = base_url().'article/'.$sval->slug;
      $i++;
      ?>
      <?php endforeach;
    endif;

//Right Banner Starts Here
if(!empty($right_banner))
{
  $counter=0;
  foreach ($right_banner as $key => $value) 
  {
    //print_r($value);
    if(empty($value->sliderimage2) && empty($value->sliderimage3))
    {               
      ?>
      <section class="capsule">
      <a href="<?php echo $value->link;?>" >
        <img src="<?php echo base_url();?>uploads/slider/<?php echo $value->sliderimage; ?>" alt="<?php echo $value->title;?>" class="img-responsive">            
        <h3></h3>
        <strong><?php echo $value->title;?></strong>
      </a>
    </section>
      <?php
    }
    else
    {
      ?>
      <section class="capsule">
      <div id="globalad" class="carousel slide carousel-fade" data-ride="carousel">
          <a href="<?php echo $value->link;?>">
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img class="first-slide" src="<?php echo base_url();?>uploads/slider/<?php echo $value->sliderimage; ?>" alt="<?php echo $value->title;?>">
            </div>
            <?php 
            if(!empty($value->sliderimage2))
            {                  
            ?>
            <div class="item">
              <img class="second-slide" src="<?php echo base_url();?>uploads/slider/<?php echo $value->sliderimage2; ?>" alt="<?php echo $value->title;?>">
            </div>
            <?php
            } 
            if(!empty($value->sliderimage3))
            {
            ?>
            <div class="item">
              <img class="third-slide" src="<?php echo base_url();?>uploads/slider/<?php echo $value->sliderimage3; ?>" alt="<?php echo $value->title;?>">
            </div>
            <?php
            }
            ?>
          </div>
          <h3></h3> 
          <em class="title"><?php echo $value->title;?></em> 
          </a>  
      </div>
      <!-- /.carousel -->
      </section>
      <?php
    }
    if($counter<4){
    ?>
    <section class="employer_service hunting-job">
      <ul>
        <li><a href="<?php echo $article_link[$counter];?>" title="<?php echo $article_title[$counter];?>"><?php echo substr($article_title[$counter],0,34);?>...</a></li>
      </ul>
    </section>
    <?php
    }
    ++$counter;
  }
}

?>