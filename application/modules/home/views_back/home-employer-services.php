
<section class="em-mas hunting-job text-center">
  <p>Get best matched & skilled work force through out expertise.</p>
</section>
<section class="employer_service hunting-job">
  <h2>Employer Services</h2>
  <ul>
  <?php if(!empty($employer_services)):?>
      <?php foreach($employer_services as $key => $sval): ?>
      <li><a href="<?php echo $sval->urlcode;?>"><?php echo $sval->title;?></a></li>
      <?php endforeach;?>
  <?php endif; ?>
  </ul>
</section>
<div class="right-aside">
  