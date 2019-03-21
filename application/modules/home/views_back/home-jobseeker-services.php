<section class="em-mas hunting-job text-center">
    <p>Looking for a Job..? that matches your skillset & give you career success.</p>
</section>
<section class="employer_service hunting-job">
  <h2>Jobseeker Services</h2>
  <ul>
    <?php if(!empty($candidate_services)):?>
        <?php foreach($candidate_services as $key => $sval): ?>
        <li><a href="<?php echo $sval->link;?>"><?php echo $sval->title;?></a></li>
        <?php endforeach;?>
    <?php endif; ?>
  </ul>
</section>
