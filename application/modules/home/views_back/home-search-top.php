<div class="row">
  <div class="col-md-12">
    <div class="search-box">
      <?php
      $action =base_url().'Search/jobSearch';
      $attributes = array('name'=>'jobSearch',);
      echo form_open($action, $attributes);
      ?>
      <ul>
        <li>
          <input type="text" class="form-control" name="job_title" placeholder="Job Title" value='<?php if(isset($_POST['job_title'])) echo $_POST['job_title']; ?>'>
        </li>                  
        <li class="styled-select">
          <select class="select small form-control" name="job_category">
            <option value="">Any Category</option>
            <?php foreach($job_category as $key => $value){ ?>
            <option value="<?php echo $value->id;?>"><?php echo $value->dropvalue;?></option>
            <?php } ?>
          </select>
        </li>
        <li class="styled-select">
          <select class="select small form-control" name="location">
            <option value="">Any Location</option>
            <?php foreach($location as $key => $value){ ?>
            <option value="<?php echo $value->id;?>"><?php echo $value->dropvalue;?></option>
            <?php } ?>
          </select>
        </li>
        <li>
          <button type="submit" name="submit_search" class="btn btn-default">Search</button>
        </li>
      </ul>
      <?php echo form_close(); ?> 
    </div>
  </div>
</div>